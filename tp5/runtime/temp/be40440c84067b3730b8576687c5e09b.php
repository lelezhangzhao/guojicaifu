<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:78:"E:\share\project\trunk\tp5\public/../application/gjcf\view\withdraw\index.html";i:1532056887;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1531971031;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532422007;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532420336;}*/ ?>
<html>
<head>
    <title>提现</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script type="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js?version=1"></script>
    <script type="text/javascript" src="/static/js/action.js?version=18"></script>
    <link rel="stylesheet" href="/static/css/style.css?version=1" type="text/css" />
    <link rel="stylesheet" href="/static/layui/css/layui.css" media="all" />
    <script type="text/javascript" src="/static/layui/layui.js"></script>
    <script type="text/javascript">

    </script>

</head>
<body class="layui-layout-body">
<div class="layui-header">
    <ul class="layui-nav" >
        <li class="layui-nav-item">
            <a href="javascript:;">项目信息</a>
            <dl class="layui-nav-child">
                <dd id="project"><a href="javascript:;">项目列表</a></dd>
                <dd id="investrecord"><a href="javascript:;">投资记录</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:;">充值提现</a>
            <dl class="layui-nav-child">
                <dd id="charge"><a href="javascript:;">充值</a></dd>
                <dd id="withdraw"><a href="javascript:;">提现</a></dd>
                <dd id="ydcrecord"><a href="javascript:;">收益记录</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:;">账户管理</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                <dd id="fixaccountinfo"><a href="javascript:;">支付账户</a></dd>
                <dd id="fixpassword"><a href="javascript:;">修改密码</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:;">团队信息</a>
            <dl class="layui-nav-child">
                <dd id="myteam"><a href="javascript:;">我的团队</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item"><a href="javascript:;">系统公告</a></li>
    </ul>
</div>

<script>
    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element;

        //…
    });
</script>

</body>
</html>


<body onload="GetWithdrawYdc()">
<form method="post" >
    可提现额度：<label id="withdrawydc">0</label><br/>

    提现：<input type="text" name="withdraw"/><input type="submit" value="确定" formaction="<?php echo url('gjcf/withdraw/withdraw'); ?>" /><br/>
</form>

</body>