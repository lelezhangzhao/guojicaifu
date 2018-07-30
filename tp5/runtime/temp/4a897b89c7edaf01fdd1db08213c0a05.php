<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"H:\share\project\trunk\tp5\public/../application/gjcf\view\index\index.html";i:1532736805;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1532007517;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532951707;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532433712;}*/ ?>
<html>
<head>
    <title>主页</title>
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

    <div class="layui-container" id="userinfo">
        <form class="layui-form layui-form-pane" action="" target="exec_targer">
            <!--<div class="layui-container" style="width:625;position:relative;left:0%">-->
                <div class="layui-form-item layui-inline">
                    <label class="layui-form-label">用户名：</label>
                    <div class="layui-input-inline">
                        <label class="layui-form-label" id="header_username"></label>
                    </div>
                </div>
                <div class="layui-form-item layui-inline">
                    <label class="layui-form-label">用户ID：</label>
                    <div class="layui-input-inline">
                        <label class="layui-form-label" id="header_userid"></label>
                    </div>
                </div>
                <div class="layui-form-item layui-inline">
                    <label class="layui-form-label">可用YDC：</label>
                    <div class="layui-input-inline">
                        <label class="layui-form-label" id="header_usableydc"></label>
                    </div>
                </div>
                <div class="layui-form-item layui-inline">
                    <label class="layui-form-label">冻结YDC：</label>
                    <div class="layui-input-inline">
                        <label class="layui-form-label" id="header_freezenydc"></label>
                    </div>
                </div>

                <div class="layui-form-item layui-inline">
                    <div class="layui-input-inline">
                        <button class="layui-btn" lay-submit="" id="header_sign">签到</button>
                        <button class="layui-btn" lay-submit="" id="header_layout">退出</button>
                    </div>
                </div>
        </form>
    </div>

    <div class="layui-container">
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




<div id="bottom">
    <h2>投资项目</h2>
    <table class="layui-table" lay-data="{height:332, url:'/index.php/gjcf/index/getproject', page:true, id:'idTest'}" lay-filter="index_invest">
        <thead>
        <tr>
            <th lay-data="{field:'id', sort: true, fixed: true}">ID</th>
            <th lay-data="{field:'caption'}">项目名称</th>
            <th lay-data="{field:'investydc', sort: true}">投资金额</th>
            <th lay-data="{field:'profitydc'}">收益</th>
            <th lay-data="{field:'remaininvest'}">剩余投资额</th>
            <th lay-data="{fixed: 'right', align:'center', toolbar: '#barDemo'}"></th>
        </tr>
        </thead>
    </table>

    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">投资协议</a>
        <a class="layui-btn layui-btn-xs" lay-event="invest">投资</a>
    </script>
    <div class="layui-tab-item">
        <div id="pageDemo"></div>
    </div>
</div>
<script>
    layui.use(['layer', 'table'], function(){
        var table = layui.table;

        //监听工具条
        table.on('tool(index_invest)', function(obj){
            var data = obj.data;
            if(obj.event === 'detail'){
                layer.msg('ID：'+ data.id + ' 的查看操作');
            } else if(obj.event === 'invest'){
                $.ajax({
                    type:"post",
                    url:"/index.php/gjcf/invest/investproject",
                    async:true,
                    dateType:"json",
                    data:{
                        projectid:data.id
                    },
                    success:function(ajaxdata){
                        ajaxdata = eval("(" + ajaxdata + ")");
                        $.ShowMsg(ajaxdata.msg);
                        //10,1,11,9,12,0,13
                        switch(ajaxdata.code){
                            case 0: //更新剩余投资额
                                obj.update({
                                    remaininvest: ajaxdata.remaininvest
                                });
                                break;
                            default:
                                break;
                        }
                    }
                });
            } else if(obj.event === 'edit'){
                layer.alert('编辑行：<br>'+ JSON.stringify(data))
            }
        });

    });
</script>
<script type="text/javascript">
//    $(window).onload = GetProject();

    //分页
//    layui.use(['laypage', 'layer'], function(){
//        laypage.render({
//            elem: 'pageDemo' //分页容器的id
//            ,count: 100 //总页数
//            ,skin: '#1E9FFF' //自定义选中色值
//            //,skip: true //开启跳页
//            ,jump: function(obj, first){
//                if(!first){
//                    layer.msg('第'+ obj.curr +'页');
//                }
//            }
//        });
//    });
</script>

