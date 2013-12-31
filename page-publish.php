<?php
/*
	Template Name: 房产发布
*/
	if(!is_user_logged_in()){
		//未登录用户不可访问
		wp_redirect(get_bloginfo('url').'/wp-login.php');
	}
	if(!current_user_can('edit_post')){
		wp_die('您没有发布或者编辑文章的权限!请联系管理员。');
	}
?>
<?php get_header();?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtW3Xu9QdadpH7im8viJYhVugtskMbuY4&sensor=false&libraries=places"></script>
<script type="text/javascript">
/*谷歌地图*/
var map;
var markers = [];
function initialize() {
  var haightAshbury = new google.maps.LatLng(-26.344621405431493 , 133.7255859375);
  var mapOptions = {
    zoom: 4,
    center: haightAshbury,
    mapTypeId: google.maps.MapTypeId.TERRAIN
  };
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  /*搜索某个地方，自动完成*/
  var input = /** @type {HTMLInputElement} */(document.getElementById('search_place'));
  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);
  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map
  });
 google.maps.event.addListener(map, 'click', function(event) {
		clearOverlays();
    addMarker(event.latLng);
		//点击地图某个位置获取经纬度
		var xy = event.latLng;
		xy = xy.toString();
		xy = xy.substring(1,xy.length-1);
		xy = xy.split(',')
		document.getElementById("lat").value=xy[0].replace(" ","");
		document.getElementById("lng").value=xy[1].replace(" ","");
  });
  
  // Add a marker to the map and push to the array.
	function addMarker(location) {
		var marker = new google.maps.Marker({
			position: location,
			map: map,
			animation: google.maps.Animation.BOUNCE,
		});
		markers.push(marker);
	}
	// Sets the map on all markers in the array.
	function setAllMap(map) {
		for (var i = 0; i < markers.length; i++) {
			markers[i].setMap(map);
		}
	}
	// Removes the overlays from the map, but keeps them in the array.
	function clearOverlays() {
		setAllMap(null);
	}
	// Shows any overlays currently in the array.
	function showOverlays() {
		setAllMap(map);
	}
	// Deletes all markers in the array by removing references to them.
	function deleteOverlays() {
		clearOverlays();
		markers = [];
	}
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    input.className = '';
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      // Inform the user that the place was not found and return.
      input.className = 'notfound';
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
    marker.setIcon(/** @type {google.maps.Icon} */({
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map, marker);
  });

  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  function setupClickListener(id, types) {
    var radioButton = document.getElementById(id);
    google.maps.event.addDomListener(radioButton, 'click', function() {
      autocomplete.setTypes(types);
    });
  }

  setupClickListener('changetype-all', []);
  setupClickListener('changetype-establishment', ['establishment']);
  setupClickListener('changetype-geocode', ['geocode']);
  
}

