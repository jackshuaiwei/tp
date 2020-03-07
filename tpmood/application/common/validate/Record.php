<?php


namespace app\common\validate;


use think\model\concern\SoftDelete;
use think\Validate;

class Record extends Validate
{

    protected $rule = [
        'title|标题'=>'require|max:50',
        'content|内容'=>'require',
        'user_id|日记作者'=>'require',
    ];

    public function sceneWrite(){
        return $this->only(['title','content']);
    }

    public function sceneCrecord(){
        return $this->only(['title','content']);
    }

    public function sceneArecord(){
        return $this->only(['title','content','user_id']);
    }
}