<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"E:\share\project\trunk\tp5\public/../application/gjcf\view\login\index.html";i:1532410750;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1531971031;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532406687;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1531964529;}*/ ?>
<html>
<head>
    <title>登录</title>
    <script type="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=17"></script>
    <script type="text/javascript" src="/static/layer/layer.js?version=17"></script>

    <link rel="stylesheet" href="/static/css/style.css?version=1" type="text/css" />
    <link rel="stylesheet" href="/static/layui/css/layui.css?t=1531663423583" media="all">
    <script type="text/javascript">

    </script>

</head>


</html>



<body>
<form method="post" >

    用户名 <input type="text" name="username" /><br />
    密码 <input type="text" name="password" /><br />
    验证码 <input type="text" name="capcha" /><br/>
    <img src="<?php echo captcha_src(); ?>" onclick="this.src='/index.php/captcha?id='+Math.random()" style="cursor: pointer" /><br />
    <input type="submit" value="登录" formaction="<?php echo url('gjcf/login/login'); ?>" name="login" /><br />
    <input type="submit" value="忘记密码" formaction="<?php echo url('gjcf/forgetpassword/index'); ?>" name="forgetpassword" />
    <input type="submit" value="注册" formaction="<?php echo url('gjcf/signup/index'); ?>" name="signup"/>
</form>

</body>