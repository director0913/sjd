<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, user-scalable=no"/>
    <link rel="stylesheet" href="/Public/sprout/css/defail.css"/>
    <script src="/Public/sprout/js/jquery.js"></script>
    <script src="/Public/sprout/js/layer/layer.js"></script>
    <title>详情</title>
</head>
<body>
<div class="box">
    <div class="activity">活动尚未发布,当前仅供参考</div>
    <!-- 活动尚未发布,当前仅供参考-->
    <div class="bgm-btn rotate" data-event="11205" _tracker_click_="_tracker_click_"
         style="animation-play-state: paused;">
        <audio loop="" src="/Public/sprout/千秋月国色生香%20-%20林朔.mp3" autoplay="" preload="">
        </audio>
    </div>
    <!-- 音乐-->
    <div class="guanb">
        <img class="guanbImg" src="/Public/sprout/img/guanb.png" alt=""/>
    </div>
    <div class="r_time">
        <p class="r_timp">投票倒计时： <?php echo ShengYu_Tian_Shi_Fen($sprout['vote_end_at']);?></p>
    </div>
    <div class="center">
        <div class="center-head">
            <div class="toux"><img src="<?php echo ($res["user_img"]); ?>" alt=""/></div>
            <div class="center-div"><?php echo ($res["sign_id"]); ?>号</div>
            <div class="center-div1">
                <div>我是<?php echo ($res["title"]); ?></div>
                <div><?php echo ($res["vote_num"]); ?>票</div>
            </div>
        </div>
        <div class="center-cen"><?php echo ($res["title"]); ?></div>
        <div class="center-ge">
            <?php if(is_array($res["img"])): foreach($res["img"] as $k=>$vo): ?><div class="center-ge-di">
                <img src="<?php echo ($vo); ?>"/>
            </div><?php endforeach; endif; ?>
        </div>
    </div>
    <p class="head-bott">页面技术由凡客互动提供</p>
    <div class="kong"></div>
    <div class="cent-botton">
        <div>马上拉票</div>
        <div id="lapiao">投票</div>
    </div>
</div>
<script src="/Public/sprout/js/code.js"></script>
<script>
    $(".guanbImg").click(function () {
        window.location.href = "index.html"
    })
</script>
<script type="text/javascript">
        //投票,判断需不需要验证码
    $('#lapiao').click(function(){
    <?php if ($res['is_code']==1) {?>
        layer.open({
          type: 1,
          skin: 'layui-layer-rim', //加上边框
          shade:0.6,
          area: ['400px', '200px'], //宽高
          content: '<div style="margin:auto;text-align:center"><div id="v_container" style="width: 200px;height: 50px;margin:auto"></div><input  type="text" id="code_input" value="" placeholder="请输入验证码"/><button id="my_button">验证</button></div>',
        });
        var verifyCode = new GVerify("v_container");
        document.getElementById("my_button").onclick = function(){
            var res = verifyCode.validate(document.getElementById("code_input").value);
            if(res){
                layer.closeAll()
                var sign_id = $(this).find("input[name='sign_id']").val();
                var sprout_id = $(this).find("input[name='sprout_id']").val();
                vote(sign_id,sprout_id)
            }else{
                alert("验证码错误");
            }
        }
    <?php }else{ ?>
        <?php echo 'var sign_id ='.I('get.sign_id').';';?>
        <?php echo 'var sprout_id ='.I('get.sprout_id').';';?>
        vote(sign_id,sprout_id)
    <?php } ?>  
    })
    function vote(sign_id,sprout_id){
        $.ajax({
            type: "get",
            url: "<?php echo U('Api/Sprout/toVote');?>?sign_id="+sign_id+'&sprout_id='+sprout_id,
      //      data: {sign_id:sign_id,sprout_id:sprout_id},
            contentType : "application/json",
            dataType: "json",
            success: function(data){
                alert(data.msg)
            }
        });
    }
</script>
</body>
</html>