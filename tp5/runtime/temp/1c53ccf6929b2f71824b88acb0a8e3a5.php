<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"E:\share\project\trunk\tp5\public/../application/gjcf\view\index\index.html";i:1532070892;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1531971031;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532077299;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1531964529;}*/ ?>
<html>
<head>
    <title>主页</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=5"></script>

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
                <li id="transferrecord"><a href="#">记录</a></li>
            </ul>
        </li>
        <li id="personinfo"><a href="#">个人信息</a>
            <ul>
                <li id="displaypersoninfo"><a href="#">显示个人信息</a></li>
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
