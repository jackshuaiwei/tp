<?php

namespace app\admin\controller;

use app\common\model\Admin;
use app\common\model\Photo;
use app\common\model\Record;
use app\common\model\System;
use app\common\model\User;
use app\common\model\Wish;
use app\common\model\Comment;
use think\Controller;

class Index extends Base
{
    //后台首页
    public function index(){
        $id = session('user')['id'];
        $user = Admin::where('id',$id)->find();
        $viewdata = [
            'user'=>$user
        ];
        $this->assign($viewdata);
        $web = System::get(1);
        $viewdata = [
            'web'=>$web
        ];
        $this->assign($viewdata);
        return view();
    }

    //后台退出登录
    public function alogout(){
        session(null);
        if(session('?user.id')){
            $this->error('退出登录失败！');
        }
        else{
            $this->success('退出登录成功！','admin/login/login');
        }
    }

    //后台日记管理展示
    public function record(){
        $record = Record::where('id','>',0)->paginate(5);
        $viewdata = [
            'records'=>$record
        ];
        $this->assign($viewdata);
        return view();
    }

    //后台修改日记
    public function crecord(){
        $rid = input('rid');
        if(request()->isAjax()){
            $data = [
                'title'=>input('post.title'),
                'content'=>input('post.content'),
                'song_url'=>input('post.song_url'),
                'user_id'=>input('user_id'),
                'is_show'=>input('post.is_show'),
                'rid'=>$rid
            ];

            $result_1 = model("Record")->crecord($data);
            if($result_1 == 1){
                $this->success('修改日记成功！','admin/index/record');
            }else{
                $this->error($result_1);
            }
        }

        $result = Record::where('id',$rid)->find();
        $user = User::select();
        $viewdata = [
            'record'=>$result,
            'user'=>$user
        ];
        $this->assign($viewdata);
        return view();
    }

    //后台删除日记
    public function drecord(){
        $id = input("rid");
        $re = Record::get($id);
        $result = $re->delete();
        if($result){
            $this->success('删除成功','admin/index/record');
        }else{
            $this->error("删除失败！");
        }
    }

    //后台添加日记
    public function arecord(){
        if(request()->isAjax()){
            $data = [
                'title'=>input('post.title'),
                'content'=>input('post.content'),
                'song_url'=>input('post.song_url'),
                'user_id'=>input('post.user_id'),
                'is_show'=>input('post.is_show')
            ];
            $result = model('Record')->arecord($data);
            if($result == 1){
                $this->success('日记添加成功！','admin/index/record');
            }else{
                $this->error($result);
            }
        }


        $user = User::where('id','>',0)->select();
        $viewdata = [
            'user'=>$user
        ];
        $this->assign($viewdata);
        return view();
    }

    //后台愿望展示
    public function wishlist(){
        $user = User::select();
        $record = Wish::where('id','>',0)->paginate(6);
        $viewdata = [
            'wish'=>$record,
            'user'=>$user
        ];
        $this->assign($viewdata);
        return view();
    }

    //后台愿望修改
    public function cwish(){
        $wid = input('wid');
        if(request()->isAjax()){
            $data = [
                'title'=>input('post.title'),
                'content'=>input('post.content'),
                'user_id'=>input('user_id'),
                'wid'=>$wid
            ];

            $result_1 = model("Wish")->cwish($data);
            if($result_1 == 1){
                $this->success('修改愿望成功！','admin/index/wishlist');
            }else{
                $this->error($result_1);
            }
        }

        $result = Wish::where('id',$wid)->find();
        $user = User::select();
        $viewdata = [
            'wish'=>$result,
            'user'=>$user
        ];
        $this->assign($viewdata);
        return view();
    }

    //后台愿望删除
    public function dwish(){
        $id = input("wid");
        $re = Wish::get($id);
        $result = $re->delete();
        if($result){
            $this->success('删除成功','admin/index/wishlist');
        }else{
            $this->error("删除失败！");
        }
    }

    //后台愿望添加
    public function awish(){
        if(request()->isAjax()){
            $data = [
                'title'=>input('post.title'),
                'content'=>input('post.content'),
                'user_id'=>input('post.user_id'),
            ];
            $result = model('Wish')->awish($data);
            if($result == 1){
                $this->success('愿望添加成功！','admin/index/wishlist');
            }else{
                $this->error($result);
            }
        }
        $user = User::select();
        $viewdata = [
            'user'=>$user
        ];
        $this->assign($viewdata);
        return view();
    }

