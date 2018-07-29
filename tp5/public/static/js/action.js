

var xmlhttp;
if (window.XMLHttpRequest){
    //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
    xmlhttp=new XMLHttpRequest();
} else {
    // IE6, IE5 浏览器执行代码
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}


// function OpenNewUrl(url) {
//     window.location.href = url;
//     // window.open(url);
// }
function GetUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}

$(function(){
    $.ajax({
        type:"post",
        url:"/index.php/gjcf/userinfo/getheaderuserinfo",
        async:true,
        dataType:"json",
        success:function(data){
            data = eval("(" + data + ")");
            if(data.code === 0){
                $("#header_username").text(data.username);
                $("#header_userid").text(data.userid);
                $("#header_usableydc").text(data.usableydc);
                $("#header_freezenydc").text(data.freezenydc);
            }
        },
        error:function(hd, msg){
            $.ShowMsg(msg);
        }
    });

    // $("#header_username").text(window.global_username);
    // $("#header_userid").text(window.global_userid);
    // $("#header_usableydc").text(window.global_usableydc);
    // $("#header_freezenydc").text(window.global_freezenydc);


    $.ShowMsg = function(msg){
        layui.use("layer", function(){
            layer.msg(msg);
        });
    };

    $.OpenNewUrl = function(url){
        window.location.href = url;
    };

    // $.LoadHeader = function(){
    //     $.ajax({
    //         type:"post",
    //         url:"/index.php/gjcf/userinfo/getheaderuserinfo",
    //         async:true,
    //         dataType:"json",
    //         success:function(data){
    //             var ajaxdata = eval("(" + data + ")");
    //             $("#header_username").text(ajaxdata.username);
    //             $("#header_userid").text(ajaxdata.userid);
    //             $("#header_usableydc").text(ajaxdata.usableydc);
    //             $("#header_freezenydc").text(ajaxdata.freezenydc);
    //         }
    //     });
    // }
    // $(window).onload(function(){
    // });


    $("#login_login").click(function () {
        var username = $("#login_username").val();
        var password = $("#login_password").val();
        var capcha = $("#login_capcha").val();
        $.ajax({
            type: "post", //提交方式
            url: "/index.php/gjcf/login/login", //路径
            async: false,
            dataType:"json",
            //参数
            data: {
                username:username,
                password:password,
                capcha:capcha
            },

            //返回普通的字符流不要写 dataType : "json"
            success: function (data) {
                data = eval("(" + data + ")");
                $.ShowMsg(data.msg);
                switch(data.code){
                    case 0:
                        window.global_username = data.username;
                        window.global_userid = data.userid;
                        window.global_usableydc = data.usableydc;
                        window.global_freezenydc = data.freezenydc;
                        $.OpenNewUrl("/index.php/gjcf/index/index");
                        break;
                    default:
                        var img = document.getElementById("login_capcha_img");
                        img.src = "/index.php/captcha?id=" + Math.random();
                        $("#login_capcha").val("");
                        break;
                }
            },
            error: function (hd, msg) {
                $.ShowMsg(msg);
            }
        });
    });

    // <input type="submit" value="获取验证码" id="forgetpassword_gettelidentify" formaction="{:url('gjcf/forgetpassword/gettelidentify')}" /><br />
    //     输入手机验证码 <input type="text" name="telidentify" /><br />
    //     新密码 <input type="text" name="newpassword" /><br />
    //     <input type="submit" value="确定" id="forgetpassword_newpasswordok" formaction="{:url('gjcf/forgetpassword/newpasswordok')}" name="confirm"/>

    $("#forgetpassword_gettelidentify").click(function(){
        var username = $("#forgetpassword_username").val();
        var tel = $("#forgetpassword_tel").val();
        $.ajax({
            type:"post",
            url:"/index.php/gjcf/forgetpassword/gettelidentify",
            async:true,
            dataType:"json",
            data:{
                username:username,
                tel:tel
            },
            success:function(data){
                data = eval("(" + data + ")");
                $.ShowMsg(data.msg);
            },
            error:function(hd, msg){
                $.ShowMsg(msg);
            }
        });
    });

    $("#forgetpassword_newpasswordok").click(function(){
        var telidentify = $("#forgetpassword_telidentify").val();
        var newpassword = $("#forgetpassword_newpasswordok").val();
        $.ajax({
            type:"post",
            url:"/index.php/gjcf/forgetpassword/newpasswordok",
            async:true,
            dataType:"json",
            data:{
                telidentify:telidentify,
                newpassword:newpassword
            },
            success:function(data){
                data = eval("(" + data + ")");
                $.ShowMsg(data.msg);
                switch(data.code){
                    case 0: //password update success,then jump to index
                        $.OpenNewUrl("/index.php/gjcf/index/index");
                        break;
                    default:
                        break;
                }
            },
            error:function(hd, msg){
                $.ShowMsg(msg);
            }
        });
    });

    $("#signup_signup").click(function(){
        var username = $("#signup_username").val();
        var password = $("#signup_password").val();
        var tel = $("#signup_tel").val();
        var referee = $("#signup_referee").val();
        var capcha = $("#signup_capcha").val();
        $.ajax({
            type:"post",
            url:"/index.php/gjcf/signup/signup",
            async:true,
            dataType:"json",
            data:{
                username:username,
                password:password,
                tel:tel,
                referee:referee,
                capcha:capcha
            },
            success:function(data){
                data = eval("(" + data + ")");
                $.ShowMsg(data.msg);
                switch(data.code){
                    case 0: //sign successful,jump to login
                        $.OpenNewUrl("/index.php/gjcf/login/index");
                        break;
                    default: //refresh capcha
                        var img = document.getElementById("signup_capcha_img");
                        img.src = "/index.php/captcha?id=" + Math.random();
                        $("#signup_capcha").val("");
                        break;
                }
            },
            error:function(hd, msg){
                $.ShowMsg(msg);
            }
        });
    });

    $("#charge_ok").click(function(){
        var ydc = $("#charge_ydc").val();
        $.ajax({
            type:"post",
            async:true,
            url:"/index.php/gjcf/charge/charge",
            dataType:"json",
            data:{
                ydc:ydc
            },
            success:function(data){
                data = eval("(" + data + ")");
                $.ShowMsg(data.msg);
                switch(data.code){
                    case 0:
                        break;
                    default:
                        break;
                }
            }
        });
    });

    $("#withdraw_ok").click(function(){
        var ydc = $("#withdraw_ydc").val();
        $.ajax({
            type:"post",
            async:true,
            url:"/index.php/gjcf/withdraw/withdraw",
            dataType:"json",
            data:{
                ydc:ydc
            },
            success:function(data){
                data = eval("(" + data + ")");
                $.ShowMsg(data.msg);
                switch(data.code){
                    case 0:
                        break;
                    default:
                        break;
                }
            }
        });
    });



    $("#accountinfo_getaccountinfotelidentify").click(function(){
        sendCode(document.getElementById("accountinfo_getaccountinfotelidentify"));
        $.ajax({
            type:"post",
            async:true,
            url:"/index.php/gjcf/accountinfo/gettelidentify",
            dataType:"json",
            success:function(data){
                data = eval("(" + data + ")");
                $.ShowMsg(data.msg);
                switch(data.code){
                    case 0:
                        break;
                    default:
                        break;
                }
            }
        });
    });

    $("#accountinfo_save").click(function(){
        var name = $("#accountinfo_name").val();
        var alipaynum = $("#accountinfo_alipaynum").val();
        var telidentify = $("#accountinfo_telidentify").val();
        $.ajax({
            type:"post",
            async:true,
            url:"/index.php/gjcf/accountinfo/saveaccountinfo",
            dataType:"json",
            data:{
                name:name,
                alipaynum:alipaynum,
                telidentify:telidentify
            },
            success:function(data){
                data = eval("(" + data + ")");
                $.ShowMsg(data.msg);
                switch(data.code){
                    case 0:
                        break;
                    default:
                        break;
                }
            }
        });
    });

    $("#fixpassword_ok").click(function(){
        var oldpassword = $("#fixpassword_oldpassword").val();
        var newpassword = $("#fixpassword_newpassword").val();
        $.ajax({
            type:"post",
            async:true,
            url:"/index.php/gjcf/fixpassword/fixpassword",
            dataType:"json",
            data:{
                oldpassword:oldpassword,
                newpassword:newpassword
            },
            success:function(data){
                data = eval("(" + data + ")");
                $.ShowMsg(data.msg);
                switch(data.code){
                    case 0:
                        $.OpenNewUrl("/index.php/gjcf/login/index");
                        break;
                    default:
                        break;
                }
            }
        });
    });

    $("#login_forgetpassword").click(function(){
        $.OpenNewUrl("/index.php/gjcf/forgetpassword/index");
    });

    $("#login_signup").click(function(){
        $.OpenNewUrl("/index.php/gjcf/signup/index");
    });



    $("#header_project").click(function(){
        $.OpenNewUrl("/index.php/gjcf/index/index");
        // GetProject();
    });
    $("#header_investrecord").click(function(){
        $.OpenNewUrl("/index.php/gjcf/investrecord/index");
    });
    $("#header_charge").click(function(){
        // $.OpenNewUrl("/index.php/gjcf/charge/index");
        $.ajax({
            type:"post",
            async:true,
            url:"/index.php/gjcf/charge/index",
            dataType:"json",

            success:function(data){
                data = eval("(" + data + ")");
                switch(data.code){
                    case 0:
                        window.location.href = "index.php"
                        break;
                    case 103:
                        layui.use('layer', function(){
                            layer.open({
                                type: 1 //此处以iframe举例
                                ,title: 'Error'
                                ,area: ['200px', '100px']
                                ,shade: 0
                                ,maxmin: true
                                ,content: '账户未设置，是否去设置？'
                                ,btn: ['设置账户', '取消'] //只是为了演示
                                ,yes: function(){
                                    $.OpenNewUrl("/index.php/gjcf/accountinfo/index");
                                }
                                ,btn2: function(){
                                    layer.closeAll();
                                }
                                ,zIndex: layer.zIndex //重点1
                                ,success: function(layero){
                                    layer.setTop(layero); //重点2
                                }
                            });
                        });
                        break;
                    default:
                        break;
                }
            }
        });

    });
    $("#header_withdraw").click(function(){
        $.OpenNewUrl("/index.php/gjcf/withdraw/index");
    });
    $("#header_ydcrecord").click(function(){
        $.OpenNewUrl("/index.php/gjcf/ydcrecord/index");
    });
    $("#header_fixaccountinfo").click(function(){
        $.OpenNewUrl("/index.php/gjcf/accountinfo/index");
    });
    $("#header_fixpassword").click(function(){
        $.OpenNewUrl("/index.php/gjcf/fixpassword/index");
    });
    $("#header_myteam").click(function(){
        $.OpenNewUrl("/index.php/gjcf/team/index");
    });
    $("#header_systemad").click(function(){
        alert("systemad");
    });

});


