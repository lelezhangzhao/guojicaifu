<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:80:"H:\share\project\trunk\tp5\public/../application/gjcf\view\getservice\index.html";i:1533453022;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1533451121;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1533452218;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1533451143;}*/ ?>
<html>
<head>
    <title>集团信息</title>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>


    <script type="text/javascript" src="/static/layui/layui.js"></script>
    <link rel="stylesheet" href="/static/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="/static/css/style.css?version=2" type="text/css" />
    <link rel="stylesheet" href="/static/dtree/dtree.css?version=4" type="text/css" />
    <script type="text/javascript" src="/static/js/action.js?version=55"></script>
    <script type="text/javascript" src="/static/qrcodejs/qrcode.min.js"></script>
    <script type="text/javascript" src="/static/dtree/dtree.js?version=4"></script>
    <script type="text/javascript">

    </script>
    <style>
        #top_info{
            display:none;
        }
    </style>

</head>
<body class="layui-layout-body" style="overflow:auto;">

<div class="layui-container" id="top_info">
    <div class="layui-container" id="header_userinfo">
        <form class="layui-form layui-form-pane" action="javascript:;" >
            <!--<div class="layui-container" style="width:625;position:relative;left:0%">-->
            <div class="layui-form-item layui-inline">
                <!--<label class="layui-form-label" >用户名：</label>-->
                <div class="layui-input-inline">
                    <label class="layui-form-label" id="header_username" style="width:200;"></label>
                </div>
            </div>
            <!--<div class="layui-form-item layui-inline">-->
                <!--<label class="layui-form-label" style="width:60">ID：</label>-->
                <!--<div class="layui-input-inline">-->
                    <!--<label class="layui-form-label" id="header_userid"></label>-->
                <!--</div>-->
            <!--</div>-->
            <!--<div class="layui-form-item layui-inline">-->
                <!--<label class="layui-form-label">可用YDC：</label>-->
                <!--<div class="layui-input-inline">-->
                    <!--<label class="layui-form-label" id="header_usableydc"></label>-->
                <!--</div>-->
            <!--</div>-->
            <!--<div class="layui-form-item layui-inline">-->
                <!--<label class="layui-form-label">冻结YDC：</label>-->
                <!--<div class="layui-input-inline">-->
                    <!--<label class="layui-form-label" id="header_freezenydc"></label>-->
                <!--</div>-->
            <!--</div>-->

            <div class="layui-form-item layui-inline" style="float:right">
                <div class="layui-input-inline">
                    <button class="layui-btn" id="header_sign">签到</button>
                    <button class="layui-btn" id="header_logout">退出</button>
                </div>
            </div>
        </form>
    </div>

    <ul class="layui-nav layui-bg-green" >
        <li class="layui-nav-item">
            <a href="javascript:;">项目信息</a>
            <dl class="layui-nav-child">
                <dd id="header_project"><a href="javascript:;">项目列表</a></dd>
                <dd id="header_investrecord"><a href="javascript:;">投资记录</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:;">资产管理</a>
            <dl class="layui-nav-child">
                <dd id="header_charge"><a href="javascript:;">充值</a></dd>
                <dd id="header_withdraw"><a href="javascript:;">提现</a></dd>
                <dd id="header_ydcrecord"><a href="javascript:;">收益记录</a></dd>
                <dd id="header_assets"><a href="javascript:;">我的资产</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:;">账户信息</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                <dd id="header_fixaccountinfo"><a href="javascript:;">支付账户</a></dd>
                <dd id="header_fixpassword"><a href="javascript:;">修改密码</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:;">团队信息</a>
            <dl class="layui-nav-child">
                <dd id="header_myteam"><a href="javascript:;">我的团队</a></dd>
                <dd id="header_invite"><a href="javascript:;">邀请链接</a></dd>
                <dd id="header_bonus"><a href="javascript:;">今日分红</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:;">系统公告</a>
            <dl class="layui-nav-child">
                <dd id="header_systeminfo"><a href="javascript:;">集团信息</a></dd>
                <dd id="header_getservice"><a href="javascript:;">联系客服</a></dd>
            </dl>
        </li>
    </ul>
</div>

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


<script type="text/javascript">
    window.onload = SysteminfoOnload();
</script>


<div class="layui-container" style="padding: 20px; background-color: #F2F2F2;">
    <div class="layui-row layui-col-space15">
        <div class="layui-card">
            <div class="layui-card-header">联系客服</div>
            <div class="layui-card-body">
                客服微信：gjcfgfkf
            </div>
        </div>
    </div>
</div>
