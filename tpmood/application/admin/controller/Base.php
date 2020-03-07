<?php

namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    //防止用户没登陆就操作
    public function initialize()
    {
        if(!session('?user.id')){
            $this->redirect('admin/login/login');
        }
    }
}
