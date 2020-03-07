<?php /*a:2:{s:66:"D:\phpstudy_pro\WWW\tpmood\application\admin\view\index\index.html";i:1583400183;s:66:"D:\phpstudy_pro\WWW\tpmood\application\admin\view\public\base.html";i:1583480360;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    后台首页
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
    $(function () {
        setInterval("gettime()",1000);
    });
    function gettime() {
        var date = new Date();
        var y = date.getFullYear();
        var m = date.getMonth();
        var d = date.getDate();
        var h = date.getHours();
        var min = date.getMinutes();
        var s = date.getSeconds();
        str = y + "年" + m + "月" + d +"日" + h + "时" + min + "分" + s +"秒";
        $('#time').html(str);
    }
</script>

    
    <style>
        html,body{
            height:100%;
            /* background-color: #393D49; */
        }

        .con{
            height: 100%;
        }
        .con{
            display: flex;
            background-color: #393D49;
            height: 100%;
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

        .welcome{
            height: 100px;
            padding: 10px;
        }
        .wel_info{
            height:60px;
            line-height: 60px;
            background-color: #fff;
            text-indent: 20px;
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
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/comments'); ?>"  class="layui-icon layui-icon-list" style="font-size: 16px;"> 评论管理</a>
            </li>
            <li class="layui-nav-item"><a href="<?php echo url('admin/index/wishlist'); ?>" class="layui-icon layui-icon-star" style="font-size: 16px;"> 愿望管理</a></li>
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/cindex'); ?>" class="layui-icon layui-icon-set" style="font-size: 16px;"> 网站设置</a>
            </li>
            <?php if(session('user')['is_super']): ?>
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/adusers'); ?>" class="layui-icon layui-icon-auz" style="font-size: 16px;"> 管理员管理</a>
            </li>
            <?php endif; ?>

            <li class="layui-nav-item"><a href="<?php echo url('admin/index/userphoto'); ?>" class="layui-icon layui-icon-picture" style="font-size: 16px;"> 用户头像管理</a></li>
        </ul>
    </div>

    
    <div class="con_right">
        <div class="nbar">
            <span class="layui-icon layui-icon-home" style="font-size: 13px;display: inline-block;width: 90px;text-indent: 10px;color: #fff;"><a href="" style="color: #fff;"> 我的主页</a></span>
        </div>
        <div>
            <div class="welcome">
                <div class="wel_info">
                    欢迎管理员：<a href=""><?php echo htmlentities($user['username']); ?>!</a> 当前时间：<span id="time"></span>
                </div>
            </div>

            <div class="set">
                <div style="background-color: #fff;padding: 10px;">
                    <div style="height: 50px;line-height: 50px;">系统信息</div>
                    <hr style="margin-top: 0;">
                    <table class="layui-table">
                        <colgroup>
                            <col width="150">
                            <col width="200">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <td>服务器域名</td>
                            <td><?php echo htmlentities($web['domain']); ?>}</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>服务器IP地址</td>
                            <td><?php echo htmlentities($web['ip']); ?></td>
                        </tr>
                        <tr>
                            <td>服务器端口</td>
                            <td><?php echo htmlentities($web['port']); ?></td>
                        </tr>
                        <tr>
                            <td>联系邮箱</td>
                            <td><?php echo htmlentities($web['email']); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <a href="<?php echo url('admin/index/cindex'); ?>"><button id="edit" type="button" style="float: right;margin-top: 10px;margin-right: 10px" class="layui-btn layui-btn-normal">编辑</button></a>
            </div>
        </div>

    </div>

</div>


</body>
</html>