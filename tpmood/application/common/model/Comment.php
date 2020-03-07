<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Comment extends Model
{
    use SoftDelete;

    //多对一
    public function record(){
        return $this->belongsTo('Record','article_id');
    }

    //多对一
    public function user(){
        return $this->belongsTo("User",'from_id');
    }

    public function comment($data){
        $validate = new \app\common\validate\Comment();
        if(!$validate->scene('comment')->check($data)){
            return $validate->getError();
        }
        $info = new Comment($data);
        $result = $info->allowField(true)->save();
        if($result){
            return 1;
        }else{
            return '回复失败！';
        }

    }

}
