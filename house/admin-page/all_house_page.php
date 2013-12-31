<?php
/*
  后台显示所有户型信息页面
*/
function add_all_house_page() { ?>
	<style>
   td img{
    max-height:150px;
    width:auto;
   }
  .cname{padding-left:10px!important;}
  .manage-column{line-height:2.5em!important;}
  .wrap p{
    clear:both;
  }
  .wrap p span{
    width:100px;
    float:left;
  }
  .wrap p input[type=text], .wrap p textarea{width:300px;}
  .wrap p textarea{height:100px;}
  span.page a{
		border:1px solid #CCC;
		padding:2px 4px;
		margin:5px;
  }
   </style>
  <script>
  jQuery(document).ready(function($) {
    $('#upload_image_button, #upload_image_button_1').click(function() {
      targetfield = $(this).prev('input'); 
      tb_show('', 'media-upload.php?type=image&amp;TB_iframe=false');
      return false;
    });
    window.send_to_editor = function(html) {
      imgurl = jQuery('img',html).attr('src');
      jQuery(targetfield).val(imgurl);
      tb_remove();
    }
  });
  </script>
	<div class="wrap">

	<?php	
		global $wp_house;
		if(isset($_GET['action']) && $_GET['action']=='delete' && $_GET['delete_id']!='' && current_user_can('delete_themes')){
			//删除文章动作
			if($wp_house->delete_house($_GET['delete_id'])){
				echo '<div id="message" class="updated below-h2"><p>删除成功!</p></div>';
				echo '<a href="admin.php?page=all_house_page">返回房产列表</a>';
			}
		}else{
	?>
   <div class="icon32 icon32-posts-post" id="icon-edit"><br></div><h2>所有房产</h2>
   <div class="tablenav top">
		<div class="tablenav-pages">
		<form method="get" action="">
		<input type="hidden" name="page" value="all_house_page"">
		<a class="first-page disabled" title="前往第一页" href="admin.php?page=all_house_page">&#62;</a>
					<?php
						$max_page = $wp_house->get_house_pages();
						$current_page = $_GET['current_page']? $_GET['current_page']:1;
						if($current_page>1){
						$prev_page = $current_page-1;
					?>
					<a class="prev-page disabled" title="前往上一页" href="admin.php?page=all_house_page&current_page=<?php echo $prev_page;?>">‹</a>
					<span class="paging-input">第<input class="current-page" type="text" name="current_page" size=1 value="<?php echo $current_page;?>"/>页,共<?php echo $max_page;?>页</span>
					<?php } if($current_page+1<$max_page){
						$next_page = $current_page+1;
					?>
					<a class="next-page" title="前往下一页" href="admin.php?page=all_house_page&current_page=<?php echo $next_page;?>">›</a>
					<?php }?>
					<a class="last-page" title="前往最后一页" href="admin.php?page=all_house_page&current_page=<?php echo $max_page;?>">&raquo;</a>

					</form>
		</div>
   </div>
		  <table class="wp-list-table widefat fixed posts contact" cellspacing="0">
				<thead>
					<tr>
						<th class="manage-column column-title sortable desc cname" scope="col">项目名称</th>
						<th class="manage-column column-title sortable desc" scope="col">房号</th>
						<th class="manage-column column-title sortable desc" scope="col">楼层</th>
						<th class="manage-column column-title sortable desc" scope="col">卧室</th>
						<th class="manage-column column-title sortable desc" scope="col">朝向</th>
						<th class="manage-column column-title sortable desc" scope="col">总面积</th>
						<th class="manage-column column-title sortable desc" scope="col">价格</th>
						<th class="manage-column column-title sortable desc" scope="col">户型图</th>
						<th class="manage-column column-title sortable desc" scope="col">编辑</th>
					</tr>
				</thead>
				<?php
					$houses = $wp_house-> get_all_houses(10);
					//echo '<pre>';
					//print_r($houses);
					//echo '</pre>';
					if(!empty($houses)){
						foreach($houses as $key=>$house){
							$totle_m2 = $house['int_m2']+$house['ext_m2'];
							if($key%2==0){
								echo "
								<tr>
									<td class='alternate'>$house[project_name]</td>
									<td class='alternate'>$house[house_number]</td>
									<td class='alternate'>$house[house_level]</td>
									<td class='alternate'>$house[bedroom]</td>
									<td class='alternate'>$house[towards]</td>
									<td class='alternate'>$totle_m2</td>
									<td class='alternate'>$house[price]</td>
									<td class='alternate'><img src='$house[floor_plan]' /></td>
									<td class='alternate'>
										<a href='admin.php?page=add_house_page&action=edit&edit_id=$house[ID]'>编辑</a> |
										<a href='admin.php?page=all_house_page&action=delete&delete_id=$house[ID]'>删除</a> |
										<a href='".get_option('front_house_page')."?id=$house[ID]' target='_blank'>查看</a></td>
									</td>
							</tr>";
							}else{
								echo "<tr>
								<td>$house[project_name]</td>
								<td>$house[house_number]</td>
								<td>$house[house_level]</td>
								<td>$house[bedroom]</td>
								<td>$house[towards]</td>
								<td>$totle_m2</td>
								<td>$house[price]</td>
								<td><img src='$house[floor_plan]' /></td>
								<td>
									<a href='admin.php?page=add_house_page&action=edit&edit_id=$house[ID]'>编辑</a> |
									<a href='admin.php?page=all_house_page&action=delete&delete_id=$house[ID]'>删除</a> |
									<a href='".get_option('front_house_page')."?id=$house[ID]' target='_blank'>查看</a></td>
								</tr>
								";
							}
						}
					}
				?>
			</table>
			
			
			
	</div>
<?php } } ?>