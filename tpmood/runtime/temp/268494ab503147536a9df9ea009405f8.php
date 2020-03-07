<?php /*a:2:{s:69:"D:\phpstudy_pro\WWW\tpmood\application\admin\view\index\comments.html";i:1583479681;s:66:"D:\phpstudy_pro\WWW\tpmood\application\admin\view\public\base.html";i:1583480360;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
后台管理|评论管理
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
    $(function () {
        $('#select').click(function () {
            layui.use('table', function(){
                var table = layui.table;
                var username = $('#user').val();
                var cho = $('#cho').val();
                if(!username){
                    layer.open({
                        title:"请输入！",
                        content:"请输入Author"
                    });
                }
                else{
                    //第一个实例
                    table.render({
                        elem: '#stable'
                        ,url: "scomments/"+username + "/" + cho//数据接口
                        ,page: true //开启分页
                        ,cols: [[ //表头
                            {field: 'id', title: 'ID'}
                            ,{field: 'from_id', title: 'From'}
                            ,{field: 'to_id', title: 'To'}
                            ,{field: 'content', title: 'Content'}
                            ,{field: 'article_id', title: '日记ID'}
                            ,{field: 'time', title: '时间'}

                        ]]
                    });
                    $('#table').hide();
                    $('#table2').hide();
                    $('#stable').show();
                }

            });
            return false;
        });

        $('#com_content').each(function () {
            str = $(this).text();
            if(str.length>200){
                console.log(str)
                str1 = str.trim().substr(0,46) + "...";
                $(this).text(str1);
            }
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
        height: 60px;
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

    #cho{
        margin-left: 15px;
        display: inline-block;
        height: 30px;
        background-color: #CDC1C5;
        color: #fff;
        border-radius: 5px;
        border:1px solid #CDC1C5;
    }
    #cho:hover{
        cursor: pointer;
        opacity: 0.5;
    }

    #add a:hover{
        opacity: 0.5;
    }

</style>

</head>
<body>

    <ul class="layui-nav" lay-filter="">
    <li class="layui-nav-item"> <a href="" style="font-size: 18px;">Mood日记系统后台管理</a></li>
    <li class="layui-nav-item" style="float:right;margin-right: 60px;">
        <a href="javascript:;"><?php echo session('user')['username']; ?></a>
        <dl class="layui-nav-child"> <!-- 二级菜单 -->
            <dd><a href="javascript:;" onclick="alogout()">退出登录</a></dd>
        </dl>
    </li>
</ul>

<div class="con">
    <div class="con_left">
        <ul class="layui-nav layui-nav-tree" lay-filter="test" style="width: 100%;height: 100%;">
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/index'); ?>" class="layui-icon layui-icon-website" style="font-size: 16px;"> 网站首页</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/users'); ?>" class="layui-icon layui-icon-username" style="font-size: 16px;"> 用户管理</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/record'); ?>"  class="layui-icon layui-icon-list" style="font-size: 16px;"> 日记管理</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/comments'); ?>"  class="layui-icon layui-icon-list" style="font-size: 16px;"> 评论管理</a>
            </li>
            <li class="layui-nav-item"><a href="<?php echo url('admin/index/wishlist'); ?>" class="layui-icon layui-icon-star" style="font-size: 16px;"> 愿望管理</a></li>
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/cindex'); ?>" class="layui-icon layui-icon-set" style="font-size: 16px;"> 网站设置</a>
            </li>
            <?php if(session('user')['is_super']): ?>
            <li class="layui-nav-item">
                <a href="<?php echo url('admin/index/adusers'); ?>" class="layui-icon layui-icon-auz" style="font-size: 16px;"> 管理员管理</a>
            </li>
            <?php endif; ?>

            <li class="layui-nav-item"><a href="<?php echo url('admin/index/userphoto'); ?>" class="layui-icon layui-icon-picture" style="font-size: 16px;"> 用户头像管理</a></li>
        </ul>
    </div>

    
<div class="con_right">
    <div class="nbar">
        <span class="layui-icon layui-icon-home" style="font-size: 13px;display: inline-block;width: 180px;text-indent: 10px;color: #fff;"><a href="" style="color: #fff;"> 我的主页 / 评论管理</a></span>
    </div>
    <div>

        <div class="set">
            <div style="background-color: #fff;padding: 10px;">
                <div id="add">
                    <span><a href="<?php echo url('admin/index/comments'); ?>">全部</a></span>
                    <span>
                        <select id="cho">
                            <option value="0">From</option>
                            <option value="1">To</option>
                        </select>
                    </span>
                    <span style="margin-left: 30px;margin-right: 5px"><input id="user" type="text" placeholder="输入Username" style="text-indent: 5px"></span>
                    <span><button type="button" class="layui-btn layui-btn-sm " id="select">查询</button></span>
                </div>
                <hr>
                <table id="table" class="layui-table">
                    <colgroup>
                        <col width="150">
                        <col width="200">
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Content</th>
                        <th>RecordTitle</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($records) || $records instanceof \think\Collection || $records instanceof \think\Paginator): $i = 0; $__LIST__ = $records;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo htmlentities($vo['id']); ?></td>
                        <td><?php echo htmlentities($vo['user']['username']); ?></td>
                        <td>
                        <?php foreach($user as $ue): if($vo['to_id'] == $ue['id']): ?><?php echo htmlentities($ue['username']); ?><?php endif; ?>
                        <?php endforeach; ?>
                        </td>
                        <td id="com_content"><?php echo htmlentities($vo['content']); ?></td>
                        <td><?php echo htmlentities($vo['record']['title']); ?></td>
                        <td><?php echo htmlentities($vo['create_time']); ?></td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <div style="text-align: right;margin-right: 50px" id="table2">
                    <?php echo replace($records->render()); ?>
                </div>
                <table id="stable" lay-filter="test" style="display: none"></table>
            </div>
        </div>
    </div>

</div>

</div>


</body>
</html>