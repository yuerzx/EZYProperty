<?php
/*
	Template Name:楼盘列表
*/
$url = rtrim(get_url(),'/');
$urla = explode('/',$url);
//print_r($urla);
$wp_house = new WP_house();
echo $count = count($urla);
$project_url = get_option('front_houseproject_page');//url最后不要带斜杠
if($url != $project_url){
  //单个文章
  $args = array(
      'query'=>array('ID'=>$urla[$count-1]),
  );
$house_project = $wp_house->get_house_project_by($args);
//print_r($house_project);
  if($house_project['pages'] == '0'){
    wp_redirect(get_home_url().'/404');
    exit;
  }
}
get_header();
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtW3Xu9QdadpH7im8viJYhVugtskMbuY4&sensor=false&libraries=places"></script>
<style type="text/css">
  #map-canvas{
    width:98%;
    height:500px;
  }
	.search_tab{
		height:600px;
		position:relative;
	}
	.search_tab label{
		width:100px;
	}
	.tab_title{
		float:left;
		padding:10px 10px;
		cursor:pointer;
		font-size:18px;
		line-height:1em;
		border:1px solid #CCC;
		border-radius:5px 5px 0px 0px;
		background:#f9f9f9;
		z-index:999;
		position:relative;
	}
	.tab_content{
		position:absolute;
		top:30px;
		width:100%;
		border:1px solid #CCC;
		border-radius:4px;
		padding:20px 0px 30px 0px;
		z-index:1;
	}
	.hide{
		display:none;
	}
	.current_tab{
		background:#f1f1f1;
	}
	a.radius{
    border:1px solid #CCC;
    padding:10px 15px;
    text-align:center;
    border-radius:5px;
    display:inline-block;
    float:left;
    margin-right:5px;
    line-height:1em;
    margin-bottom:10px;
    position:relative;
	}
	.share{
    color:#EA4748;
    cursor:pointer;
    position:relative;
    width:500px;
	}
	.baidushare{
    position:absolute;
    left:340px;
    width:500px;
    height:30px;
    display:none;
    top:5px;
    line-height:10px;
	}
</style>
<section id="content"><!-- Content -->
  <div class="container">
		<?php if($admin_data['breadcrumbs'] == true){ ?>
      <div class="breadcrumbs column">
        <a href="<?php bloginfo('url');?>">Home</a> &nbsp;  // &nbsp; <span class="current"><?php echo '<a href="'.get_option('front_houseproject_page').'">'.get_the_title().'</a>';
        if($urla[6]!=''){ echo ' &nbsp;  // &nbsp; '.$house_project[0]['project_name']; }?></span>
      </div>
		<?php }?>
		<div class="full-width"><!-- Main Content -->
			<!-- Single -->
			<div class="single">                        
				<div class="column">
					<h5 class="line"><?php if(!empty($_GET)){echo '';}else{ the_title();} ?></h5><span class="liner"></span>
				</div>
				<div class="form <?php if($url != $project_url) { echo'column-two-third';} else { echo 'column';}?> clearfix wrap">
          <?php if($url != $project_url) { ?>
          <h5 class="line">特色图片</h5><span class="liner"></span>
          <img style="max-width:100%"src="<?php echo $house_project[0]['feature'];?>" />
					<h5 class="line">文字介绍</h5><span class="liner"></span>
           <?php echo wpautop($house_project[0]['description']);?>
						
						<div class="search_tab clearfix">
								<div class="tab_title">地图</div>
								<div class="tab_content">
                    <div id="map-canvas"></div>
								</div>

								<div class="tab_title">详细信息</div>
								<div class="tab_content hide">
                  <table style="max-width:98%;margin-left:1%;">
                  <tr><td>入住时间</td><td><?php echo $house_project[0]['occupancy_year'].$house_project[0]['occupancy_month']?></td></tr>
                  <tr><td>电车距离</td><td><?php echo $house_project[0]['tram']?></td></tr>
                  <tr><td>火车距离</td><td><?php echo $house_project[0]['train']?></td></tr>
                  <tr><td>公交车距离</td><td><?php echo $house_project[0]['bus']?></td></tr>
                  <tr><td>层高</td><td><?php echo $house_project[0]['building_levels']?></td></tr>
                  <tr><td>5km内医院</td><td><?php echo $house_project[0]['school_5km']?></td></tr>
                  <tr><td>5km内学校</td><td><?php echo $house_project[0]['hospital_5km']?></td></tr>
                  </table>
								</div>
								
								<div class="tab_title">价目表</div>
								<div class="tab_content hide">
									<?php echo wpautop($house_project[0]['price_list']);?>
								</div>
						</div>
						<div class="clearfix">
						<a class="radius" href="mailto:maifang@1230.me">预约看房</a>
						<a href="#" class="radius">在线提问</a>
						<a href="#" class="radius">电话咨询</a>
						<div class="radius share"><a class="radius">分享好友</a>
              <div class="baidushare">
                <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
                  <span class="bds_more">分享到：</span>
                  <a class="bds_qzone"></a>
                  <a class="bds_tsina"></a>
                  <a class="bds_tqq"></a>
                  <a class="bds_renren"></a>
                  <a class="bds_t163"></a>
                  <a class="shareCount"></a>
                </div>
              </div>
            </div>
          </div>
          <?php echo my_shortcode(stripslashes($house_project[0]['contact']));?>
          <?php }?>
          <?php	
          if($url == $project_url){//在文章列表所展示的地图?>
            <?php $house_project = $wp_house->get_house_project(); //print_r($house_project);?>
            <div id="map-canvas"></div>
					<?php } ?>
				</div>
			</div>
			<!-- /Single -->
		<?php if($url != $project_url){
      //文章页面则显示侧边栏
      get_sidebar(); };?>
		</div>
		<!-- /Main Content -->
	</div>
 
