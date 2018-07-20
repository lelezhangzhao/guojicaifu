<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:78:"E:\share\project\trunk\tp5\public/../application/gjcf\view\withdraw\index.html";i:1532056849;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1531971031;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532056706;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1531964529;}*/ ?>
<html>
<head>
    <title>提现</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=2"></script>

    <link rel="stylesheet" href="/static/css/style.css" type="text/css" />
    <link rel="stylesheet" href="/static/layui/css/layui.css?t=1531663423583" media="all">
    <script type="text/javascript">

    </script>

</head>


</html>


<body onload="GetWithdrawYdc()">
<form method="post" >
    可提现额度：<label id="withdrawydc">0</label><br/>

    提现普通收益：<input type="text" name="withdrawusualydc"/><input type="submit" value="确定" formaction="<?php echo url('gjcf/withdraw/WithdrawUsualYdc'); ?>" /><br/>
    提现签到收益：<input type="text" name="withdrawsignydc"/><input type="submit" value="确定" formaction="<?php echo url('gjcf/withdraw/WithdrawSignYdc'); ?>" /><br/>
</form>

</body>