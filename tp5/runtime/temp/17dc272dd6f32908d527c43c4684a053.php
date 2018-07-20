<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"E:\share\project\trunk\tp5\public/../application/gjcf\view\chargeconfirm\index.html";i:1532077036;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1531971031;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532077299;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1531964529;}*/ ?>
<html>
<head>
    <title>确认充值</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=5"></script>

    <link rel="stylesheet" href="/static/css/style.css" type="text/css" />
    <link rel="stylesheet" href="/static/layui/css/layui.css?t=1531663423583" media="all">
    <script type="text/javascript">

    </script>

</head>


</html>


<body >

<div id="bottom">
    <form method="post" action="" target="exec_target">
        <h2>确认充值</h2>
        <?php if(is_array($chargelist) || $chargelist instanceof \think\Collection || $chargelist instanceof \think\Paginator): $i = 0; $__LIST__ = $chargelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$charge): $mod = ($i % 2 );++$i;?>
        <div>
            姓名：<?php echo $charge['name']; ?><br/>
            支付宝账号：<?php echo $charge['alipaynum']; ?><br/>
            充值额度：<?php echo $charge['ydc']; ?><br/>
            充值时间：<?php echo $charge['confirmtime']; ?><br/>
            <input type="submit" value="确定" id="chargeconfirmok<?php echo $charge['id']; ?>" onclick="ChargeConfirmSuccess(<?php echo $charge['id']; ?>)"  />
            <input type="submit" value="取消" id="chargeconfirmcancel<?php echo $charge['id']; ?>" onclick="ChargeConfirmFailed(<?php echo $charge['id']; ?>)" />
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
    <iframe hidden id="exec_target" name="exec_target"></iframe>
</div>

</body>
