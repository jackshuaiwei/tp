<?php /*a:1:{s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\index\index.html";i:1581324153;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <script src="/static/js/jquery.js"></script>
    <link rel="stylesheet" href="/static/css/reset.css">
    <link rel="stylesheet" href="/static/css/total.css">
    <style>
        body{
            background-color: #000;
            opacity: 0.9;
            overflow: hidden;

        }
        .all_con{
            /* background-color:#000; */
            height:100% ;
            width:100%;
            position:absolute;
            background-image: url('/static/image/index_bg01.jpg');
            background-repeat:no-repeat;
            background-attachment:fixed;
            background-position:center;
            background-size:cover;
            display: none;
            z-index: -2;
        }

        .word{
            margin: 30px 0 0 45px;
            width: 300px;
            position: absolute;
            bottom: 30px;
            right: 0;
        }

        .word span{
            color: white;
            display: none;
            line-height: 25px;
        }

        .index_header{
            float: right;
            margin: 20px 20px 0 0;
        }

        .index_header button,.login_btn button{
            width: 60px;
            height: 30px;
            border: 0;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            outline: none;
            background-color: #00BFFF;
            background-color: rgba(0, 0, 0, 0.2);
        }

        .index_header button:hover,.login_btn button:hover{
            box-shadow: 0px 0px 10px #00BFFF;

        }

        .index_title{
            color: white;
            font-size: 90px;
            font-variant:small-caps;
            font-family: "Comic Sans MS", cursive, sans-serif;
            display: none;
        }

        .song_word{
            width: 600px;
            min-height: 120px;
            margin: 200px auto 0;
            line-height: 25px;
            color: #fff;
            font-weight: bold;
            font-size: 18px;
            display: none;
        }
        .song_word_1{
            background-color: rgba(0,0,0,0.2);
        }
        .singer_info{
            display: block;
            font-size: 13px;
            text-align: right;
        }
        .recommend{
            display: block;
            font-size: 16px;
        }
    </style>

    <script>
        $(function(){
            change_bg_img();
            showall();
        })

        function change_bg_img(){
            var i = 1;
            setInterval(function(){
                i++;
                if(i<4){
                    $(".all_con").hide();
                    var bg_img_dir = "/static//image/index_bg0"+i+".jpg";
                    $('.all_con').css({'background-image':'url('+bg_img_dir+')'});
                    $(".all_con").fadeIn(2000);
                }
                else {
                    i=1;
                    $(".all_con").hide();
                    var bg_img_dir = "/static/image/index_bg0"+i+".jpg";
                    $('.all_con').css({'background-image':'url('+bg_img_dir+')'});
                    $(".all_con").fadeIn(2000);
                }

            },6000)
        }

        function showall(){
            $(".all_con").fadeIn(1000);
            $(".index_title").fadeIn(1800);
            $(".word_1").fadeIn(2000);
            $(".word_2").fadeIn(3000);
            $(".word_3").fadeIn(4000);
            $(".word_4").fadeIn(5000);
            $(".song_word").fadeIn(5000);
        }

    </script>
</head>
<body>
<div class="all_con"></div>
<div class="index_header">
    <!-- <button>登录</button>
    <button>注册</button> -->
</div>
<div class="index_title">
    Mood Diary
</div>
<div class="song_word">
    <span class="recommend">今日推荐：</span>
    <span class="song_word_1">那时候还没有成名,朋友没三五成群,理想还没有成形 还不敢按你家的门铃</span>
    <span class="singer_info">------ &nbsp;key_l 刘聪<<没钥匙的锁>></span>
    <span class="login_btn singer_info"><button><a href="<?php echo url('index/index/login'); ?>">登录</a></button></span>
</div>

<div class="word">
    <span class="word_1">或许你有很多话想说，</span>
    <br>
    <span class="word_2">或许你有很多想法想表达</span>
    <br>
    <span class="word_3">但，找不到合适的人倾诉，</span>
    <br>
    <span class="word_4">可是，有些话不能够憋在心里，哪怕是只对自己讲...</span>
</div>
</body>
</html>