<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"H:\share\project\trunk\tp5\public/../application/gjcf\view\index\index.html";i:1533451355;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1533451121;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1533471926;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1533451143;}*/ ?>
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
    <script type="text/javascript" src="/static/js/action.js?version=56"></script>
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
            <!--<div class="layui-form-item layui-inline">-->
                <!--<label class="layui-form-label" >用户名：</label>-->
                <div class="layui-input-inline">
                    <!--<label class="layui-form-label" id="header_username" style="width:200;"></label>-->
                </div>
            <!--</div>-->
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

            <div class="layui-form-item layui-inline" >
                <div class="layui-input-inline">
                    <button class="layui-btn" id="header_sign">签到</button>
                    <button class="layui-btn" id="header_logout">退出</button>
                </div>
            </div>
            <div class="layui-form-item layui-inline">
            <!--<label class="layui-form-label" >用户名：</label>-->
            <div class="layui-input-inline">
                <label class="layui-form-label" id="header_username" ></label>
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
                <dd id="header_systeminfo"><a href="javascript:;">投资简介</a></dd>
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


    window.onload = IndexOnload();


</script>


<div class="layui-container " >
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
        <legend>投资项目</legend>
    </fieldset>
</div>

<div class="layui-container" style="padding: 20px; background-color: #F2F2F2;" id="index_project" >
    <!--<div class="layui-row layui-col-space15">-->
        <!--<div class="layui-col-md12">-->
            <!--<div class="layui-card">-->
                <!--<div class="layui-card-header">谨源农场</div>-->
                <!--<div class="layui-card-body">-->
                    <!--<div class="layui-row">-->
                        <!--<div class="layui-col-md10">-->
                            <!--<div class="layui-row" >-->
                                <!--<div class="layui-col-md2">-->
                                    <!--<div class="layui-inline">-->
                                        <!--<label class="layui-text">投资:</label>-->
                                    <!--</div>-->
                                    <!--<div class="layui-inline">10</div>-->
                                <!--</div>-->
                                <!--<div class="layui-col-md2">-->
                                    <!--<div class="layui-inline">收益:</div>-->
                                    <!--<div class="layui-inline">20</div>-->
                                <!--</div>-->
                                <!--<div class="layui-col-md3">-->
                                    <!--<div class="layui-inline">收益天数:</div>-->
                                    <!--<div class="layui-inline">5</div>-->
                                <!--</div>-->
                                <!--<div class="layui-col-md3">-->
                                    <!--<div class="layui-inline">每日收益:</div>-->
                                    <!--<div class="layui-inline">4</div>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                        <!--<div class="layui-col-md2" align="center" >-->
                            <!--<button class="layui-btn" >投资</button>-->
                        <!--</div>-->
                        <!--<div class="layui-col-md10" align="center">-->
                            <!--<div class="layui-progress layui-progress-big" lay-showPercent="true">-->
                                <!--<div class="layui-progress-bar" lay-percent="20%"></div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
</div>
<!--<div class="layui-container" style="padding: 20px; background-color: #F2F2F2;" >-->
    <!--<div class="layui-row layui-col-space15">-->
        <!--<div class="layui-col-md12">-->
            <!--<div class="layui-card">-->
                <!--<div class="layui-card-header">谨源农场</div>-->
                <!--<div class="layui-card-body">-->
                    <!--<div class="layui-row">-->
                        <!--<div class="layui-col-md10">-->
                            <!--<div class="layui-row" >-->
                                <!--<div class="layui-col-md2">-->
                                    <!--<div class="layui-inline">-->
                                        <!--<label class="layui-text">投资:</label>-->
                                    <!--</div>-->
                                    <!--<div class="layui-inline">10</div>-->
                                <!--</div>-->
                                <!--<div class="layui-col-md2">-->
                                    <!--<div class="layui-inline">收益:</div>-->
                                    <!--<div class="layui-inline">20</div>-->
                                <!--</div>-->
                                <!--<div class="layui-col-md3">-->
                                    <!--<div class="layui-inline">收益天数:</div>-->
                                    <!--<div class="layui-inline">5</div>-->
                                <!--</div>-->
                                <!--<div class="layui-col-md3">-->
                                    <!--<div class="layui-inline">每日收益:</div>-->
                                    <!--<div class="layui-inline">4</div>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                        <!--<div class="layui-col-md2" align="center" >-->
                            <!--<button class="layui-btn" >投资</button>-->
                        <!--</div>-->
                        <!--<div class="layui-col-md10" align="center">-->
                            <!--<div class="layui-progress layui-progress-big" lay-showPercent="true">-->
                                <!--<div class="layui-progress-bar" lay-percent="20%"></div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
<!--</div>-->

<!--<div class="layui-container" id="bottom">-->
    <!--<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">-->
        <!--<legend>投资项目</legend>-->
    <!--</fieldset>-->
    <!--<table class="layui-table" lay-data="{height:332, url:'/index.php/gjcf/index/getproject', page:true, id:'idTest'}" lay-filter="index_invest">-->
        <!--<thead>-->
        <!--<tr>-->
            <!--<th lay-data="{field:'id', sort: true, fixed: true}">ID</th>-->
            <!--<th lay-data="{field:'caption'}">项目名称</th>-->
            <!--<th lay-data="{field:'investydc', sort: true}">投资金额</th>-->
            <!--<th lay-data="{field:'profitydc'}">收益</th>-->
            <!--<th lay-data="{field:'balancedays'}">收益天数</th>-->
            <!--<th lay-data="{field:'balanceperday'}">每日收益</th>-->
            <!--<th lay-data="{field:'projectpercent'}">投资进度</th>-->
            <!--<th lay-data="{fixed: 'right', align:'center', toolbar: '#barDemo'}"></th>-->
        <!--</tr>-->
        <!--</thead>-->
    <!--</table>-->

    <!--<script type="text/html" id="barDemo">-->
        <!--<a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">投资协议</a>-->
        <!--<a class="layui-btn layui-btn-xs" lay-event="invest">投资</a>-->
    <!--</script>-->
    <!--<div class="layui-tab-item">-->
        <!--<div id="pageDemo"></div>-->
    <!--</div>-->
<!--</div>-->

<script>
//    $(function(){
//        layui.use(['layer', 'table'], function(){
//            var table = layui.table;
//
//            //监听工具条
//            table.on('tool(index_invest)', function(obj){
//                var data = obj.data;
//                if(obj.event === 'detail'){
//                    layer.msg('ID：'+ data.id + ' 的查看操作');
//                } else if(obj.event === 'invest'){
//                    $.ajax({
//                        type:"post",
//                        url:"/index.php/gjcf/invest/investproject",
//                        async:true,
//                        dateType:"json",
//                        data:{
//                            projectid:data.id
//                        },
//                        success:function(ajaxdata){
//                            ajaxdata = eval("(" + ajaxdata + ")");
//                            $.ShowMsg(ajaxdata.msg);
//                            //10,1,11,9,12,0,13
//                            switch(ajaxdata.code){
//                                case 0: //更新剩余投资额
////                                    obj.data.zt=res.data.zt;//更新数据
////                                    var toolhtml;
////                                    laytpl(tooltpl.innerHTML).render(obj.data, function(html));
////                                    tr.children('td[data-field="7"]').children('div').html(toolhtml);//7为当前表格工具列是表格的第几列
//                                    obj.update({
//                                        projectpercent: ajaxdata.projectpercent
//                                    });
//                                    break;
//                                default:
//                                    break;
//                            }
//                        }
//                    });
//                }
//            });
//
//        });
//    });
</script>
<script type="text/javascript">

</script>

