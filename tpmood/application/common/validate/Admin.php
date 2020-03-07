<?php


namespace app\common\validate;


use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'username|用户名'=>'require|max:25',
        'password|密码'=>'require|max:16',
        'conpass|确认密码'=>'require|confirm:password'
    ];

    public function sceneAlogin(){
        return $this->only(['username','password']);
    }

    public function sceneCadusers(){
        return $this->only(['username','password']);
    }

    public function sceneAaduser(){
        return $this->only(['username','password','conpass']);
    }
}