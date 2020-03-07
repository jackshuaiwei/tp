<?php /*a:2:{s:64:"D:\phpstudy_pro\WWW\tpmood\application\index\view\home\mood.html";i:1583331908;s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\public\base.html";i:1583374608;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    首页
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

            var laydate = layui.laydate;
            laydate.render({
                elem: '#calendar',
                position: 'static',
            });
            var flag = true;
            var song = document.getElementById('song');
            $('.recommend_song').click(function(){
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
        });
    </script>

    
    <style>
        .home_con{
            display: flex;
            width: 900px;
            margin: 30px auto 0;
            flex-direction: row;
            background-image: url('/static/image/recommend01.jpg');
            height: 500px;

        }
        .home_recommend{
            width: 65%;
            margin-right: 30px;
            margin-top: 60px;


        }
        .home_calendar{
            width: 35%;
        }

        .home_calendar .time{
            width: 280px;
            height: 100px;
            line-height: 100px;
            font-size: 20px;
            text-align: center;
            color: cornflowerblue;
        }

        #calendar{
            margin-top: 20px;
        }

        .recommend_title,.recommend_song{
            text-align: center;
            font-size: 26px;
        }

        .recommend_content{
            text-indent: 40px;
            padding-top: 20px;
            margin-top: 10px;
            height: 300px;
            border: 1px solid #b1f7f5;
            font-size: 16px;
            line-height: 16px;
            overflow: auto;
            border-radius: 5px;
            /*background-color: rgba(224,255,255,0.5);*/
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
    

    
<div class="home_con">
    <div class="home_recommend">
        <div class="recommend_title">
            PURE--艾福杰尼
        </div>
        <div class="recommend_song">
            <span class="layui-icon layui-icon-play" style="cursor: pointer;" id='music'></span>
            <span style="font-size: 12px;font-style: italic;">~play the song~</span>
        </div>
        <div class="recommend_content">
            Maybe you have wait too long,Life is pure!
        </div>
    </div>
    <div class="home_calendar">
        <div class="time">

        </div>
        <div id="calendar">
        </div>

    </div>

</div>
<audio src="https://music.163.com/song/media/outer/url?id=1349913258.mp3"  hidden="true" id="song"></audio>

    

</body>
</html>