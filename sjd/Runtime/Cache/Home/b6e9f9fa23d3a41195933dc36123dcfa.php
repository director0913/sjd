<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, user-scalable=no"/>
    <link rel="stylesheet" href="/Public/sprout/css/reports.css"/>
    <link rel="stylesheet" href="/Public/sprout/css/ssx.css"/>
    <script src="/Public/sprout/js/jquery.js"></script>


    <title>报名</title>
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
        <img class="guanbImg" src="/Public/sprout/img/guanbi.png" alt=""/>
    </div>
    <div class="center">
        <form method="post" id="form" action="<?php echo U('Home/Sprout/sign');?>" enctype ="multipart/form-data">
            <input type="hidden" name="sprout_id" value="<?php echo I('get.sprout_id','0');?>">
        
        <div class="center-box">
            <div class="center-head">填写参赛信息</div>
            <input class="mingc" type="text" name="title" placeholder="请输入参赛名称"/>
            <input class="mingc1" type="text" name="description" placeholder="请输个人介绍、拉票宣言等"/>
           <div class="mingc1"><input type="file" name="img[]"><img src="/Public/sprout/img/uploadImgBtn.png" alt=""/></div>
            <div class="center-head">请填写联系方式</div>
            <?php if(is_array($sprout["link_info"])): foreach($sprout["link_info"] as $k=>$vo): if($vo == 1): ?><input class="mingc" type="text" name="name" placeholder="请输入姓名"/>
                <?php elseif($vo == 2): ?> 
                    <input class="mingc" type="text" name="phone" placeholder="请输入联系电话"/>
                <?php elseif($vo == 3): ?> 
                    <div class="mingc2">
                    <div style="color: #000">省、市、区</div>
                    <div>
                         <input type="text" placeholder="请选择城市" readonly id="location" name="city">
                           <!--  <div style="width: 70%">请选择地区</div>
                            <div style="width: 30%;text-align: right" >></div> -->
                        </div>
                    </div>
                    <input class="mingc1" type="text" name="info" placeholder="请输入详细地址"/>
                     <script src="/Public/sprout/js/sss1.js"></script>
                       <script src="/Public/sprout/js/ssxdata.js"></script>
                        <script src="/Public/sprout/js/ssx.js"></script>
                      <link href="/Public/sprout/css/font-awesome.min.css" rel="stylesheet">
                        <link href="/Public/sprout/css/framework7.ios.min.css" rel="stylesheet">
                        <link href="/Public/sprout/css/framework7.ios.colors.min.css" rel="stylesheet"><?php endif; endforeach; endif; ?>
            
        </div>
        <div class="greenm">确认提交</div>
        </form>
        <p class="head-bott">页面技术由凡客互动提供</p>
    </div>
</div>
<script>
    $(".guanbImg").click(function () {
        window.location.href="index.html"
    })
    $(".greenm").click(function () {
        var title = $('[name="title"]').val();
        if (!title) {
            alert('请输入参赛名称！');return false;
        }
        var description = $('[name="description"]').val();
        if (!description) {
            alert('请输入个人结束、拉票宣言等！');return false;
        }
        var img = $('[name="img[]"]').val();
        if (!img) {
            alert('请上传照片！');return false;
        }
        $('#form').submit();
    })
</script>
</body>
</html>