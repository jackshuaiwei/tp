<?php


namespace app\common\validate;


use think\Validate;

class Comment extends Validate
{
    protected $rule = [
        'content|评论'=>'require|max:100'
    ];

    public function sceneComment(){
        return $this->only(['content']);
    }
}