    //后台用户头像展示
    public function userphoto(){
        $record = Photo::where('id','>',0)->paginate(6);
        $user = User::select();
        $viewdata = [
            'photo'=>$record,
            'user'=>$user
        ];
        $this->assign($viewdata);
        return view();
    }

    //后台用户头像修改
    public function cphoto(){
        $pid = input("pid");
        $file = request()->file('image');
        if($file){
            $info = $file->rule('date')->validate(['size'=>50000,'ext'=>'jpg,png,gif'])->move('./uploads/');
            if($info){
                $photo = Photo::where('id',$pid)->find();
                $path = $photo['path'];
                $img_re = unlink("../public/uploads/$path");
                if($img_re){
                    $photo->path = $info->getSaveName();
                    $result = $photo->save();
                    if($result){
                        $this->success('头像修改成功！','admin/index/userphoto');
                    }else{
                        $this->error('头像修改失败！');
                    }
                }else{
                    return "头像删除失败！";
                }
            }else{
                $this->error($file->getError());
            }
        }

        $result = Photo::where('id',$pid)->find();
        $user = User::select();
        $viewdata = [
            'photo'=>$result,
            'user'=>$user
        ];
        $this->assign($viewdata);
        return view();
    }

    //后台用户管理展示
    public function users(){
        $user = User::where('id','>',0)->paginate(5);
        $viewdata = [
            'user'=>$user
        ];
        $this->assign($viewdata);
        return view();
    }

    //后台修改用户
    public function cusers(){
        $uid = input('uid');
        if(request()->isAjax()){
            $data = [
                'username'=>input('post.username'),
                'email'=>input('post.email'),
                'sex'=>input('post.sex'),
                'is_active'=>input('post.is_active'),
                'signature'=>input('signature'),
                'id'=>$uid
            ];

            $result_1 = model("User")->cusers($data);
            if($result_1 == 1){
                $this->success('修改用户信息成功！','admin/index/users');
            }else{
                $this->error($result_1);
            }
        }

        $result = User::where('id',$uid)->find();
        $viewdata = [
            'user'=>$result,
        ];
        $this->assign($viewdata);
        return view();
    }

