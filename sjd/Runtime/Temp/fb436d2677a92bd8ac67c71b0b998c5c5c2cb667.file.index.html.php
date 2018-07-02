<?php /* Smarty version Smarty-3.1.6, created on 2018-06-29 15:47:09
         compiled from "./sjd/Home/View\Sprout\index.html" */ ?>
<?php /*%%SmartyHeaderCode:106235b35e3fd27e037-61329632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb436d2677a92bd8ac67c71b0b998c5c5c2cb667' => 
    array (
      0 => './sjd/Home/View\\Sprout\\index.html',
      1 => 1530258309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106235b35e3fd27e037-61329632',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b35e3fd2a8fb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b35e3fd2a8fb')) {function content_5b35e3fd2a8fb($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, user-scalable=no"/>
    <link rel="stylesheet" href="__PUBLIC__/sprout/css/index.css"/>
    <script src="__PUBLIC__/sprout/js/jquery.js"></script>
    <script src="__PUBLIC__/sprout/js/index.js"></script>
    <title>萌宝投票</title>
</head>
<body>
<div class="box">
    <div class="activity">活动尚未发布,当前仅供参考</div>
    <!-- 活动尚未发布,当前仅供参考-->
    <div class="bgm-btn rotate" data-event="11205" _tracker_click_="_tracker_click_" style="animation-play-state: paused;">
        <audio loop="" src="__PUBLIC__/sprout/千秋月国色生香%20-%20林朔.mp3" autoplay="" preload="">
        </audio>
    </div>
    <!-- 音乐-->
    <div class="mengbao-img"></div>
    <!-- 第一部分 萌宝背景-->
    <div class="mengbao-img2">
        <div class="mengbao-dao">{{ res }}投票倒计时: 6天22小时47分钟</div>
        <div class="sign">
            <div>
                <p>报名人数</p>

                <p>0</p>
            </div>
            <div>
                <p>累计投票</p>

                <p>0</p>
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
                <p><img src="__PUBLIC__/sprout/img/lately2.png" alt=""/>最新参赛</p>
                <p><img src="__PUBLIC__/sprout/img/hot1.png" alt=""/>人气排行</p>
            </div>
            <div class="fen1-div2"></div>

        </div>

    </div>
    <!--底部-->
    <div class="diub">
        <ul class="footer">
            <li id="list1">
                <img src="__PUBLIC__/sprout/img/index(1).png"/>
                <p style="color: #6c9cff">首页</p>
            </li>
            <li id="list2">
                <img src="__PUBLIC__/sprout/img/pai.png"/>
                <p>排行榜</p>
            </li>
            <li id="list3">
                <img src="__PUBLIC__/sprout/img/ming.png"/>
                <p>活动说明</p>
            </li>
            <li id="list4">
                <img src="__PUBLIC__/sprout/img/zhu.png"/>
                <p>关注我们</p>
            </li>
        </ul>
    </div>
    <!--关注我们-->
    <div class="shang">
        <div class="shnagc">
            <img class="ph" src="__PUBLIC__/sprout/img/caewmA_0.png" alt=""/>
        </div>
    </div>
    <div class="rwrap">
        <p class="r_notime">没有更多了</p>
        <p class="r_teil">页面技术由 凡科互动 提供</p>
    </div>
    <div class="dibu"></divcla>
</div>

</body>
</html><?php }} ?>