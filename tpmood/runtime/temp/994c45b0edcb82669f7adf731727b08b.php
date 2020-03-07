<?php /*a:2:{s:68:"D:\phpstudy_pro\WWW\tpmood\application\index\view\home\wishlist.html";i:1583333436;s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\public\base.html";i:1583374608;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    愿望清单
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
        .wd_con{
            display: flex;
            width: 800px;
            margin: 80px auto 0;

        }

        .wd_left{
            width: 500px;
            border-right: 1px dashed pink;

        }

        .wd_right{
            width: 250px;
            margin-left: 30px;
        }

        .person{
            height: 150px;
            overflow: hidden;
            border: 1px solid beige;
        }

        .mood{
            margin-top: 30px;
            height: 300px;
            background-color: pink;
        }
        .info{
            padding: 10px;
        }

        .info span{
            background-color: coral;
        }
        img{
            display: block;
            width: 50px;
            height: 50px;
            float: left;
        }
        .name{
            height: 50px;
            line-height: 50px;
            float: left;
            margin-left: 10px;
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
    

    
<div class="wd_con">
    <div class="wd_left">

        <div style="font-size: 26px;text-align: center;margin-bottom: 20px;">
            愿望清单
        </div>

        <ul class="layui-timeline">
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li class="layui-timeline-item">
                <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                <div class="layui-timeline-content layui-text">
                    <h3 class="layui-timeline-title"><?php echo htmlentities($vo['create_time']); ?></h3>
                    <p>
                        <?php echo htmlentities($vo['title']); ?>
                        <br><?php echo $vo['content']; ?>
                        <i class="layui-icon"></i>
                    </p>
                </div>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>

    </div>

    <div class="wd_right">
        <div class="person">
            <div class="info">
                <img src="/uploads/<?php echo htmlentities($user['photo']['path']); ?>" alt="头像">
                <div class="name"><a style="color: cornflowerblue" href="<?php echo url('index/home/user_center',['id'=>$user['id']]); ?>">jack</a></div>
            </div>
            <div style="margin-top: 45px;background-color: cornsilk;height: 90px;line-height: 90px;text-align: center;">
                <a href="<?php echo url('index/home/wishwrite'); ?>" style="color: #00aaee">发布新愿望</a>
            </div>
        </div>

        <div class="mood">
            <div class="word" style="height: 50px;color: #fff;text-align: center;line-height: 50px">
                What's the real life...
                <br>
                I don' know...
            </div>
            <img src="/static/image/wish.jpg" alt="图片" style="display: block;width: 100%;height: 100%">
        </div>
    </div>
</div>

    

</body>
</html>