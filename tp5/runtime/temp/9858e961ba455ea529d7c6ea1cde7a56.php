<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:76:"H:\share\project\trunk\tp5\public/../application/gjcf\view\charge\index.html";i:1532950891;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1532007517;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532949221;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532433712;}*/ ?>
<html>
<head>
    <title>充值</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>


    <script type="text/javascript" src="/static/layui/layui.js"></script>
    <link rel="stylesheet" href="/static/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="/static/css/style.css?version=1" type="text/css" />
    <script type="text/javascript" src="/static/js/action.js?version=42"></script>
    <script type="text/javascript">

    </script>
    <style>
        #top_info{
            visibility:hidden;
        }
    </style>

</head>
<body class="layui-layout-body">

    <div id="top_info" class="layui-header">
        <div id="userinfo" >
            <div >
                <span float="left">
                    用户名：<label id="header_username"></label>
                    用户ID：<label id="header_userid"></label>
                    可用YDC：<label id="header_usableydc"></label>
                    冻结YDC：<label id="header_freezenydc"></label>
                </span>
                    <span float="right">
                        <input type="button" value="签到" id="header_sign"/>
                        <input type="button" value="退出" id="header_logout"/>
                    </span>
            </div>

        </div>

        <ul class="layui-nav" >
            <li class="layui-nav-item">
                <a href="javascript:;">项目信息</a>
                <dl class="layui-nav-child">
                    <dd id="header_project"><a href="javascript:;">项目列表</a></dd>
                    <dd id="header_investrecord"><a href="javascript:;">投资记录</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">充值提现</a>
                <dl class="layui-nav-child">
                    <dd id="header_charge"><a href="javascript:;">充值</a></dd>
                    <dd id="header_withdraw"><a href="javascript:;">提现</a></dd>
                    <dd id="header_ydcrecord"><a href="javascript:;">收益记录</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">账户管理</a>
                <dl class="layui-nav-child"> <!-- 二级菜单 -->
                    <dd id="header_fixaccountinfo"><a href="javascript:;">支付账户</a></dd>
                    <dd id="header_fixpassword"><a href="javascript:;">修改密码</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">团队信息</a>
                <dl class="layui-nav-child">
                    <dd id="header_myteam"><a href="javascript:;">我的团队</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="javascript:;">系统公告</a></li>
        </ul>


    </div>
<br/>
<br/>
<br/>
<br/>
<br/>
<script>
    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element;

        //…
    });
</script>

</body>
</html>



<div class="layui-container" style="width:625;position:relative;left:0%">
    <form action="" target="exec_target" class="layui-form layui-form-pane" >
        <div class="layui-form-item">
            <label class="layui-form-label">支付宝扫码：</label>
        </div>
        <div class="layui-form-item">
            <img src="/static/image/charge.png" height="200" width="200"><br/>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">充值金额</label>
            <div class="layui-input-inline">
                <input type="text" name="charge_ydc" id="charge_ydc" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-input-inline">
                <label class="layui-form-label">最低10元起充</label>
            </div>
        </div>
        <div class="layui-form-item">
            <button class="layui-btn" lay-submit="" id="charge_ok">确定</button>
        </div>
    </form>
</div>
<iframe name="exec_target" hidden />