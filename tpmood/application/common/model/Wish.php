<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Wish extends Model
{
    use SoftDelete;

    //多对一
    public function user(){
        return $this->belongsTo("User");
    }


    public function write($data){
        $validate = new \app\common\validate\Wish();
        if(!$validate->scene('write')->check($data)){
            return $validate->getError();
        }
        $wish = new Wish($data);
        $id = session('name')['id'];
        $wish->user_id = $id;
        $result = $wish->allowField(true)->save();
        if($result){
            return 1;
        }else{
            return '保存愿望失败！';
        }
    }

    //后台愿望修改验证
    public function cwish($data){
        $validate = new \app\common\validate\Wish();
        if(!$validate->scene('cwish')->check($data)){
            return $validate->getError();
        }
        $wish = new Wish();
        $result = $wish->allowField(true)->save($data,['id'=>$data["wid"]]);
        if($result){
            return 1;
        }else{
            return "更新失败！";
        }
    }

    //后台愿望添加验证
    public function awish($data){
        $validate = new \app\common\validate\Wish();
        if(!$validate->scene('awish')->check($data)){
            return $validate->getError();
        }
        $re = new Wish($data);
        $result = $re->allowField(true)->save();
        if($result){
            return 1;
        }else{
            return "添加日记失败！";
        }
    }

}
