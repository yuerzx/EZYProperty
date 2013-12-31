<?php
/*
	Template Name:房产详情展示页面
	Modified By: Han Sun
	Version: 0.2
	Last Update: 1 Sep 2013
  Update the mortgage calculator. 
*/
get_header();?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/framework/css/tipped/tipped.css"/>
<!--[if lt IE 9]>
  <script type="text/javascript" src="<?php bloginfo('template_url');?>/framework/js/excanvas/excanvas.js"></script>
<![endif]-->
<script src="<?php bloginfo('template_url');?>/framework/js/script/prototype.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url');?>/framework/js/script/scriptaculous.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/framework/js/spinners/spinners.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/framework/js/tipped/tipped.js"></script>



<style type="text/css">
	table, th, td{
	border: 0px;
	padding-bottom:2px;
	}
	#ttp,#ttr,#ttn{
		background:#f9f9f9;
	}
</style>
<script type="text/javascript">
	jQuery(document).ready(function($){
		Tipped.create("#month_explain",$('#information_loan')[0],{
                skin:'light',});
        Tipped.create("#information_price_active",$('#information_price')[0],{
                skin:'light',});
		Tipped.create("#mortgage_calculator_active", $('#mortgage_calculator')[0], {
  				skin: 'light',
  				hook: 'topleft',
  				hideOn: false,
  				closeButton: true,
  				onShow: function(content, element) { 
  				$(element).css({'border': '1px solid #ff0000'});
 				 },
 				 onHide: function(content, element) { 
    				$(element).css({'border': '1px solid #c7c7c7'});
 				 }
 		});
		function cal(way){
			var p = $('#ttp').val(),//获取贷款本金，单位为K
			r = $('#ttr').val(),//获取年利率
			n = $('#ttn').val();//获取年分数值
			/*公式为(月利率*贷款本机/(1-(1+月利率)^(-月份)))*/
			if(way=='bx'){//本息一起
				c = ((r/100/12)*p)/(1-Math.pow((1+r/100/12),(-n*12)));//计算出月供值
			}else{//只还利息
				c = (r/100/12)*p;
			}
			c = c.toFixed(2)
			$('#permonth').html(c);//赋值月供给文本域
			$('#p_year').html(n);//赋值年份数值文本域
			$('#p_lixi').html(r);//赋值年利率给文本域
		}
		cal('ox');//初始化月供,只还利息
		$('#ttp, #ttr, #ttn').keyup(function(){
			var is=$('#select').val();
			if(is=='1'){
				cal('bx');
			}else{
				cal('ox');
			}
		});
		$('#select').change(function(){
			var is=$('#select').val();
			if(is=='1'){
				cal('bx');
			}else{
				cal('ox');
			}
		});
	var fixn = $('#price').html();//房产价格
   new Control.Slider('handle','track',{
      sliderValue:1,
      onSlide:function(v){
				$('#debug, #p_edu').html((v*80).toFixed(0));
				$('#ttp').val(((v*0.8)*fixn).toFixed(2));//赋值贷款本金
				var is=$('#select').val();
				if(is=='1'){
					cal('bx');
				}else{
					cal('ox');
				}
			},
      onChange:function(v){
				$('#debug, #p_edu').html((v*80).toFixed(0));
				$('#ttp').val(((v*0.8)*fixn).toFixed(2));//完成赋值
				var is=$('#select').val();
				if(is=='1'){
					cal('bx');
				}else{
					cal('ox');
				}
			}
			});
	})
