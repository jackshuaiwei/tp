<?php

namespace app\index\controller;

use app\common\model\Comment;
use app\common\model\Photo;
use app\common\model\Record;
use app\common\model\User;
use app\common\model\Wish;
use think\Controller;
use think\facade\Request;

class Home extends Base
{

    //退出登录
    public function logout(){
        session(null);
        if(session('?name.id')){
            $this->error('退出登录失败！');
        }
        else{
            $this->success('退出登录成功！','index/index/index');
        }
    }

    //用户中心
    public function user_center(){
        $id = Request::param('id');
        $user_info = User::where('id',$id)->find();
        $records = Record::where('user_id',$id)->order('create_time', 'asc')->paginate(6);
        $viewData = [
            'user_info'=>$user_info,
            'records'=>$records
        ];

        $this->assign($viewData);
        return view();
    }

    //写日记
    public function write(){
        $id = session('name')['id'];
        if(request()->isAjax()){
            $data = [
                'title'=>input('post.title'),
                'content'=>input('post.content'),
                'song_url'=>input('song_url'),
                'is_show'=>input('post.is_show'),
                'user_id'=>$id
            ];
            $result = model('Record')->write($data);

            if($result == 1){
                $this->success('日记添加成功！','index/user_center/'.$id);
            }else{
                $this->error($result);
            }
        }

        return view();
    }

    //日记详情页面
    public function detail(){
        $rid = input('rid');
        $re_info = Record::where('id',$rid)->find();
        $user_id = $re_info['user_id'];
        $user_info = User::where('id',$user_id)->find();
        $comment = Comment::where('article_id',$rid)->order('create_time', 'desc')->select();
        $viewData = [
            'record'=>$re_info,
            'user'=>$user_info,
            'comment'=>$comment
        ];
        $this->assign($viewData);
        return view();
    }

    //日记墙
    public function all(){
        $result = Record::where('is_show',1)->order('create_time', 'desc')->select();
        $viewdata = [
            'record'=>$result
        ];
        $this->assign($viewdata);
        return view();
    }

    // 首页
    public function mood(){
        return view();
    }

    //个人设置
    public function pset(){
        $id = session('name')['id'];
        if(request()->isAjax()){
            $data = [
                'username'=>input('post.username'),
                'signature'=>input('post.signature'),
                'sex'=>input('post.sex'),
                'id'=>$id
            ];
            $result = model('User')->pset($data);
            if($result == 1){
                $this->success('修改成功！','index/user_center/'.$id);
            }else{
                $this->error($result);
            }
        }
        $user = User::where('id',$id)->find();
        $viewdata = [
            'user'=>$user
        ];
        $this->assign($viewdata);
        return view();
    }

    //修改密码
    public function cpass(){
        $id = session('name')['id'];
        if(request()->isAjax()){
            $data = [
                'old_pass'=>input('post.now_pass'),
                'new_pass'=>input('post.new_pass'),
                'con_pass'=>input('post.con_pass'),
                'id'=>$id
            ];
            $result = model('User')->cpass($data);
            if($result == 1){
                $this->success('修改密码成功!','index/user_center/'.$id);
            }
            else{
                $this->error($result);
            }
        }

        return view();
    }

    //修改邮箱
    public function cemail(){
        $id = session('name')['id'];
        if(request()->isAjax()){
            $data = [
                'new_email'=>input('post.email'),
                'password'=>input('post.password'),
                'id'=>$id
            ];
            $result = model('User')->cemail($data);
            if($result == 1){
                $this->success('邮箱更新成功！','index/user_center/'.$id);
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    //修改头像
    public function cphoto(){
        $id = session('name')['id'];
        $file = request()->file('image');
        if($file){
            $info = $file->rule('date')->validate(['size'=>50000,'ext'=>'jpg,png,gif'])->move('./uploads/');
            if($info){
                $photo = Photo::where('user_id',$id)->find();
                $path = $photo['path'];
                $img_re = unlink("../public/uploads/$path");
                if($img_re){
                    $photo->path = $info->getSaveName();
                    $result = $photo->save();
                    if($result){
                        $this->success('头像上传成功！','index/user_center/'.$id);
                    }else{
                        $this->error('头像上传失败！');
                    }
                }else{
                    return "头像删除失败！";
                }


            }else{
                $this->error($file->getError());
            }
        }
        $user = User::where('id',$id)->find();
        $viewdata = [
            'user'=>$user
        ];
        $this->assign($viewdata);

        return view();
    }

    //评论
    public function comment(){
        $from_id = session('name')['id'];

        if(request()->isAjax()){
            $content = input('post.data');
            $rid = input('post.rid');
            $author = Record::where('id',$rid)->find();
            $to_id = $author->user_id;
            $data = [
                'from_id' => $from_id,
                'to_id'=>$to_id,
                'content'=>$content,
                'article_id'=>$rid
            ];

            $result = model('Comment')->comment($data);
            if($result == 1){
                $this->success('回复成功！','index/detail/'.$rid);
            }else{
                $this->error($result);
            }

        }


    }

    //愿望
    public function wish(){
        $id = session('name')['id'];
        $wish = Wish::where('id','>',0)->order('create_time','desc')->paginate(4);
        $viewdata = [
            'wish'=>$wish
        ];
        $this->assign($viewdata);
        return view();
    }

    //写愿望
    public function wishwrite(){
        if(request()->isAjax()){
            $data = [
                'title'=>input('post.title'),
                'content'=>input('post.content')
            ];
            $result = model('Wish')->write($data);
            if($result == 1){
                $this->success('发布愿望成功！','index/home/wish');
            }else{
                $this->error($result);
            }
        }
        return view();
    }
    //愿望墙
    public function wishlist(){
        $id = session('name')['id'];
        $wish = Wish::where('user_id',$id)->select();
        $user = User::where('id',$id)->find();
        $viewdata = [
            'list' =>$wish,
            'user'=>$user
        ];
        $this->assign($viewdata);

        return view();
    }



}
