<?php
/* ----------------------------------------------------------------------------------- */
/*  REGISTER THEME MENU
/* ----------------------------------------------------------------------------------- */
	if(function_exists('register_nav_menus')){
		register_nav_menus(array('main_menu' => 'Main Menu'));
	}
	

/* ----------------------------------------------------------------------------------- */
/*  ENQUEUE STYLES AND SCRIPTS
/* ----------------------------------------------------------------------------------- */
function my_init_method() {
	wp_deregister_script( 'jquery' ); // 取消原有的 jquery 定义
}
add_action('init', 'my_init_method'); // 加入功能, 前台使用 wp_enqueue_script( '名称' ) 加載

	function mypassion_scripts() {
		global $admin_data; 
		
		/* ---------------------------------------------------------------------------------- */
		/* Register Scripts
		/* ---------------------------------------------------------------------------------- */
		wp_register_script('jquery', get_template_directory_uri() . '/framework/js/jquery.min.js', 'jquery', '1.8.1', false);		
		/*wp_register_script('easing', get_template_directory_uri() . '/framework/js/easing.min.js', 'jquery', '1.0', TRUE);
		wp_register_script('mobilemenu', get_template_directory_uri() . '/framework/js/mobilemenu.js', 'jquery', '1.0', TRUE);
		//wp_register_script('modernizr', get_template_directory_uri() . '/framework/js/customM.js', 'jquery', '1.0');
		wp_register_script('carouFredSel', get_template_directory_uri() . '/framework/js/carouFredSel.js', 'jquery', '1.0', TRUE);
		//wp_register_script('sticky', get_template_directory_uri() . '/framework/js/sticky.js', 'jquery', '1.0', TRUE);
		wp_register_script('superfish', get_template_directory_uri() . '/framework/js/superfish.js', 'jquery', '1.0', TRUE);
		//wp_register_script('jquery-ui', get_template_directory_uri() . '/framework/js/ui.js', 'jquery', '1.0', TRUE);
		wp_register_script('html5', get_template_directory_uri() . '/framework/js/html5.js', 'jquery', '1.0', TRUE);
		//wp_register_script('flexslider', get_template_directory_uri() . '/framework/js/flexslider-min.js', 'jquery', '1.0', TRUE);
		wp_register_script('scripts', get_template_directory_uri() . '/framework/js/scripts.js', 'jquery', '1.0', TRUE);
		//wp_register_script('mypassion', get_template_directory_uri() . '/framework/js/mypassion.js', 'jquery', '1.0', TRUE);
		wp_register_script('ajaxUpload', get_template_directory_uri() . '/framework/js/ajaxUpload.js', 'jquery', '1.0', TRUE);*/
		wp_register_script('all', get_template_directory_uri() . '/framework/js/all.js', 'jquery', '1.0', TRUE);

		
		/* ---------------------------------------------------------------------------------- */
		/* Enqueue Scripts 
		/* ---------------------------------------------------------------------------------- */
		wp_enqueue_script('jquery');
		
		/*wp_enqueue_script('easing');
		//wp_enqueue_script('modernizr');
		wp_enqueue_script('superfish');
		wp_enqueue_script('carouFredSel');
		wp_enqueue_script('mobilemenu');
		//wp_enqueue_script('jquery-ui');
		wp_enqueue_script('html5');
		//wp_enqueue_script('flexslider');
		//wp_enqueue_script('sticky');
		wp_enqueue_script('scripts');
		//wp_enqueue_script('mypassion');
		wp_enqueue_script('ajaxUpload');*/
		wp_enqueue_script('all');


		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		
		
	}
	
	add_action( 'wp_enqueue_scripts', 'mypassion_scripts' );  
	
	function mypassion_styles(){
		global $admin_data; 
		
		/* ---------------------------------------------------------------------------------- */
		/* Register Stylesheets 
		/* ---------------------------------------------------------------------------------- */
		wp_register_style('all', get_template_directory_uri().'/framework/css/all.css', array(), '1.0', 'all');
		/*wp_register_style('flexslider', get_template_directory_uri().'/framework/css/flexslider.css', array(), '1.0', 'all');
		wp_register_style('fontello', get_template_directory_uri().'/framework/css/fontello/fontello.css', array(), '1.0', 'all');
		wp_register_style('superfish', get_template_directory_uri().'/framework/css/superfish.css', array(), '1.0', 'all');
		//wp_register_style('ui', get_template_directory_uri().'/framework/css/ui.css', array(), '1.0', 'all');
		wp_register_style('base', get_template_directory_uri().'/framework/css/base.css', array(), '1.0', 'all');
		wp_register_style('960', get_template_directory_uri().'/framework/css/960.css', array(), '1.0', 'all');
		wp_register_style('959', get_template_directory_uri().'/framework/css/devices/1000.css', array(), '1.0', 'only screen and (min-width: 768px) and (max-width: 1000px)');
		wp_register_style('767', get_template_directory_uri().'/framework/css/devices/767.css', array(), '1.0', 'only screen and (min-width: 480px) and (max-width: 767px)');
		wp_register_style('479', get_template_directory_uri().'/framework/css/devices/479.css', array(), '1.0', 'only screen and (min-width: 200px) and (max-width: 479px)');*/
	
		/* ---------------------------------------------------------------------------------- */
		/* Enqueue Stylesheets 
		/* ---------------------------------------------------------------------------------- */
		//wp_enqueue_style('flexslider');
		/*wp_enqueue_style('fontello');
		wp_enqueue_style('superfish');
		//wp_enqueue_style('ui');
		wp_enqueue_style('base');
		wp_enqueue_style('stylesheet', get_stylesheet_uri(), array(), '1', 'all' ); // Main Stylesheet
		wp_enqueue_style('960');
		wp_enqueue_style('959');
		wp_enqueue_style('767');
		wp_enqueue_style('479');*/
		wp_enqueue_style('all');
	}  
	add_action( 'wp_enqueue_scripts', 'mypassion_styles', 1 ); 



	//	ADMIN PANEL STYLES & SCRIPTS
	add_action('init', 'style_and_script');
		
	function style_and_script(){ 
		wp_register_script('metasortable', get_template_directory_uri().'/framework/meta-box/meta-sortable.js', 'jquery', '1.0');
		wp_register_script('review', get_template_directory_uri().'/framework/meta-box/review.js', 'jquery', '1.0');
		add_action('add_meta_boxes', 'register_meta_script');
	}	
	function register_meta_script(){
		
		wp_enqueue_script('review');	
		wp_enqueue_script('metasortable');
	} 
	
	   
