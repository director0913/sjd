(function (doc, win) {
    var docEl = doc.documentElement,
        resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
        recalc = function () {
            var clientWidth = docEl.clientWidth;
            if (!clientWidth) return;
            if (clientWidth >= 640) {
                docEl.style.fontSize = '100px';
            } else {
                docEl.style.fontSize = 100 * (clientWidth / 750) + 'px';
            }
        };
    if (!doc.addEventListener) return;
    win.addEventListener(resizeEvt, recalc, false);
    doc.addEventListener('DOMContentLoaded', recalc, false);
})(document, window);

window.onload = function () {
    /* 倒计时 */
   
    /* 帮TA一下*/
    var OLbtn1 = document.getElementById("btn1");
    var OLbtn2 = document.getElementById("btn2");
    var OLtishi = document.getElementById("tishi");
    var OLint = document.getElementById("int");
    var OLcanjia = document.getElementById("canjia");
    var OLx = document.getElementById("x");
    var OLspn2 = document.getElementById("spn2");
    var OLguanzhu = document.getElementById("guanzhu");
    var OLfanhui = document.getElementById("fanhui");
    var OLint8 = document.getElementById("int8");
    var OLint9 = document.getElementById("int9");
    var OLyouqingbang = document.getElementById("youqingbang");
    var OLkanjiabang = document.getElementById("kanjiabang");
    /* 帮TA一下 */
    OLbtn1.onclick = function () {
        OLtishi.style.display = "block"
    };
    OLint.onclick = function () {
        OLtishi.style.display = "none"
    };
    /* 我要参加 */
    OLbtn2.onclick = function () {
        OLcanjia.style.display = "block"
    };
    OLx.onclick = function () {
        OLcanjia.style.display = "none"
    };
    /* 关注 */
    OLspn2.onclick = function () {
        OLguanzhu.style.display = "block"
    };
    OLfanhui.onclick = function () {
        OLguanzhu.style.display = "none"
    };
    /* 邀请榜 */
    OLint8.onclick = function () {
        OLkanjiabang.style.display = "block";
        OLyouqingbang.style.display = "none"
    };
    /* 砍价榜 */
    OLint9.onclick = function () {
        OLkanjiabang.style.display = "none";
        OLyouqingbang.style.display = "block"
    };
};

$(document).ready(function () {
    /*返回顶部*/
    $("#lifei-top").hide();
    $(function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() > 400) {
                $("#lifei-top").fadeIn(500);
            }
            else {
                $("#lifei-top").fadeOut(500);
            }
        });
        $("#lifei-top").click(function () {
            $('body,html').animate({scrollTop: 0}, 400);
            return false;
        });
    });

    $(".lifei_bleft").click(function () {
        $(".lifei_maskWrap").fadeIn();
    });
    $(".lifei_close").click(function () {
        $(".lifei_maskWrap").fadeOut();
    });

    /*music*/
    var musicBtn = $(".lifei_music");
    musicBtn.addClass("xuanzhuan");
    var music = document.getElementById("lifei_adMusic");
    musicBtn.click(function () {
        if (music.paused) {
            music.play();
            musicBtn.addClass("xuanzhuan");
        } else {
            music.pause();
            musicBtn.removeClass("xuanzhuan");
        }
    });
    function autoPlay() {
        time = setInterval(function () {
            $("#lifei_share").toggleClass("shake")
        }, 2500);
    }

    autoPlay();

});