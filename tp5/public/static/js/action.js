

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
        url:"/index.php/gjcf/utility/islogin",
        async:true,
        dataType:"json",
        success:function(data){
            data = eval("(" + data + ")");
            switch(data.code){
                case 0:
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
                    break;
                case 102:
                    break;
            }
        },
        error:function(hd, msg){
            $.ShowMsg(msg);
        }
    });

    function IsLogin(){
        var returnCode = 0;
        $.ajax({
            type:"post",
            url:"/index.php/gjcf/utility/islogin",
            async:false,
            dataType:"json",
            success:function(data){
                data = eval("(" + data + ")");
                switch(data.code){
                    case 0:
                        returnCode = 0;
                        break;
                    default:
                        returnCode = data.code;
                        break;
                }
            },
            error:function(hd, msg){
                $.ShowMsg(msg);
            }
        });
        return returnCode;
    }

    function IsPoneAvailable(str) {
        var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
        if (!myreg.test(str)) {
            return false;
        } else {
            return true;
        }
    }
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
            async: true,
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
                switch(data.code){
                    case 0: //success
                        window.global_username = data.username;
                        window.global_userid = data.userid;
                        window.global_usableydc = data.usableydc;
                        window.global_freezenydc = data.freezenydc;
                        $.OpenNewUrl("/index.php/gjcf/index/index");
                        break;
                    case 1:
                        $.OpenNewUrl("/index.php/gjcf/admin/index");
                        break;
                    case 100:
                        $.ShowMsg(data.msg);
                        break;
                    case 300: //captcha
                        $.ShowMsg(data.msg);
                        document.getElementById("login_captcha_img").click();
                        // document.getElementById()
                        // img.src = "/index.php/captcha?id=" + Math.random();
                        // $("#login_capcha").val("");
                        break;
                    case 301: //username or password
                        $.ShowMsg(data.msg);
                        $("#login_username").val("");
                        $("#login_password").val("");
                        var img = document.getElementById("login_captcha_img");
                        img.src = "/index.php/captcha?id=" + Math.random();
                        $("#login_capcha").val("");
                        break;
                    default:
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

    $("#forgetpassword_login").click(function(){
        $.OpenNewUrl("/index.php/gjcf/login/index");
    });

    $("#signup_signup").click(function(){
        var username = $("#signup_username").val();
        var password = $("#signup_password").val();
        var tel = $("#signup_tel").val();
        var telidentify = $("#signup_telidentify").val();
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
                telidentify:telidentify,
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

    $("#signup_login").click(function(){
        $.OpenNewUrl("/index.php/gjcf/login/index");
    });

    $("#signup_gettelidentify").click(function(){
        var tel = $("#signup_tel").val();
        if(true !== IsPoneAvailable(tel)){
            $.ShowMsg("手机号格式错误");
        }else{
            sendCode(document.getElementById("signup_gettelidentify"));

            $.ajax({
                type:"post",
                url:"/index.php/gjcf/signup/gettelidentify",
                async:true,
                dataType:"json",
                data:{
                    tel:tel
                },
                success:function(data){
                    data = eval("(" + data + ")");
                    switch(data.code){
                        case 0:
                            $.ShowMsg(data.msg);
                            break;
                        default: //refresh capcha
                            break;
                    }
                },
                error:function(hd, msg){
                    $.ShowMsg(msg);
                }
            });
        }
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

    $("#header_sign").click(function(){
        if(0 === IsLogin()){
            $.ajax({
                type:"post",
                async:true,
                url:"/index.php/gjcf/sign/sign",
                dataType:"json",
                success:function(data){
                    data = eval("(" + data + ")");
                    switch(data.code){
                        case 0:
                            $.ShowMsg(data.msg);
                            break;
                        case 104:
                            $.ShowMsg(data.msg);
                            break;
                        default:
                            break;
                    }
                }
            });
        }else{
            $.OpenNewUrl("/index.php/gjcf/login/index");
        }
    });

    $("#header_logout").click(function(){
        if(0 === IsLogin()){
            $.ajax({
                type:"post",
                async:true,
                url:"/index.php/gjcf/logout/logout",
                dataType:"json",
                success:function(data){
                    data = eval("(" + data + ")");
                    switch(data.code){
                        case 0:
                            $.ShowMsg(data.msg);
                            $.OpenNewUrl("/index.php/gjcf/login/index");
                            break;
                        default:
                            break;
                    }
                }
            });
        }else{
            $.OpenNewUrl("/index.php/gjcf/login/index");
        }
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
        $.ajax({
            type:"post",
            async:true,
            url:"/index.php/gjcf/utility/isaccountinfoset",
            dataType:"json",
            success:function(data){
                data = eval("(" + data + ")");
                switch(data.code){
                    case 0:
                        $.OpenNewUrl("/index.php/gjcf/charge/index");
                        break;
                    case 103:
                        layui.use('layer', function(){
                            layer.open({
                                type: 1 //此处以iframe举例
                                ,title: 'Error'
                                ,area: ['200px', '120px']
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
        $.ajax({
            type:"post",
            async:true,
            url:"/index.php/gjcf/utility/isaccountinfoset",
            dataType:"json",
            success:function(data){
                data = eval("(" + data + ")");
                switch(data.code){
                    case 0:
                        $.OpenNewUrl("/index.php/gjcf/withdraw/index");
                        break;
                    case 103:
                        layui.use('layer', function(){
                            layer.open({
                                type: 1 //此处以iframe举例
                                ,title: 'Error'
                                ,area: ['200px', '120px']
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
    $("#header_invite").click(function(){
        $.OpenNewUrl("/index.php/gjcf/invite/index");
    });
    $("#header_systemad").click(function(){
        alert("systemad");
    });
    $("#header_bonus").click(function(){
        $.OpenNewUrl("/index.php/gjcf/bonus/index");
    });

});

function GetInviteUrl(){
    $(function(){
        $.ajax({
            type:"post",
            async:true,
            url:"/index.php/gjcf/invite/getinviteurl",
            dataType:"json",
            success:function(data){
                data = eval("(" + data + ")");
                switch(data.code){
                    case 0:
                        var qrcode = new QRCode(document.getElementById("invite_qrcode"), {
                            width : 300,
                            height : 300
                        });
                        qrcode.makeCode(data.inviteurl);

                        $("#invite_url").html("tp5.com" + data.inviteurl);
                        break;
                    default:
                        break;
                }
            }
        });
    });
}

function GetTeam(){
    $(function(){
        $.ajax({
            type:"post",
            url:"/index.php/gjcf/team/getteam",
            async:true,
            dataType:"xml",
            success:function(data){

                dtree = new dTree('dtree');
                var iconPath = "../../../static/dtree/img/person.gif";
                var iconOpenPath = "../../../static/dtree/img/person.gif";
                var pid = 0;
                var preid = 0;
                var name;

                pid = parseInt($(data).find("myteam").attr("id"));
                preid = parseInt($(data).find("myteam").attr("referee"));
                name = $(data).find("myteam").attr("username")
                dtree.add(pid, preid, name, "", "", "", iconPath, iconOpenPath);

                $(data).find("firstitem").each(function(i){
                    pid = parseInt($(this).attr('id'));
                    preid = parseInt($(this).attr('referee'));
                    name = $(this).attr('username');
                    dtree.add(pid, preid, name, "", "", "", iconPath, iconOpenPath);

                    $(this).find("seconditem").each(function(){
                        pid = parseInt($(this).attr('id'));
                        preid = parseInt($(this).attr('referee'));
                        name = $(this).attr('username')
                        dtree.add(pid, preid, name, "", "", "", iconPath, iconOpenPath);

                        $(this).find("thirditem").each(function(){
                            pid = parseInt($(this).attr('id'));
                            preid = parseInt($(this).attr('referee'));
                            name = $(this).attr('username')
                            dtree.add(pid, preid, name, "", "", "", iconPath, iconOpenPath);
                        });
                    });
                });
                // $("#team_tree").html(dtree);
                document.getElementById("team_tree").innerHTML = dtree;

                document.getElementById("team_referee").innerHTML = $(data).find("referee").attr("referee");
                document.getElementById("team_onecount").innerHTML = $(data).find("referee").attr("onecount");
                document.getElementById("team_twocount").innerHTML = $(data).find("referee").attr("twocount");
                document.getElementById("team_threecount").innerHTML = $(data).find("referee").attr("threecount");
                document.getElementById("team_today_onecount").innerHTML = $(data).find("referee").attr("todayonecount");




            },
            error:function(hd, msg){
                alert(msg);
        }
        });
    });
    // xmlhttp.onreadystatechange=function()
    // {
    //     if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //     {
    //         myFunction(this);
    //         // document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    //     }
    // };
    //
    // xmlhttp.open("get", "/index.php/gjcf/team/getteam1", true);
    // xmlhttp.setRequestHeader("Content-Type", "text/xml");
    // xmlhttp.send();
}
// function myFunction(xmlHttp){
//     alert(xmlHttp.responseText);
//     var xmlDoc = xmlHttp.responseXML;
//     if(xmlDoc == null)return;
//
//     alert(xmlDoc);
// }


function GetWithdrawYdc(){
    $(function(){
        $.ajax({
            type:"post",
            async:true,
            url:"/index.php/gjcf/withdraw/getwithdrawydc",
            dataType:"json",
            success:function(data){
                data = eval("(" + data + ")");
                switch(data.code){
                    case 0:
                        $("#withdraw_usableydc").html(data.usableydc);
                        $("#withdraw_freezenydc").html(data.freezenydc);
                        break;
                    default:
                        break;
                }
            }
        });
    });
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
var nums = 60;
var btn;

function sendCode(thisBtn) {
    btn = thisBtn;
    btn.disabled = "disabled"; //将按钮置为不可点击
    btn.innerHTML = nums+'秒后可重新获取';
    clock = setInterval(doLoop, 1000); //一秒执行一次
}
function doLoop() {
    nums--;
    if(nums > 0){
        btn.innerHTML = nums+'秒后可重新获取';
    }else{
        clearInterval(clock); //清除js定时器
        btn.disabled = "";
        btn.innerHTML = '点击发送验证码';
        nums = 60; //重置时间
    }
}


