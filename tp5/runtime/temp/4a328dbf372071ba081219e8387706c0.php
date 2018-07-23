<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"E:\share\project\trunk\tp5\public/../application/gjcf\view\accountinfo\index.html";i:1532334451;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1531971031;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532334088;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1531964529;}*/ ?>
<html>
<head>
    <title>账户</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=17"></script>

    <link rel="stylesheet" href="/static/css/style.css?version=1" type="text/css" />
    <link rel="stylesheet" href="/static/layui/css/layui.css?t=1531663423583" media="all">
    <script type="text/javascript">

    </script>

</head>


</html>



<body>
<form method="post" target="exec_target">
    姓名 <input type="text" name="name" id="name"/><br />
    支付宝账户 <input type="text" name="alipaynum" id="alipaynum"/><br />
    验证码 <input type="text" name="telidentify" id="telidentify"/><input type="submit" value="获取手机验证码" id="getaccountinfotelidentify" onclick="GetAccountInfoTelIdentify()"/><br/>
    <label id="accountinfohidden" ></label><br/>
    <input type="submit" value="保存" onclick="SaveAccountInfo(document.getElementById('name').value, document.getElementById('alipaynum').value, document.getElementById('telidentify').value)" name="signup"/>
</form>
<iframe name="exec_target" hidden/>

</body>