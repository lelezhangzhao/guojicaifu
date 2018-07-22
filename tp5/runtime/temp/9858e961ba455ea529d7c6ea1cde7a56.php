<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:76:"H:\share\project\trunk\tp5\public/../application/gjcf\view\charge\index.html";i:1532131065;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1532007517;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532269701;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532007517;}*/ ?>
<html>
<head>
    <title>充值</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=7"></script>

    <link rel="stylesheet" href="/static/css/style.css" type="text/css?version=3" />
    <link rel="stylesheet" href="/static/layui/css/layui.css?t=1531663423583" media="all">
    <script type="text/javascript">

    </script>

</head>


</html>


<body>
<form method="post" >
    支付宝扫码：<br/>
    <img src="/static/image/charge.png" height="200" width="200"><br/>
    充值金额 <input type="text" name="ydc" />最低10元起充<br />
    <input type="submit" value="确定" formaction="<?php echo url('gjcf/charge/charge'); ?>" name="login" /><br />
</form>

</body>