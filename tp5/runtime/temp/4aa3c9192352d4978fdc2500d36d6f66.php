<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"H:\share\project\trunk\tp5\public/../application/gjcf\view\chargeconfirm\index.html";i:1533344036;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1533344036;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1533345710;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1533344036;}*/ ?>
<html>
<head>
    <title>确认充值</title>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>


    <script type="text/javascript" src="/static/layui/layui.js"></script>
    <link rel="stylesheet" href="/static/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="/static/css/style.css?version=2" type="text/css" />
    <link rel="stylesheet" href="/static/dtree/dtree.css?version=4" type="text/css" />
    <script type="text/javascript" src="/static/js/action.js?version=54"></script>
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




<div id="bottom">
        <table class="layui-hide" id="chargeconfirm_table" lay-filter="chargeconfirmfilter"></table>
</div>


<script>
    layui.use("table", function(){
        var table = layui.table;

        table.render({
            elem:"#chargeconfirm_table",
            url:"/index.php/gjcf/chargeconfirm/getchargerecord",
            cols:[[
                {field:"name", title:"姓名"},
                {field:"alipaynum", title:"支付宝账号"},
                {field:"ydc", title:"充值额度"},
                {field:"chargetime", title:"充值时间"},
                {field:"right", toolbar:"#chargeconfirm", title:"操作"}
            ]],
            page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
                layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'], //自定义分页布局
                //,curr: 5 //设定初始在第 5 页
                rows: 10,
                groups: 1, //只显示 1 个连续页码
                first: false, //不显示首页
                last: false //不显示尾页
            }
        });
    });
</script>

<script type="text/html" id="chargeconfirm">
    <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="success">确认</a>
    <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="failed">取消</a>
</script>
<script>
    layui.use("table", function(){
        var table = layui.table;
        table.on('tool(chargeconfirmfilter)', function(obj){
            var data = obj.data;
            if(obj.event === 'success'){
                $.ajax({
                    type:"post",
                    url:"/index.php/gjcf/chargeconfirm/chargeconfirmsuccess",
                    async:true,
                    dateType:"json",
                    data:{
                        chargeid:data.id
                    },
                    success:function(ajaxdata){
                        ajaxdata = eval("(" + ajaxdata + ")");
                        $.ShowMsg(ajaxdata.msg);
                        switch(ajaxdata.code){
                            case 0: //更新剩余投资额

                                break;
                            default:
                                break;
                        }
                    }
                });
            } else if(obj.event === 'failed'){
                $.ajax({
                    type:"post",
                    url:"/index.php/gjcf/chargeconfirm/chargeconfirmfailed",
                    async:true,
                    dateType:"json",
                    data:{
                        chargeid:data.id
                    },
                    success:function(ajaxdata){
                        ajaxdata = eval("(" + ajaxdata + ")");
                        $.ShowMsg(ajaxdata.msg);
                        switch(ajaxdata.code){
                            case 0: //更新剩余投资额

                                break;
                            default:
                                break;
                        }
                    }
                });
            }
            obj.del();
        });

    });
</script>