/* ------------------------------------------------------------------------ */
/*  Inlcudes
/* ------------------------------------------------------------------------ */
	include_once('framework/inc/js.php'); // Enqueue Custom JavaScript
	include_once('framework/inc/css.php'); // Enqueue Custom Stylesheet
	include_once('framework/inc/shortcodes.php'); // Load Shortcodes
	include_once('framework/inc/custom_functions.php'); // Custom functions
	include_once('framework/inc/mypassion-views.php'); // Custom Views
	include_once('framework/inc/sidebars.php'); // Sidebar Generator
	include_once('framework/inc/googlefonts.php'); // Google Fonts
	include_once('framework/inc/breadcrumbs.php'); // Load Breadcrumbs
	include_once('framework/inc/mypassion_pagination.php'); // Custom Pagination
	include_once('framework/inc/rating.php'); // Custom Pagination
	
	
	
	
	include_once('framework/inc/widgets/widget-flickr.php'); // Load Widgets
	include_once('framework/inc/widgets/widget-bestreviews.php'); // Load Widgets
	include_once('framework/inc/widgets/widget-facebook.php'); // Load Widgets
	include_once('framework/inc/widgets/widget-tabs.php'); // Load Widgets
	include_once('framework/inc/widgets/widget-counter.php'); // Load Widgets
	include_once('framework/inc/widgets/widget-video.php'); // Load Widgets
	include_once('framework/inc/widgets/widget-ads.php'); // Load Widgets
	include_once('framework/inc/widgets/widget-login.php'); // Load Widgets
	

	include_once('admin/index.php'); // Slightly Modified Options Framework
	
	define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/framework/meta-box' ) );
    define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/framework/meta-box' ) );
    include_once( RWMB_DIR . 'meta-box.php');
    include_once('framework/inc/meta-boxes.php');

