<?php


namespace app\common\model;


use think\Model;
use think\model\concern\SoftDelete;

class Record extends Model

{
    //use SoftDelete;
    //多对一
    public function user(){
        return $this->belongsTo('User');
    }

    //多对一
    public function com(){
        return $this->hasMany('Comment');
    }


    //写日记
    public function write($data){
        $validate = new \app\common\validate\Record();
        if(!$validate->scene('write')->check($data)){
            return $validate->getError();
        }
        $record = new Record($data);
        $result = $record->allowField(true)->save();
        if($result){
            return 1;
        }else{
            return "日记添加失败！";
        }

    }


    //后台修改日记验证
    public function crecord($data){
        $validate = new \app\common\validate\Record();
        if(!$validate->scene('crecord')->check($data)){
            return $validate->getError();
        }
        $re = new Record();
        $result = $re->allowField(true)->save($data,['id'=>$data["rid"]]);
        if($result){
            return 1;
        }else{
            return "更新失败！";
        }
    }

    //后台日记添加

    public function arecord($data){
        $validate = new \app\common\validate\Record();
        if(!$validate->scene('arecord')->check($data)){
            return $validate->getError();
        }
        $re = new Record($data);
        $result = $re->allowField(true)->save();
        if($result){
            return 1;
        }else{
            return "添加日记失败！";
        }
    }
}