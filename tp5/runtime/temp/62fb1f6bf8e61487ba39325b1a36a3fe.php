<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"H:\share\project\trunk\tp5\public/../application/gjcf\view\investrecord\index.html";i:1532743053;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1532007517;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532700826;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532433712;}*/ ?>
<html>
<head>
    <title>投资记录</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>


    <script type="text/javascript" src="/static/layui/layui.js"></script>
    <link rel="stylesheet" href="/static/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="/static/css/style.css?version=1" type="text/css" />
    <script type="text/javascript" src="/static/js/action.js?version=38"></script>
    <script type="text/javascript">

    </script>

</head>
<body class="layui-layout-body">

<div id="top_info" class="layui-header">
    <div id="userinfo" >
        <form method="post">
            <span float="left">
                用户名：<label id="header_username"></label>
                用户ID：<label id="header_userid"></label>
                可用YDC：<label id="header_usableydc"></label>
                冻结YDC：<label id="header_freezenydc"></label>
            </span>
                <span float="right">
                    <input type="submit" value="签到" formaction="<?php echo url('gjcf/sign/sign'); ?>"/>
                    <input type="submit" value="退出" formaction="<?php echo url('gjcf/logout/logout'); ?>"/>
                </span>
        </form>

    </div>

    <ul class="layui-nav" >
        <li class="layui-nav-item">
            <a href="javascript:;">项目信息</a>
            <dl class="layui-nav-child">
                <dd id="header_project"><a href="javascript:;">项目列表</a></dd>
                <dd id="header_investrecord"><a href="javascript:;">投资记录</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:;">充值提现</a>
            <dl class="layui-nav-child">
                <dd id="header_charge"><a href="javascript:;">充值</a></dd>
                <dd id="header_withdraw"><a href="javascript:;">提现</a></dd>
                <dd id="header_ydcrecord"><a href="javascript:;">收益记录</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:;">账户管理</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                <dd id="header_fixaccountinfo"><a href="javascript:;">支付账户</a></dd>
                <dd id="header_fixpassword"><a href="javascript:;">修改密码</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:;">团队信息</a>
            <dl class="layui-nav-child">
                <dd id="header_myteam"><a href="javascript:;">我的团队</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item"><a href="javascript:;">系统公告</a></li>
    </ul>


</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<script>
    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element;

        //…
    });
</script>

</body>
</html>



<div id="investrecord_dive">
    <table class="layui-hide" id="investrecord_table"></table>
</div>
<script>
    layui.use('table', function(){
        var table = layui.table;

        table.render({
            elem: '#investrecord_table'
            ,url:'/index.php/gjcf/investrecord/getinvestrecord'
            ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
            ,cols: [[
                {field:'caption', title: '项目'}
                ,{field:'investtime', title: '时间', sort: true}
                ,{field:'investydc', title: '本金'}
                ,{field:'profitydc', title: '利润'}
                ,{field:'balancedays', title: '返现天数'}
                ,{field:'paydays', title: '已返天数'}
            ]]
            ,page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
                layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
                //,curr: 5 //设定初始在第 5 页
                ,rows:10
                ,groups: 1 //只显示 1 个连续页码
                ,first: false //不显示首页
                ,last: false //不显示尾页

            }
        });
    });
</script>


