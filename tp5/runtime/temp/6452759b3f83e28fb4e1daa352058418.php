<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:85:"H:\share\project\trunk\tp5\public/../application/gjcf\view\withdrawconfirm\index.html";i:1532132040;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1532007517;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532132103;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532007517;}*/ ?>
<html>
<head>
    <title>确认充值</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=6"></script>

    <link rel="stylesheet" href="/static/css/style.css" type="text/css" />
    <link rel="stylesheet" href="/static/layui/css/layui.css?t=1531663423583" media="all">
    <script type="text/javascript">

    </script>

</head>


</html>


<body >

<div id="bottom">
    <form method="post" action="" target="exec_target">
        <h2>确认提现</h2>
        <?php if(is_array($withdrawlist) || $withdrawlist instanceof \think\Collection || $withdrawlist instanceof \think\Paginator): $i = 0; $__LIST__ = $withdrawlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$withdraw): $mod = ($i % 2 );++$i;?>
        <div>
            姓名：<?php echo $withdraw['name']; ?><br/>
            支付宝账号：<?php echo $withdraw['alipaynum']; ?><br/>
            提现额度：<?php echo $withdraw['ydc']; ?><br/>
            提现时间：<?php echo $withdraw['confirmtime']; ?><br/>
            <input type="submit" value="确定" id="withdrawconfirmok<?php echo $withdraw['id']; ?>" onclick="WithdrawConfirmSuccess(<?php echo $withdraw['id']; ?>)"  />
            <input type="submit" value="取消" id="withdrawconfirmcancel<?php echo $withdraw['id']; ?>" onclick="WithdrawConfirmFailed(<?php echo $withdraw['id']; ?>)" />
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
    <iframe hidden id="exec_target" name="exec_target"></iframe>
</div>

</body>
