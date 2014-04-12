<?php
/**
 * Created by PhpStorm.
 * User: yuerzx
 * Date: 12/04/14
 * Time: 7:00 PM
 */

function add_new_contact($args){
    global $wpdb;
    $table_name = $wpdb->prefix.'ezyplus_agency';
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
    $table_name = $wpdb->prefix.'ezyplus_agency';
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
    $table_name = $wpdb->prefix.'ezyplus_agency';
    /*用sql查询语言完成
    $sql = $wpdb->prepare("UPDATE $table_name SET phone=%s,email=%s,wechat=%s,weibo=%s,description=%s,photo_url=%s,qr_url=%s WHERE name=%s",
    array($phone,$email,$wechat,$weibo,$description,$photo_url,$qr_url)
    );*/
    $wpdb->show_errors();
    if(
    $wpdb->update(
        $table_name,
        $args,
        array('agency_id'=>$cid),
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
    $table_name = $wpdb->prefix.'ezyplus_agency';
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
    $table_name = $wpdb->prefix.'ezyplus_agency';
    $result = $wpdb->get_row("SELECT * FROM $table_name WHERE name='$name'",ARRAY_A);
    return $result;
}
//print_r(get_contact('我'));
/*-----------------------------
 *根据人名获取cid号
------------------------------*/
function get_agency_id_by_name($name){
    global $wpdb;
    $table_name = $wpdb->prefix.'ezyplus_agency';
    $result = $wpdb->get_row("SELECT agency_id FROM $table_name WHERE name='$name'",ARRAY_N);
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
            <?php if(!empty($_POST['info']) &&!empty($_POST['agency_id']) && wp_verify_nonce($_POST['edit_contact_nonce_field'],'edit_contact')){
                if(!update_contact($_POST['agency_id'],$_POST['info'])){
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
                <p><span>Wechat:</span><input type="text" name="info[wechat]" value="<?php echo $contact['wechat'];?>"/></p>
                <p><span>Wechat Url:</span><input type="text" name="info[wechat_url]" value="<?php echo $contact['wechat_url'];?>"/></p>
                <p><span>Weibo:</span><input type="text" name="info[weibo]" value="<?php echo $contact['weibo'];?>"/></p>
                <p><span>Weibo_url:</span><input type="text" name="info[weibo_url]" value="<?php echo $contact['weibo_url'];?>"/></p>
                <p><span>描述:</span><textarea name="info[description]"/><?php echo $contact['description'];?></textarea></p>
                <p><span>照片URL:</span><input type="text" id="upload_image" name="info[photo_url]" value="<?php echo $contact['photo_url'];?>"/><input type="button" id="upload_image_button" value="上传图片" class="button"/></p>
                <p><input type="hidden" name="agency_id" value="<?php echo get_agency_id_by_name($_GET['name'])?>" /></p>
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
                    <th class="manage-column column-title sortable desc" scope="col">Wechat</th>
                    <th class="manage-column column-title sortable desc" scope="col">Wechat_url</th>
                    <th class="manage-column column-title sortable desc" scope="col">Weibo</th>
                    <th class="manage-column column-title sortable desc" scope="col">Weibo_url</th>
                    <th class="manage-column column-title sortable desc" scope="col">描述</th>
                    <th class="manage-column column-title sortable desc" scope="col">照片</th>
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
          <td class='alternate'>$contact[wechat_url]</td>
          <td class='alternate'>$contact[weibo]</td>
          <td class='alternate'>$contact[weibo_url]</td>
          <td class='alternate'>$contact[description]</td>
          <td class='alternate'><img src='$contact[photo_url]'/></td>

          <td class='alternate'><a href='?page=contact_admin&contact_action=edit&name=$contact[name]'>编辑</a></td>
          </tr>
          ";}else{
                            echo "<tr>
          <td>$contact[name]</td>
          <td>$contact[phone]</td>
          <td>$contact[email]</td>
          <td>$contact[wechat]</td>
          <td>$contact[wechat_url]</td>
          <td>$contact[weibo]</td>
          <td>$contact[weibo_url]</td>
          <td>$contact[description]</td>
          <td><img src='$contact[photo_url]'/></td>
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
            <p><span>Weichat:</span><input type="text" name="info[wechat]" value="<?php echo $_POST['info']['wechat'];?>"/></p>
            <p><span>Weichat_url:</span><input type="text" name="info[wechat_url]" value="<?php echo $_POST['info']['wechat_url'];?>"/></p>
            <p><span>Weibo:</span><input type="text" name="info[weibo]" value="<?php echo $_POST['info']['weibo'];?>"/></p>
            <p><span>Weibo_url:</span><input type="text" name="info[weibo_url]" value="<?php echo $_POST['info']['weibo_url'];?>"/></p>
            <p><span>描述:</span><textarea name="info[description]"/><?php echo $_POST['info']['description'];?></textarea></p>
            <p><span>照片URL:</span><input type="text" id="upload_image" name="info[photo_url]" value="<?php echo $_POST['info']['photo_url'];?>"/><input type="button" id="upload_image_button" value="上传图片" class="button"/></p>
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