<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"E:\share\project\trunk\tp5\public/../application/gjcf\view\bonus\index.html";i:1533258165;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1531971031;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1533261102;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532420336;}*/ ?>
<html>
<head>
    <title>主页</title>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>


    <script type="text/javascript" src="/static/layui/layui.js"></script>
    <link rel="stylesheet" href="/static/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="/static/css/style.css?version=2" type="text/css" />
    <link rel="stylesheet" href="/static/dtree/dtree.css?version=4" type="text/css" />
    <script type="text/javascript" src="/static/js/action.js?version=51"></script>
    <script type="text/javascript" src="/static/qrcodejs/qrcode.min.js"></script>
    <script type="text/javascript" src="/static/dtree/dtree.js?version=4"></script>
    <script type="text/javascript">

    </script>
    <style>
        #top_info{
            visibility:hidden;
        }
    </style>

</head>
<body class="layui-layout-body">

<div class="layui-container" id="top_info">
    <div class="layui-container" id="header_userinfo">
        <form class="layui-form layui-form-pane" action="javascript:;" >
            <!--<div class="layui-container" style="width:625;position:relative;left:0%">-->
            <div class="layui-form-item layui-inline">
                <label class="layui-form-label" >用户名：</label>
                <div class="layui-input-inline">
                    <label class="layui-form-label" id="header_username" style="width:200;"></label>
                </div>
            </div>
            <div class="layui-form-item layui-inline">
                <label class="layui-form-label" style="width:60">ID：</label>
                <div class="layui-input-inline">
                    <label class="layui-form-label" id="header_userid"></label>
                </div>
            </div>
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
        <li class="layui-nav-item"><a href="javascript:;">系统公告</a></li>
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
    $("#top_info").css("visibility", "visible");

    window.onload = GetUserInfo();

</script>

<div id="bottom">
    <h2>分红</h2>
    <table class="layui-table" lay-data="{height:332, url:'/index.php/gjcf/bonus/getbonus', id:'idTest'}" lay-filter="index_invest">
        <thead>
        <tr>
            <th lay-data="{field:'count', sort: true, fixed: true}">直推人数</th>
            <th lay-data="{field:'profit'}">分红额度</th>
            <th lay-data="{field:'profitcount'}">分红人数</th>
            <th lay-data="{field:'oneprofit', sort: true}">人均分红</th>
        </tr>
        </thead>
    </table>
</div>
<script>
    layui.use(['layer', 'table'], function() {
        var table = layui.table;
    });
</script>
