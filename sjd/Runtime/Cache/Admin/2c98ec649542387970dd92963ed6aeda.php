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
		<th>音乐</th>
           <th>播放</th>
        <th>操作</th>
       </tr>
	   <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
        <td><?php echo ($vo["id"]); ?></td>
        <td><?php echo ($vo["bgm_name"]); ?></td>
        <td><audio controls="controls" src="<?php echo ($vo['bgm']); ?>">
            您的浏览器不支持 audio 标签。
        </audio></td>
        <td>
         <a href="<?php echo U('Admin/Index/bgm_del',array('id'=>$vo['id']));?>">删除</a>
        </td>
       </tr><?php endforeach; endif; ?>
      </table>
      <aside class="paging">
		<?php echo ($page); ?>
      </aside>
     </section>
	 
	 </div>
</section>