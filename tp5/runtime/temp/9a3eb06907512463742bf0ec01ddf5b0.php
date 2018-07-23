<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"H:\share\project\trunk\tp5\public/../application/gjcf\view\fixpassword\index.html";i:1532349900;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1532007517;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532343129;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532007517;}*/ ?>
<html>
<head>
    <title>修改密码</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=17"></script>

    <link rel="stylesheet" href="/static/css/style.css?version=1" type="text/css" />
    <link rel="stylesheet" href="/static/layui/css/layui.css?t=1531663423583" media="all">
    <script type="text/javascript">

    </script>

</head>


</html>


<body>
<form method="post" >
    原密码：<input type="text" name="oldpassword"/><br/>
    新密码：<input type="text" name="newpassword"/><br/>
    <input type="submit" value="确定" formaction="<?php echo url('gjcf/fixpassword/fixpassword'); ?>"  /><br />
</form>

</body>