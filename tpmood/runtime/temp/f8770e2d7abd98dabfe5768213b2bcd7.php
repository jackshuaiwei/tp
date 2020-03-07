<?php /*a:1:{s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\index\login.html";i:1582772065;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mooddiary，记录心情记录美好</title>
    <script src="/static/js/jquery.js"></script>
    <link rel="stylesheet" href="/static/css/reset.css">
    <link rel="stylesheet" href="/static/css/total.css">
    <link rel="stylesheet" href="/static/lib/layui/css/layui.css">
    <script src="/static/lib/layui/layui.all.js"></script>
    <script src="/static/lib/layui/layui.js"></script>

</head>
<style>
    body{

        background:url('/static/image/login_bg01.jpg') no-repeat center center fixed;
        background-size: cover;
    }

    a{
        color: #fff;
    }

    .index_login_title{
        padding-top: 50px;
        font-size: 90px;
        text-align: center;
        margin-bottom: 10px;
        color: #fff;
    }

    .index_login_con{
        margin-top: 100px;
    }

    input{
        display: block;
        width: 260px;
        height: 30px;
        margin: 0 auto 0;
        border-radius: 5px;
        outline: none;
        border: 2px solid #FFBBFF;
        text-indent: 10px;
        font-size: 15px;
    }

    .login_password{
        margin-top: 20px;
    }

    button{
        width: 80px;
        height: 40px;
        background-color: #EEAEEE;
        outline: none;
        border-radius: 3px;
        border: 0;
        color: #fff;
    }
</style>
<script>
    function index_login() {
        var username = $('.login_email').val();
        var password = $('.login_password').val();
        $.ajax({
            url:"<?php echo url('index/index/login'); ?>",
            type:'post',
            data:{username:username,password:password},
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
                        title:'登录失败',
                        content:data.msg,
                        icon:5,
                        anim:6
                    })
                }
            }
        });
    }
</script>

<body>
<div class="index_login_title">
    Mood Diaary
</div>
<span style="color:#fff;display:block;width: 100%;text-align: center;font-size: 13px;">你的所有努力都应该活成你想要的样子</span>
<span style="color:#fff;display:block;width: 100%;text-align: center;font-size: 13px;font-style: italic;">All your efforts should live up to what you like</span>
<div class="index_login_con">
    <input type="text" placeholder="登录邮箱" class="login_email">
    <input type="text" placeholder="密码" class="login_password">
</div>
<span style="display: block;width: 260px;margin: 15px auto 0;text-align: left;font-size: 12px;"><a href="#">我忘记了密码？</a></span>
<div style="width: 260px;margin: 15px auto 0;">
    <button style="float: left;cursor: pointer;" onclick="index_login()">登  &nbsp;录</button>
</div>
<span style="display: block;width: 260px;margin: 75px auto 0;text-align: left;font-size: 12px;"><a href="<?php echo url('index/index/register'); ?>">还没有账号？立即注册>></a></span>
</body>
</html>