// (function ($) {
//     $.getUrlParam = function (name) {
//         var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
//         var r = window.location.search.substr(1).match(reg);
//         if (r != null) return unescape(r[2]); return null;
//     }
// })(jQuery);

function GetWithdrawYdc(){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("withdrawydc").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", "/index.php/gjcf/withdraw/getwithdrawydc");
    xmlhttp.send();
}
/*
 echo '<caption>'.$project->caption.'</caption>';
 echo '<investydc>'.$project->investydc.'</investydc>';
 echo '<profitydc>'.$project->profitydc.'</profitydc>';
 echo '<curinvest>'.$project->curinvest.'</curinvest>';
 echo '<remaininvest>'.$project->remaininvest.'</remaininvest>';

 */
// function GetProject(){
//
//     layui.use(['layer', 'table', 'laypage'], function(){
//         var layer =layui.layer;
//         var table = layui.table;
//         var laypage = layui.laypage;
//         var tableIns = table.render({
//             elem: '#userList',
//             url : '/index.php/gjcf/index/getproject',
//             cellMinWidth : 95,
//             page : true,
//             height : "full-125",
//             limits : [10,15,20,25],
//             limit : 10,
//             id : "userListTable",
//             cols : [[
//                 {field: 'caption', title: '投资项目', minWidth:100, align:"center"},
//                 {field: 'investydc', title: '投资额度', minWidth:200, align:'center'},
//                 {field: 'profitydc', title: '收益', align:'center'},
//                 {field: 'remaininvest', title: '剩余额度',  align:'center'},
//                 {title: '操作', minWidth:175, templet:'#userListBar',fixed:"right",align:"center"}
//             ]]
//         });
//     });
// }

