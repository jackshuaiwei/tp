<?php /*a:2:{s:65:"D:\phpstudy_pro\WWW\tpmood\application\index\view\home\write.html";i:1583478817;s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\public\base.html";i:1583374608;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    写日记
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

            $('button').click(function(){
                var title = $('.write_title input').val();
                var content = editor.txt.html();
                console.log(content);
                var song_url = $('.song_url input').val();
                if($('.show').is(":checked")){
                    var is_show = 0;
                }
                else{
                    var is_show = 1;
                }

                var data = $('.url_val').val();

                $.ajax({
                    url:"<?php echo url('index/home/write',['id'=>input('id')]); ?>",
                    type:"post",
                    data:{title:title,content:content,song_url:song_url,is_show:is_show},
                    dataType:'json',
                    success:function(data){
                        if(data.code==1){
                            layer.msg(data.msg,{
                                icon:6,
                                time:2000
                            },function () {
                                location.href = data.url;
                            })
                        }else {
                            layer.open({
                                title:"添加日记失败",
                                content:data.msg,
                                icon:5,
                                anim:6
                            });
                        }
                    }
                });
            });
        })


    </script>

    
    <style>

        .write_con{
            width: 800px;
            margin: 0 auto 0;
        }

        .write_head{
            font-size: 30px;
            font-weight: bold;
            color: cornflowerblue;
            height: 90px;
            text-align: left;
            line-height: 90px;

        }
        .write_title{
            margin-top: 20px;
        }
        .write_title input,.song_url input{
            display: block;
            height: 35px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid lightgrey;
            text-indent: 5px;
        }
        .write_title input:focus{
            border:1px solid cornflowerblue;
        }
        .write_content{
            margin-top: 20px;
        }
        .song_url{
            margin-top: 20px;

        }
        button{
            width: 100px;
            height: 40px;
            background-color: cornflowerblue;
            border: 0;
            border-radius: 5px;
            color: #fff;
            line-height: 30px;
            margin-top: 20px;
            cursor: pointer;
        }

        button:hover{
            box-shadow: 0 0 9px cornflowerblue;
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
    

    
<div class="write_con">
    <div class="write_head">
        写日记
        <hr style="margin-top: 0;">
    </div>

    <div class="write_title">
        <input type="text" placeholder="写个标题吧...">
    </div>

    <div class="write_content">

    </div>

    <div class="song_url">
        <input type="text" placeholder="网易云歌曲外连接...">
    </div>

    <div style="margin-top: 20px;font-size: 16px;">
        <input class='show' type="checkbox" > 仅自己可见<br>

    </div>

    <button >提交</button>


</div>

    

</body>
</html>