</section>
<!-- / Content -->
<?php if($url != $project_url){ //单个文章所展示的js ?>
<script>
function initialize() {
  var myLatlng = new google.maps.LatLng(<?php echo $house_project[0]['latlng'];?>);
  var mapOptions = {
    zoom: 17,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: '<?php echo $house_project[0]['search_place']; ?>'
  });
  var contentString = "<?php echo $house_project[0]['search_place']; ?>";
  var infowindow = new google.maps.InfoWindow({
    content:contentString
  });
  infowindow.open(map,marker);
  google.maps.event.addListener(marker,'click',function(){
    infowindow.open(map,marker);
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
jQuery(document).ready(function($){
		$(".tab_title").click(function(){
			$(".tab_content").fadeOut(200);
			$(".tab_title").removeClass("current_tab");
			$(this).addClass('current_tab').next().fadeIn(200);
		});
		$('.share').hover(function(){
        $(this).find('.baidushare').fadeIn(200);
		},function(){
        $(this).find('.baidushare').fadeOut(200);
		});
})
</script>
<!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=0" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<!-- Baidu Button END -->
<?php }else{//列表页面所展示的js?>
<script type="text/javascript">
/*
  谷歌地图js文件
*/
jQuery(document).ready(function($){
  var map;
  var markers = [];
  var infowindows = [];
  function init(){
    //新的地点标记
    var newLatlng = new google.maps.LatLng(28.674264779117824,115.90881943702698);
    var mapOptions = {
      zoom: 4,
      center: newLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
    <?php
    $latlng = '';
    foreach($house_project as $key=>$house_details){
      $latlng .= $house_details['latlng'].'|';
      $content .= "<img style='float:left;width:120px;max-width:120px;height:auto;margin-right:10px' src='$house_details[feature]'>$house_details[project_name]<br/>$house_details[search_place]<br/><a href='$url/$house_details[ID]' target='_blank'>查看详情</p>|";
    }?>
    var latlng = parseLoaction("<?php echo $latlng; ?>");//格式化经纬度信息
    for(var i=0 ; i<=<?php echo $key; ?> ; i++){
      var newLatlng = new google.maps.LatLng(latlng[i][0],latlng[i][1]);
      var marker = new google.maps.Marker({
        position: newLatlng,
        map: map,
      });
      attachSecretMessage(marker,i)
    }
    /*google.maps.event.addListener(markers[1], 'click', function() {
        infowindows.open(map,markers[1]);
    });*/
  }
  //添加标记
  function addMarker(location){
    var marker = new google.maps.Marker({
      position: location,
      map: map,
    });
    //markers.push(marker);
  }
  //处理loaction数据
  function parseLoaction(latlngs){
    latlnga = new Array();
    latlng = new Array();
    latlnga = latlngs.split("|");
    for( var j=0 ; j < latlnga.length ; j++ ){
      latlng[j] = latlnga[j].split(",");
    }
    return latlng;
  }
  //处理窗口信息
  function parseContent(content){
    contenta = new Array();
    contenta = content.split("|");
    return contenta;
  }
  //将所有的内容添加到infowindow数组
  function addinfo(contentstring){
    var infowindow = new google.maps.InfoWindow({
      content:contentstring
    });
    infowindows.push(infowindow);
  }
  //信息列表
  function attachSecretMessage(marker, number) {
    var message = parseContent("<?php echo $content;?>")
    //var message = ["This","is","the","secret","message"];
    var infowindow = new google.maps.InfoWindow(
      { content: message[number],
        size: new google.maps.Size(50,50)
      });
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });
  }

  //将所有的地标添加到markers数组
  function setAllMap(map) {
    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(map);
    }
  }

  //彻底删除标记
  function deleteMarkers(){
    setAllMap(null);
    markers = [];
  }
  google.maps.event.addDomListener(window,'load',init);
});
</script>
<?php }?>
<?php get_footer(); ?>