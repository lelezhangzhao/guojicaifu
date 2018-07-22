<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:78:"H:\share\project\trunk\tp5\public/../application/gjcf\view\withdraw\index.html";i:1532131065;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1532007517;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532269701;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532007517;}*/ ?>
<html>
<head>
    <title>提现</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=7"></script>

    <link rel="stylesheet" href="/static/css/style.css" type="text/css?version=3" />
    <link rel="stylesheet" href="/static/layui/css/layui.css?t=1531663423583" media="all">
    <script type="text/javascript">

    </script>

</head>


</html>


<body onload="GetWithdrawYdc()">
<form method="post" >
    可提现额度：<label id="withdrawydc">0</label><br/>

    提现：<input type="text" name="withdraw"/><input type="submit" value="确定" formaction="<?php echo url('gjcf/withdraw/withdraw'); ?>" /><br/>
</form>

</body>