<?php /*a:2:{s:64:"D:\phpstudy_pro\WWW\tpmood\application\index\view\home\pset.html";i:1583332049;s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\public\base.html";i:1583374608;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    个人设置
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
        //注意：导航 依赖 element 模块，否则无法进行功能性操作
        layui.use('element', function(){
            var element = layui.element;
        });

        function logout() {
            $.ajax({
                url:"<?php echo url('index/home/logout'); ?>",
                type:'post',
                dataType:'json',
                success:function (data) {
                    if(data.code==1){
                        layer.msg(data.msg,{
                            icon:6,
                            time:200
                        },function () {
                            location.href = data.url;
                        })
                    }else {
                        layer.open({
                            title:"退出登录失败！",
                            content:data.msg,
                            icon:5,
                            anim:6
                        })
                    }
                }
            });
        }

    </script>
    
    <script>
        function pset() {
            var username = $('#username').val();
            var signature = $('#signature').val();
            var sex = $("input[name='sex']:checked").val();
            $.ajax({
                url:"<?php echo url('index/home/pset',['id'=>$user['id']]); ?>",
                type:'post',
                data:{username:username,signature:signature,sex:sex},
                dataType:'json',
                success:function (data) {
                    if(data.code==1){
                        layer.msg(data.msg,{
                            icon:6,
                            time:2000
                        },function () {
                            location.href = data.url;
                        })
                    }else {
                        layer.open({
                            title:"个人信息修改失败",
                            content:data.msg,
                            icon:5,
                            anim:6
                        });
                    }
                }
            });

        }

    </script>

    
    <style>
        .pset_con{
            width: 1000px;
            margin: 0 auto 0;
        }

        .pset_head{
            font-size: 30px;
            font-weight: bold;
            color: cornflowerblue;
            height: 90px;
            text-align: left;
            line-height: 90px;

        }
        .psettings{
            width: 800px;
            margin:50px auto 0;
        }
        .psettings div{
            margin-bottom: 30px;
        }
        input{
            display: inline-block;
            height: 25px;
            width: 230px;
        }
        button{
            width: 110px;
            height: 35px;
            cursor: pointer;
            background-color: cornflowerblue;
            border: 1px solid cornflowerblue;
            color: #fff;
            border-radius: 5px;
        }
    </style>

</head>
<body>
    
        <ul class="layui-nav">
        <div style="width: 65%;margin:0 auto 0">
            <li class="layui-nav-item">
                <a href="#" style="font-size: 25px">Mood日记</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo url('index/home/mood'); ?>" class="layui-icon layui-icon-home">&nbsp;首页</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo url('index/home/all'); ?>" class="layui-icon layui-icon-template">&nbsp;日记墙</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo url('index/home/wish'); ?>" class="layui-icon layui-icon-star-fill">&nbsp;愿望树</a>
            </li>
            <li class="layui-nav-item" style="float: right">
                <a href="<?php echo url('index/home/user_center',['id'=>session('name')['id']]); ?>" class="layui-icon layui-icon-user">&nbsp; <?php echo session('name')['username']; ?></a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('index/home/pset',['id'=>session('name')['id']]); ?>">个人设置</a></dd>
                    <dd><a href="<?php echo url('index/home/wishlist',['id'=>session('name')['id']]); ?>">愿望清单</a></dd>
                    <dd><a href="javascript:;" onclick="logout()">退出登录</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item" style="float: right">
                <a href="<?php echo url('index/home/write',['id'=>session('name')['id']]); ?>" class="layui-icon layui-icon-list">&nbsp;写日记</a>
            </li>
        </div>

    </ul>
    

    
<div class="pset_con">
    <div class="pset_head">
        个人设置
        <hr style="margin-top: 0;">
    </div>
    <div class="psettings">
        <div class="pusername">
            <span>昵称 &nbsp;</span>
            <span>
                    <input type="text" value="<?php echo htmlentities($user['username']); ?>" id="username">
                </span>
        </div>

        <div class="psignature" style="display: flex;margin-bottom: 0px;">
            <div style="padding-top: 5px;">签名 &nbsp;&nbsp;</div>
            <div>
                <textarea name="" id="signature" cols="30" rows="3"><?php echo htmlentities($user['signature']); ?></textarea>
            </div>
        </div>

        <div class="email">
            <span>邮箱 &nbsp;</span>
            <span>
                    <input type="text" value="<?php echo htmlentities($user['email']); ?>" id="email" disabled>
                </span>
            <span><a href="<?php echo url('index/home/cemail',['id'=>$user['id']]); ?>" style="color: #00aaee">更改</a></span>
        </div>

        <div class="email">
            <span>性别 &nbsp;</span>
            <span>
                <input type="radio" name ="sex" value="1" <?php if($user['sex'] == 1): ?>checked<?php endif; ?> style="width:30px;height: 10px">男
            　　<input type="radio" name ="sex" value="0" <?php if($user['sex'] == 0): ?>checked<?php endif; ?> style="width:30px;height: 10px">女
            　　<input type="radio" name ="sex" value="2" <?php if($user['sex'] == 2): ?>checked<?php endif; ?> style="width:30px;height: 10px">保密   （默认值）
            </span>

        </div>

        <div class="photo" >
            <span>头像 &nbsp;</span>
            <span>
                    <img src="/uploads/<?php echo htmlentities($user['photo']['path']); ?>" alt="头像" style="display: inline-block;width:150px;height: 150px;border-radius: 5px;overflow: hidden">
            </span>

        </div>

        <div class="change_pass" style="text-indent: 43px;">
            <a href="<?php echo url('index/home/cphoto',['id'=>$user['id']]); ?>" style="color: #00aaee">修该头像</a>
        </div>

        <div class="change_pass" style="text-indent: 43px;">
            <a href="<?php echo url('index/home/cpass',['id'=>$user['id']]); ?>" style="color: #00aaee">修该密码</a>
        </div>

        <div class="putinfo" style="text-indent: 43px;">
            <button onclick="pset()">更新个人资料</button>
        </div>

    </div>



</div>

    

</body>
</html>