/* ----------------------------------------------------------------------------------- */
/*  Add filter to hook when user press "insert into post" to include the attachment id
/* ----------------------------------------------------------------------------------- */

	add_filter('media_send_to_editor', 'add_para_media_to_editor', 20, 2);
	function add_para_media_to_editor($html, $id){
	
		$pos = strpos('<a', $html) + 2;
		$html = substr($html, 0, $pos) . ' attid="' . $id . '" ' . substr($html, $pos);
		
		return $html ;
		
	}


	function custom_excerpt_length( $length ) {
		global $admin_data;
		$length = $admin_data['excerpt_length'];
		return $length;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	function new_excerpt_more( $more ) {
		global $admin_data;
		$excerpt = $admin_data['excerpt_style'];
		
		switch($excerpt){
			
			case 'excerpt1': 	return ' [...]';
			break;
			
			case 'excerpt2': 	return ' ...';
			break;
			
			case 'excerpt3': 	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' .__('Read more', 'framework').'</a>';
			break;
			
		}
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
	/*function quickchic_widgets_init() {
		register_sidebar(array(
		'name' => __( 'Sidebar 1', 'quickchic' ),
		'id' => 'sidebar-1',
		'before_widget' => '<div class="sidebar widget">',
		'after_widget' => '</div>',
		'before_title'  => '<h5 class="line"><span>',
		'after_title'   => '</span></h5><span class="liner"></span>'
		));
	}
	add_action( 'init', 'quickchic_widgets_init' );*/
	
	
	function the_slug() {
		$post_data = get_post($post->ID, ARRAY_A);
		$slug = $post_data['post_name'];
		return $slug; 
	}
	
	if ( ! isset( $content_width ) ) $content_width = 960;
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp_list_comments' );
	

/*-----------------------------------------------------------------------------------*/
/*	Register Post Thumbnails
/*-----------------------------------------------------------------------------------*/	
	if( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 50, 50, true ); // Normal post thumbnails
		add_image_size( 'slider-thumb', 540, 372, true); // for the portfolio template
		add_image_size( 'slider-thumb-2', 380, 217, true); // for the single blog template
		add_image_size( 'slider-thumb-3', 180, 135, true); // for the single portfolio template
		add_image_size( 'main-small-thumb', 160, 86, true); // for the blog template
		add_image_size( 'main-medium-thumb', 300, 162, true); // for the portfolio template
		add_image_size( 'main-big-thumb', 620, 427, true); // for the portfolio template
	}
	
/*-----------------------------------------------------------------------------------*/
/*	Load Translation Text Domain
/*-----------------------------------------------------------------------------------*/

	load_theme_textdomain( 'framework', get_template_directory() . '/framework/languages' );
	
	$locale = get_locale();
	$locale_file = get_template_directory() . "/framework/languages/$locale.php";
	if ( is_readable($locale_file) )
	    require_once($locale_file);
	
/* ----------------------------------------------------------------------------------- */
/*  Add Post Formats
/* ----------------------------------------------------------------------------------- */
	//add_theme_support( 'post-formats', array('gallery', 'video'));
	
	
	function signOffText() {  
		return 'Thank you so much for reading! And remember to subscribe to our RSS feed.';  
	}
	
	add_shortcode('signoff', 'signOffText');  

/* ----------------------------------------------------------------------------------- */
/*  Get rid of the font-size on the tagcloud widget
/* ----------------------------------------------------------------------------------- */
	
	function my_tag_cloud_args($in)
	{
		return "smallest=12&largest=12&number=40&orderby=name&unit=px";
	}
	add_filter("widget_tag_cloud_args", 'my_tag_cloud_args');
	
	
	add_filter( 'avatar_defaults', 'newgravatar' ); 
	function newgravatar ($avatar_defaults) { 
		$myavatar = get_template_directory() . '/framework/img/avatar.png'; 
		$avatar_defaults[$myavatar] = "WPBeginner"; 
		 
		return $avatar_defaults; 
  }
/*-------------------------------
 *获取相邻附件的，返回其id
--------------------------------*/
function get_adjacent_attachment($next = true){
  global $post;
  $post = get_post( get_post()->post_parent );
  $post = get_adjacent_post(false,'',$next);
  $id = $post->ID;
  wp_reset_postdata();
  return $id;
}
/*---------------------------
 * 为名片添加数据库表
----------------------------*/
function add_contact_sql(){
  /*创建表，name为唯一的数值，不可重复*/
  global $wpdb;
  $table_name = $wpdb->prefix.'contact';
  if($wpdb->get_var("SHOw TABLES LIKE '".$table_name."'")!=$table_name){
    $sql = "
      CREATE TABLE $table_name(
        cid bigint(20) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL ,
        phone varchar(30),
        email varchar(255),
        wechat varchar(255),
        weibo varchar(255),
        description text,
        photo_url varchar(255),
        qr_url varchar(255),
        PRIMARY KEY(cid),
        UNIQUE(name)
      )ENGINE=MyISAM DEFAULT CHARSET=utf8;
    ";
  $wpdb->show_errors();
  $wpdb->query($sql);
  }
  //$sql1 = "ALTER TABLE `wp_contact` CHANGE `webchat` `wechat` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL";
  //$wpdb->query($sql1);
}
add_action('after_setup_theme','add_contact_sql');
/*---------------
 *新增联系人数据
 *传入一个数组，形式为
 array(
  'name'=>$name,
  'phone'=>$phone,
  'email'=>$email,
  'wechat'=>$wechat,
  'weibo'=>$weibo,
  'description'=>$description,
  'photo_url'=>$photo_url,
  'qr_url'=>$qr_url
 )
------------------*/
function add_new_contact($args){
  global $wpdb;
  $table_name = $wpdb->prefix.'contact';
  /*$sql = $wpdb->prepare("
    INSERT INTO $table_name(name,phone,email,wechat,weibo,description,photo_url,qr_url)
    VALUES (%s,%s,%s,%s,%s,%s,%s,%s)
    ",
    array($name,$phone,$email,$wechat,$weibo,$description,$photo_url,$qr_url)
  );*/
  if(!$wpdb->query("SELECT name FROM $table_name WHERE name='$args[name]'")){
    $wpdb->show_errors();
    $wpdb->insert(
      $table_name,
      $args,
      array('%s','%s','%s','%s','%s','%s','%s','%s')
    );
    return true;
  }
  //print_r($wpdb->query("SELECT name FROM $table_name WHERE name='$name'"));
}
//add_new_contact('和蔼','13766493707','123234','wqe@qw.com','wechat','weibo','description','http://phpto','http://qr');
/*---------------------------
 * 删除数据
 * 根据姓名删除数据
----------------------------*/
function delete_contact($name){
  global $wpdb;
  $table_name = $wpdb->prefix.'contact';
  $sql = "DELETE FROM $table_name WHERE name='$name' ";
  $wpdb->show_errors();
  if($wpdb->query($sql)){
    return true;
  }
}
//delete_contact('我');
/*-----------------------------------------------------------------------------------------
 * 更新联系数据
 * 传入两个参数，第一个为要更新的名称$name,第二个为要更新的数值，为数组格式.其形式为,数组为
 array(
  'name'=>$name,
  'phone'=>$phone,
  'email'=>$email,
  'wechat'=>$wechat,
  'weibo'=>$weibo,
  'description'=>$description,
  'photo_url'=>$photo_url,
  'qr_url'=>$qr_url
 )
 数组的键值对应表的字段，数组的值对应着相应的字段对应的值
------------------------------------------------------------------------------------------*/

function update_contact($cid=null,$args){
  /*根据name来更新数据*/
  global $wpdb;
  $table_name = $wpdb->prefix.'contact';
  /*用sql查询语言完成
  $sql = $wpdb->prepare("UPDATE $table_name SET phone=%s,email=%s,wechat=%s,weibo=%s,description=%s,photo_url=%s,qr_url=%s WHERE name=%s",
  array($phone,$email,$wechat,$weibo,$description,$photo_url,$qr_url)
  );*/
  $wpdb->show_errors();
  if(
  $wpdb->update(
    $table_name,
    $args,
    array('cid'=>$cid),
    array('%s','%s','%s','%s','%s','%s','%s','%s'),
    array('%s')
  )){
    return true;
  }
  //$wpdb->query($sql);
}
/*$args = array(
  'name'=>'我的',
  'phone'=>'1',
  'email'=>'1',
  'wechat'=>'1',
  'weibo'=>'1',
  'description'=>'1',
  'photo_url'=>'1',
  'qr_url'=>'1'
 );
update_contact('17',$args);*/
/*----------------------------------
 * 获取联系人当中所有的人名，
 * 保存为一个索引数组。
-----------------------------------*/
function get_contact_name(){
  global $wpdb;
  $table_name = $wpdb->prefix.'contact';
  $name_count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");
  for($offset=0;$offset<$name_count;$offset++){
    $temp = $wpdb->get_row("SELECT name FROM $table_name",ARRAY_A,$offset);
    $name[] = $temp['name'];
  }
  return $name;
}
/*---------------------------------------
 *根据人名获取此人的所有信息，返回一个数组
 返回值类似于
 array(
  'cid'=>$cid,
  'name'=>$name,
  'phone'=>$phone,
  'email'=>$email,
  'wechat'=>$wechat,
  'weibo'=>$weibo,
  'description'=>$description,
  'photo_url'=>$photo_url,
  'qr_url'=>$qr_url
 ) 
----------------------------------------*/
function get_contact($name){
  global $wpdb;
  $table_name = $wpdb->prefix.'contact';
  $result = $wpdb->get_row("SELECT * FROM $table_name WHERE name='$name'",ARRAY_A);
  return $result;
}
//print_r(get_contact('我'));
/*-----------------------------
 *根据人名获取cid号
------------------------------*/
function get_cid_by_name($name){
  global $wpdb;
  $table_name = $wpdb->prefix.'contact';
  $result = $wpdb->get_row("SELECT cid FROM $table_name WHERE name='$name'",ARRAY_N);
  return $result[0];
}
/*-------------------
 *创建后台页面
--------------------*/
/*----------------------------
 *为后台上传按钮加载js和css
-----------------------------*/
function add_contact_script(){
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
}
function add_contact_styles() {
  wp_enqueue_style('thickbox');
}
if (isset($_GET['page']) && $_GET['page'] == 'contact_admin'||$_GET['page'] == 'contact_add') {
  add_action('admin_print_scripts', 'add_contact_script');
  add_action('admin_print_styles', 'add_contact_styles');
}
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
  wp_enqueue_style('thickbox');

/*----------------
 *添加后台管理页面
-----------------*/
function add_contact_admin_page(){
  add_menu_page('名片信息管理','名片信息管理',10,'contact_admin','contact_admin_page');
}
function add_add_page(){
  add_submenu_page('contact_admin','增加信息','增加信息',10,'contact_add','contact_add_page');  
}
function add_delete_page(){
  add_submenu_page('contact_admin','删除信息','删除信息',10,'delete_delete','contact_delete_page');  
}
function contact_admin_page(){?>
  <div class="wrap">
  <style type="text/css">
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
  <?php if($_GET['contact_action']=='edit'){
  $contact = get_contact($_GET['name']);?>
  <div class="icon32 icon32-posts-post" id="icon-edit"><br></div><h2>编辑名片信息</h2>
  <?php if(!empty($_POST['info']) &&!empty($_POST['cid']) && wp_verify_nonce($_POST['edit_contact_nonce_field'],'edit_contact')){
    if(!update_contact($_POST['cid'],$_POST['info'])){
      exit('<div id="message" class="updated below-h2"><p>未更新任何信息！</p></div>');
    }
     echo '<div id="message" class="updated below-h2"><p>修改信息成功！</p></div>';
    $contact = get_contact($_GET['name']);
  }
  ?>
    <form action="" method="POST">
      <p><span>姓名:</span><input type="text" name="info[name]" value="<?php echo $contact['name'];?>"/></p>
      <p><span>电话:</span><input type="text" name="info[phone]" value="<?php echo $contact['phone'];?>"/></p>
      <p><span>邮箱:</span><input type="text" name="info[email]" value="<?php echo $contact['email'];?>"/></p>
      <p><span>微信:</span><input type="text" name="info[wechat]" value="<?php echo $contact['wechat'];?>"/></p>
      <p><span>微博:</span><input type="text" name="info[weibo]" value="<?php echo $contact['weibo'];?>"/></p>
      <p><span>描述:</span><textarea name="info[description]"/><?php echo $contact['description'];?></textarea></p>
      <p><span>照片URL:</span><input type="text" id="upload_image" name="info[photo_url]" value="<?php echo $contact['photo_url'];?>"/><input type="button" id="upload_image_button" value="上传图片" class="button"/></p>
      <p><span>二维码URL:</span><input type="text" id="upload_image_1" name="info[qr_url]" value="<?php echo $contact['qr_url'];?>"/><input type="button" id="upload_image_button_1" value="上传图片" class="button"/></p>
      <p><input type="hidden" name="cid" value="<?php echo get_cid_by_name($_GET['name'])?>" /></p>
      <?php wp_nonce_field('edit_contact','edit_contact_nonce_field'); ?>
      <p><input type="submit" name="submit" value="更新" class="button button-primary button-large"/></p>
    </form>
  
  <?php }else{?>
   <div class="icon32 icon32-posts-post" id="icon-edit"><br></div><h2>名片信息管理</h2>
   <style>
   td img{
    max-height:150px;
    width:auto;
   }
   </style>
      <table class="wp-list-table widefat fixed posts contact" cellspacing="0">
      <thead>
      <tr>
          <th class="manage-column column-title sortable desc cname" scope="col">姓名</th>
          <th class="manage-column column-title sortable desc" scope="col">电话</th>
          <th class="manage-column column-title sortable desc" scope="col">邮箱</th>
          <th class="manage-column column-title sortable desc" scope="col">微信</th>
          <th class="manage-column column-title sortable desc" scope="col">微博</th>
          <th class="manage-column column-title sortable desc" scope="col">描述</th>
          <th class="manage-column column-title sortable desc" scope="col">照片</th>
          <th class="manage-column column-title sortable desc" scope="col">二维码</th>
          <th class="manage-column column-title sortable desc" scope="col">编辑</th>
      </tr>
      </thead>
      <?php
        $names = get_contact_name();
        if(!empty($names)){
        foreach($names as $key=>$name){
          $contact = get_contact($name);
          if($key%2=='1'){
          echo "<tr>
          <td class='alternate'>$contact[name]</td>
          <td class='alternate'>$contact[phone]</td>
          <td class='alternate'>$contact[email]</td>
          <td class='alternate'>$contact[wechat]</td>
          <td class='alternate'>$contact[weibo]</td>
          <td class='alternate'>$contact[description]</td>
          <td class='alternate'><img src='$contact[photo_url]'/></td>
          <td class='alternate'><img src='$contact[qr_url]'/></td>
          <td class='alternate'><a href='?page=contact_admin&contact_action=edit&name=$contact[name]'>编辑</a></td>
          </tr>
          ";}else{
          echo "<tr>
          <td>$contact[name]</td>
          <td>$contact[phone]</td>
          <td>$contact[email]</td>
          <td>$contact[wechat]</td>
          <td>$contact[weibo]</td>
          <td>$contact[description]</td>
          <td><img src='$contact[photo_url]'/></td>
          <td><img src='$contact[qr_url]'/></td>
          <td><a href='?page=contact_admin&contact_action=edit&name=$contact[name]'>修改</a></td>
          </tr>
          ";
          }
        }}else{
          echo '<div id="message" class="updated below-h2"><p>还没有信息，快<code><a href="admin.php?page=contact_add">添加</a></code>吧！</p></div>';
        }
      ?>
      </table>
  <?php }?>
  </div>
<?php }

function contact_add_page(){


?>
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
  <?php if(!empty($_POST['info']) && wp_verify_nonce($_POST['add_contact_nonce_field'],'add_contact')){
    if(!add_new_contact($_POST['info'])){
      exit('<div id="message" class="updated below-h2"><p>有重名！请确认您是否重复刷新了本页面</p></div>');
    }
     echo '<div id="message" class="updated below-h2"><p>添加名片信息成功！</p></div>';
  }
  ?>
    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div><h2>增加信息</h2>
    <form action="" method="post">
      <p><span>姓名:</span><input type="text" name="info[name]" value="<?php echo $_POST['info']['name'];?>"/></p>
      <p><span>电话:</span><input type="text" name="info[phone]" value="<?php echo $_POST['info']['photo'];?>"/></p>
      <p><span>邮箱:</span><input type="text" name="info[email]" value="<?php echo $_POST['info']['email'];?>"/></p>
      <p><span>微信:</span><input type="text" name="info[wechat]" value="<?php echo $_POST['info']['wechat'];?>"/></p>
      <p><span>微博:</span><input type="text" name="info[weibo]" value="<?php echo $_POST['info']['weibo'];?>"/></p>
      <p><span>描述:</span><textarea name="info[description]"/><?php echo $_POST['info']['description'];?></textarea></p>
      <p><span>照片URL:</span><input type="text" id="upload_image" name="info[photo_url]" value="<?php echo $_POST['info']['photo_url'];?>"/><input type="button" id="upload_image_button" value="上传图片" class="button"/></p>
      <p><span>二维码URL:</span><input type="text" id="upload_image_1" name="info[qr_url]" value="<?php echo $_POST['info']['qr_url'];?>"/><input type="button" id="upload_image_button_1" value="上传图片" class="button"/></p>
      <?php wp_nonce_field('add_contact','add_contact_nonce_field'); ?>
      <p><input type="submit" name="submit" value="增加" class="button button-primary button-large"/></p>
    </form>
  </div>
<?php }

function contact_delete_page(){?>
  <div class="wrap">
  <style type="text/css">
  .wrap p{
    clear:both;
  }
  .wrap p span{
    width:20px;
    float:left;
  }
  </style>
    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div><h2>删除信息</h2>
  <?php if(!empty($_POST['select']) && wp_verify_nonce($_POST['delete_contact_nonce_field'],'delete_contact')){
    if(!delete_contact($_POST['select'])){
      exit('<div id="message" class="updated below-h2"><p>删除的内容不存在，请确认你是否多次刷新本页面</p></div>');
    }
     echo '<div id="message" class="updated below-h2"><p>删除'.$_POST['select'].'成功!</p></div>';
  }
  ?>
    <form action="" method="post">
    <?php
    $all_name = get_contact_name();
    if(!empty($all_name)){
    foreach ($all_name as $key=>$name){
    ?>
      <p><span><input type="radio" name="select" id="select<?php echo $key;?>" value="<?php echo $name;?>"></span><label for="select<?php echo $key;?>"><?php echo $name;?></label></p>
    <?php }}else{
     echo '<div id="message" class="updated below-h2"><p>还没有名片呢，快添加吧！</p></div>';}
    ?>
      <?php wp_nonce_field('delete_contact','delete_contact_nonce_field'); ?>
    <input type="submit" name="submit" class="button button-primary button-large" value="删除"/>
    </form>
  </div>
<?php }
add_action('admin_menu','add_contact_admin_page');
add_action('admin_menu','add_add_page');
add_action('admin_menu','add_delete_page');
include(TEMPLATEPATH.'/house/mysql-house.php');

include(TEMPLATEPATH.'/house/class-house-query.php');
include(TEMPLATEPATH.'/house/house-admin.php');
?>