function ChargeConfirmSuccess(chargeid){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("chargeconfirmok"+chargeid).disabled = "disabled";
            document.getElementById("chargeconfirmcancel"+chargeid).disabled = "disabled";
        }
    };
    xmlhttp.open("POST", "/index.php/gjcf/chargeconfirm/chargeconfirmsuccess?chargeid="+chargeid);
    xmlhttp.send();
}

function ChargeConfirmFailed(chargeid){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("chargeconfirmok"+chargeid).disabled = "disabled";
            document.getElementById("chargeconfirmcancel"+chargeid).disabled = "disabled";
        }
    };
    xmlhttp.open("POST", "/index.php/gjcf/chargeconfirm/chargeconfirmfailed?chargeid="+chargeid);
    xmlhttp.send();
}

function WithdrawConfirmSuccess(withdrawid){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("withdrawconfirmok"+withdrawid).disabled = "disabled";
            document.getElementById("withdrawconfirmcancel"+withdrawid).disabled = "disabled";
        }
    };
    xmlhttp.open("POST", "/index.php/gjcf/withdrawconfirm/withdrawconfirmsuccess?withdrawid="+withdrawid);
    xmlhttp.send();
}

function WithdrawConfirmFailed(withdrawid){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("withdrawconfirmok"+withdrawid).disabled = "disabled";
            document.getElementById("withdrawconfirmcancel"+withdrawid).disabled = "disabled";
        }
    };
    xmlhttp.open("POST", "/index.php/gjcf/withdrawconfirm/withdrawconfirmfailed?withdrawid="+withdrawid);
    xmlhttp.send();
}


// function Login(username, password, capcha){
//     $.ajax({
//         type : "post", //提交方式
//         url : "/index.php/gjcf/login/login", //路径
//         contentType:"application/json",
//         async:true,
//         //参数
//         data : {
//             username : username,
//             password : password,
//             capcha : capcha
//         },
//         cache : false,
//
//         //返回普通的字符流不要写 dataType : "json"
//         success : function(data) {
//             alert(data);
//         },
//         error:function(){
//             alert("error");
//         },
//
//     });
//
// }
//
var clock="";
var nums = 120;
var btn;

function sendCode(thisBtn) {
    btn = thisBtn;
    btn.disabled = true; //将按钮置为不可点击
    btn.value = nums+'秒后可重新获取';
    clock = setInterval(doLoop, 1000); //一秒执行一次
}
function doLoop() {
    nums--;
    if(nums > 0){
        btn.value = nums+'秒后可重新获取';
    }else{
        clearInterval(clock); //清除js定时器
        btn.disabled = false;
        btn.value = '点击发送验证码';
        nums = 120; //重置时间
    }
}


