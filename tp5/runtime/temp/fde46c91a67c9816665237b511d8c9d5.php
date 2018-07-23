<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"E:\share\project\trunk\tp5\public/../application/gjcf\view\admin\index.html";i:1532321473;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1531971031;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532310391;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1531964529;}*/ ?>
<html>
<head>
    <title>管理员页面</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=7"></script>

    <link rel="stylesheet" href="/static/css/style.css?version=1" type="text/css" />
    <link rel="stylesheet" href="/static/layui/css/layui.css?t=1531663423583" media="all">
    <script type="text/javascript">

    </script>

</head>


</html>



<div id="bottom">
    <form method="post" >
        <div>
            充值确认：<input type="submit" value="充值确认" formaction="<?php echo url('gjcf/chargeconfirm/index'); ?>"/><br/>
            提现确认：<input type="submit" value="提现确认" formaction="<?php echo url('gjcf/withdrawconfirm/index'); ?>"/><br/>
            结算：<input type="submit" value="结算" formaction="<?php echo url('gjcf/balance/index'); ?>" /><br/>
            分红利润：<input type="text" name="bonusprofit" /><input type="submit" value="分红" formaction="<?php echo url('gjcf/bonus/index'); ?>" /><br/>
        </div>
    </form>
</div>

</body>
