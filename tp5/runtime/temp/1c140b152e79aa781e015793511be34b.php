<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:79:"E:\share\project\trunk\tp5\public/../application/gjcf\view\ydcrecord\index.html";i:1532307693;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1531971031;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532310391;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1531964529;}*/ ?>
<html>
<head>
    <title>收益记录</title>
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
        <h2>收益记录</h2>
        <?php if(is_array($ydcrecordlist) || $ydcrecordlist instanceof \think\Collection || $ydcrecordlist instanceof \think\Paginator): $i = 0; $__LIST__ = $ydcrecordlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ydcrecord): $mod = ($i % 2 );++$i;?>
        <div class="pagination">
            <?php echo $ydcrecord['ydcrecordtype']; ?> ：<?php echo $ydcrecord['ydc']; ?><br/>
            结算时间：<?php echo $ydcrecord['createtime']; ?><br/>
            ---------------------------------<br/>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <?php echo $ydcrecordlist->render(); ?>
    </form>
    <iframe hidden id="exec_target" name="exec_target"></iframe>
</div>

</body>
