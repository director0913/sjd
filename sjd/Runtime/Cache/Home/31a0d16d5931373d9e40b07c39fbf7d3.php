<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, user-scalable=no"/>
    <title>分销</title>
    <link rel="stylesheet" href="/Public/fenxiao/css/rset.css"/>
    <link rel="stylesheet" href="/Public/fenxiao/css/swiper-4.2.2.min.css"/>
    <link rel="stylesheet" href="/Public/fenxiao/css/index.css"/>
    <script src="/Public/fenxiao/js/swiper-4.2.2.min.js"></script>
    <script src="/Public/fenxiao/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/fenxiao/js/index.js"></script>
    <script type="text/javascript">
    	var intDiff = parseInt(<?php echo $res['end_at']-time()?>);//倒计时总秒数量
	    function timer(intDiff) {
	        window.setInterval(function () {
	            var
	                day = 0,
	                hour = 0,
	                minute = 0,
	                second = 0;//时间默认值
	            if (intDiff > 0) {
	                day = Math.floor(intDiff / 86400);
	                hour = Math.floor((intDiff-day*86400) / (60 * 60));
	                minute = Math.floor((intDiff-day*86400-hour*3600) / 60);
	                second = Math.floor(intDiff-day*86400-hour*3600-minute*60);
	            }
	            if (day <= 9) day = '0' + day;
	            if (hour <= 9) hour = '0' + hour;
	            if (minute <= 9) minute = '0' + minute;
	            if (second <= 9) second = '0' + second;
	            $('#day_show').html('<s></s>' + day + "天");
	            $('#hour_show').html('<s></s>' + hour + "时");
	            $('#minute_show').html('<s></s>' + minute + "分");
	            $('#second_show').html('<s></s>' + second + "秒");
	            intDiff--;
	        }, 1000);
	    }

	    $(function () {
	        timer(intDiff);
	    });

    </script>
</head>
<body>
<!-- banner -->
<div class="lifei-banner">
    <div class="swiper-container" id="lf">
        <div class="swiper-wrapper">
        	<?php if(is_array($res["images"])): foreach($res["images"] as $k=>$vo): ?><div class="swiper-slide">
	                <img src="<?php echo ($vo); ?>" alt=""/>
	            </div><?php endforeach; endif; ?>
        </div>

    </div>
</div>
<!-- 活动结束时间 -->
<div class="lifei-jieshu">
    <div class="lifei-jieshu-top">
        <div class="lifei-jieshu-top-left">
            <img src="<?php echo ($res["title_img"]); ?>" alt=""/>
        </div>
        <div class="lifei-jieshu-top-right">
            <p><?php echo ($res["title"]); ?></p>
            <img src="/Public/fenxiao/images/xiaotu2.png" alt=""/>
        </div>
    </div>
    <div class="lifei-jieshu-bottom">
        <p>距 离 活 动 结 束 还 有</p>

        <div class="lifei-time-item">
            <strong class="hour_show" id="day_show">00天</strong>
            <strong class="hour_show" id="hour_show">00时</strong>
            <strong class="hour_show" id="minute_show">00分</strong>
            <strong class="hour_show" id="second_show">00秒</strong>
        </div>
    </div>
