<?php

namespace app\common\model;

use think\Model;

class System extends Model
{
    public function cindex($data){
        $validate = new \app\common\validate\System();
        if(!$validate->scene('cinde')->check($data)){
            return $validate->getError();
        }
        $info = new System();
        $result = $info->allowField(true)->save($data,['id'=>1]);
        if($result){
            return 1;
        }else{
            return "修改失败！";
        }

    }
}
