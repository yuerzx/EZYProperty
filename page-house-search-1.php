<?php

/*
	Template Name:房产搜索页面
*/
get_header(); 

?>

<style type="text/css">
	.search_tab{
		height:400px;
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
		width:98%;
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
	#search_submit{
		position:absolute;
		bottom:5px;
	}
</style>
<script type="text/javascript">
	jQuery(document).ready(function($){
		$(".tab_content").append('<input id="search_submit" type="submit" value="提交">');
		$(".tab_title").click(function(){
			$(".tab_content").fadeOut(200);
			$(".tab_title").removeClass("current_tab");
			$(this).addClass('current_tab').next().fadeIn(200).append('<input id="search_submit" type="submit" value="提交">');
		});
	})

</script>
<section id="content"><!-- Content -->

  <div class="container">
		<?php if($admin_data['breadcrumbs'] == true){ ?>
      <div class="breadcrumbs column">
        <?php mypassion_breadcrumbs(); ?>
      </div>
		<?php }?>
		<div class="full-width"><!-- Main Content -->
			<!-- Single -->
			<div class="single">                        
				<div class="column">
					<h5 class="line"><?php if(!empty($_GET)){echo '搜索结果页面';}else{ the_title();} ?></h5><span class="liner"></span>
				</div>
				<div class="form column clearfix wrap">
				<?php //print_r($_GET);?>
				<?php if(!empty($_GET)){//判断搜索?>
					<table>
						<thead>
							<tr>
								<?php// $display_names = array('项目名称','房号','楼层','卧室','朝向','总面积','价格和户型图');
								//	foreach($display_names as $display_name){}
							//	?>
								<td>项目名称</td>
								<td>房号</td>
								<td>楼层
								<?php
									$url = preg_replace('/&orderby=(.*?)&order=(.*?)C/i','',get_url());
									echo '<a href="'.$url.'&orderby=house_level&order=DESC">▼</a>';
									echo '<a href="'.$url.'&orderby=house_level&order=ASC">▲</a>';
								?></td>
								<td>卧室</td>
								<td>朝向</td>
								<td>内部面积
								<?php
										echo '<a href="'.$url.'&orderby=int_m2&order=DESC">▼</a>';
										echo '<a href="'.$url.'&orderby=int_m2&order=ASC">▲</a>';
								?></td>													
								<td>总面积</td>

								<td>价格和户型图</td>
							</tr>
						</thead>
						<?php
							//print_r($_GET);
							$wp_house = new WP_house();
							if(!empty($_GET)){
								$current_page = $_GET['current_page'];//保存当前页面的值，再分页中可以用到
								unset($_GET['current_page']);//删除传入的当前页数，保证查询正确。
								//格式化查询价格
								if($_GET['pmin']=='min'&&$_GET['pmax']=='max'){
									$_GET['price']='';
								}else{
									$_GET['args']['price'] = $_GET['pmin'].'-'.$_GET['pmax'];
								}
								//输入查询参数
								$orderby = 'ID';
								$order = 'DESC';
								if($_GET['orderby']!=''){
									$orderby = $_GET['orderby'];
								}
								if($_GET['order']!=''){
									$order = $_GET['order'];
								}
								$args = array(
									'query'=>$_GET['args'],
									'orderby'=>$orderby,
									'order'=>$order
								);
								if(!$houses = $wp_house->get_houses_by($args)){
									//print_r($houses);
									echo '未找到符合条件的房屋!';
								}else{
								$display_fields = array('project_name'=>'项目名称','house_number'=>'房号','house_level'=>'楼层','bedroom'=>'卧室','towards'=>'朝向','int_m2'=>'内部面积');
								$max_pages = $houses['pages'];//保存最大页数
								unset($houses['pages']);
								foreach($houses as $house){
									echo '<tr>';
									foreach($display_fields as $display_field=>$display_name){
										if($house!='' && $display_field!='project_name'){//判断当前是否有内容，有则输出
											echo '<td>'.$house[$display_field].'</td>';
										}else if($display_field == 'project_name'&&$house['project_name']!=''){
											$args = array(
												'query'=>array('project_name'=>$house['project_name'])
											);
											$house_project = $wp_house->get_house_project_by($args);
											echo '<td><a href="'.$house_project[0]['project_link'].'" target="_blank"><img style="max-width:70px;" src="'.$house_project[0]['project_logo'].'" /></a></td>';//输出项目logo
										}
									}
									//输出总面积，价格和户型图
									if($house['int_m2']!=''){
										$totle_m2 = $house['int_m2']+$house['ext_m2'];
										echo "<td>$totle_m2</td><td><a href='".get_option('front_house_page')."/?id=".$house['ID']."' target='_blank'>查看详细信息</a></td>";
										echo '</tr>';
									}
									}
								}
							}
						?>
						</table>
						<?php
							$url = get_url();
							echo '<div class="pagenavi">分页列表：';
							for($i=1;$i<=$max_pages;$i++){
								$url = preg_replace("/current_page=\d*/i","current_page=$i",$url);?>
								 <a <?php if($current_page==$i){echo 'class="current"';}?> href="<?php echo $url;?>"><?php echo $i;?></a>
							<?php }
							echo '</div>';
						?>
						<?php } ?>
						
						<div class="search_tab clearfix">
							<form method="get" action="">
								<div class="tab_title">基本选房</div>
								<div class="tab_content">
								
										<p class="clearfix">
										<label for="price">价格</label>
											从
											<select name="pmin">
													<option value="min">Min</option>
													<?php for($i=300;$i<=700;$i+=50){?>
													<option value="<?php echo $i;?>" <?php if($_GET['pmin'] == $i){echo 'selected="selected"';}?>><?php echo $i;?>K</option>
													<?php }?>
											</select>
											到
											<select name="pmax">
												<option value="max">Max</option>
												<?php for($i=350;$i<=800;$i+=50){?>
												<option value="<?php echo $i;?>" <?php if($_GET['pmax'] == $i){echo 'selected="selected"';}?>><?php echo $i;?>K</option>
												<?php }?>
											</select>
											
										</p>
										<!--价格-->	

										<p class="clearfix">
											<label for="">房间数</label>
											<select name="args[bedroom]">
												<?php for($i=1;$i<=5;$i++){?>
													<option value="<?php echo $i;?>" <?php if($_GET['bedroom']==$i){echo 'selected="selected"';}?>><?php echo $i;?></span>
											<?php }?>
											</select>
										</p>
										<!--房间数-->

										<p class="clearfix">
										<label for="">停车位</label>
											<select name="args[car_park]">
												<?php $temp_arr = array(''=>'任意','1'=>'1','2'=>'2','3'=>'3');
													foreach($temp_arr as $temp=>$value){?>
													<option value="<?php echo $temp;?>" <?php if($_GET['car_park']==$temp){echo 'selected="selected"';}?>><?php echo $value;?></option>
												<?php }?>
											</select>
										</p>
										<!--停车位-->
								</div>
								

								<div class="tab_title">户型选房</div>
								<div class="tab_content hide">
									内容3
								</div>
								
								<div class="tab_title">高级选房</div>
								<div class="tab_content hide">
									内容4
								</div>
								
								<div class="tab_title">喜好选房</div>
								<div class="tab_content hide">
									内容2
								</div>
								<input type="hidden" name="current_page" value='1' />
							</form>
						</div>

				</div>  
			</div>
			<!-- /Single -->
		</div>
		<!-- /Main Content -->
	
	</div>
 
</section>
<!-- / Content -->
<?php get_footer(); ?>