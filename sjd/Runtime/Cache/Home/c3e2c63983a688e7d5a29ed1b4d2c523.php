<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, user-scalable=no"/>
    <link rel="stylesheet" href="/Public/sprout/css/index.css"/>
    <script src="/Public/sprout/js/jquery.js"></script>
    <script src="/Public/sprout/js/layer/layer.js"></script>
    <title>萌宝投票</title>
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
        $(".mingbaoi").click(function () {
            window.location.href="<?php echo U('home/Sprout/reports',array('sprout_id'=>I('get.sprout_id','0')));?>"
        })
    });
</script>
</head>
<body>
<div class="box">
    <div class="activity">活动尚未发布,当前仅供参考</div>
    <!-- 活动尚未发布,当前仅供参考-->
    <div class="bgm-btn rotate" data-event="11205" _tracker_click_="_tracker_click_" style="animation-play-state: paused;">
        <audio loop="" src="/Public/sprout/千秋月国色生香%20-%20林朔.mp3" autoplay="" preload="">
        </audio>
    </div>
    <!-- 音乐-->
    <div class="mengbao-img"></div>
    <!-- 第一部分 萌宝背景-->
    <div class="mengbao-img2">
        <div class="mengbao-dao">投票倒计时: <?php echo ShengYu_Tian_Shi_Fen($res['vote_end_at']);?></div>
        <div class="sign">
            <div>
                <p>报名人数</p>

                <p><?php echo $count+$res['participants'];?></p>
            </div>
            <div>
                <p>累计投票</p>

                <p><?php echo $vote+$res['participants_score'];?></p>
            </div>
        </div>
        <!--报名人数-->
    </div>
    <!--第二部分 粉色背景-->
    <div class="mengbao-img3">
        <div class="mengbao-fen">
            <div></div>
            <input type="text" value="请输入编号和名称" onfocus="if (value =='请输入编号和名称'){value =''}"onblur="if (value ==''){value='请输入编号和名称'}"/>
        </div>
        <div class="mengbao-fen1">
            <div class="fen1-div">
                <?php if(is_array($res["sort_rule"])): foreach($res["sort_rule"] as $k=>$vo): if($vo == 1): ?><p class="sort"><input type="hidden" value="sign_id"><img  src="/Public/sprout/img/lately2.png" alt=""/>最新参赛</p>
                    <?php elseif($vo == 2): ?> 
                        <p class="sort"><input type="hidden" value="vote_num"><img  src="/Public/sprout/img/hot1.png" alt=""/>人气排行</p>
                    <?php elseif($vo == 3): ?> 
                        <p class="sort"><input type="hidden" value="sort"><img  src="/Public/sprout/img/hot1.png" alt=""/>参赛顺序</p><?php endif; endforeach; endif; ?>
                
                
                
            </div>
            <div class="fen1-div2">
                <?php if(is_array($rankList)): foreach($rankList as $k=>$vo): ?><div class="minboa">
                        <p><?php echo ($vo["sign_id"]); ?>号</p>
                        <a href="<?php echo U('Home/Sprout/detail',array('sprout_id'=>I('get.sprout_id','0'),'sign_id'=>$vo['sign_id']));?>">
                            <img src="<?php echo ($vo["user_img"]); ?>" alt=""/>
                        </a>
                        <div class="mingno"><?php echo ($vo["user_name"]); ?></div>
                        <div class="mingno1"><?php echo ($vo["vote_num"]); ?>票</div>
                        <div class="mingno2"><input type="hidden" name="sprout_id" value="<?php echo I('get.sprout_id','0');?>"><input type="hidden" name="sign_id" value="<?php echo ($vo["sign_id"]); ?>"></div>
                    </div><?php endforeach; endif; ?>         
            </div>
        </div>

    </div>
    <!--底部-->
    <div class="diub">
        <ul class="footer">
            <li id="list1">
                <img src="/Public/sprout/img/index(1).png"/>
                <p style="color: #6c9cff">首页</p>
            </li>
            <li id="list2">
                <img src="/Public/sprout/img/pai.png"/>
                <p>排行榜</p>
            </li>
            <li id="list3">
                <img src="/Public/sprout/img/ming.png"/>
                <p>活动说明</p>
            </li>
            <?php if($res["button_show"] == 2): ?><a href="<?php echo ($res["button_url"]); ?>">
                    <li id="list4">
                        <img src="/Public/sprout/img/zhu.png"/>
                        <p><?php echo ($res["button_name"]); ?></p>
                    </li>
                </a>
            <?php elseif($res["button_show"] == 3): ?>
                <li id="list4">
                    <img src="/Public/sprout/img/zhu.png"/>
                    <p><?php echo ($res["button_name"]); ?></p>
                </li><?php endif; ?>
        </ul>
    </div>
    <!--关注我们-->
    <div class="shang">
        <div class="shnagc">
            <img class="ph" src="<?php echo ($res["button_url"]); ?>" alt=""/>
        </div>
    </div>
    <div class="mingbao">
        <img class="mingbaoi" src="/Public/sprout/img/xia.png" alt=""/>
        <p>报名</p>
    </div>
    <div class="rwrap">
        <p class="r_notime">没有更多了</p>
        <p class="r_teil">页面技术由 凡科互动 提供</p>
    </div>
    <div class="dibu"></divcla>
</div>

</body>
<script src="/Public/sprout/js/code.js"></script>
<script type="text/javascript">
    //投票,判断需不需要验证码
    $(".mingno2").click(function(){
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
        var sign_id = $(this).find("input[name='sign_id']").val();
        var sprout_id = $(this).find("input[name='sprout_id']").val();
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
    //排行切换
    $(".sort").click(function(){
        console.log($(this))
        var sprout_id = <?php echo I('get.sprout_id')?>;
        var sort = $(this).find("input").val();
        $.ajax({
            type: "get",
            url: "<?php echo U('Api/Sprout/getRankList');?>?sort="+sort+'&sprout_id='+sprout_id,
      //      data: {sign_id:sign_id,sprout_id:sprout_id},
            contentType : "application/json",
            dataType: "json",
            success: function(data){
                if (data) {
                    var htm = '';
                    for (var i = 0;i<data.length;  i++) {
                        htm +='<div class="minboa">';
                        htm +='<p>'+data[i]['sign_id']+'号</p>';
                        htm +='<img src="'+data[i]['user_img']?data[i]['user_img']:''+'" alt=""/>';
                        htm +='<div class="mingno">'+data[i]['user_name']?data[i]['user_name']:''+'</div>';
                        htm +='<div class="mingno1">'+data[i]['vote_num']+'票</div>';
                        htm +='<div class="mingno2"><input type="hidden" name="sprout_id" value="'+sprout_id+'"><input type="hidden" name="sign_id" value="'+data[i]['sign_id']+'"></div>';
                        htm +='</div>';
                    }
                    $('.fen1-div2').html(htm);
                }
            }
        });
    })
    
</script>
</html>