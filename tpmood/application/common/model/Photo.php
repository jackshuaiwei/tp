<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Photo extends Model
{
    //
    use SoftDelete;
    public function user(){
        return $this->hasOne('User');
    }
}
