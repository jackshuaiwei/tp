<?php


namespace app\common\validate;


use think\Validate;

class User extends Validate
{
    protected $rule = [
        'username|用户名'=>'require|max:25',
        'password|密码'=>'require|max:16',
        'conpass|确认密码'=>'require|confirm:password',
        'email|邮箱'=>'email|require|unique:user',
        'old_pass|当前密码'=>'require',
        'new_pass|新密码'=>'require',
        'con_pass|确认密码'=>'require|confirm:new_pass',
        'new_email|新邮箱'=>'email|require',
        'is_active|激活'=>'require',
        'signature|个性签名'=>'max:120'

    ];

    public function sceneLogin(){
        return $this->only(['username','password']);
    }

    public function sceneRegister(){
        return $this->only(['email','password','conpass','username']);
    }

    public function scenePset(){
        return $this->only(['username','signature']);
    }

    public function sceneCpass(){
        return $this->only(['old_pass','new_pass','con_pass']);
    }

    public function sceneCemail(){
        return $this->only(['new_email','password']);
    }

    public function sceneAlogin(){
        return $this->only(['username','password','signature']);
    }

    public function sceneCusers(){
        return $this->only(['username','email','sex','is_active','signature']);
    }

    public function sceneAusers(){
        return $this->only(['username','password','conpass','email','signature']);
    }

    public function sceneCp(){
        return $this->only(['password','conpass']);
    }
}