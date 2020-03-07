<?php /*a:2:{s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\home\detail.html";i:1583331762;s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\public\base.html";i:1583374608;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    日记详情
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
        function reply(){
            var data = $('.content_input').val();
            var rid = $('.content_input').attr('rid');
            $.ajax({
                url:"<?php echo url('index/home/comment'); ?>",
                type:"post",
                data:{data:data,rid:rid},
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    if(data.code == 1){
                        layer.msg(data.msg,{
                            icon:6,
                            time:2000
                        },function () {
                            location.href = data.url;
                        });
                    }else {
                        layer.open({
                            title:"回复失败",
                            content:data.msg,
                            icon:5,
                            anim:6
                        });
                    }
                }
            });

        }

        $(function () {
            var flag = true;
            var song = document.getElementById('song');
            $('#music').click(function(){
                // alert('sb');
                if(flag == false){
                    $('#music').removeClass('layui-icon layui-icon-pause').addClass('layui-icon layui-icon-play')
                    flag = true;
                    song.pause();
                }
                else{
                    $('#music').removeClass('layui-icon layui-icon-play').addClass('layui-icon layui-icon-pause')
                    flag = false;
                    song.play();
                }
                song.addEventListener('ended',function(){
                    $('#music').removeClass().addClass('layui-icon layui-icon-play');
                })
            })

            $('.detail_content_list li').mouseover(function () {
                $('.s_reply').css({"display":"inline-block"});
            });
            $('.detail_content_list li').mouseout(function () {
                $('.s_reply').css({"display":"none"});
            });

            $('.s_reply').click(function () {
                var username = $('.s_reply').attr('username');
                var str = "回复 @" + username +" ：";
                $('.content_input').val(str);

                return false;
            })

        });

    </script>

    
    <style>
        body{
            background-color:#F5FFFA;
        }
        ul,li{
            padding:0;
            margin: 0;
            list-style: none;
        }
        .mid_con{
            width: 730px;
            margin: 35px auto 0;

        }
        .mid_1{
            height: 65px;
            box-shadow: 5px 5px 10px #888888;
            overflow: hidden;
            padding:10px;
        }
        .user_img{
            width: 60px;
            height: 60px;
            border-radius: 5px;
            overflow: hidden;
            float: left;
        }
        .mid_text{
            margin: 30px 0 0 0 ;
            padding:40px;
            box-shadow: 10px 10px 5px #808f9d;
            background-color: #F5F5DC;
            border-radius: 5px;
        }
        .user_nickname{
            height: 35px;
            float: left;
            font-size: 22px;
            margin-left: 15px;
            margin-top: 10px;
        }
        .user_nickname a{
            color: #00aaee;
        }
        .mid_text_title{
            font-size: 20px;
            color: lightgray;
        }
        .mid_text_content{
            margin-top: 20px;
            color: #FF69B4;
            text-indent: 25px;
        }
        .mid_content{
            margin-top: 30px;
            width: 730px;

        }
        .content_input{
            display: inline-block;
            width: 400px;
            height: 35px;
            text-indent: 10px;
        }
        .content_reply{
            overflow: hidden;
            height: 50px;
        }
        .btn_reply{
            width: 90px;
            border: 0;
            background-color: cornflowerblue;
            outline: none;
            height: 40px;
            margin-left: 15px;
            border-radius: 5px;
            color: #fff;
        }
        .btn_reply:hover{
            cursor: pointer;
            box-shadow: 0px 0px 3px cornflowerblue;
        }

        .detail_content_list li{
            border-bottom: 1px dashed lightgray;
            padding-bottom: 10px;
            padding-top: 10px;

        }
        .container {
            display: flex;
            width: 100%;
            justify-content: space-around;
        }
        .s_reply{
            display: none;
            float: right;
            color: #00aaee
        }
        .s_reply:hover{
            cursor:pointer;
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
    

    
    <div class="mid_con">
        <div class="mid_1">
            <div class="user_img">
                <img src="/uploads/<?php echo htmlentities($user['photo']['path']); ?>" style="display: inline-block;width: 100%;" alt="头像" >
            </div>

            <div class="user_nickname">
                <a href="<?php echo url('index/home/user_center',['id'=>$user['id']]); ?>"><?php echo htmlentities($user['username']); ?></a>
            </div>
        </div>
        <div class="mid_text" style="padding-top: 5px">
            <div style="font-style: italic;color: #00aaee">
                <sapn class="layui-icon layui-icon-release"></sapn>&nbsp;&nbsp;mooddiaary &nbsp;
                <span class="layui-icon layui-icon-play" style="font-size: 12px;cursor:pointer" id="music"> ~song~</span>
                <span style="display: none">
                    <audio src="<?php echo htmlentities($record['song_url']); ?>" id="song"></audio>
                </span>
                <hr style="margin-top: 5px">
            </div>
            <div class="mid_text_title">
                <span class="layui-icon layui-icon-tree" style="font-size: 20px">&nbsp;<<?php echo htmlentities($record['title']); ?>>&nbsp;</span>
                <span class="layui-icon layui-icon-time" style="font-size: 13px">&nbsp;<?php echo htmlentities($record['create_time']); ?></span>
            </div>
            <div class="mid_text_content">
                <?php echo $record['content']; ?>
            </div>
        </div>
        <div class="mid_content">
            <div class="content_reply">
                <span class="layui-icon layui-icon-dialogue" style="font-size: 30px;"></span>
                <input type="text" class="content_input" rid="<?php echo htmlentities($record['id']); ?>">
                <button class="btn_reply" onclick="reply()">回复</button>
            </div>
            <hr style="margin-top: 20px">

            <ul class="detail_content_list">
                <?php if(is_array($comment) || $comment instanceof \think\Collection || $comment instanceof \think\Paginator): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li>
                    <div class="container">
                        <div class="col" style="width: 5%;margin-right: 10px">
                            <div ><img style="display: inline-block;width: 35px;height: 35px" src="/uploads/<?php echo htmlentities($vo['user']['photo']['path']); ?>" alt="头像"></div>
                        </div>
                        <div class="col" style="width: 95%" >
                            <span><a href="<?php echo url('index/home/user_center',['id'=>$vo['user']['id']]); ?>" style="color: #00aaee"><?php echo htmlentities($vo['user']['username']); ?>&nbsp;&nbsp;</a></span>
                            <span style="color: #363636">

                            <?php echo htmlentities($vo['content']); ?>
                            </span>
                            <br>
                            <span style="font-size: 12px;color: #B4CDCD">
                                <?php echo htmlentities($vo['create_time']); ?>
                                <span class="s_reply" username="<?php echo htmlentities($vo['user']['username']); ?>">回复</span>
                            </span>

                        </div>
                    </div>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>


        </div>
    </div>

    

</body>
</html>