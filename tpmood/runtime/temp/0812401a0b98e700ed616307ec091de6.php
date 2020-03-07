<?php /*a:2:{s:64:"D:\phpstudy_pro\WWW\tpmood\application\index\view\home\wish.html";i:1583483350;s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\public\base.html";i:1583374608;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    愿望树
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
            width: 25%;
            height: 500px;
            /* background-color: chartreuse; */
        }
        .wish_right{
            width: 75%;
            height:100%;
            overflow: auto;
            background-color: #fff;
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

        .btn_2{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            outline: none;
            border: 0;
            margin-left: 100px;
        }
        .btn_1:hover,.btn_2:hover{
            cursor: pointer;
            box-shadow: 0 0 8px #fff;
        }

        .left_content{
            width: 70%;
            margin: 50px auto 0;
        }
        .right_con{
            width: 80%;
            margin: 0 auto 0;
            height: 100%;
        }
        .right_topic{
            margin-top: 25px;
            font-size: 20px;
        }
        .right_author{
            margin-top: 5px;
            font-size: 12px;
            color: #79CDCD;
        }
        .right_content{
            margin-top: 20px;
            line-height: 25px;
            font-size: 15px;
            color: #528B8B;
            margin-bottom: 30px;
        }
        .right_img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            float: right;
        }

        .pagination{
            font-size: 18px;

        }

        .pagination span{
            margin-right: 10px;
        }
        .pagination .active{
            font-size: 23px;
            color: #FF83FA;
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
    

    
<div style="height: 10px;background-color: #ADD8E6">

</div>

<div class="wish_con">
    <div class="wish_left">
        <div class="left_head">
                <span>
                    <button class="btn_1"><span class="layui-icon layui-icon-home"></span></button>
                </span>

            <a href="<?php echo url('index/home/wishwrite'); ?>">
                    <button class="btn_2">写</button>
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
            <div style="margin-top:60px;font-size: 13px;color: #53868B;">
                ~ 快来写下「 你的愿望吧 」~
            </div>
            <hr>
            <ul>
                <?php if(is_array($wish) || $wish instanceof \think\Collection || $wish instanceof \think\Paginator): $i = 0; $__LIST__ = $wish;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li>
                        <div>
                            <div class="right_img">
                                <img src="/uploads/<?php echo htmlentities($vo['user']['photo']['path']); ?>" alt="头像" style="display: inline-block;width: 100%;">
                            </div>
                            <div class="right_topic">
                                <?php echo htmlentities($vo['title']); ?>
                            </div>
                            <div class="right_author">
                                <?php echo htmlentities($vo['user']['username']); ?> 发表于 <?php echo htmlentities($vo['create_time']); ?>
                            </div>

                        </div>
                        <div class="right_content">
                            <?php echo $vo['content']; ?>
                        </div>

                        <hr>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div>
                <?php echo replace($wish->render()); ?>
            </div>
        </div>
    </div>
</div>

    

</body>
</html>