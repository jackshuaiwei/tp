<?php

namespace app\index\controller;

use think\Controller;

class Base extends Controller
{
    //防止用户没登陆就操作
    public function initialize()
    {
        if(!session('?name.id')){
            $this->redirect('index/index/login');
        }
    }
}
