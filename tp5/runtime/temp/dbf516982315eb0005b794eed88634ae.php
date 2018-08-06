<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:80:"H:\share\project\trunk\tp5\public/../application/gjcf\view\systeminfo\index.html";i:1533452620;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1533451121;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1533453270;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1533451143;}*/ ?>
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
    window.onload = SysteminfoOnload();
</script>


<div class="layui-container" style="padding: 20px; background-color: #F2F2F2;">
    <div class="layui-row layui-col-space15">
        <div class="layui-card">
            <div class="layui-card-header">【公司简介】</div>
            <div class="layui-card-body">
                国际财富自由基金管理有限公司由海归博士孙海立创立，投资项目涉及地产，医疗，生物，人工智能等多个领域
            </div>
        </div>
        <div class="layui-card">
            <div class="layui-card-header">【国际财富】</div>
            <div class="layui-card-body">
                免费注册成为会员，赠送1000体验金，可投资体验项目，收益可直接提现
            </div>
        </div>
        <div class="layui-card">
            <div class="layui-card-header">【可用YDC】</div>
            <div class="layui-card-body">
                YDC全称云豆币，可直接提现，1YDC=1人民币
            </div>
        </div>
        <div class="layui-card">
            <div class="layui-card-header">【冻结YDC】</div>
            <div class="layui-card-body">
                冻结YDC不可直接提现，需要通过推荐奖缓释到可用YDC<br/>
                缓释规则为：每次缓释等额推荐奖<br/>
                比如冻结100YDC，推荐奖10YDC，则缓释10冻结YDC到可用YDC<br/>
                冻结YDC可通过签到，活动等获得<br/>
            </div>
        </div>
        <div class="layui-card">
            <div class="layui-card-header">【体验YDC】</div>
            <div class="layui-card-body">
                体验YDC只能投资体验项目<br/>
                体验YDC可通过注册，活动等获得
            </div>
        </div>
        <div class="layui-card">
            <div class="layui-card-header">【推荐制度】</div>
            <div class="layui-card-body">
                无需投资即可享受推荐奖
            </div>
        </div>
        <div class="layui-card">
            <div class="layui-card-header">【推荐收益奖】</div>
            <div class="layui-card-body">
                1代收益10%<br/>
                2代收益5%<br/>
                3代收益3%<br/>
                推荐奖记入可用YDC<br/>
            </div>
        </div>
        <div class="layui-card">
            <div class="layui-card-header">【市场拓展奖】</div>
            <div class="layui-card-body">
                有效直推3人奖，平分当日分红20%<br/>
                有效直推6人奖，平分当日分红30%<br/>
                有效直推9人奖，平分当日分红50%<br/>
                推荐人如投资体验项目外其他项目，即为有效直推<br/>
                市场拓展奖记入可用YDC
            </div>
        </div>
        <div class="layui-card">
            <div class="layui-card-header">【提现】</div>
            <div class="layui-card-body">
                提现收取5%手续费<br/>
                提现时间9：00-17：00，每天均可提现<br/>
                提现到账时间：2小时<br/>
            </div>
        </div>
        <div class="layui-card">
            <div class="layui-card-header">【国际财富项目八大核心竞争力】</div>
            <div class="layui-card-body">
                第一，终身不用投一分钱还可以快速赚大钱还只增不减！<br/>
                第二，合法合规、不伤人脉还养人脉！<br/>
                第三，项目公开透明！<br/>
                第四，巅覆性商业模式，钱景无限！<br>
                第五，免费注册，病毒式营销、团队裂变迅速！<br/>
                第六，技术实力强大，操作简单易于上手,所有奖金全部秒结秒提几个能做到！<br/>
                第七，投资过程就是娱乐过程，边投边赚，嗨到不行！<br/>
                第八，具有长久稳定管道收入属性，伞下会员的高频交易让你实现睡后管道收入，不是资金盘胜过资金盘！<br/>
            </div>
        </div>
        <div class="layui-card">
            <div class="layui-card-header">【公司愿景】</div>
            <div class="layui-card-body">
                每一个我们的朋友，不管认识之前如何，合作之后都希望能拥有一份持久轻松愉快的心情。<br/>
                每一个我们的同事，不管进来之前如何，出去之后都希望能拥有一身正气和澎湃的激情！
            </div>
        </div>
    </div>
</div>
