<?php


namespace app\common\validate;


use think\Validate;

class System extends Validate
{
    protected $rule = [
        'domain|域名'=>'require',
        'ip|IP地址'=>'require',
        'port|端口'=>'require',
        'email|联系邮箱'=>'require|email',
    ];

    public function sceneCindex(){
        return $this->only(['domain','IP','port','email']);
    }
}