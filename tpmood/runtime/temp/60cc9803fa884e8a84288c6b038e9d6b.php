<?php /*a:2:{s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\home\cemail.html";i:1583331279;s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\public\base.html";i:1583374608;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    邮箱修改
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
        function cemail() {
            var email = $('#email').val();
            var password = $('#password').val();
            $.ajax({
                url:"<?php echo url('index/home/cemail',['id'=>session('name')['id']]); ?>",
                type:'post',
                data:{email:email,password:password},
                dataType:'json',
                success:function (data) {
                    if(data.code == 1){
                        layer.msg(data.msg,{
                            icon:6,
                            time:2000
                        },function () {
                            location.href = data.url;
                        })
                    }else {
                        layer.open({
                            title:'更新邮箱失败',
                            content:data.msg,
                            icon:5,
                            anim:6
                        })
                    }

                }

            });
        }
    </script>

    
    <style>
        .cemail_con{
            width: 800px;
            margin: 0 auto 0;

        }

        .cemail_head{
            font-size: 30px;
            font-weight: bold;
            color: cornflowerblue;
            height: 90px;
            text-align: left;
            line-height: 90px;
        }

        input{
            display: inline-block;
            height: 25px;
            width: 230px;
        }

        .password{
            margin-top: 30px;
        }
        .cemail_con div{
            margin-bottom: 30px;
            display: flex;
        }
        .cemail_con div span{
            display: block;
            width: 100px;
            text-align: right;
            margin-right: 20px;
        }
        button{
            width: 70px;
            height: 30px;
            background-color: cornflowerblue;
            border-radius: 5px;
            border: 0;
            color: #fff;
        }
        button:hover{
            cursor: pointer;
            box-shadow: 0px 0px 5px cornflowerblue;
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
    

    
<div class="cemail_con">
    <div class="cemail_head">
        修改邮箱

    </div>
    <hr style="margin-top: -30px;">

    <div class="password">
        <span>密码</span>
        <input type="text" id='password'>
    </div>

    <div class="oldcemail">
        <span>新邮箱</span>
        <input type="text" id='email'>
    </div>



    <div>
        <span></span>
        <button onclick="cemail()">更新邮箱</button>
    </div>
</div>

    

</body>
</html>