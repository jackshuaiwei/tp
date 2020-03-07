<?php /*a:2:{s:63:"D:\phpstudy_pro\WWW\tpmood\application\index\view\home\all.html";i:1583330983;s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\public\base.html";i:1583374608;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    日记墙
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
        $(function () {
            $('.all_text').each(function () {
                var str = $(this).text().trim();
                if(str.length>200){
                    str = str.substr(0,160) + "......";
                    $(this).text(str);
                }
                else{
                    $(this).text(str);
                }

            });
        })

    </script>

    
    <style>
        body{
            background-color: #fdf7f9;
        }
        .container {
            width: 1000px;
            padding: 10px;
            background:#fcfef6;
            column-count: 4;
            column-gap: 1em;
            column-width: 220px;

        }
        .img-container {
            margin-bottom: 10px;;
            break-inside: avoid;
            border: 2px solid #AEEEEE;
            padding: 10px;
            background-color: #fafffe;

        }
        .img-container:hover{
            cursor: pointer;
        }
        .img-container img:hover{
            opacity: 0.5;
        }
        img {
            width: 100%;
        }

        .all_text{
            margin-top: 25px;
            max-height: 200px;
            display: inline-block;
            font-size: 13px;
            overflow: hidden;
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
    

    
<div class="find_record" style="text-align: center;font-size: 25px;height: 55px;line-height: 55px;color:#EEAEEE;">
    Find Diaary
</div>

<div class="container" style="margin:0 auto 0">
    <?php if(is_array($record) || $record instanceof \think\Collection || $record instanceof \think\Paginator): $i = 0; $__LIST__ = $record;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$re): $mod = ($i % 2 );++$i;?>
    <a href="<?php echo url('index/home/detail',['rid'=>$re['id']]); ?>">
        <div class="img-container" >
            <img src="/uploads/<?php echo htmlentities($re['user']['photo']['path']); ?>" alt="头像">
            <div class="all_text">
                <?php echo rep2(rep1($re['content'])); ?>
            </div>
        </div>
    </a>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</div>

    

</body>
</html>