    //后台添加用户
    public function ausers(){
        if(request()->isAjax()){
            $data = [
                'username'=>input('post.username'),
                'password'=>input('post.password'),
                'email'=>input('post.email'),
                'is_active'=>input('post.is_active'),
                'signature'=>input('post.signature'),
                'conpass'=>input('post.conpass'),
                'sex'=>input('post.sex'),
            ];

            $result = model('User')->ausers($data);
            if($result == 1){
                $this->success('添加用户成功！','admin/index/users');
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    //后台删除用户
    public function dusers(){
        $uid = input('uid');
        $user = User::where('id',$uid)->find();
        $user->is_active = 0;
        $result = $user->delete();
        Photo::destroy(function($query){
            $uid = input('uid');
            $query->where('user_id','=',$uid);
        });
        Record::destroy(function($query){
            $uid = input('uid');
            $query->where('user_id','=',$uid);
        });
        Comment::destroy(function($query){
            $uid = input('uid');
            $query->where('from_id','=',$uid);
        });
        if($result){
            $this->success('删除用户成功！','admin/index/users');
        }else{
            $this->error('删除用户失败！');
        }
    }

    //后台用户修改密码
    public function cpassword(){
        if(request()->isAjax()){
            $data = [
                'password'=>input('post.password'),
                'conpass'=>input('post.conpass')
            ];
            $result = model('User')->cpword($data);
            if($result == 1){
                $this->success('密码修改成功！','admin/index/users');
            }
            else{
                $this->error($result);
            }
        }
        return view();
    }

    //后台查询用户，根据username
    public function susers(){
        $username = input('username');
        $info = User::where('username',$username)->select();
        foreach ($info as $val){
            if($val['is_active'] == 1){
                $val['is_active'] = "是";
            }
            else{
                $val['is_active'] = "否";
            }
        }
        $array = [
            'code'=>0,
            'data'=>$info
        ];
        return json($array);

    }

    //后台查询日记，根据user_id
    public function srecord(){
        $username = input('user');
        $user = User::where('username',$username)->find();
        $info = Record::where('user_id',$user['id'])->select();
        foreach ($info as $val){
            $val['user_id'] = $username;
        }
        $array = [
            'code'=>0,
            'data'=>$info
        ];
        return json($array);
    }

    //后台查询愿望，根据user_id
    public function swish(){
        $username = input('user');
        $user = User::where('username',$username)->find();
        $info = Wish::where('user_id',$user['id'])->select();
        foreach ($info as $val){
            $val['user_id'] = $username;
        }
        $array = [
            'code'=>0,
            'data'=>$info
        ];
        return json($array);
    }

    //后台查询用户头像，根据user_id
    public function sphoto(){
        $username = input('user');
        $user = User::where('username',$username)->find();
        $info = Photo::where('user_id',$user['id'])->select();
        foreach ($info as $val){
            $val['user_id'] = $username;
        }
        $array = [
            'code'=>0,
            'data'=>$info
        ];
        return json($array);
    }

    //后台网站设置
    public function cindex(){
        if(request()->isAjax()){
            $data = [
                'domain'=>input('post.domain'),
                'ip'=>input('post.IP'),
                'port'=>input('post.port'),
                'email'=>input('post.email')
            ];
            $result = model('System')->cindex($data);
            if($result == 1){
                $this->success('修改成功！','admin/index/index');
            }else{
                $this->error($result);
            }
        }
        $web = System::get(1);
        $viewdata = [
            'web'=>$web
        ];
        $this->assign($viewdata);
        return view();
    }

    //后台管理员展示
    public function adusers(){
        $aduser = Admin::where('id','>',0)->paginate(6);
        $viewdata = [
            'user'=>$aduser
        ];
        $this->assign($viewdata);
        return view();
    }

    //后台管理员修改
    public function cadusers(){
        $uid = input('uid');
        if(request()->isAjax()){
            $data = [
                'username'=>input('post.username'),
                'password'=>input('post.password'),
                'is_super'=>input('post.is_super'),
                'id'=>$uid
            ];

            $result_1 = model("Admin")->cadusers($data);
            if($result_1 == 1){
                $this->success('修改管理员信息成功！','admin/index/adusers');
            }else{
                $this->error($result_1);
            }
        }

        $result = Admin::where('id',$uid)->find();
        $viewdata = [
            'user'=>$result,
        ];
        $this->assign($viewdata);
        return view();
    }

    //后台管理员添加
    public function aadusers(){
        if(request()->isAjax()){
            $data = [
                'username'=>input('post.username'),
                'password'=>input('post.password'),
                'is_super'=>input('post.is_super'),
                'conpass'=>input('post.conpass'),
            ];

            $result = model('Admin')->aadusers($data);
            if($result == 1){
                $this->success('添加管理员成功！','admin/index/adusers');
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    //后台管理员删除
    public function dadusers(){
        $id = input('uid');
        $admin = Admin::where('id',$id)->find();
        $admin->is_super = 0;
        $re = $admin->delete();
        if($re){
            $this->success('删除成功！','admin/index/adusers');
        }else{
            $this->error('删除失败！');
        }

    }

    //后台管理员查询，根据username
    public function sadusers(){
        $username = input('username');
        $info = Admin::where('username',$username)->select();
        foreach ($info as $val){
            if($val['is_super'] == 1){
                $val['is_super'] = "是";
            }
            else{
                $val['is_super'] = "否";
            }
        }
        $array = [
            'code'=>0,
            'data'=>$info
        ];
        return json($array);
    }

    //后台评论展示
    public function comments(){
        $record = Comment::where('id','>',0)->paginate(6);
        $user = User::select();
        $viewdata = [
            'records'=>$record,
            'user'=>$user
        ];
        $this->assign($viewdata);
        return view();
    }

    //后台评论查询
    public function scomments(){
        $username = input('username');
        $user = User::where('username',$username)->find();
        $user_list = User::select();
        $cho = input('cho');//0代表From，1代表To
        if($cho == 0){
            $result = Comment::where('from_id',$user['id'])->select();
            foreach ($result as $val){
                $val['from_id'] = $username;
                foreach ($user_list as $value){
                    if($value['id']==$val['to_id']){
                        $val['to_id'] = $value['username'];
                    }
                }
            }

        }else{
            $result = Comment::where('to_id',$user['id'])->select();
            foreach ($result as $val){
                $val['to_id'] = $username;
                foreach ($user_list as $value){
                    if($value['id']==$val['from_id']){
                        $val['from_id'] = $value['username'];
                    }
                }
            }
        }
        $arr = [
            'code'=>0,
            'data'=>$result
        ];
        return $arr;

    }
}
