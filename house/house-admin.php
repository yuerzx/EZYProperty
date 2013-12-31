<?php
  require('admin-page/add_house_page.php');//包含添加户型页面
  require('admin-page/add_house_project_page.php');//包含添加楼盘页面
  require('admin-page/all_house_page.php');//包含户型列表页面
  require('admin-page/all_house_project_page.php');//包含楼盘列表页面
	/*短代码*/
	$wp_house = new WP_house();
	function my_shortcode($code){
		$content = apply_filters('show_my_shortcode',$code);
		return $content;
	}
	/*选房系统后台管理*/
function house_admin_page(){
	add_menu_page('房产','房产',7,'all_house_page','add_all_house_page');
	add_submenu_page('all_house_page','增加房产','增加房产',7,'add_house_page','add_add_house_page');
	add_submenu_page('all_house_page','所有项目','所有项目',7,'all_project_page','add_all_project_page');
	add_submenu_page('all_house_page','增加项目','增加项目',7,'add_project_name_page','add_add_house_project_page');
	add_submenu_page('all_house_page','项目类型','项目类型',7,'add_house_settings_page','add_add_house_settings_page');
}

function add_add_house_settings_page(){
	//添加房产设置页面
	if(!empty($_POST) && wp_verify_nonce($_POST['option_nonce_field'],'option')){
		add_option('search_result_page',$_POST['search_result_page']) || update_option('search_result_page',$_POST['search_result_page']);
		add_option('front_house_page',$_POST['front_house_page']) || update_option('front_house_page',$_POST['front_house_page']);
		add_option('front_houseproject_page',$_POST['front_houseproject_page']) || update_option('front_houseproject_page',$_POST['front_houseproject_page']);
		add_option('project_type',$_POST['project_type']) || update_option('project_type',$_POST['project_type']);
		add_option('year_rate',$_POST['year_rate']) || update_option('year_rate',$_POST['year_rate']);
		add_option('total_month',$_POST['total_month']) || update_option('total_month',$_POST['total_month']);

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
  </style>
  <div class="wrap">
		<div class="icon32 icon32-posts-post" id="icon-edit"><br></div><h2>设置</h2>
		<form method="post" action="">
			<p><span>搜索页面</span><input type="text" name="search_result_page" value="<?php echo get_option('search_result_page');?>"/></p>
			<p><span>户型详情页面</span><input type="text" name="front_house_page" value="<?php echo get_option('front_house_page');?>"/></p>
			<p><span>楼盘详情页面</span><input type="text" name="front_houseproject_page" value="<?php echo get_option('front_houseproject_page');?>"/></p>
			<p><span>项目类型</span><textarea name="project_type"><?php echo get_option('project_type');?></textarea>填写项目类型，多个用“|”隔开。比如项目一|项目二|项目三</p>
			<p><span>设置初始年利率</span><input type="text" name="year_rate" value="<?php echo get_option('year_rate');?>"/>%</p>
			<p><span>设置初始还清月份</span><input type="text" name="total_month" value="<?php echo get_option('total_month');?>"/>月</p>

			<input type="hidden" name="action" value="add" />
      <?php wp_nonce_field('option','option_nonce_field'); ?>
      <p><input type="submit" name="submit" value="增加" class="button button-primary button-large"/></p>
		</form>
  </div>
<?php }

add_action('admin_menu','house_admin_page');

?>