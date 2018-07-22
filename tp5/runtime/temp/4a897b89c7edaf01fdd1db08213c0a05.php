<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"H:\share\project\trunk\tp5\public/../application/gjcf\view\index\index.html";i:1532240832;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1532007517;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532132103;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532007517;}*/ ?>
<html>
<head>
    <title>主页</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=6"></script>

    <link rel="stylesheet" href="/static/css/style.css" type="text/css" />
    <link rel="stylesheet" href="/static/layui/css/layui.css?t=1531663423583" media="all">
    <script type="text/javascript">

    </script>

</head>


</html>


<body onload="GetProject()">

<div id="index" class="menuDiv">
    <ul>
        <li id="project"><a href="#">投资项目</a></li>
        <li id="investrecord"><a href="#">投资记录</a></li>
        <li id="chongzhitixian"><a href="#">充值提现</a>
            <ul>
                <li id="charge"><a href="#">充值</a></li>
                <li id="withdraw"><a href="#">提现</a></li>
                <li id="ydcrecord"><a href="#">记录</a></li>
            </ul>
        </li>
        <li id="accountmanager"><a href="#">账户管理</a>
            <ul>
                <li id="fixaccountinfo"><a href="#">支付账户</a></li>
                <li id="fixpassword"><a href="#">修改密码</a></li>
            </ul>
        </li>
        <li id="xitonggonggao"><a href="#">系统公告</a></li>

    </ul>

</div>



<div id="bottom">
    <form method="post" >
        <h2>投资项目</h2>
        <div id="projectlist">

        </div>

    </form>
</div>

</body>
