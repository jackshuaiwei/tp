<?php

namespace app\admin\controller;

use think\Controller;

class Login extends Controller
{
    public function initialize(){
        if(session('?user.id')){
            $this->redirect('admin/index/index');
        }
    }

    //后台登录
    public function login(){
        if(request()->isAjax()){
            $data = [
                'username'=>input('post.username'),
                'password'=>input('post.password')
            ];
            $result = model('Admin')->alogin($data);
            if($result==1){
                $this->success('登录成功！','admin/index/index');
            }else{
                $this->error($result);
            }
        }
        return view();
    }
}
