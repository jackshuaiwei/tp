<?php /*a:2:{s:69:"D:\phpstudy_pro\WWW\tpmood\application\admin\view\index\aadusers.html";i:1583416828;s:66:"D:\phpstudy_pro\WWW\tpmood\application\admin\view\public\base.html";i:1583412358;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
后台管理|管理员添加
</title>
    <script src="/static/js/jquery.js"></script>
    <link rel="stylesheet" href="/static/css/reset.css">
    <link rel="stylesheet" href="/static/css/total.css">
    <link rel="stylesheet" href="/static/lib/layui/css/layui.css">
    <script src="/static/lib/layui/layui.all.js"></script>
    <script src="/static/lib/layui/layui.js"></script>
    <link rel="stylesheet" href="/static/wEditor/wangEditor.css">
    <script src="/static/wEditor/wangEditor.js"></script>
    <script>
        layui.use('element', function(){
            var element = layui.element;

        });
        function alogout() {
            $.ajax({
                url:"<?php echo url('admin/index/alogout'); ?>",
                type:'post',
                dataType:'json',
                success:function(data){
                    if(data.code == 1){
                        layer.msg(data.msg,{
                            icon:6,
                            time:2000
                        },function(){
                            location.href = data.url;
                        });
                    }else{
                        layer.open({
                            title:"退出登录失败！",
                            content:data.msg,
                            icon:5,
                            anim:6
                        });
                    }
                }
            });
        }
    </script>
    
<script>
    $(function(){
        var E = window.wangEditor;
        var editor = new E('.write_content')
        editor.create();
        var str = $('#content').val();
        editor.txt.html(str);


        $('#save').click(function () {
            var username = $('#username').val();
            var password =$('#password').val();
            var conpass =$('#conpass').val();
            var is_super = $('#is_super').is(':checked');
            if(is_super == true){
                is_super = 1;
            }else {
                is_super = 0;
            }
            $.ajax({
                url:"<?php echo url('admin/index/aadusers'); ?>",
                type:'post',
                data:{username:username,password:password,conpass:conpass,is_super:is_super},
                dataType:'json',
                success:function (data) {
                    if(data.code == 1){
                        layer.msg(data.msg,{
                            icon:6,
                            time:2000
                        },function () {
                            location.href = data.url;
                        })
                    }else{
                        layer.open({
                            title:"添加管理员失败！",
                            content:data.msg,
                            icon:5,
                            anim:6
                        });
                    }

                }
            });



            return false;
        });
    })

</script>

    
<style>
    html,body{
        height:100%;
        /* background-color: #393D49; */
    }
    input{
        display: inline-block;
        height:25px;
        width: 180px;
        border-radius: 5px;
        border:0;
        text-indent: 10px;
        margin-left: 150px;
    }

    .con{
        display: flex;
        background-color: #393D49;
        height: 110%;
        margin-top: 5px;

    }
    .con_left{
        width:230px;
        border-right: 1px solid #fff;

    }
    .con_right{
        width: calc(100% - 230px);
    }
    .nbar{
        height: 35px;
        line-height: 35px;
        border-bottom: 1px solid #CDC0B0;
    }


    .set{
        padding:10px;
    }

</style>

</head>
<body>

    <ul class="layui-nav" lay-filter="">
    <li class="layui-nav-item"> <a href="" style="font-size: 18px;">Mood日记系统后台管理</a></li>
    <li class="layui-nav-item" style="float:right;margin-right: 60px;">
        <a href="javascript:;"><?php echo session('user')['username']; ?></a>
        <dl class="layui-nav-child"> <!-- 二级菜单 -->
            <dd><a href="">修改密码</a></dd>
            <dd><a href="javascript:;" onclick="alogout()">退出登录</a></dd>
        </dl>
    </li>
</ul>

<div class="con">
    <div class="con_left">
        <ul class="layui-nav layui-nav-tree" lay-filter="test" style="width: 100%;height: 100%;">
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/index'); ?>" class="layui-icon layui-icon-website" style="font-size: 16px;"> 网站首页</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/users'); ?>" class="layui-icon layui-icon-username" style="font-size: 16px;"> 用户管理</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/record'); ?>"  class="layui-icon layui-icon-list" style="font-size: 16px;"> 日记管理</a>
            </li>
            <li class="layui-nav-item"><a href="<?php echo url('admin/index/wishlist'); ?>" class="layui-icon layui-icon-star" style="font-size: 16px;"> 愿望管理</a></li>
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/cindex'); ?>" class="layui-icon layui-icon-set" style="font-size: 16px;"> 网站设置</a>
            </li>
            <?php if(session('user')['is_super']): ?>
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/adusers'); ?>" class="layui-icon layui-icon-set" style="font-size: 16px;"> 管理员管理</a>
            </li>
            <?php endif; ?>

            <li class="layui-nav-item"><a href="<?php echo url('admin/index/userphoto'); ?>" class="layui-icon layui-icon-picture" style="font-size: 16px;"> 用户头像管理</a></li>
        </ul>
    </div>

    
<div class="con_right">
    <div class="nbar">
        <span class="layui-icon layui-icon-home" style="font-size: 13px;display: inline-block;width: 180px;text-indent: 10px;color: #fff;"><a href="" style="color: #fff;"> 我的主页 / 添加管理员</a></span>
    </div>
    <div>

        <div class="set">
            <div style="height: 50px;line-height: 50px;color: #fff;font-size: 18px">
                添加管理员
            </div>
            <hr>
            <div style="padding: 50px">
                <div style="color: #fff;position: relative">
                    <span style="position: absolute;top: 0;left: 0">Username：</span>
                    <input type="text" value="" id="username">
                </div>
                <hr>
                <div style="color: #fff;position: relative">
                    <span style="position: absolute;top: 0;left: 0">Password：</span>
                    <input type="text" value="" id="password">
                </div>
                <hr>
                <div style="color: #fff;position: relative">
                    <span style="position: absolute;top: 0;left: 0">Conpass(确认密码)：</span>
                    <input type="text" value="" id="conpass">
                </div>
                <hr>
                <div style="color: #fff;position: relative">
                    <span>Is_super：</span>
                    <input type="checkbox" id="is_super" style="margin-left: 85px;width: 20px" >
                </div>
                <hr>
            </div>
            <div style="text-align: right;margin-right: 50px;margin-top: -30px">
                <button type="button" class="layui-btn layui-btn-radius layui-btn-normal" id="save">保存</button>
            </div>
        </div>
    </div>

</div>

</div>


</body>
</html>