<?php /*a:1:{s:66:"D:\phpstudy_pro\WWW\tpmood\application\admin\view\index\login.html";i:1582814800;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
    <script src="/static/js/jquery.js"></script>
    <link rel="stylesheet" href="/static/css/reset.css">
    <link rel="stylesheet" href="/static/css/total.css">
    <link rel="stylesheet" href="/static/lib/layui/css/layui.css">
    <script src="/static/lib/layui/layui.all.js"></script>
    <script src="/static/lib/layui/layui.js"></script>

    <style>

        body{
            background-color: #072646;
        }

        .topic{
            text-align: center;
            width:300px;
            margin:130px auto 0;
            font-size: 20px;
            color: #fff;
        }

        .login_form{
            width:300px;
            height: 300px;
            margin:50px auto 0;
            border: 1px solid #000;
            overflow: hidden;
            border-radius: 5px;
            background-color: #fff;
        }
        .login_title{
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-top: 30px;

        }
        .username,.password,.submit{
            display: block;
            width: 200px;
            margin:20px auto 30px;

        }
        .username_1,.password_1{
            border: 0;
            outline: none;
            border-bottom: 1px solid #000;
        }
        .submit{
            margin-bottom: 5px;
        }
        .submit input{
            width: 200px;
            height: 36px;
            border-radius:5px;
            background-color: cornflowerblue;
            border: 0;
        }
        .submit input:hover{
            cursor: pointer;
            box-shadow: 0px 0px 3px cornflowerblue;
        }
    </style>

    <script>
        $(function(){
        });
        function login(){
            $.ajax({
                url:"<?php echo url('admin/index/login'); ?>",
                type:'post',
                data:$('form').serialize(),
                dataType:'json',
                success:function(data){
                    if(data.code==1){
                        layer.msg(data.msg,{
                            icon:6,
                            time:2000
                        },function () {
                            location.href = data.url;
                        })
                    }else{
                        layer.open({
                            title:"登录失败！",
                            content:data.msg,
                            icon:5,
                            anim:6
                        })
                    }
                }

            });
        }
    </script>

</head>
<body>
<div class="topic">
    Mood日记后台管理系统
    <hr  style="width: 230px;margin: 10px auto 0">
</div>

<div class="login_form">
    <div class="login_title">login</div>
    <form action="" method="POST">
        <span class="username">
            <span class="layui-icon layui-icon-username" aria-hidden="true"></span>
            <input type="text" name="username" placeholder="请输入账号" class="username_1" >
        </span>

        <span class="password">
            <span class="layui-icon layui-icon-password" aria-hidden="true"></span>
            <input type="text" name="password" placeholder="请输入密码" class="password_1" >
        </span>
        <span class="submit">
            <input type="button" value="登录" onclick="login()" style="color:#fff;">
        </span>
    </form>
<!--    <div class="link_register">-->
<!--        <a href="#" style="display: block;width: 200px;margin: 0 auto 0;">还没账号？点击注册</a>-->
<!--    </div>-->
</div>
</body>
</html>