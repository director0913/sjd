<?php if (!defined('THINK_PATH')) exit();?><section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
<section>
      <h2><strong style="color:grey;">BGM添加</strong></h2>
	  <form action="<?php echo U('Admin/Index/bgm_add');?>" method="post" enctype="multipart/form-data">
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">BGM名称</span>
        <input type="text" class="textbox textbox_295" placeholder="BGM名称" name="name"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">上传音乐：</span>
        <label class="uploadImg">
         <input name="img" type="file"/>
         <span>上传音乐</span>
        </label>
       </li>
        <span class="item_name" style="margin-left: 40px;color: #626262;">注：只支持mp3格式的音乐，其他格式会导致上传不成功或无法播放</span>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn"/>
       </li>
      </ul>
	  </form>
     </section>
	 	 </div>
</section>