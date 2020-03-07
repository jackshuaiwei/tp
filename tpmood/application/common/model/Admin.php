<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Admin extends Model
{
    use SoftDelete;

    //后台登录验证
    public function alogin($data){
        $validate = new \app\common\validate\Admin();
        if(!$validate->scene('alogin')->check($data)){
            return $validate->getError();
        }
        $result = Admin::where($data)->find();
        if($result){
            $sessiondata = [
                'id'=>$result->id,
                'username'=>$result->username,
                'is_super'=>$result->is_super
            ];
            session('user',$sessiondata);
            return 1;
        }
        else{
            return "账号或者密码错误！";
        }
    }

    //后台管理员信息修改验证
    public function cadusers($data){
        $validate = new \app\common\validate\Admin();
        if(!$validate->scene('cadusers')->check($data)){
            return $validate->getError();
        }
        $re = Admin::where('username',$data['username'])->select();
        $admin = new Admin();
        try{
            $result = $admin->allowField(true)->save($data,['id'=>$data['id']]);
        }catch (\Exception $e){
            return "修改失败！请尝试换一个用户名！";
        }

        if($result){
            return 1;
        }
        else{
            return "修改失败！";
        }
    }

    //后台添加管理员验证
    public function aadusers($data){
        $validate = new \app\common\validate\Admin();
        if(!$validate->scene('aadusers')->check($data)){
            return $validate->getError();
        }
        $admin = new Admin($data);
        try{
            $result = $admin->allowField(true)->save();
        }catch (\Exception $e){
            return "用户名已存在！";
        }
        if($result){
            return 1;
        }else{
            return "添加管理员失败！";
        }
    }
}
