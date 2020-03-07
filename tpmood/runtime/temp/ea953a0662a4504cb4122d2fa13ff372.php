<?php /*a:2:{s:69:"D:\phpstudy_pro\WWW\tpmood\application\index\view\home\wishwrite.html";i:1583483261;s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\public\base.html";i:1583374608;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    许愿
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
        $(function(){
            var E = window.wangEditor;
            var editor = new E('.write_content')
            editor.create()

            $('.publish').click(function () {
                var title = $('.input_1 input').val();
                var content = editor.txt.html();
                $.ajax({
                    url:"<?php echo url('index/home/wishwrite'); ?>",
                    type:'post',
                    data:{title:title,content:content},
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
                                title:"发布愿望失败",
                                content:data.msg,
                                icon:5,
                                anim:6
                            })
                        }

                    }
                });
                return false;
            })


        })

    </script>

    
    <style>
        html,body{
            width: 100%;
            height: 100%;
        }

        .wish_con{
            display: flex;
            height: 100%;
            background-color:burlywood;

        }
        .wish_left{
            width: 30%;
            height: 500px;
            /* background-color: chartreuse; */
        }
        .wish_right{
            width: 70%;
            height:100%;
            overflow: auto;
            background-color: #fff;
            overflow: hidden;
        }

        .left_head{
            margin: 30px 0 0 30px;
        }

        .btn_1{
            width: 60px;
            height: 60px;
            border-radius: 50%;
            outline: none;
            border: 0;
        }
        .btn_1 span{
            font-size: 30px;
        }

        .btn_1:hover{
            cursor: pointer;
            box-shadow: 0 0 8px #fff;
        }

        .left_content{
            width: 70%;
            margin: 50px auto 0;
        }
        .right_con {
            width: 80%;
            margin: 30px auto 0;
        }
        .wish_write_head{

        }
        .wish_write_head button{
            width: 50px;
            height: 30px;
            background-color: #CD5555;
            color: #fff;
            border: 0;
            border-radius: 5px;
            line-height: 30px;
            font-size: 13px;
        }
        .write_content{
            margin-top: 20px;
            width: 100%;
        }
        .input_1{
            margin-top: 20px;
        }
        .input_1 input{
            display: inline-block;
            width: 350px;
            height: 30px;
            text-indent: 10px;
        }
        .wish_write_head button:hover{
            cursor: pointer;
            opacity: 0.5;
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
    

    
<div style="height: 10px;background-color: #ADD8E6"></div>

<div class="wish_con">
    <div class="wish_left">
        <div class="left_head">
                <a href="<?php echo url('index/home/wish'); ?>">
                    <button class="btn_1"><span class="layui-icon layui-icon-return"></span></button>
                </a>
        </div>

        <div class="left_content">
            <div class="content_head" style="font-size: 26px;color:#FFEFD5">
                愿望树
            </div>
            <div style="font-size: 12px;margin:10px 0 20px 0;color: #AEEEEE;">
                我们都是小小的星辰，但是我们都有自己的梦想
            </div>
            <hr>
            <div class="content_content" style="margin-top: 20px;line-height: 25px;font-size: 13px;color: #FFEFD5;">
                风吹雨成花
                <br>
                时间追不上白马
                <br>
                你年少掌心的梦话
                <br>
                依然紧握着吗
                <br>
                ——郭敬明落落《时间煮雨》
                <br>
                小时代
                <br>
                有梦想谁都了不起
                <br>
                让我们一起展示这浩瀚宇宙的最美星辰吧！

            </div>
        </div>

    </div>
    <div class="wish_right">
        <div class="right_con">
            <div class="wish_write_head">
                <span style="font-size: 18px;">快来写下你的愿望吧！</span>
                <span><button class="publish">发布</button></span>
            </div>
            <hr>

            <div class="input_1">
                <input type="text" placeholder="写个标题吧......">
            </div>
            <div class="write_content">

            </div>
        </div>
    </div>
</div>

    

</body>
</html>