google.maps.event.addDomListener(window, 'load', initialize);
/*wordpress ajax上传*/
addLoadEvent = function(func){if(typeof jQuery!="undefined")jQuery(document).ready(func);else if(typeof wpOnload!='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
var ajaxurl = '<?php bloginfo('url');?>/wp-admin/admin-ajax.php',
	pagenow = 'post-2',
	typenow = '',
	adminpage = 'post-2',
	thousandsSeparator = ',',
	decimalPoint = '.',
	isRtl = 0;

jQuery(document).ready(function($) {
		//AJAX Upload
			$('.image_upload_button').each(function() {
			var clickedObject = $(this);
			var clickedID = $(this).attr('id');
			var nonce = $('#security').val();
			//alert(nonce);
			//alert(clickedID);
					
			new AjaxUpload(clickedID, {
				action: ajaxurl,
				name: clickedID, // File upload name
				data: { // Additional data to send
					action: 'of_ajax_post_action',
					type: 'upload',
					security: nonce,
					data: clickedID },
				autoSubmit: true, // Submit file after selection
				responseType: false,
				onChange: function(file, extension) {},
				onSubmit: function(file, extension) {
					clickedObject.text('上传中'); // change button text, when user selects file	
					this.disable(); // If you want to allow uploading only 1 file at time, you can disable upload button
					interval = window.setInterval(function() {
						var text = clickedObject.text();
						if (text.length < 13) {	clickedObject.text(text + '.'); }
						else { clickedObject.text('上传中'); } 
						}, 200);
				},
				onComplete: function(file, response) {
					window.clearInterval(interval);
					clickedObject.text('上传图片');	
					this.enable(); // enable upload button
						
			
					// If nonce fails
					if(response==-1) {
						var fail_popup = $('#of-popup-fail');
						fail_popup.fadeIn();
						window.setTimeout(function() {
						fail_popup.fadeOut();
						}, 2000);
					}

					// If there was an error
					else if(response.search('Upload Error') > -1) {
						var buildReturn = '<span class="upload-error">' + response + '</span>';
						$(".upload-error").remove();
						clickedObject.parent().after(buildReturn);
						
						}
						
					else {
						var buildReturn = '<img class="hide of-option-image" id="image_'+clickedID+'" src="'+response+'" alt="" />';
		
						$(".upload-error").remove();
						$("#image_" + clickedID).remove();
						clickedObject.parent().after(buildReturn);
						$('img#image_'+clickedID).fadeIn();
						clickedObject.next('span').fadeIn();
						clickedObject.parent().prev('input').val(response);
					}
				}
			});
					
			});
					
		//AJAX Remove (clear option value)
			$('.image_reset_button').click(function() {
			
				var clickedObject = $(this);
				var clickedID = $(this).attr('id');
				var theID = $(this).attr('title');	
						
				var nonce = $('#security').val();
			
				var data = {
					action: 'of_ajax_post_action',
					type: 'image_reset',
					security: nonce,
					data: theID
				};
							
				$.post(ajaxurl, data, function(response) {
								
					//check nonce
					if(response==-1) { //failed			
						var fail_popup = $('#of-popup-fail');
						fail_popup.fadeIn();
						window.setTimeout(function() {
							fail_popup.fadeOut();
						}, 2000);
					}
					else {	
						var image_to_remove = $('#image_' + theID);
						var button_to_hide = $('#reset_' + theID);
						image_to_remove.fadeOut(500,function() { $(this).remove(); });
						button_to_hide.fadeOut();
						clickedObject.parent().prev('input').val('');
					}
				});
			});

  });	  
</script>
<?php


		//新增动作
		$nonce=$_POST['security'];
		if(isset($_POST) && !empty($_POST) && wp_verify_nonce($nonce, 'of_ajax_nonce')){
			//print_r($data);
			$title = $_POST['suburbs'].'区'.$_POST['rent_type'];
			$content = $_POST['content'];//主体内容
			global $admin_data;
			//print_r($admin_data);
			$category = array();
			$category[] = $admin_data['tt_map_category'];//从后台选择分类
			$post = array(
				'post_title'=>$title,
				'post_category'=>$category,//$category 为一个数组，从后台设置。指定文章发布分类
				'post_content'=>$content,
				'post_status'=>'draft'
			);
			$id = wp_insert_post($post);
			//新增字段姓名
			$data = $_POST;
			unset($data['security']);
			unset($data['content']);
			$data = array_filter($data);//删除数组中的空值
			//print_r($data);
			//将data所对应的的键名和键值分别保存为字段名和字段值
			
			foreach ($data as $meta_name=>$meta_value){
				add_post_meta($id,$meta_name,$meta_value,true) || update_post_meta($id,$meta_name,$meta_value);
			}
		}
	//验证数据

?>
<section id="content"><!-- Content -->
	<div class="container">  <!-- Main Content -->
    <div class="full-width">
			<!-- Single -->
			<div class="single">
				<div class="column"><h5 class="line"><?php the_title(); ?></h5><span class="liner"></span></div>
					<div class="form column clearfix wrap">
						<form method="post" enctype="multipart/form-data" action="" class="jqtransform">
							<table>
							<tr><td><label for="tt_name">姓名:</label></td><td><input type="text" name="tt_name" id="tt_name" value="" /></td></tr>
							<tr><td><label for="tt_phone">联系电话:</label></td><td><input type="text" name="tt_phone" id="tt_phone" value="" /></td></tr>
							<tr><td><label for="tt_addr">街道地址:</label></td><td><input type="text" name="att_ddr" id="tt_addr" value="" /></td></tr>
							<tr><td><label for="tt_addr1">市县:</label></td><td><input type="text" name="tt_addr1" id="tt_addr1" value="" /></td></tr>
							<tr><td><label for="tt_">选择地址</label></td>
								<td>
									<select name="suburbs">
										<option>===区===</option>
									</select>
									<select name="city" id="city">
										<option>===市===</option>
									</select>
									<select name="states" id="states_id">
										<option>===州===</option>
										<option value="jiangxi" id="jiangxi">江西</option>
										<option value="hunan" id="hunan">湖南</option>
										<option value="hunan" id="hunan">湖南</option>
										<option value="hunan" id="hunan">湖南</option>
										<option value="hunan" id="hunan">湖南</option>
										<option value="hunan" id="hunan">湖南</option>
										<option value="hunan" id="hunan">湖南</option>
										<option value="hunan" id="hunan">湖南</option>
										<option value="hunan" id="hunan">湖南</option>
										<option value="hunan" id="hunan">湖南</option>
										<option value="hunan" id="hunan">湖南</option>
										<option value="hunan" id="hunan">湖南</option>

									</select>
								</td>
							</tr>
							<tr>
								<td>出租类型</td>
								<td>
									<p class="clearfix">
										<span><input type="radio" name="rent_type" id="tt_sublet" value="分租">分租</span>
										<span><input type="radio" name="rent_type" id="tt_rent_all" value="整租">整租</span>
										<span><input type="radio" name="rent_type" id="tt_parking" value="车位">车位</span>
										<span><input type="radio" name="rent_type" id="tt_warehouse" value="仓库">仓库</span>
									</p>
									<p class="hidden sublet clearfix">
										<span>出租房间数</span><input type="text" name="tt_rent_rooms" class="num" />
										<span>全部房间数</span><input type="text" name="tt_all_rooms" class="num" >
									</p>
									<p class="rent_all clearfix">
										<span>租金</span><input type="text" name="tt_rent_price" class="num" /><span>周</span>
									</p>
									<p class="parking clearfix">
										<span>车位</span><select name="tt_parking" class="num"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
									</p>
									<p class="warehouse clearfix">
										<span>库房</span><select name="tt_warehouse"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
									</p>
								</td>
							</tr>
							<tr>
								<td><label>上传图片</label></td>
								<td>
								<input class="of-input" name="tt_descimg" id="uploadimg_upload" type="hidden" value="" />
								<div class="upload_button_div">
									<span class="mybutton image_upload_button" id="uploadimg">上传图片</span>
									<span class="mybutton image_reset_button hide" id="reset_uploadimg" title="uploadimg">移除</span>
									<div class="clearfix"></div>
									<div id="of-popup-fail" class="hidden">失败</div>
								</div>
								</td>
							</tr>
							<tr>
								<td><label for="search_place">输入地址</label></td>
								<td><input name="search_place" id="search_place" type="text"/></td>
							</tr>
							<tr><td>地图</td>
								<td>
									<div id="map-canvas"></div>
								</td>
							</tr>
							<tr><td><label for="tt_content">其他信息</label></td><td><textarea cols="100" rows="12" name="tt_content"></textarea></td></tr>
							<input type="hidden" id="security" name="security" value="<?php echo wp_create_nonce('of_ajax_nonce'); ?>" />
							<input type="hidden" id="lng" name="tt_longitude" value="" />
							<input type="hidden" id="lat" name="tt_latitude" value=""/>
							<tr><td></td><td><input type="submit" value="提交" /></td></tr>
							</table>
						</form>
					</div>
				
				
				
				
				
				
			</div>
			<!-- /Single -->
		</div>
  </div><!-- /Main Content -->
</section><!-- / Content -->
<?php get_footer(); ?>