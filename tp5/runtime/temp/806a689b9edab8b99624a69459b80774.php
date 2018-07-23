<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:76:"E:\share\project\trunk\tp5\public/../application/gjcf\view\signup\index.html";i:1532313094;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1531971031;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532310391;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1531964529;}*/ ?>
<html>
<head>
    <title>注册</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=7"></script>

    <link rel="stylesheet" href="/static/css/style.css?version=1" type="text/css" />
    <link rel="stylesheet" href="/static/layui/css/layui.css?t=1531663423583" media="all">
    <script type="text/javascript">

    </script>

</head>


</html>


<script text="javascript">
    var referee = $.getUrlParam('referee');
    window.onload = function(){
        $("#referee").val(referee);
    }
</script>

<body>
<form method="post" action="<?php echo url('gjcf/signup/signup'); ?>">
    用户名 <input type="text" name="username" /><br />
    密码 <input type="text" name="password" /><br />
    手机号 <input type="text" name="tel" /><br />
    推荐人ID <input type="text" id="referee" name="referee" /><br />
    验证码 <input type="text" name="capcha" /><br/>
    <img src="<?php echo captcha_src(); ?>" onclick="this.src='/index.php/captcha?id='+Math.random()" style="cursor: pointer" /><br />
    <input type="submit" value="注册" name="signup" />

</form>

</body>
