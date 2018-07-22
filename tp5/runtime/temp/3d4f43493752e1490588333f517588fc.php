<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:79:"H:\share\project\trunk\tp5\public/../application/gjcf\view\ydcrecord\index.html";i:1532241875;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1532007517;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532241714;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532007517;}*/ ?>
<html>
<head>
    <title>收益记录</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=6"></script>

    <link rel="stylesheet" href="/static/css/style.css" type="text/css?version=1" />
    <link rel="stylesheet" href="/static/layui/css/layui.css?t=1531663423583" media="all">
    <script type="text/javascript">

    </script>

</head>


</html>


<body >

<div id="bottom">
    <form method="post" action="" target="exec_target">
        <h2>收益记录</h2>
        <?php if(is_array($ydcrecordlist) || $ydcrecordlist instanceof \think\Collection || $ydcrecordlist instanceof \think\Paginator): $i = 0; $__LIST__ = $ydcrecordlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ydcrecord): $mod = ($i % 2 );++$i;?>
        <div class="pagination">
            <?php echo $ydcrecord['type']; ?> ：<?php echo $ydcrecord['ydc']; ?><br/>
            结算时间：<?php echo $ydcrecord['createtime']; ?><br/>
            ---------------------------------<br/>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <?php echo $ydcrecordlist->render(); ?>
    </form>
    <iframe hidden id="exec_target" name="exec_target"></iframe>
</div>

</body>
