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
        <th>ID编号</th>
    	<th>活动标题</th>
    	<th>起始时间</th>
        <th>结束时间</th>
        <th>虚拟人数</th>
        <th>实际人数</th>
        <th>砍价限制</th>
    	<th>创建时间</th>
       </tr>
	   <?php if(is_array($activity)): foreach($activity as $key=>$vo): ?><tr>
        <td><?php echo ($vo["ac_id"]); ?></td>
		<td><?php echo ($vo["title"]); ?></td>
        <td><?php echo ($vo['start_time']); ?></td>
        <td><?php echo ($vo['end_time']); ?></td>
        <td><?php echo ($vo["participants"]); ?></td>
        <td><?php echo ($vo["nums"]); ?></td>
        <td><?php echo ($vo["partic"]); ?>人</td>
        <td><?php echo date('Y-m-d,H:i:s',$vo['ac_create_time']);?></td>
       </tr><?php endforeach; endif; ?>
      </table>
      <aside class="paging">
		<?php echo ($page); ?>
      </aside>
     </section>
	 
	 </div>
</section>