<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, user-scalable=no"/>
    <link rel="stylesheet" href="/Public/sprout/css/win.css"/>
    <script src="/Public/sprout/js/jquery.js"></script>
    <script src="/Public/sprout/js/index.js"></script>
    <title>参与活动</title>
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
<div class="S_box">
    <!-- 活动尚未发布,当前仅供参考-->
    <div class="s_activity">活动尚未发布,当前仅供参考</div>
    <div class="bgm-btn rotate" data-event="11205" _tracker_click_="_tracker_click_" style="animation-play-state: paused;">
        <audio loop="" src="/Public/sprout/千秋月国色生香%20-%20林朔.mp3" autoplay="" preload="">
        </audio>
    </div>
    <div class="s_contant">
        <div class="s_wrap">
            <p class="s_title">活动简介</p>
            <ul class="s_list">
                <li><?php echo ($res["description"]); ?></li>
            </ul>
        </div>
        <div class="s_wrap">
            <p class="s_title">报名时间</p>
            <ul class="s_list">
                <li><?php echo (date("Y年-m月-d日 H:i",$res["start_at"])); ?> - <?php echo (date("Y年-m月-d日 H:i",$res["end_at"])); ?></li><br/>
            </ul>
        </div>
        <div class="s_wrap">
            <p class="s_title">报名须知</p>
            <ul class="s_list">
                <li><?php echo ($res["sign_description"]); ?></li>
            </ul>
        </div>
        <div class="s_wrap">
            <p class="s_title">投票时间</p>
            <ul class="s_list">
                <li><?php echo (date("Y年-m月-d日 H:i",$res["vote_start_at"])); ?> - <?php echo (date("Y年-m月-d日 H:i",$res["vote_end_at"])); ?></li><br/>
            </ul>
        </div>
        <div class="s_wrap">
            <p class="s_title">投票须知</p>
            <ul class="s_list">
                <li><?php echo ($res["vote_description"]); ?></li><br/>
            </ul>
        </div>
        <div class="s_wrap">
            <p class="s_title">主办单位</p>
            <ul class="s_list">
                <li>本次活动主办单位为 <p>笙歌桃花源</p> </li><br/>
            </ul>
        </div>
        <div class="s_wrap">
            <p class="s_title">技术支持</p>
            <ul class="s_list">
                <li>页面技术由 <p>凡科互动</p>技术支持方仅提供页面技术，不承担活动引起的相关法律责任</li><br/>
                <li>
                    <i id="s_complaint">投诉</i>
                    <img class="plaint" src="/Public/sprout/img/tous.png" alt=""/>

                </li>
            </ul>
        </div>
    </div>
    <div class="diub">
        <ul class="footer">
            <li id="list1">
                <img src="/Public/sprout/img/shou.png"/>
                <p>首页</p>
            </li>
            <li id="list2">
                <img src="/Public/sprout/img/pai.png"/>
                <p>排行榜</p>
            </li>
            <li id="list3">
                <img src="/Public/sprout/img/ming(1).png"/>
                <p style="color: #6c9cff">活动说明</p>
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