<?php
namespace app\index\controller;

use app\common\model\Photo;
use app\common\model\Record;
use app\common\model\User;
use think\Controller;
use think\facade\Request;
use think\Paginator;

class Index extends Controller
{
    //防止重复登录
    public function initialize()
    {
        $id = session('name')['id'];
        if(session('?name.id')){
            $this->redirect('index/home/user_center',['id'=>$id]);
        }
    }

    //首页
    public function index(){

        return view();
    }

    //登录
    public function login(){
        if(request()->isAjax()){
            $data = [
                'username'=> input('post.username'),
                'password'=>input('post.password')
            ];
            $result = model('User')->login($data);
            if($result == 1){
                $id = session('name')['id'];
                $this->success('登录成功','index/user_center/'.$id);
            }
            else{
                $this->error($result);
            }
        }

        return view();
    }


    //注册
    public function register(){
        if(request()->isAjax()){
            $data = [
                'username'=>input('post.username'),
                'password'=>input('post.password'),
                'conpass'=>input('post.conpass'),
                'email'=>input('post.email')
            ];
            $result = model('User')->register($data);
            if($result == 1){
                $this->success('注册成功','index/index/login');
            }
            else{
                $this->error($result);
            }
        }
        return view();

    }

    //激活
    public function active(){
        $data = input('code');
        $result = User::where('code',$data)->find();
        if($result){
            $photo = new Photo();
            $photo->path = "de/de.jpg";
            $photo->user_id = $result['id'];
            $photo->save();
            $result->is_active = 1;
            $result->save();
            return '您已激活该账户！';
        }
        else{
            return "账户激活失败！";
        }

    }


}
