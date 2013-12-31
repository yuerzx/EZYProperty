<?php
/*--------------------------------------
 *      楼盘列表在后台展示的页面
 *      页面和户型展示的一致
---------------------------------------*/
function add_all_project_page() { ?>
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
    if($_GET['action']=='delete' && $_GET['delete_name']!='' && current_user_can('delete_pages')){
      /*------------------
       *删除楼盘动作
      -------------------*/
		if(!wp_verify_nonce($_GET['_wpnonce'],'delete_project')){
			echo '<p>确定删除'.$_GET['delete_name'].'吗？</p>';
			echo '<a class="button button-primary button-large" href="'.$_GET['href'].'"/>删除</a>&nbsp;';
			echo '<a class="button button-primary button-large" href="admin.php?page=add_project_name_page"/>取消</a>';
			exit;
		}else{
			if(!$wp_house->delete_house_project($_GET['delete_name'])){
				echo '<div id="message" class="updated below-h2"><p>删除失败，需要删除的项目不存在</p></div>';
			}else{
        echo '<div id="message" class="updated below-h2"><p>删除项目'.$_GET['delete_name'].'成功!,返回<a href="admin.php?page=all_project_page">所有项目</a></p></div>';
        }
      }
    }else{
	?>
   <div class="icon32 icon32-posts-post" id="icon-edit"><br></div><h2>所有楼盘</h2>
   <div class="tablenav top">
		<div class="tablenav-pages">
		<form method="get" action="">
		<input type="hidden" name="page" value="all_project_page"">
		<a class="first-page disabled" title="前往第一页" href="admin.php?page=all_project_page">&laquo;</a>
					<?php
						$max_page = $wp_house->get_project_pages();
						$current_page = ($_GET['current_page']) ? $_GET['current_page'] : 1;
						if($current_page>1){
						$prev_page = $current_page-1;
					?>
					<a class="prev-page disabled" title="前往上一页" href="admin.php?page=all_project_page&current_page=<?php echo $prev_page;?>">‹</a>
					<span class="paging-input">第<input class="current-page" type="text" name="current_page" size=1 value="<?php echo $current_page;?>"/>页,共<?php echo $max_page;?>页</span>
					<?php } if($current_page+1<$max_page){
						$next_page = $current_page+1;
					?>
					<a class="next-page" title="前往下一页" href="admin.php?page=all_project_page&current_page=<?php echo $next_page;?>">›</a>
					<?php }?>
					<a class="last-page" title="前往最后一页" href="admin.php?page=all_project_page&current_page=<?php echo $max_page;?>">&raquo;</a>

					</form>
		</div>
   </div>
		  <table class="wp-list-table widefat fixed posts contact" cellspacing="0">
				<thead>
					<tr>
						<th class="manage-column column-title sortable desc cname" scope="col">项目名称</th>
						<th class="manage-column column-title sortable desc" scope="col">类型</th>
						<th class="manage-column column-title sortable desc" scope="col">logo</th>
						<th class="manage-column column-title sortable desc" scope="col">层高</th>
						<th class="manage-column column-title sortable desc" scope="col">编辑</th>
					</tr>
				</thead>
				<?php
					$house_projects = $wp_house-> get_house_project_by();
					//echo '<pre>';
					//print_r($houses);
					//echo '</pre>';
					unset($house_projects['pages']);
					if(!empty($house_projects)){
						foreach($house_projects as $key=>$house_project){
							$nonce = wp_create_nonce('delete_project');
              $href = 'admin.php?page=all_project_page&action=delete&delete_name='.$house_project['project_name'].'&_wpnonce='.$nonce;
							if($key%2==0){
								echo "
								<tr>
									<td class='alternate'>$house_project[project_name]</td>
									<td class='alternate'>$house_project[project_type]</td>
									<td class='alternate'><img src='$house_project[project_logo]' /></td>
									<td class='alternate'>$house_project[building_levels]</td>

									<td class='alternate'>
										<a href='admin.php?page=add_project_name_page&action=edit&edit_id=$house_project[ID]'>编辑</a> |
										<a href='admin.php?page=all_project_page&action=delete&delete_name=$house_project[project_name]&href=".urlencode($href)."'>删除</a> |
										<a href='".get_option('front_houseproject_page')."/$house_project[ID]' target='_blank'>查看</a></td>
									</td>
							</tr>";
							}else{
								echo "<tr>
								<td>$house_project[project_name]</td>
								<td>$house_project[project_type]</td>
								<td><img src='$house_project[project_logo]' /></td>
								<td>$house_project[building_levels]</td>
								<td>
									<a href='admin.php?page=add_project_name_page&action=edit&edit_id=$house_project[ID]'>编辑</a> |
									<a href='admin.php?page=all_project_page&action=delete&delete_name=$house_project[project_name]&href=".urlencode($href)."'>删除</a> |
									<a href='".get_option('front_houseproject_page')."/$house_project[ID]' target='_blank'>查看</a></td>
								</tr>
								";
							}
						}
					}
				?>
			</table>
			
			
			
	</div>
<?php } } ?>