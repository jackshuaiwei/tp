<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::group('index',function (){
    Route::rule('/','index/index/index','get|post');
    Route::rule('login','index/index/login','get|post');
    Route::rule('user_center/:id','index/home/user_center','get|post');
    Route::rule('recordall','index/home/all','get|post');
    Route::rule('register','index/index/register','get|post');
    Route::rule('write/:id','index/home/write','post|get');
    Route::rule('detail/:rid','index/home/detail','get|post');
    Route::rule('logout','index/home/logout','post');
    Route::rule('mood','index/home/mood','get');
    Route::rule('pset/:id','index/home/pset','get|post');
    Route::rule('cpass/:id','index/home/cpass','get|post');
    Route::rule('cemail/:id','index/home/cemail','get|post');
    Route::rule('cphoto/:id','index/home/cphoto','get|post');
    Route::rule('active/:code','index/index/active','get');
    Route::rule('comment','index/home/comment','post');
    Route::rule('wish','index/home/wish','get|post');
    Route::rule('wishwrite','index/home/wishwrite','get|post');
    Route::rule('wishlist/:id','index/home/wishlist','get|post');
});

Route::group('admin',function(){
    Route::rule('/','admin/login/login',"get|post");
    Route::rule('index','admin/index/index',"get|post");
    Route::rule('logout','admin/index/alogout',"post");
    Route::rule('record','admin/index/record',"get|post");
    Route::rule('crecord/:rid','admin/index/crecord',"get|post");
    Route::rule('drecord/:rid','admin/index/drecord',"get|post");
    Route::rule('arecord','admin/index/arecord',"get|post");
    Route::rule('wish','admin/index/wishlist',"get|post");
    Route::rule('cwish/:wid','admin/index/cwish',"get|post");
    Route::rule('dwish/:wid','admin/index/dwish',"get|post");
    Route::rule('awish','admin/index/awish',"get|post");
    Route::rule('photo','admin/index/userphoto',"get|post");
    Route::rule('cphoto/:pid','admin/index/cphoto',"get|post");
    Route::rule('users','admin/index/users',"get|post");
    Route::rule('cusers/:uid','admin/index/cusers',"get|post");
    Route::rule('ausers','admin/index/ausers',"get|post");
    Route::rule('dusers/:uid','admin/index/dusers',"post");
    Route::rule('cpassword/:uid','admin/index/cpassword','get|post');
    Route::rule('susers/:username','admin/index/susers','post|get');
    Route::rule('srecord/:user','admin/index/srecord','post|get');
    Route::rule('swish/:user','admin/index/swish','post|get');
    Route::rule('sphoto/:user','admin/index/sphoto','post|get');
    Route::rule('cindex','admin/index/cindex',"get|post");
    Route::rule('adusers','admin/index/adusers',"get|post");
    Route::rule('cadusers/:uid','admin/index/cadusers',"get|post");
    Route::rule('aadusers','admin/index/aadusers',"get|post");
    Route::rule('dadusers/:uid','admin/index/dadusers',"post");
    Route::rule('sadusers/:username','admin/index/sadusers','post|get');
    Route::rule('comments','admin/index/comments',"get|post");
    Route::rule('scomments/:username/:cho','admin/index/scomments','post|get');

});
