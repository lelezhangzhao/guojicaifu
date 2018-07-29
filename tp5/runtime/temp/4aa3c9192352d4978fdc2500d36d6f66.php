<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"H:\share\project\trunk\tp5\public/../application/gjcf\view\chargeconfirm\index.html";i:1532831470;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1532007517;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532792595;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532433712;}*/ ?>
<html>
<head>
    <title>确认充值</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>


    <script type="text/javascript" src="/static/layui/layui.js"></script>
    <link rel="stylesheet" href="/static/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="/static/css/style.css?version=1" type="text/css" />
    <script type="text/javascript" src="/static/js/action.js?version=39"></script>
    <script type="text/javascript">

    </script>

</head>
<body class="layui-layout-body">

<div id="top_info" class="layui-header">
    <div id="userinfo" >
        <form method="post">
            <span float="left">
                用户名：<label id="header_username"></label>
                用户ID：<label id="header_userid"></label>
                可用YDC：<label id="header_usableydc"></label>
                冻结YDC：<label id="header_freezenydc"></label>
            </span>
                <span float="right">
                    <input type="submit" value="签到" formaction="<?php echo url('gjcf/sign/sign'); ?>"/>
                    <input type="submit" value="退出" formaction="<?php echo url('gjcf/logout/logout'); ?>"/>
                </span>
        </form>

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
                {field:"confirmtime", title:"充值时间"},
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
                layer.msg('失败');
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