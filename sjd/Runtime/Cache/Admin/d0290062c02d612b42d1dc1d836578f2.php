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
      </div>
      <table class="table">
       <tr>
        <th>数据编号</th>
        <th>头像</th>
		<th>昵称</th>
		<th>电话</th>
        <th>城市</th>
        <th>砍价时间</th>
        <th>砍价金额</th>
       </tr>
	   <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
        <td><?php echo ($vo["id"]); ?></td>
		<td><img style="width: 50px;height: 50px;" src="<?php echo ($vo["user_img"]); ?>"></td>
        <td><?php echo ($vo["user_name"]); ?></td>
        <td><?php echo ($vo["phone"]); ?></td>
        <td><?php echo ($vo["city"]); ?></td>
        <td><?php echo date('Y年m月d日 H:i',$vo['create_time']);?></td>
        <td><?php echo ($vo["cut_money"]); ?></td>
       </tr><?php endforeach; endif; ?>
      </table>
      <aside class="paging">
		<?php echo ($page); ?>
      </aside>
     </section>
	 
	 </div>
</section>