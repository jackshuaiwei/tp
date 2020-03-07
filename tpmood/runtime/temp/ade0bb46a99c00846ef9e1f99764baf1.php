<?php /*a:2:{s:68:"D:\phpstudy_pro\WWW\tpmood\application\admin\view\index\arecord.html";i:1583328287;s:66:"D:\phpstudy_pro\WWW\tpmood\application\admin\view\public\base.html";i:1583328197;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    后台管理|日记添加
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
        layui.use('element', function(){
            var element = layui.element;

        });
        function alogout() {
            $.ajax({
                url:"<?php echo url('admin/index/alogout'); ?>",
                type:'post',
                dataType:'json',
                success:function(data){
                    if(data.code == 1){
                        layer.msg(data.msg,{
                            icon:6,
                            time:2000
                        },function(){
                            location.href = data.url;
                        });
                    }else{
                        layer.open({
                            title:"退出登录失败！",
                            content:data.msg,
                            icon:5,
                            anim:6
                        });
                    }
                }
            });
        }
    </script>
    
    <script>

    $(function(){
        var E = window.wangEditor;
        var editor = new E('.write_content')
        editor.create();



        $('#save').click(function () {
            var title = $('#title').val();
            var content = editor.txt.text();
            var song_url = $('#song_url').val();
            var user_id= $('#user_id').val();
            var is_show = $('#is_show').is(':checked');
            if(is_show == true){
                is_show = 1;
            }else {
                is_show = 0;
            }
            $.ajax({
                url:"<?php echo url('admin/index/arecord'); ?>",
                type:'post',
                data:{title:title,content:content,song_url:song_url,user_id:user_id,is_show:is_show},
                dataType:'json',
                success:function (data) {
                    if(data.code == 1){
                        layer.msg(data.msg,{
                            icon:6,
                            time:2000
                        },function () {
                            location.href = data.url;
                        })
                    }else{
                        layer.open({
                            title:"修改日记失败！",
                            content:data.msg,
                            icon:5,
                            anim:6
                        });
                    }

                }
            });
            return false;
        });
    })

</script>

    
    <style>

    html,body{
        height:100%;
        /* background-color: #393D49; */
    }
    input{
        display: inline-block;
        height:25px;
        width: 180px;
        border-radius: 5px;
        border:0;
        text-indent: 10px;
        margin-left: 150px;
    }

    .con{
        height: 100%;
    }
    .con{
        display: flex;
        background-color: #393D49;
        height: 100%;
        margin-top: 5px;
    }
    .con_left{
        width:230px;
        border-right: 1px solid #fff;

    }
    .con_right{
        width: calc(100% - 230px);
    }
    .nbar{
        height: 35px;
        line-height: 35px;
        border-bottom: 1px solid #CDC0B0;
    }


    .set{
        padding:10px;
    }

</style>

</head>
<body>

    <ul class="layui-nav" lay-filter="">
    <li class="layui-nav-item"> <a href="" style="font-size: 18px;">Mood日记系统后台管理</a></li>
    <li class="layui-nav-item" style="float:right;margin-right: 60px;">
        <a href="javascript:;"><?php echo session('user')['username']; ?></a>
        <dl class="layui-nav-child"> <!-- 二级菜单 -->
            <dd><a href="">修改密码</a></dd>
            <dd><a href="javascript:;" onclick="alogout()">退出登录</a></dd>
        </dl>
    </li>
</ul>


    <div class="con">
    <div class="con_left">
        <ul class="layui-nav layui-nav-tree" lay-filter="test" style="width: 100%;height: 100%;">
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/users'); ?>" class="layui-icon layui-icon-username" style="font-size: 16px;"> 会员管理</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/record'); ?>"  class="layui-icon layui-icon-list" style="font-size: 16px;"> 日记管理</a>
            </li>
            <li class="layui-nav-item"><a href="<?php echo url('admin/index/wishlist'); ?>" class="layui-icon layui-icon-star" style="font-size: 16px;"> 愿望管理</a></li>
            <li class="layui-nav-item"><a href="<?php echo url('admin/index/userphoto'); ?>" class="layui-icon layui-icon-picture" style="font-size: 16px;"> 用户头像管理</a></li>
        </ul>
    </div>

    <div class="con_right">
        <div class="nbar">
            <span class="layui-icon layui-icon-home" style="font-size: 13px;display: inline-block;width: 180px;text-indent: 10px;color: #fff;"><a href="" style="color: #fff;"> 我的主页 / 添加日记</a></span>
        </div>
        <div>

            <div class="set">
                <div style="height: 50px;line-height: 50px;color: #fff;font-size: 18px">
                    添加日记
                </div>
                <hr>
                <div style="padding: 50px">
                    <div style="color: #fff;position: relative">
                        <span style="position: absolute;top: 0;left: 0">Title：</span>
                        <input type="text" value="" id="title">
                    </div>
                    <hr>
                    <div style="color: #fff;position: relative">
                        <span style="position: absolute;top: 0;left: 0">Content：</span>
                        <span class="write_content" style="display: inline-block;width: 700px;margin-left: 150px;"></span>

                    </div>
                    <hr>
                    <div style="color: #fff;position: relative">
                        <span style="position: absolute;top: 0;left: 0">Song_url：</span>
                        <input type="text" value="" id="song_url">
                    </div>
                    <hr>
                    <div style="color: #fff;position: relative">
                        <span style="position: absolute;top: 0;left: 0">User：</span>
                        <span style="margin-left: 150px;">
                            <select id="user_id" lay-verify="" style="height: 30px">
                                <?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['username']); ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </span>
                    </div>
                    <hr>
                    <div style="color: #fff;position: relative">
                        <span>Is show：</span>
                        <input type="checkbox" id="is_show" style="margin-left: 85px;width: 20px"{/if}>
                    </div>
                    <hr>
                </div>

                <div style="text-align: right;margin-right: 50px;margin-top: -30px">
                    <button type="button" class="layui-btn layui-btn-radius layui-btn-normal" id="save">保存</button>
                </div>
            </div>
        </div>

    </div>

</div>



</body>
</html>