
var xmlhttp;
if (window.XMLHttpRequest){
    //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
    xmlhttp=new XMLHttpRequest();
} else {
    // IE6, IE5 浏览器执行代码
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

//index
function OpenNewUrl(url) {
    window.open(url);
}

$(function(){

    $("li#match").click(function(){
        GetMatch();
    });
    $("li#investrecord").click(function(){
        OpenNewUrl("/index.php/lol/invest_record/index");
    });
    $("li#charge").click(function(){
        OpenNewUrl("/index.php/lol/charge/index");
    });
    $("li#withdraw").click(function(){
        OpenNewUrl("/index.php/lol/withdraw/index");
    });
    $("li#transfer").click(function(){
        OpenNewUrl("/index.php/lol/transfer/index");
    });
    $("li#transferrecord").click(function(){
        OpenNewUrl("/index.php/lol/transfer_record/index");
    });
    $("li#displaypersoninfo").click(function(){
        OpenNewUrl("/index.php/lol/account_info/index");
    });
    $("li#fixpassword").click(function(){
        OpenNewUrl("/index.php/lol/fix_password/index");
    });
    $("li#fixsecondpassword").click(function(){
        OpenNewUrl("/index.php/lol/fix_second_password/index");
    });

    $("li#xitonggonggao").click(function(){
        alert("xitonggonggao");
    });
});


(function ($) {
    $.getUrlParam = function (name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return unescape(r[2]); return null;
    }
})(jQuery);








