<?php /*a:2:{s:67:"D:\phpstudy_pro\WWW\tpmood\application\admin\view\index\susers.html";i:1583386819;s:66:"D:\phpstudy_pro\WWW\tpmood\application\admin\view\public\base.html";i:1583328197;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理|会员管理</title>
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

    $(function () {
        var id= $('.delete a').attr('uid');
        $('.delete a').click(function () {
            layer.confirm('您确定要删除吗?',{btn: ['确定', '取消'],title:"提示"}, function(){
                $.ajax({
                    type: "post",
                    url: "dusers/" + id,
                    dataType: "json",
                    success:function(data) {
                        if(data.code == 1){
                            layer.msg(data.msg,{
                                icon:6,
                                time:2000
                            },function () {
                                location.href = data.url;
                            });
                        }else{
                            layer.open({
                                title:"删除失败！",
                                content:data.msg,
                                icon:5,
                                anim:6
                            });
                        }
                    }
                });
            });
            return false;
        });


    });
</script>

    
<style>

    html,body{
        height:100%;
        /* background-color: #393D49; */
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

    .wel_info{
        height:60px;
        line-height: 60px;
        background-color: #fff;
        text-indent: 20px;
    }

    .set{
        padding:10px;

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
    #btn{
        width: 30px;
        height: 25px;
        background-color: #FFFAFA;
        border: 1px solid #FFEFD5;
        display: inline-block;
    }
    #btn a{
        display: inline-block;
        width: 100%;
        height: 100%;
        text-align: center;
    }

    #add{
        /*width: 80px;*/
        height: 60px;
        border: 1px solid #00CDCD;
        border-radius: 5px;
        /*background-color: #CDC1C5;*/
    }

    #add a{
        display: inline-block;
        width: 80px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        color: #fff;
        background-color: #CDC1C5;
        margin-top: 10px;
        margin-left: 10px;
        border-radius: 5px;
    }

    input{
        display: inline-block;
        height: 25px;
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
            <span class="layui-icon layui-icon-home" style="font-size: 13px;display: inline-block;width: 180px;text-indent: 10px;color: #fff;"><a href="" style="color: #fff;"> 我的主页 / 用户管理</a></span>
        </div>
        <div>
            <div class="set">
                <div style="background-color: #fff;padding: 10px;">
                    <div id="add">
                        <span>
                            <a href="<?php echo url('admin/index/ausers'); ?>" class="layui-icon">&#xe608;添加</a>
                        </span>
                        <span style="margin-left: 30px;margin-right: 5px"><input id="user" type="text" placeholder="输入用户名(username)" style="text-indent: 5px"></span>
                        <span><a href="<?php echo url('admin/index/users'); ?>">返回</a></span>
                    </div>
                    <hr>
                    <table class="layui-table">
                        <colgroup>
                            <col width="150">
                            <col width="200">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>UserName</th>
                            <th>Email</th>
                            <th>IsActive</th>
                            <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><?php echo htmlentities($vo['id']); ?></td>
                            <td><a href="<?php echo url('admin/index/cusers',['uid'=>$vo['id']]); ?>"><?php echo htmlentities($vo['username']); ?></a></td>
                            <td><?php echo htmlentities($vo['email']); ?></td>
                            <td><?php if($vo['is_active'] == 1): ?>是 <?php else: ?>否<?php endif; ?></td>
                            <td>
                                <div style="width: 80%;margin: 0 auto 0">
                                    <div id="btn">
                                        <a href="<?php echo url('admin/index/cusers',['uid'=>$vo['id']]); ?>" class="layui-icon">&#xe642;</a>
                                    </div>
                                    <div id="btn" class="delete">
                                        <a href="javascript:;" uid="<?php echo htmlentities($vo['id']); ?>" class="layui-icon">&#xe640;</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div style="text-align: right;margin-right: 50px">

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>



</body>
</html>