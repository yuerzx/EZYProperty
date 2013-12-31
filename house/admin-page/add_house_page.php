<?php
/*
  后台增加户型信息的页面
*/
function add_add_house_page() { ?>
  <div class="wrap">
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
  <?php
  	global $wp_house;
		if(($_GET['action']=='edit'||$_POST['action']=='edit') && ($_GET['edit_id']!=''||$_POST['edit_id']!='')){
		/*-----------------------
		 *编辑户型动作
		-----------------------*/
		if(isset($_GET['edit_id'])){
			$id = $_GET['edit_id'];
		}else{
			$id = $_POST['edit_id'];
		}
		//$houses = $wp_house->get_houses_by(array('ID'=>$id));/*获取当前编辑户型的信息*/
			//print_r($houses);
			if(isset($_POST) && wp_verify_nonce($_POST['change_nonce_field'],'house') ){
				if($wp_house->update_house($_POST['args'],$id)){
					echo '<div id="message" class="updated below-h2"><p>更新成功!</p><p><a href="admin.php?page=all_house_page">返回房产列表</a></p></div>';
				}
			}
		$houses = $wp_house->get_houses_by(array('ID'=>$id));/*新户型*/
		}else{
		/*---------------------
		 *新增户型动作
		-----------------------*/
			if(!empty($_POST['args']) && wp_verify_nonce($_POST['change_nonce_field'],'house')){
			if(!$wp_house->insert_house($_POST['args'])){
				exit('<div id="message" class="updated below-h2"><p>请不要重复刷新本页面</p></div>');
			}
			echo '<div id="message" class="updated below-h2"><p>添加房子成功!</p><p><a href="admin.php?page=all_house_page">返回房产列表</a></p></div>';
			//print_r($_POST['args']);
			//echo count($_POST['args']);
			$houses = array();
			$houses[0] = $_POST['args'];
			}
		}
		//print_r($houses[0])
  ?>
    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div><h2>增加房产</h2>
    <form action="" method="post">
      <p><span>项目名称:</span>
				<select name="args[project_name]">
					<?php $house_projects = $wp_house->get_house_project();
					foreach($house_projects as $house_project) { ?>
						<option <?php if($houses[0]['project_name']==$house_project['project_name']){echo 'selected="selected"';}?>><?php echo $house_project['project_name'];?></option>
					<?php }
					?>
				</select>
			</p>
      <p><span>门牌号:</span><input type="text" name="args[house_number]" value="<?php echo $houses[0]['house_number'];?>"/></p>
      <p><span>楼层:</span><input type="text" name="args[house_level]" value="<?php echo $houses[0]['house_level'];?>"/></p>
      <p><span>已出售:</span>
				<select name="args[sold]">
					<option value="available" <?php if($houses[0]['sold']=='available'){echo 'selected="selected"';}?>>Available</option>
					<option value="reserve" <?php if($houses[0]['sold']=='reserve'){echo 'selected="selected"';}?>>Reserve</option>
					<option value="sold" <?php if($houses[0]['sold']=='sold'){echo 'selected="selected"';}?>>Sold</option>
				</select>
      </p>
      <p><span>卧室:</span>
      	<select name="args[bedroom]">
						<option value="1" <?php if($houses[0]['bedroom']=='1'){echo 'selected="selected"';}?>>1</option>
						<option value="2" <?php if($houses[0]['bedroom']=='2'){echo 'selected="selected"';}?>>2</option>
						<option value="3" <?php if($houses[0]['bedroom']=='3'){echo 'selected="selected"';}?>>3</option>
						<option value="4" <?php if($houses[0]['bedroom']=='4'){echo 'selected="selected"';}?>>4</option>
				</select>
      </p>
      <p><span>洗浴间:</span>
				<select name="args[bath]">
      	  	<option value="0" <?php if($houses[0]['bath']=='0'){echo 'selected="selected"';}?>>0</option>
						<option value="1" <?php if($houses[0]['bath']=='1'){echo 'selected="selected"';}?>>1</option>
						<option value="2" <?php if($houses[0]['bath']=='2'){echo 'selected="selected"';}?>>2</option>
						<option value="3" <?php if($houses[0]['bath']=='3'){echo 'selected="selected"';}?>>3</option>
						<option value="4" <?php if($houses[0]['bath']=='4'){echo 'selected="selected"';}?>>4</option>
				</select>
      </p>
      <p><span>车位:</span>
      	<select name="args[car_park]">
						<option value="0" <?php if($houses[0]['car_park']=='0'){echo 'selected="selected"';}?>>0</option>
						<option value="1" <?php if($houses[0]['car_park']=='1'){echo 'selected="selected"';}?>>1</option>
						<option value="2" <?php if($houses[0]['car_park']=='2'){echo 'selected="selected"';}?>>2</option>
						<option value="3" <?php if($houses[0]['car_park']=='3'){echo 'selected="selected"';}?>>3</option>
						<option value="4" <?php if($houses[0]['car_park']=='4'){echo 'selected="selected"';}?>>4</option>
				</select>
      </p>
      <p><span>内部面积:</span><input type="text" name="args[int_m2]" value="<?php echo $houses[0]['int_m2'];?>"/> M2</p>
      <p><span>外部面积:</span><input type="text" name="args[ext_m2]" value="<?php echo $houses[0]['ext_m2'];?>"/> M2</p>
      <p><span>价格:</span><input type="text" name="args[price]" value="<?php echo $houses[0]['price'];?>"/> K</p>
      <p><span>卧室是否有窗户:</span>
				<select name="args[bedroom_windows]">
					<option value="yes" <?php if($houses[0]['bedroom_windows']=='yes'){echo 'selected="selected"';}?>>Yes</option>
					<option value="no" <?php if($houses[0]['bedroom_windows']=='no'){echo 'selected="selected"';}?>>No</option>
				</select>
			</p>
			<p><span>朝向:</span>
				<select name="args[towards]">
					<option value="东" <?php if($houses[0]['towards']=='东'){echo 'selected="selected"';}?>>东</option>
					<option value="西" <?php if($houses[0]['towards']=='西'){echo 'selected="selected"';}?>>西</option>
					<option value="南" <?php if($houses[0]['towards']=='南'){echo 'selected="selected"';}?>>南</option>
					<option value="北" <?php if($houses[0]['towards']=='北'){echo 'selected="selected"';}?>>北</option>
				</select>
			</p>
      <p><span>书房:</span>
				<select name="args[study_room]">
					<option value="0" <?php if($houses[0]['study_room']=='0'){echo 'selected="selected"';}?>>0</option>
					<option value="1" <?php if($houses[0]['study_room']=='1'){echo 'selected="selected"';}?>>1</option>
					<option value="2" <?php if($houses[0]['study_room']=='2'){echo 'selected="selected"';}?>>2</option>
					<option value="3" <?php if($houses[0]['study_room']=='3'){echo 'selected="selected"';}?>>3</option>
					<option value="4" <?php if($houses[0]['study_room']=='4'){echo 'selected="selected"';}?>>4</option>
				</select>
      </p>      
      <p><span>储藏室:</span>
				<select name="args[storage_room]">
					<option value="0" <?php if($houses[0]['storage_room']=='0'){echo 'selected="selected"';}?>>0</option>
					<option value="1" <?php if($houses[0]['storage_room']=='1'){echo 'selected="selected"';}?>>1</option>
					<option value="2" <?php if($houses[0]['storage_room']=='2'){echo 'selected="selected"';}?>>2</option>
					<option value="3" <?php if($houses[0]['storage_room']=='3'){echo 'selected="selected"';}?>>3</option>
				</select>
			</p>      
      <p><span>花园:</span>
        <select name="args[garden]">
					<option value="yes" <?php if($houses[0]['garden']=='yes'){echo 'selected="selected"';}?>>Yes</option>
					<option value="no" <?php if($houses[0]['garden']=='no'){echo 'selected="selected"';}?>>No</option>
				</select>
      </p>
      <p><span>户型图:</span><input type="text" id="upload_image" name="args[floor_plan]" value="<?php echo $houses[0]['floor_plan'];?>"/><input type="button" id="upload_image_button" value="上传图片" class="button"/></p>
      <p><span>描述</span>
				<?php
					$content = $houses[0]['description'];
					$editor_id = 'args[description]';
					$settings = array( 'media_buttons' => true );
					wp_editor( $content, $editor_id, $settings);
				?>
      </p>
      <?php wp_nonce_field('house','change_nonce_field'); ?>
      <?php if($_GET['action']=='edit'&&$_GET['edit_id']!=''){?>
				<input type="hidden" name="action" value="edit">
				<input type="hidden" name="edit_id" value="<?php echo $houses[0]['ID'];?>">
      <?php }?>
      <p><input type="submit" name="submit" value="提交" class="button button-primary button-large"/></p>
    </form>		
  </div>
<?php }