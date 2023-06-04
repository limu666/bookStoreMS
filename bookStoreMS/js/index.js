/* Author：李牧 sno:224720054*/

// 点击全部信息则显示
function btn(){
    $(".all_infos").css("display","block");
    $(".all_infos").css("height","355px");
}

function on(){
    $(".all_infos").css("display","none");
}

// 获取屏幕大小 使字体随窗口大小而改变

var docEl = document.documentElement;
function setRemUnit () {
    var rem = docEl.clientWidth / 19.2; // 可根据不同电脑分辨率进行手动修改（如1920*1080 为19.2
    docEl.style.fontSize = rem + 'px';
}
window.onload = function(){
    var hei = docEl.clientHeight;
    $("iframe").css("height",hei - 180+"px");
    $(".nav").css("height",hei - 137 +"px");
    $("#mid").css("height",hei - 137 +"px");
}

//iframe自适应
function resizeIframe(iframe) {
    iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
    $("iframe").css({"height": iframe.contentWindow.document.body.scrollHeight + 'px',
                    "width": "100%"})
}

setRemUnit()

window.addEventListener('resize', setRemUnit)
window.addEventListener('pageshow', function (e) {
    if (e.persisted) {
        setRemUnit()
    }
})


