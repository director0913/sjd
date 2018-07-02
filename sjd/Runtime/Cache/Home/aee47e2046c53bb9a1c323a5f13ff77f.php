<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no"/>
    <title>萌宠投票</title>

    <link rel="stylesheet" href="/Public/sprout/add/css/index.css"/>

    <script>window.PointerEvent = void 0</script>
    <script src="/Public/sprout/add/lib/jquery.js"></script>
    <script src="/Public/sprout/add/js/index.js"></script>
</head>
<body>
    <div id="vote-box">
        <!-- S 头部区域  -->
        <div class="vote-top">
            <img class="vote-top-img" src="/Public/sprout/add/imgs/vote-top.jpg" alt=""/>
        </div>
        <!-- E 头部区域  -->
        <form action="<?php echo U('Home/Sprout/add');?>" method="post" enctype ="multipart/form-data">
        <!-- S 内容区域-->
        <div class="vote-center">
            <div class="vote-center-partone">
                <textarea class="vote-center-partone-text" id="tongzi"  name="title"  rows="8">萌宝投票,选出您心目中的TA</textarea>
                <p class="vote-center-text-num"> <label id="pinglun">25</label>/25</p>
                <p class="vote-center-text-zi">标题最多为25个字符（含标点），不填则不显示</p>
            </div>

            <div class="vote-center-parttwo">
                <p class="vote-parttwo-wrap">活动时间： <span><input type="date" name="start_at"></span>到<span><input type="date" name="end_at"></span></p>

                <ul class="vote-parttwo-box">

                    <li class="vote-parttwo-box-list">
                        <p class="vote-parttwo-box-title-a vote-parttwo-box-title">防刷设置</p>
                        <p class="vote-parttwo-box-title">是否开启验证码投票</p>
                        <form class="vote-parttwo-box-form" action="#">
                            <span class="on"><input class="vote-parttwo-btn" checked type="radio" name="is_code" value="1" /><label>开</label></span>
                            <span><input class="vote-parttwo-btn" type="radio" name="is_code" value="0" /><label>关</label></span>
                        </form>
                        <p class="vote-parttwo-box-tip">开启后，每次投票前需先输入验证码验证</p>
                    </li>
                    <li class="vote-parttwo-box-list">
                        <p class="vote-parttwo-box-title">是否设置每位参赛者每小时可得到的最大票数：</p>
                        <form class="vote-parttwo-box-form" action="#">
                            <span class="on"><input class="vote-parttwo-btn" checked type="radio" name="limit_num" value="1" /><label>限制</label></span>
                            <span><input class="vote-parttwo-btn" type="radio" name="limit_num" value="0" /><label>不限制</label></span>
                        </form>

                        <form action="#">
                            <span><input class="vote-parttwo-numm" type="number" name="hours_num" value="100" /><label>票/每位参赛者</label></span>
                        </form>
                        <p class="vote-parttwo-box-tip">开启后，每次投票前需先输入验证码验证</p>
                    </li>

                </ul>

                <p class="vote-parttwo-person"> <span>每天每人可投</span> <input type="number" name="player_day_num" value="5" class="vote-parttwo-numm"/> <span>票</span></p>

                <p class="vote-parttwo-aa">全部票数可以投给一个选手，也可以投给多个选手，一经保存，不可修改。</p>

                <p class="vote-parttwo-bb">
                    活动编辑保存后，请在个人中心&nbsp;—&gt;我的活动&nbsp;—&gt;报名表里上传选手内容
                </p>

                <p class="vote-parttwo-cc"> 活动详情</p>
            </div>

            <div class="vote-content">
                <!-- 第三张图-->
                <ul class="vote-content-list">
                    <li class="vote-content-li">
                        <input type="text" name="description">
                        <p>说明：如有优秀作品希望参与本次评选，请与主办方联系，联系电话：XXXXXX,微信:XXXX</p>
                        <p>小太阳“最美中国字评选”</p>
                        <p>主办方：小太阳学校</p>
                        <p>协办方：多彩儿童写真</p>
                        <p style="height: 20px;"></p>
                        <p>东方水上乐园</p>
                        <p>活动规则:活动期间，每人每天可以投3票</p>
                    </li>
                    <li class="vote-content-li">
                        <p>奖品设置:</p>
                        <p>一等奖（1名）</p>
                        <p>XXX幼儿园一学期免费学</p>
                        <p>XXX儿童写真价588元儿童写真一套</p>
                        <p>XXX英语机构儿童启蒙英语课1个月</p>
                        <p style="height: 20px;"></p>
                        <p>二等奖（2-5名）</p>
                        <p style="height: 20px;"></p>
                        <p>三等奖（6-30名）</p>
                        <p style="height: 20px;"></p>
                        <p>鼓励奖（31-100名）</p>
                        <p style="height: 20px;"></p>
                        <p>关于我们：</p>
                        <p>XXX幼儿园成立于...</p>
                        <p>XXX幼儿园成立于...</p>
                        <p>XXX幼儿园成立于...</p>
                    </li>
                </ul>

                <!-- 第四张图-->
                <div class="vote-content-wrap">
                    <div class="vote-content-top">
                        <div class="vote-content-top-hide">
                            <div class="vote-content-top-hide-one">
                                <textarea placeholder="请输入文本" name="wenben[]" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="vote-content-top-hide-two">
                                <input id="thumbnail"  accept="image/gif,image/jpeg,image/jpg,image/png,image/svg"  name="images[]" type="file"/>
                                <img class="addimgss" src="/Public/sprout/add/imgs/addings.png" alt=""/>
                                <p class="addimgss-text">(点击上传图片，不上传则不显示！)</p>
                            </div>
                            <div class="vote-content-top-hide-three">
                                <!--<video width="320" height="240" controls>-->
                                    <!--<source src="movie.mp4" type="video/mp4">-->
                                    <!--您的浏览器不支持Video标签。-->
                                <!--</video>-->
                                <input id="thumbnail"  accept="image/gif,image/jpeg,image/jpg,image/png,image/svg"  name="videos[]" type="file"/>
                                <img class="addimgss" src="/Public/sprout/add/imgs/addings.png" alt=""/>
                                <p class="addimgss-text">(点击上传视频，不上传则不显示！)</p>
                            </div>
                        </div>

                        <!--文字视频图片按钮-->
                        <ul class="vote-content-top-list">
                            <li id="vote-content-nav-text" class="vote-content-top-li">
                                <img src="/Public/sprout/add/imgs/addtext.png" alt=""/>
                                <span>添加文本</span>
                            </li>
                            <li id="vote-content-nav-img" class="vote-content-top-li">
                                <img src="/Public/sprout/add/imgs/addimg.png" alt=""/>
                                <span>添加图片</span>
                            </li>
                            <li id="vote-content-nav-video" class="vote-content-top-li">
                                <img src="/Public/sprout/add/imgs/addvideo.png" alt=""/>
                                <span>添加视频</span>
                            </li>
                        </ul>
                    </div>

                    <div class="vote-content-center">
                        <p class="vote-content-center-title">-咨询电话-</p>
                        <p class="vote-content-center-strom">门店一</p>
                    </div>

                    <ul class="vote-content-center-list">
                        <li class="vote-content-center-li">
                            <img src="/Public/sprout/add/imgs/strom.png" alt=""/>
                            <input class="vote-content-center-keydown" name="store_title" type="text" placeholder="请输入门店名称"/>
                        </li>
                        <li class="vote-content-center-li">
                            <img src="/Public/sprout/add/imgs/map.png" alt=""/>
                            <input class="vote-content-center-keydown" name="store_addr" type="text" placeholder="点击定位地址"/>
                        </li>
                        <li class="vote-content-center-li">
                            <img src="/Public/sprout/add/imgs/strom1.png" alt=""/>
                            <input class="vote-content-center-keydown" name="store_buliding_num" type="text" placeholder="请输入楼店门牌"/>
                        </li>
                        <li class="vote-content-center-li">
                            <img src="/Public/sprout/add/imgs/iPhone.png" alt=""/>
                            <input class="vote-content-center-keydown" type="text" name="store_tel" placeholder="请输入联系电话"/>
                        </li>
                       <!--  <li class="vote-content-center-li">
                            <img src="/Public/sprout/add/imgs/add.png" alt=""/>
                            <div class="vote-content-center-no"></div>
                        </li> -->
                    </ul>
                 <!--    <div class="addstroms">+&nbsp;&nbsp;点击添加门店</div> -->
                </div>

            </div>
            <input type="submit" name="保存" onclick="return saveInfo();" value="保存">
        </div>
            
        </form>
        <!-- E 内容区域-->
    </div>
</body>
<script type="text/javascript">
    function saveInfo() {
        var start_at = $('[name="start_at"]').val();
        if (!start_at) {
            alert('请选择活动开始时间！');return false;
        }
        var end_at = $('[name="end_at"]').val();
        if (!end_at) {
            alert('请选择活动结束时间！');return false;
        }
        var description = $('[name="description"]').val();
        if (!description) {
            alert('请输入活动详情！');return false;
        }
        var store_title = $('[name="store_title"]').val();
        if (!store_title) {
            alert('请输入门店名称！');return false;
        }
        var store_addr = $('[name="store_addr"]').val();
        if (!store_addr) {
            alert('请输入定位地址！');return false;
        }
        var store_buliding_num = $('[name="store_buliding_num"]').val();
        if (!store_buliding_num) {
            alert('请选输入楼店门牌！');return false;
        }
        var store_tel = $('[name="store_tel"]').val();
        if (!store_tel) {
            alert('请输入联系电话！');return false;
        }
        return true;
    }
</script>
</html>