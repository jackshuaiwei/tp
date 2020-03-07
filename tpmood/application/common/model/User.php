<?php


namespace app\common\model;


use think\Model;
use think\model\concern\SoftDelete;

class User extends Model
{
    use SoftDelete;

    //一对多
    public function record(){
        return $this->hasMany('Record');
    }
    //一对多
    public function com(){
        return $this->hasMany('Comment');
    }

    //一对一
    public function photo(){
        return $this->hasOne('Photo');
    }

    //登录验证
    public function login($data){
        $validate = new \app\common\validate\User();
        if(!$validate->scene('login')->check($data)){
            return $validate->getError();
        }
        $result = User::where($data)->find();
        if($result){
            if($result->is_active == 0){
                return "您的账号未激活，请到邮箱点击确认激活！";
            }
            $sessionData = [
                'id' => $result['id'],
                'username' => $result['username'],
            ];
            session('name',$sessionData);
            return 1;
        }else{
            return "用户名或密码错误！";
        }
    }

    //注册验证
    public function register($data){
        $validate = new \app\common\validate\User();
        if(!$validate->scene('register')->check($data)){
            return $validate->getError();
        }
        $title = "Mood激活账户";
        $to = $data['email'];
        $to_1 = $to.explode('@',$to)[0];

        $username = $data['username'];
        $re = User::where('username',$username)->find();
        if($re){
            return "用户名已存在";
        }
        $user = new User($data);
        $code = think_encrypt($to);
        $user->code = $code;
        $result = $user->allowField(true)->save();
        $content = "http://www.mooddiary/index/active/$code".".html";
        mailto($to,$title,$content);
        if($result){
            return 1;
        }else{
            return "注册失败！";
        }

    }

    // 个人设置验证
    public  function pset($data){
        $validate = new \app\common\validate\User();
        if(!$validate->scene('pset')->check($data)){
            return $validate->getError();
        }
        $user = User::get($data['id']);
        $user->username = $data['username'];
        $user->signature = $data['signature'];
        $user->sex = $data['sex'];
        $result = $user->save();
        if($result){
            return 1;
        }
        else{
            return '个人信息更新失败！';
        }
    }

    //修改密码验证
    public function cpass($data){
        $validate = new \app\common\validate\User();
        if(!$validate->scene('cpass')->check($data)){
            return $validate->getError();
        }
        $user = User::where('id',$data['id'])->find();
        $old_pass = $user->password;
        if($old_pass != $data['old_pass']){
            return '当前密码不对,请重新输入！';
        }else{
            $user->password = $data['new_pass'];
            $result = $user->save();
            if($result){
                return 1;
            }
            else{
                return '修改密码不成功！';
            }
        }
    }

    //修改邮箱验证
    public function cemail($data){
        $validate = new \app\common\validate\User();
        if(!$validate->scene('cemail')->check($data)){
            return $validate->getError();
        }
        $user = User::where('id',$data['id'])->find();
        if($user->password != $data['password']){
            return '您输入的密码错误！';
        }
        $re = User::where('email',$data['new_email'])->find();
        if($re){
            return "邮箱已存在！";
        }
        $user->email = $data['new_email'];
        $result = $user->save();
        if($result){
            return 1;
        }
        else{
            return '更新邮箱失败！';
        }
    }

    //后台用户信息修改
    public function cusers($data){
        $validate = new \app\common\validate\User();
        if(!$validate->scene('cusers')->check($data)){
            return $validate->getError();
        }
        $user = new User();
        try{
            $result = $user->allowField(true)->save($data,['id'=>$data["id"]]);
        }catch (\Exception $e){
            return "用户名已存在！";
        }
        if($result){
            return 1;
        }else{
            return "修改用户信息失败！";
        }
    }

    //后台添加用户
    public function ausers($data){
        $validate = new \app\common\validate\User();
        if(!$validate->scene('ausers')->check($data)){
            return $validate->getError();
        }
        $user = new User($data);
        try{
            $result = $user->allowField(true)->save();
        }catch (\Exception $e){
            return "用户名已经存在！";
        }
        $photo = new Photo();
        $photo->path = "de/1.jpg";
        $photo->user_id = $user->id;
        $photo->save();
        if($result){
            return 1;
        }else{
            return "添加用户失败！";
        }
    }

    //后台修改密码
    public function cpword($data){
        $validate = new \app\common\validate\User();
        if(!$validate->scene('cp')->check($data)){
            return $validate->getError();
        }
        $id = input('uid');
        $user = User::where('id',$id)->find();
        $user->password = $data['password'];
        $result = $user->save();
        if($result){
            return 1;
        }else{
            return "修改密码失败！";
        }
    }


}