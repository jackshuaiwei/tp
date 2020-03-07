<?php /*a:2:{s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\home\cphoto.html";i:1583331600;s:66:"D:\phpstudy_pro\WWW\tpmood\application\index\view\public\base.html";i:1583330848;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    用户头像修改
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
        function upload() {
            var formData = new FormData()  //创建一个forData
            formData.append('image', $('#pic_img')[0].files[0])  //把file添加进去  name命名为img
            $.ajax({
                url: "<?php echo url('index/home/cphoto',['id'=>input('id')]); ?>",
                data: formData,
                type: "POST",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if(data.code == 1){
                        layer.msg(data.msg,{
                            icon:6,
                            time:2000
                        },function () {
                            location.href = data.url;
                        })
                    }else {
                        layer.open({
                            title:'上传头像失败',
                            content:data.msg,
                            icon:5,
                            anim:6
                        })
                    }
            },
            error: function() {
                alert('失败！')
            }
        })
        }

    </script>

    
    <style>
        .cphoto_con{
            width: 800px;
            margin: 0 auto 0;

        }

        .cphoto_head{
            font-size: 30px;
            font-weight: bold;
            color: cornflowerblue;
            height: 90px;
            text-align: left;
            line-height: 90px;
        }

        .photo_con{
            margin-top: 30px;
            display: flex;
        }

        .pleft{
            width: 35%;
            height: 500px;
            margin-right: 50px;

        }

        .pright{
            width: 50%;
            height: 500px;
            margin-right: 50px;

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
                <a href="<?php echo url('index/home/all'); ?>" class="layui-icon layui-icon-list">&nbsp;日记墙</a>
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
    

    
<div class="cphoto_con">
    <div class="cphoto_head">
        修改头像
        <hr style="margin-top: 0;">
    </div>

    <div class="photo_con">
        <div class="pleft">
            <div>
                个人设置隐私头像系统小红花<br>
                请上传JPG、PNG格式的图片<br>

                上传成功后如果图片不更新，你可以用浏览器多刷新几次。
            </div>
<!--            <form id="upform" enctype="multipart/form-data">-->
                <div style="margin-top: 20px;margin-bottom: 20px;">
                    <input type="file" name="image" id="pic_img">
                </div>
                <div>
                    <button onclick="upload()">上传头像</button>
                </div>
<!--            </form>-->
        </div>
        <div class="pright">
            <div style="height: 50px;font-size: 20px;">
                您当前的头像：
            </div>
            <div style="padding: 5px;box-shadow: 0px 0px 5px #00CDCD;width: 300px;height: 300px;">
                <img src="/uploads/<?php echo htmlentities($user['photo']['path']); ?>" alt="头像" style="display: inline-block;width: 100%;height: 100%">
            </div>
        </div>
    </div>

</div>

    

</body>
</html>