</script>
<section id="content"><!-- Content -->
  <div class="container">
		<?php if($admin_data['breadcrumbs'] == true){ ?>
      <div class="breadcrumbs column">
        <?php mypassion_breadcrumbs(); ?>
      </div>
      
		<?php } ?>
		<div class="full-width"><!-- Main Content -->
			<!-- Single -->
			<div class="single"> 
				<div class="column">
					<h5 class="line"><?php  the_title(); ?></h5><span class="liner"></span>
				</div>
				
				<div class="column house clearfix wrap">
				<?php
					//房产展示页面
					if(isset($_GET) && !empty($_GET) && $_GET['id']!=''){
						$wp_house = new WP_house();
						$args = array(
              'query'=>array('ID'=>$_GET['id'])
						);
						$houses = $wp_house->get_houses_by($args);
						//print_r($houses);
						$args = array(
              'query'=>array('project_name'=>$houses[0]['project_name'])
            );
						$house_project = $wp_house->get_house_project_by($args);
						//print_r($house_project);
					}
				?>
				<table>
					<tr>
						<td align="center">
							<img class="floor_plan" src="<?php echo $houses[0]['floor_plan']?>">
						</td>
						<td>
							<table class="house_meta">
							<tr>
                                <td colspan="2" align="center"><a href="<?php echo $house_project[0]['project_link']; ?>" target="_blank"><img style="max-width:120px;" src="<?php echo $house_project[0]['project_logo']; ?>" /></a></td></tr>
							<tr><td colspan="2">
								<p style="width:12em">项目名称:<?php echo $houses[0]['project_name'];?></p></td></tr>
							<tr><td colspan="2">
								<p class="clearfix">
								<span style="margin-right:6px"><img style="vertical-align:middle;margin-right:3px" src="<?php bloginfo('template_url');?>/framework/images/beds.png" title="卧室"><?php echo $houses[0]['bedroom'];?></span>
								<span style="margin-right:6px"><img style="vertical-align:middle;margin-right:3px" src="<?php bloginfo('template_url');?>/framework/images/baths.png" title="卫生间"><?php echo $houses[0]['bath'];?></span>
								<span style="margin-right:6px"><img style="vertical-align:middle;margin-right:3px" src="<?php bloginfo('template_url');?>/framework/images/parking_spaces.png" title="停车位"><?php echo $houses[0]['car_park'];?></span>
								</p> </td><tr>
							<tr><td colspan="2"><p class="clearfix">
								<span style="float:left;margin-right:3px;">状态:</span>
									<?php if($houses[0]['sold']=='available') {
											echo '<span style="background:green;width:5em;height:1.3em;float:left;margin-top:2px;"> </span>';
										}else if($houses[0]['sold']=='reserve'){
											echo '<span style="background:yellow;width:5em;height:1.3em;float:left;margin-top:2px;"> </span>';
										}else{
											echo '<span style="background:red;width:5em;height:1.3em;float:left;margin-top:2px;"> </span>';
										}
									?>
							</p></td></tr>
							<tr><td colspan="2"><p>房号:<?php echo $houses[0]['house_number'];?>&nbsp;&nbsp;楼层:<?php echo $houses[0]['house_level'];?></p></td></tr>
							<tr><td><p><span id="information_price_active">价格从<span id="price"><?php echo $houses[0]['price'];?></span>K起*</span> 
                                <div id="information_price" style="display:none">
                                <p>价格仅为参考价格，最终成交价格会略有变动。</p>
                                <p>准确价格请咨询 澳洲买房网 <a href="mailto:maifang@1230.me">客服专员</a>。</p>
                                </div>
                                </td>
									<td><p>
								       <span id="month_explain">月供:<span id="permonth"></span>K*</span>&nbsp;&nbsp;<span id="mortgage_calculator_active"><img src="<?php bloginfo('template_url');?>/framework/images/calculator.png"></span> </p>
									<div id="information_loan" style="display:none">
									<p>月还款仅为参考</p>
									<p>数据基于贷款额度为<span id="p_edu">80</span>%</p>
									<p>贷款年限为<span id="p_year"></span>年</p>
									<p>年利率<span id="p_lixi"></span>%</p>
                                    <p style="font-size:10px;">*实际数据会有出入,详情数据请资讯贷款机构。<p/>
									</div>
									
									<div id="mortgage_calculator" style="display:none" style="width:300px;">
										<h1>澳洲房产资讯 贷款计算器</h1>
										<p>还款方式： <select name="select" id="select">
										<option value="0">只还利息</option>
										<option value="1">连本带息</option>
										</select> &nbsp;&nbsp; 贷款额度：<span><span id="debug">80</span>%</span>
										</p>
  										<div id="track" style="float:left;width:295px;background:url(<?php bloginfo('template_url');?>/framework/images/slider_bg.png) no-repeat;height:10px;margin-right:10px;">
    										<div id="handle" style="width:20px;height:21px;background:url(<?php bloginfo('template_url');?>/framework/images/slider.png) no-repeat;top:-5px;"> </div>
 										</div><br>
										<p>贷款金额：<input type="text" id="ttp" name="ttp" value="<?php echo $houses[0]['price']*0.8;?>" size="5" >K</p>
										<p>年利率<span><input type="text" id="ttr" name="ttr" value="<?php echo get_option('year_rate');?>" size="2" ></span>%&nbsp;&nbsp;&nbsp;&nbsp;贷款长度：<input type="text" id="ttn" name="ttn" value="<?php echo get_option('total_month')/12;?>" size="2" >年</p><br>
									   <p style="font-size:10px;">*实际数值会有出入,准确数据请资讯贷款机构。<p/>
									</div>
										
										</td></tr>
							
							<tr><td colspan="2"><p>距离火车站:<?php echo $house_project[0]['train'];?>M</p></td></tr>
							<tr><td colspan="2"><p>距离电车站:<?php echo $house_project[0]['tram'];?>M</p></td></tr>
							<tr><td colspan="2"><p>距离公交站:<?php echo $house_project[0]['bus'];?>M</p></td></tr>
								</table>
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td>
						
						</td>
					</tr>
					<tr>
						<td>
							<?php
								$content = stripslashes($houses[0]['description']);
								echo my_shortcode($content);
							?>
						</td>
					</tr>
					<tr>
						<td>
							<?php
								$content = stripslashes($house_project[0]['description']);
								echo my_shortcode($content);
							?>	
						</td>
					</tr>

				</table>
					<!--详情-->
				</div>  
			</div>
			<!-- /Single -->
		</div>
		<!-- /Main Content -->
	</div>
 
</section>
<!-- / Content -->
<?php get_footer(); ?>