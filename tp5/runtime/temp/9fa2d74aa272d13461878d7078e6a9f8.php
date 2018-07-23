<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"E:\share\project\trunk\tp5\public/../application/gjcf\view\investrecord\index.html";i:1532307693;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1531971031;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532310391;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1531964529;}*/ ?>
<html>
<head>
    <title>投资记录</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=7"></script>

    <link rel="stylesheet" href="/static/css/style.css?version=1" type="text/css" />
    <link rel="stylesheet" href="/static/layui/css/layui.css?t=1531663423583" media="all">
    <script type="text/javascript">

    </script>

</head>


</html>


<body >

<div id="bottom">
    <form method="post" action="" target="exec_target">
        <h2>投资记录</h2>
        <?php if(is_array($investlist) || $investlist instanceof \think\Collection || $investlist instanceof \think\Paginator): $i = 0; $__LIST__ = $investlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$invest): $mod = ($i % 2 );++$i;?>
        <div>
            投资项目：<?php echo $invest['caption']; ?><br/>
            投资时间：<?php echo $invest['investtime']; ?><br/>
            投资本金：<?php echo $invest['investydc']; ?><br/>
            投资利润：<?php echo $invest['profitydc']; ?><br/>
            返现天数：<?php echo $invest['balancedays']; ?><br/>
            已返天数：<?php echo $invest['paydays']; ?><br/>
            已返金额：<?php echo $invest['paydays'] * $invest['balanceperday']; ?><br/>
            未返天数：<?php echo $invest['balancedays'] - $invest['paydays']; ?><br/>
            未返金额：<?php echo $invest['profitydc'] - $invest['paydays'] * $invest['balanceperday']; ?><br/>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
    <iframe hidden id="exec_target" name="exec_target"></iframe>
</div>

</body>
