<?php if (!defined('THINK_PATH')) exit();?><style>
.paging span.current{
background:white;
border:1px #000000 solid;
color:#19a97b;
padding:5px 8px;
display:inlink-block;
cursor:pointer;
}

</style>

<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
 <section>
      <h2><strong style="color:grey;"></strong></h2>

      <div class="page_title">
          <form action="<?php echo U('Admin/Activity/search');?>" method="post" enctype="multipart/form-data">
          <select name="condition">
              <option value="phone">电话</option>
              <option value="name">昵称</option>
          </select>
          <select name="if_end">
              <option value="0">未发布</option>
              <option value="1">进行中</option>
              <option value="2">已结束</option>
          </select>
          <input type="text" name="dosearch" placeholder="输入查询条件">
          <button type="submit">搜索</button>
          </form>
      </div>
      <table class="table">
       <tr>
        <th>活动编号</th>
		<th>活动名称</th>
		<th>活动时间</th>
        <th>活动缩略图</th>
        <th>发起人</th>
        <th>电话</th>
        <th>活动状态</th>
        <th>创建时间</th>
		<th>操作</th>
       </tr>
	   <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
        <td><?php echo ($vo["ac_id"]); ?></td>
		<td><?php echo ($vo["title"]); ?></td>
        <td><?php echo ($vo["start_time"]); ?>~<?php echo ($vo["end_time"]); ?></td>
        <td><img style="height: 45px;width: 60px;" src="<?php echo ($vo["ac_thumb"]); ?>"></td>
        <td><?php echo ($vo["user_name"]); ?></td>
        <td><?php echo ($vo["phone"]); ?></td>
        <td><?php if($vo['if_send'] == 1){echo '进行中';}elseif($vo['if_send']==0){echo '未发布';}else{echo '已结束';}?></td>
        <td><?php echo date('Y-m-d,H:i:s',$vo['create_time']);?></td>
		<td><a id="see" onclick="see(<?php echo ($vo["ac_id"]); ?>)">查看参与者</a></td>
       </tr><?php endforeach; endif; ?>
      </table>
      <aside class="paging">
		<?php echo ($page); ?>
      </aside>
     </section>
	 
	 </div>
</section>
<script>
    function see(id) {
        window.location.href="<?php echo U('Admin/Activity/actor_list');?>?id="+id;
    }
</script>