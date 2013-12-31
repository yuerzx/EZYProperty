<?php
/*--------------------------------------
 *      楼盘信息的后台页面，包含增加，
 *      删除等动作
---------------------------------------*/
function add_add_house_project_page(){
	//print_r($_POST);
	global $wp_house;
	if(($_GET['action']=='edit'||$_POST['action']=='edit') && ($_GET['edit_id']!=''||$_POST['edit_id']!='') && current_user_can('delete_pages')){
		/*------------------
		 *编辑楼盘动作
	   ------------------*/
	   if(isset($_GET['edit_id'])){
	    $id = $_GET['edit_id'];
	   }else{
	    $id = $_POST['edit_id'];
	   }
		if(!empty($_POST['args']) && current_user_can('delete_pages')){
			if(!$wp_house->update_house_project($_POST['args'],$_POST['edit_id'])){
				echo '<div id="message" class="updated below-h2"><p>更新失败，请重试！</p></div>';
			}else{
				echo '<div id="message" class="updated below-h2"><p>成功更新信息</p></div>';
			}
		}
		$args = array(
			'query'=>array('ID'=>$id)
		);
		$new_house_projects = $wp_house->get_house_project_by($args);
	}else{
		/*------------------
		 *新增楼盘动作
		-------------------*/
		if(isset($_POST['args']) && !empty($_POST['args']) && wp_verify_nonce($_POST['insert_nonce_field'],'house_project') && !isset($_GET['action'])){
			if(!$wp_house->insert_house_project($_POST['args'])){
				echo '<div id="message" class="updated below-h2"><p>添加的字段已经存在，或者您重复刷新了本页面</p></div>';	
			}else{
				echo '<div id="message" class="updated below-h2"><p>添加项目名称成功!<a href="admin.php?page=add_project_name_page">继续添加</a></p></div>';
			}
			/*新数据*/
			$args = array(
				'query'=>array(
					'project_name'=>$_POST['args']['project_name']
				)
			);
			$new_house_projects = $wp_house->get_house_project_by($args);
		}
	}
?>
  <style type="text/css">
  .wrap p{
    clear:both;
  }
  .wrap p span{
    width:100px;
    float:left;
  }
  .wrap p input[type=text], .wrap p textarea{width:300px;}
  .wrap p textarea{height:100px;}
  #map-canvas{width:700px;height:500px;}
  </style>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtW3Xu9QdadpH7im8viJYhVugtskMbuY4&sensor=false&libraries=places"></script>
  <script src="<?php bloginfo('template_url');?>/house/googlemap.js"></script>
  <script type="text/javascript">
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
		<div class="icon32 icon32-posts-post" id="icon-edit"><br></div><h2>添加项目名称</h2>
		<form method="post" action="admin.php?page=add_project_name_page">
			<p><span>项目名称</span><input type="text" name="args[project_name]" value="<?php echo $new_house_projects[0]['project_name'];?>"/></p>
			<p><span>项目类型</span>
				<select name="args[project_type]">
					<?php
						$project_types = explode('|',get_option('project_type'));
						foreach($project_types as $project_type){
					?>
					<option value="<?php echo $project_type;?>" <?php if($new_house_projects[0]['project_type']==$project_type){echo 'selected="selected"';}?>><?php echo $project_type;?></option>
					<?php	} ?>
				</select>
			</p>
			<p><span>项目logo</span><input name="args[project_logo]" type="text" value="<?php echo $new_house_projects[0]['project_logo'];?>" />
			<input type="button" id="upload_image_button" value="上传图片" class="button"/></p>
			<p><span>项目链接</span><input name="args[project_link]" type="text" value="<?php echo $new_house_projects[0]['project_link'];?>"></p>
			<p><span>入住时间</span>
				<select name="args[occupancy_month]">
					<?php $options = array('上半年','年中','下半年');
						foreach($options as $option){
					?>
					<option value="<?php echo $option;?>" <?php if($new_house_projects[0]['occupancy_month']==$option){echo 'selected="selected"';}?>><?php echo $option;?></option>
					<?php }?>
				</select>
				<select name="args[occupancy_year]">
					<?php
						for($option=2013;$option<=2023;$option++){
					?>
					<option value="<?php echo $option?>" <?php if($new_house_projects[0]['occupancy_year']==$option){echo 'selected="selected"';}?>><?php echo $option;?></option>
					<?php	}?>
				</select>
			</p>
			<p><span>总层高</span>
				<input type="text" name="args[building_levels]" value="<?php echo $new_house_projects[0]['building_levels'];?>"/>
			</p>
			<p><span>有轨电车</span><input type="text" name="args[tram]" value="<?php echo $new_house_projects[0]['tram'];?>"/></p>
			<p><span>火车</span><input type="text" name="args[train]" value="<?php echo $new_house_projects[0]['train'];?>"/></p>
			<p><span>公交车</span><input type="text" name="args[bus]" value="<?php echo $new_house_projects[0]['bus'];?>"/></p>
			<p><span>5公里内学校</span>
				<select name="args[school_5km]">
					<?php
						for($option=0;$option<=10;$option++){
					?>
					<option value="<?php echo $option?>" <?php if($new_house_projects[0]['school_5km']==$option){echo 'selected="selected"';}?>><?php echo $option;?></option>
					<?php	}?>
				</select>
			</p>
			<p><span>5公里内医院</span>
				<select name="args[hospital_5km]">
					<?php
						for($option=0;$option<=10;$option++){
					?>
					<option value="<?php echo $option?>" <?php if($new_house_projects[0]['hospital_5km']==$option){echo 'selected="selected"';}?>><?php echo $option;?></option>
					<?php	}?>
				</select>
			</p>
			<p><span>5公里内商场</span>
				<select name="args[shopping_5km]">
					<?php
						for($option=0;$option<=10;$option++){
					?>
					<option value="<?php echo $option?>" <?php if($new_house_projects[0]['shopping_5km']==$option){echo 'selected="selected"';}?>><?php echo $option;?></option>
					<?php	}?>
				</select>
			</p>
			<p><span>健身房</span>
				<select name="args[gym]">
					<option value="yes" <?php if($new_house_projects[0]['gym']=='yes'){echo 'selected="selected"';}?>>Yes</option>
					<option value="no" <?php if($new_house_projects[0]['gym']=='no'){echo 'selected="selected"';}?>>No</option>
				</select>
			</p>
			<p><span>游泳池</span>
				<select name="args[swimming_pool]">
					<option value="yes" <?php if($new_house_projects[0]['swimming_pool']=='yes'){echo 'selected="selected"';}?>>Yes</option>
					<option value="no" <?php if($new_house_projects[0]['swimming_pool']=='no'){echo 'selected="selected"';}?>>No</option>
				</select>
			</p>
			<p><span>层高</span><input type="text" name="args[height]" value="<?php echo $new_house_projects[0]['height'];?>"/></p>
			<p><span>特色图像</span><input name="args[feature]" type="text" value="<?php echo $new_house_projects[0]['feature'];?>" />
				 <input type="button" id="upload_image_button" value="上传图片" class="button"/></p>
			<p><span>价目表</span><textarea name="args[price_list]"><?php echo $new_house_projects[0]['price_list'];?></textarea></p>
			<p><span>联系方式</span><textarea name="args[contact]"><?php echo stripslashes($new_house_projects[0]['contact']);?></textarea>可以用名片短代码[contact_info title="Location" name="姓名"][/contact_info]</p>
			<p><span>输入地址</span><input name="args[search_place]" id="search_place" type="text" value="<?php echo $new_house_projects[0]['search_place'];?>"/></p>
			<p><span>地图</span><div id="map-canvas"></div></p>
			<p><span>描述</span>
			<?php
				$content = $new_house_projects[0]['description'];
				$editor_id = 'args[description]';
				$settings = array( 'media_buttons' => true );
				wp_editor( $content, $editor_id, $settings);
			?>
			</p>
			<input type="hidden" name="action" value="add" />
			<input type="hidden" id="latlng" name="args[latlng]" value="<?php echo $new_house_projects[0]['latlng'];?>" />
			<?php if($_GET['action']=='edit'){?>
				<input type="hidden" name="action" value="edit">
				<input type="hidden" name="edit_id" value="<?php echo $new_house_projects[0]['ID'];?>">
			<?php }?>
      <?php wp_nonce_field('house_project','insert_nonce_field'); ?>
      <p><input type="submit" name="submit" value="提交" class="button button-primary button-large"/></p>
		</form>
	</div>
<?php	}?>