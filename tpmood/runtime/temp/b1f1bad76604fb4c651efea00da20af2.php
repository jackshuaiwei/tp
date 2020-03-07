<?php /*a:2:{s:71:"D:\phpstudy_pro\WWW\tpmood\application\index\view\home\user_center.html";i:1583332221;s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\public\base.html";i:1583374608;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    用户中心
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
            var str = $('#content').text();
            var str1 = $('#content').text().trim();
            if(str.length > 60){
                str1 = str1.substr(0,60-3) + "......";
                $('#content').text(str1);
            }
        });

    </script>

    
    <style>
        .user_center_con{
            width: 1200px;
            margin: 20px auto 0;
            height: 800px;
        }

        .user_center_left{
            padding: 10px;
            width: 240px;
            float: left;
            border-radius: 5px;
            border: 1px solid #D1D1D1;
        }

        .user_center_right{
            width: 900px;
            float: right;
            border: 1px solid #D1D1D1;
            border-radius: 5px;
        }
        .user_photo{
            width: 220px;
            height: 220px;
            margin: 20px auto 0;
            border-radius: 10px;
            overflow: hidden;
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
    

    
<div class="user_center_con">
    <div class="user_center_left">
        <div class="user_photo">
            <img style="display: block;width: 100%;height: 100%" src="/uploads/<?php echo htmlentities($user_info['photo']['path']); ?>" alt="头像" >
        </div>
        <div class="user_name" style="font-size: 28px;margin-top: 30px;text-align: center;">
            <?php echo htmlentities($user_info['username']); ?>
        </div>
        <div class="user_nickname" style="margin-top: 20px;" >
            昵称：<span><?php echo htmlentities($user_info['username']); ?></span>
        </div>
        <div class="user_sex">
            性别：<span><?php if($user_info['sex'] == 1): ?>男<?php elseif($user_info['sex'] == 0): ?>女 <?php else: ?>保密<?php endif; ?></span>
        </div>
        <div class="user_signature" style="margin-bottom: 15px;">
            <?php echo htmlentities($user_info['signature']); ?>
        </div>
        <hr>
        <div class="user_home" style="margin-top: 15px;">
            <span class="layui-icon layui-icon-username"><span style="font-size: 13px;"> <a href="<?php echo htmlentities($user_info['id']); ?>">我的小窝</a></span></span>
        </div>
        <div class="user_center_center">
            <span class="layui-icon layui-icon-read"><span style="font-size: 13px;"> <a href="#">个人日记</a></span></span>
        </div>
        <div class="user_center_setting" style="margin-bottom: 15px;">
            <span class="layui-icon layui-icon-set"><span style="font-size: 13px;"> <a href="<?php echo url('index/home/pset',['id'=>$user_info['id']]); ?>">个人设置</a></span></span>
        </div>
        <hr>
        <div class="user_center_createtime">
            <span class="layui-icon layui-icon-time"><span style="font-size: 13px;"> 加入时间：<?php echo htmlentities($user_info['create_time']); ?></span></span>
        </div>
    </div>

    <div class="user_center_right">
        <div class="user_center_righttitle" style="height: 35px;">
            <span class="layui-icon layui-icon-down" style="font-size: 12px;line-height: 35px;margin-left: 20px;"><span style="font-size: 13px;"> &nbsp;日记本</span></span>
        </div>
        <hr>
        <ul>
            <?php if(is_array($records) || $records instanceof \think\Collection || $records instanceof \think\Paginator): $i = 0; $__LIST__ = $records;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$re): $mod = ($i % 2 );++$i;?>
            <li style="height: 90px;border-bottom: 1px solid #fff;">
                <div class="record_title" style="height: 50px;line-height: 50px;font-size: 16px;text-indent: 30px;">
                    <a href="<?php echo url('index/home/detail',['rid'=>$re['id']]); ?>" id="content"><?php echo rep2(rep1($re['content'])); ?></a>
                </div>
                <div class="record_time">
                        <span class="layui-icon layui-icon-dialogue" style="font-size: 12px;margin-left: 20px;">
                            <span style="font-size: 12px;"><?php echo htmlentities($re['create_time']); ?> · <?php echo htmlentities($re['title']); ?></span>
                        </span>
                </div>
                <hr>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>

            <div class="page" style="text-align: center">
                <?php echo replace($records->render()); ?>
            </div>
        </ul>
    </div>
</div>

    

</body>
</html>