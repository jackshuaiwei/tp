<?php


namespace app\common\validate;


use think\Validate;

class Wish extends Validate
{
    protected $rule = [
        'title|标题'=>'require|max:50',
        'content|内容'=>'require|max:150'
    ];

    public function sceneWrite(){
        return $this->only(['title','content']);
    }

    public function sceneAwish(){
        return $this->only(['title','content']);
    }

    public function sceneCwish(){
        return $this->only(['title','content']);
    }
}