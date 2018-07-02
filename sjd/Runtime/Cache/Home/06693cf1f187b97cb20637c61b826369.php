<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, user-scalable=no"/>
    <link rel="stylesheet" href="/Public/sprout/css/ranking.css"/>
    <script src="/Public/sprout/js/jquery.js"></script>
    <script src="/Public/sprout/js/index.js"></script>
    <title>实时排名</title>
    <script type="text/javascript">
    $(function () {
        $("#list1").click(function(){
            window.location.href="<?php echo U('Home/Sprout/index',array('sprout_id'=>I('get.sprout_id','0')));?>"
        });
        $("#list2").click(function(){
            window.location.href="<?php echo U('home/Sprout/ranking',array('sprout_id'=>I('get.sprout_id','0')));?>"
        });
        $("#list3").click(function(){
            window.location.href="<?php echo U('home/Sprout/win',array('sprout_id'=>I('get.sprout_id','0')));?>"
        })
        $("#list4").click(function(){
            $(".shang").css("display","block")
        })
        $(".shang").click(function(){
            $(".shang").css("display","none")
        })
        $(".shnagc").click(function(){
            $(".shang").css("display","block")
            if(window.event){
                event.cancelBubble  = true;
            }else{
                event.stopPropagation();
            }
        })
    });
</script>
</head>
<body>
<div class="R_box">
    <!-- 活动尚未发布,当前仅供参考-->
    <div class="r_activity">活动尚未发布,当前仅供参考</div>
    <div class="r_time">
        <span class="r_music">
            <div class="bgm-btn rotate" data-event="11205" _tracker_click_="_tracker_click_" style="animation-play-state: paused;">
                <audio loop="" src="/Public/sprout/千秋月国色生香%20-%20林朔.mp3" autoplay="" preload="">
                </audio>
            </div>
        </span>
        <p class="r_timp">投票倒计时： <?php echo ShengYu_Tian_Shi_Fen($res['vote_end_at']);?></p>
        <!--<span></span>-->
    </div>
    <div class="r_contant">
        <img class="r_title" src="/Public/sprout/img/ACgIABAEGAAgvLb_0AUokLOePjD8AjhQ.png" alt=""/>
        <div class="r_main">
            <ul class="r_list">
                <li>排名</li>
                <li style="width: 49%">参赛选手</li>
                <li style="border-right: none">票数</li>
            </ul>
            <div class="r_center">
                <ul>
                    <?php if(is_array($vote)): foreach($vote as $k=>$vo): ?><li>
                            <div class="
                            <?php if($k == 0): ?>rcent1
                            <?php elseif($k == 1): ?> rcent1 rcent2
                            <?php elseif($k == 2): ?> rcent1 rcent3
                            <?php else: ?> rcent4<?php endif; ?>
                            "><?php echo ($k+1); ?></div>
                            <div class="r-phot" style="width: 49%">
                                <img src="<?php echo ($vo["user_img"]); ?>" alt=""/>
                                <p><?php echo ($vo["user_name"]); ?></p>
                            </div>
                            <div class="rpiao"><?php echo ($vo["vote_num"]); ?>票</div>
                        </li><?php endforeach; endif; ?>
                   
                   
                </ul>
            </div>
        </div>
    </div>
    <!--<div class="rwrap">-->
        <!--<p class="r_notime">暂无数据</p>-->
        <!--<p class="r_teil">页面技术由 凡科互动 提供</p>-->
    <!--</div>-->
    <div class="diub">
        <ul class="footer">
            <li id="list1">
                <img src="/Public/sprout/img/shou.png"/>
                <p>首页</p>
            </li>
            <li id="list2">
                <img src="/Public/sprout/img/pai(1).png"/>
                <p style="color: #6c9cff">排行榜</p>
            </li>
            <li id="list3">
                <img src="/Public/sprout/img/ming.png"/>
                <p>活动说明</p>
            </li>
            <li id="list4">
                <img src="/Public/sprout/img/zhu.png"/>
                <p>关注我们</p>
            </li>
        </ul>
    </div>
    <div class="shang">
        <div class="shnagc">
            <img class="ph" src="/Public/sprout/img/caewmA_0.png" alt=""/>
        </div>
    </div>

</div>


</body>
</html>