</div>
<!-- 砍价 -->
<div class="lifei-kanjia">
    <div class="lifei-kanjia1">
        <div class="lifei-kanjia2">
            <div class="lifei-kanjia2-top">
                <img src="/Public/fenxiao/images/kanjia1.jpg" alt=""/>
            </div>
            <div class="lifei-kanjia2-center">
                <img src="/Public/fenxiao/images/kanjia2.png" alt=""/>

                <p>已有9人帮何美眉砍价</p>
            </div>
            <div class="lifei-kanjia2-bottom">
                <input class="lifei-btn1" id="btn1" type="button" value="帮TA一下"/>
                <input class="lifei-btn2" id="btn2" type="button" value="我要参加"/>
            </div>
            <div class="lifei-jiazai">
                <div class="lifei-left">
                    <img src="/Public/fenxiao/images/jiazai1.jpg" alt=""/>
                </div>
                <div class="lifei-center">
                    <span>隋岺岄573</span>

                    <p>生活处处有惊喜</p>
                </div>
                <div class="lifei-right">
                    <span>2018-04-13 15:25</span>

                    <p>砍了<i class="lifei-wu" style="color: red"> 33.24 </i>元</p>
                </div>

            </div>
            <div class="lifei-jiazai">
                <div class="lifei-left">
                    <img src="/Public/fenxiao/images/jiazai2.jpg" alt=""/>
                </div>
                <div class="lifei-center">
                    <span>黄翰斌</span>

                    <p>不谢、我就是这么低调</p>
                </div>
                <div class="lifei-right">
                    <span>2018-04-13 15:25</span>

                    <p>砍了<i class="lifei-wu" style="color: red"> 45.6 </i>元</p>
                </div>

            </div>
            <div class="lifei-jiazai">
                <div class="lifei-left">
                    <img src="/Public/fenxiao/images/jiazai3.jpg" alt=""/>
                </div>
                <div class="lifei-center">
                    <span>Elaine（小幺）</span>

                    <p>光明正大的砍你！</p>
                </div>
                <div class="lifei-right">
                    <span>2018-04-13 13:32</span>

                    <p>砍了<i class="lifei-wu" style="color: red"> 48.68 </i>元</p>
                </div>
            </div>
            <div class="lifei-dianji">
                <p>+</p>
                <span>点击查看更多</span>
            </div>
        </div>
    </div>
    <!-- 商品描述 -->
    <div class="lifei-shangpin">
        <div class="lifei-shangpin1">
            <div class="lifei-miaoshu">
                <img src="/Public/fenxiao/images/sahngpin.png" alt=""/>
            </div>
            <div class="lifei-shengyu">
                <span>本期商品<i style="color: red"> <?php echo ($res["commodity_num"]); ?></i>份 剩余 <i style="color: red"> 100 </i> 份</span>

                <p>抢抢抢！本次活动真实有效，机不可失失不再来！！！</p>
                <img src="/Public/fenxiao/images/shangpin1.png" alt=""/>
                <img src="/Public/fenxiao/images/shangoin2.png" alt=""/>
                <img src="/Public/fenxiao/images/shangoin3.png" alt=""/>
                <img src="/Public/fenxiao/images/sahngoin4.png" alt=""/>
            </div>
        </div>
    </div>
    <!-- 店家优惠 -->
    <div class="lifei-youhui">
        <div class="lifei_top">
            <img src="/Public/fenxiao/images/youhui.png" alt=""/>
        </div>
        <div class="lifei_bottom_left">
            <img src="/Public/fenxiao/images/youhui1.png" alt=""/>

            <p>2019.4.31日前到店的客户都免费参与一次砸金蛋赢大礼活动</p>
            <span>老生转介绍，新生和老生课程均享五折优惠！</span>
        </div>
    </div>
    <!-- 活动详情 -->
    <div class="lifei-huodong">
        <div class="lifei-huodong1">
            <div class="lifei-xiangqing_top">
                <img src="/Public/fenxiao/images/huodong.png" alt=""/>
            </div>
            <div class="lifei-xaingqing_center">
                <p>1.点击上方“我要参加”参加活动。</br>
                    2.点击“我要砍价”按钮帮助自己砍价。</br>
                    3.点击“找人帮忙”按钮找好友帮忙砍价。</br>
                    4.奖品份数有限，达标就会减少一份，份数领完则无法继续报名，亲速度哦！</br>
                    5.完成后，马上联系商家兑奖吧。</br>
                    6.邀请好友报名成功，赢取奖励金，邀请越多，奖励越多。活动结束后，联系商家领取邀请奖励。</p>
                <img src="/Public/fenxiao/images/huodong1.png" alt=""/>
                <img src="/Public/fenxiao/images/huodong2.jpg" alt=""/>
            </div>
        </div>
    </div>
    <!-- 机构介绍 -->
    <div class="lifei-jigou">
        <div class="lifei-jigou1">
            <div class="lifei-jieshao">
                <img src="/Public/fenxiao/images/jigou.png" alt=""/>
            </div>
            <div class="lifei-jiaoyu">
                <h5>夏加儿美术教育机构</h5>
                <img src="/Public/fenxiao/images/jigou1.png" alt=""/>

                <p>
                    夏加儿美术教育机构，成立于2015年，是夏加儿美术教育品牌连锁基地，现有东沙校区，肤施路校区，高新校区，二街校区和西沙校区五个校区，校区面积达2500多平米，是目前榆林市档次最高，专业性最强、影响力最广的少儿美术教育机构。
                    <br><br>
                    校区专为3—18岁学习视觉艺术的少儿开设绘画涂鸦、游戏、创想、创意、创作写生、版画、素描、高考强化、色彩、国画、油画、书法、手工、陶艺、国际动漫等课程。所有课程安排均按照艺术院校的科目架构设置，以先进的教学理念，规范系统的教学和国际化视野培养中国少年儿童步入一个丰沛、睿智的艺术人生。
                </p>
                <img src="/Public/fenxiao/images/jigou2.jpg" alt=""/>
                <img src="/Public/fenxiao/images/jigou3.jpg" alt=""/>
                <img src="/Public/fenxiao/images/jigou4.jpg" alt=""/>
            </div>
            <div class="lifei-fengcai">
                <h5>我们的风采</h5>
                <img src="/Public/fenxiao/images/jigou5.jpg" alt=""/>
                <img src="/Public/fenxiao/images/jigou6.jpg" alt=""/>
                <img src="/Public/fenxiao/images/jigou8.png" alt=""/>
            </div>
        </div>
    </div>
    <!-- 砍 -->
    <div class="lifei-lf">
        <div class="lifei-lf1">
            <div class="lifei-yaoqing">
                <input id="int8" class="lifei-btn3" type="button" value="砍价榜"/>
                <input id="int9" class="lifei-btn4" type="button" value="邀请榜"/>
            </div>
    <!-- 砍价榜 -->
            <div class="lifei-kanjiabang" id="kanjiabang">
                <ul>
                    <li><p>排名</p></li>
                    <li><p>头像</p></li>
                    <li><p>姓名</p></li>
                    <li><p>当前价格</p></li>
                    <li><p>邀请总数</p></li>
                </ul>
                <div class="lifei-wy">
                    <div class="san">1</div>
                    <img src="/Public/fenxiao/images/kanjiabang.jpg" alt=""/>

                    <p>何*眉</p>
                    <span>99元<i>未支付</i></span>

                    <p class="p">463</p>
                </div>
                <div class="lifei-wy">
                    <div class="san" style="background: #E95513">2</div>
                    <img src="/Public/fenxiao/images/kanjaibang1.jpg" alt=""/>

                    <p>李*敏</p>
                    <span>852元<i>未支付</i></span>

                    <p class="p">1</p>
                </div>
                <div class="lifei-wy">
                    <div class="san" style="background: #036EB7">3</div>
                    <img src="/Public/fenxiao/images/kanjiabang2.jpg" alt=""/>

                    <p>中*头</p>
                    <span>852元<i>未支付</i></span>

                    <p class="p">0</p>
                </div>
                <div class="lifei-wy">
                    <div class="san1">4</div>
                    <img src="/Public/fenxiao/images/kanjiabang3.jpg" alt=""/>

                    <p>奥*曼</p>
                    <span>854元<i>未支付</i></span>

                    <p class="p">1</p>
                </div>
            </div>
    <!-- 邀请榜 -->
            <div class="lifei-youqingbang" id="youqingbang">
                <ul>
                    <li><p>排名</p></li>
                    <li><p>头像</p></li>
                    <li><p>姓名</p></li>
                    <li><p>当前价格</p></li>
                    <li><p>邀请总数</p></li>
                </ul>
                <div class="lifei-wy">
                    <div class="san">1</div>
                    <img src="/Public/fenxiao/images/kanjiabang.jpg" alt=""/>

                    <p>何*眉</p>
                    <span>99元<i>未支付</i></span>

                    <p class="p">463</p>
                </div>
                <div class="lifei-wy">
                    <div class="san" style="background: #E95513">2</div>
                    <img src="/Public/fenxiao/images/yaoqing1.jpg" alt=""/>

                    <p>李*敏</p>
                    <span>852元<i>未支付</i></span>

                    <p class="p">1</p>
                </div>
                <div class="lifei-wy">
                    <div class="san" style="background: #036EB7">3</div>
                    <img src="/Public/fenxiao/images/yaoqing.jpg" alt=""/>

                    <p>中*头</p>
                    <span>852元<i>未支付</i></span>

                    <p class="p">0</p>
                </div>
                <div class="lifei-wy">
                    <div class="san1">4</div>
                    <img src="/Public/fenxiao/images/yaoqing3.jpg" alt=""/>

                    <p>奥*曼</p>
                    <span>854元<i>未支付</i></span>

                    <p class="p">1</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 帮TA一下 -->
<div class="lifei-tishi" id="tishi">
    <div class="lifei-yibang">
        <p>提示</p>
        <span>TA已砍价至低价</span>

        <div class="lifei-zhidao">
            <input class="lifei-int" id="int" type="button" value="我知道了"/>
        </div>
    </div>
</div>
<!-- 我要参加 -->
<div class="lifei-canjia" id="canjia">
    <div class="lifei-woyao">
        <img src="/Public/fenxiao/images/canjia.png" alt=""/>

        <p id="x">X</p>
        <input id="int1" type="text" placeholder="请输入姓名"/>
        <input id="int2" type="text" placeholder="请输入手机号"/>
        <input id="int3" class="lifei-int3" type="button" value="提交"/>
        <span class="lifei-spn1">我已报名，回到</span>
        <span class="lifei-spn2" id="spn2">我的主页</span>
    </div>
</div>
<!-- 关注 -->
<div class="lifei-guanzhu" id="guanzhu">
    <div class="lifei-shangjia">
        <div class="lifei-shangjia_top">
            <div class="lifei-fanhui" id="fanhui">X</div>
            <input class="int4" type="text" placeholder="请输入报名时的手机号码"/>
            <input class="int5" type="button" value="确定"/>
        </div>
        <div class="lifei-shangjia_bottom">
            <p>关注商家公众号再也不怕拍不到物品</p>
            <img src="/Public/fenxiao/images/fanhui1.png" alt=""/>
            <img class="lifei-zhiwen" src="/Public/fenxiao/images/fanhui2.png" alt=""/>
            <span>长按识别二维码</span>
        </div>
    </div>
</div>
<!-- 音乐 -->
<div class="lifei_music">
    <img id="lifei_musicBtn" src="/Public/fenxiao/images/SVG/yinyue.svg">
    <audio id="lifei_adMusic" src="/Public/fenxiao/images/Dragon%20Pig%20-%20全部都是你.flac" autoplay loop></audio>
</div>
<!-- 返回顶部 -->
<div id="lifei-top">
    <img class="fan" src="/Public/fenxiao/images/fan.gif">
</div>
<!-- 左边四个 -->
<div class="lifei_topWord lifei_ts" style="line-height: 50px;">投诉</div>
<div id="lifei_share" class="lifei_topWord lifei_fx animated shake" style="line-height: 50px;">分享</div>
<div class="lifei_topWord lifei_lx">联系商家</div>
<div class="lifei_topWord lifei_yq">邀请规则</div>
<script>
    var mySwiper = new Swiper('#lf', {
        loop: true,
        speed: 300,
        autoplay: {
            delay: 3000
        },
        grabCursor: true
    });
</script>
</body>
</html>