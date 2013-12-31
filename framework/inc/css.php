<?php
function mypassion_styles_custom() {
global $admin_data; 
?>

<!-- Custom CSS Codes
========================================================= -->
	
<style>
	

	
	
	body{
		font-family: '<?php echo esc_html($admin_data['body_font']['face']); ?>', Arial, Helvetica, sans-serif; 
		font-size:<?php echo esc_html($admin_data['body_font']['size']); ?>; 
		font-weight:<?php echo esc_html($admin_data['body_font']['style']); ?>;  
		color:<?php echo esc_html($admin_data['body_font']['color']); ?>;
	}
	body{
		<?php 
			if($admin_data['bg-cover-image'] == true){
		?>
		background:url('<?php echo esc_html($admin_data['bg-cover-image']); ?>') no-repeat fixed center top;
		background-size:cover;
		<?php 
			}else {
		?>
		background:url('<?php echo esc_html($admin_data['bg-repeat-image']); ?>') repeat top;
		<?php 
			}
		?>
		
		background-color:#333;
		
	}
	
	@media only screen and (min-width: 1060px) and (max-width: 10000px) {
	.controller{
		width:<?php if($admin_data['boxed_or_fullwidth'] == false){?>100%<?php }else{?>1060px<?php }?>;
	}
	}
	p{
		font-family: '<?php echo esc_html($admin_data['body_font']['face']); ?>', Arial, Helvetica, sans-serif; 
		font-size:<?php echo esc_html($admin_data['body_font']['size']); ?>; 
		font-weight:<?php echo esc_html($admin_data['body_font']['style']); ?>;  
		color:<?php echo esc_html($admin_data['body_font']['color']); ?>;
		margin-top:0;
		margin-bottom:15px;
	}
	.logo{
		margin:<?php echo esc_html($admin_data['logo-margin']); ?>;
	}
	#nav a{text-transform:<?php echo esc_html($admin_data['nav_font_transform']); ?>;}
	.sf-menu li a{
		font-family: '<?php echo esc_html($admin_data['nav_font']['face']); ?>', Arial, Helvetica, sans-serif; 
		font-size:<?php echo esc_html($admin_data['nav_font']['size']); ?>; 
		font-weight:<?php echo esc_html($admin_data['nav_font']['style']); ?>;  
		color:<?php echo esc_html($admin_data['nav_font']['color']); ?>;
		text-transform:<?php echo esc_html($admin_data['nav_font_transform']); ?>;}
	
	#carousel li:nth-child(<?php echo esc_html($admin_data['m2_visiblenumberofposts']); ?>){
		border-bottom:none;
	}
	
	.sf-menu>li{
		margin-right:<?php echo esc_html($admin_data['menu_margin_right']); ?>px;
	}
	
	
	
	.sf-menu>li:hover>ul,
	.sf-menu>li.sfHover>ul {border-top:	4px solid <?php echo esc_html($admin_data['main-color']); ?>;}
	nav#nav{border-bottom:1px solid <?php echo esc_html($admin_data['main-color']); ?>;}
	.sf-menu>li>a:hover{border-bottom:3px solid <?php echo esc_html($admin_data['main-color']); ?>;}
	.sf-menu>li.current-menu-item>a{border-bottom:3px solid <?php echo esc_html($admin_data['main-color']); ?>;}
	.search .fs, .search2 .fs{background-color:<?php echo esc_html($admin_data['main-color']); ?>;}
	.search .fs:hover, .search2 .fs:hover{background-color:<?php echo esc_html($admin_data['main-color']); ?>;}
	a{color:<?php echo esc_html($admin_data['main-color']); ?>;}
	h5.line{border-bottom:1px solid <?php echo esc_html($admin_data['main-color']); ?>;}
	span.liner{border-bottom:4px solid <?php echo esc_html($admin_data['main-color']); ?>;}
	.badg{background:<?php echo esc_html($admin_data['main-color']); ?>;}
	.block span, .bestreview span, .block2 span, span.meta{color:<?php echo esc_html($admin_data['main-color']); ?>;}
	.flex-direction-nav a{background-color:<?php echo esc_html($admin_data['main-color']); ?>}
	.flexslider:hover .flex-next:hover, .flexslider:hover .flex-prev:hover {background-color:<?php echo esc_html($admin_data['main-color']); ?>;}
	.ui-tabs .ui-tabs-nav li.ui-tabs-active {border-bottom:3px solid <?php echo esc_html($admin_data['main-color']); ?>;}
	.ui-tabs .ui-tabs-panel {border-top:1px solid <?php echo esc_html($admin_data['main-color']); ?>;}
	.ui-state-active .ui-icon{background-color:<?php echo esc_html($admin_data['main-color']); ?>;}
	p.copyright{background:<?php echo esc_html($admin_data['main-color']); ?>;}
	#footer{border-bottom:4px solid <?php echo esc_html($admin_data['main-color']); ?>;}
	span.highlight{background:<?php echo esc_html($admin_data['main-color']); ?>;}
	.relatednews ul li span{color:<?php echo esc_html($admin_data['main-color']); ?>;}
	.comment-data p span{color:<?php echo esc_html($admin_data['main-color']); ?>;}
	a.comment-reply-link:hover{background:<?php echo esc_html($admin_data['main-color']); ?>;}
	.tagcloud a:hover{background:<?php echo esc_html($admin_data['main-color']); ?>;}
	.pagination ul li span{	background-color:<?php echo esc_html($admin_data['main-color']); ?>;}
	span.dropcap-box{background:<?php echo esc_html($admin_data['main-color']); ?>;}
	span.dropcap-circle{background:<?php echo esc_html($admin_data['main-color']); ?>;}
	.next:hover, .prev:hover {background-color:<?php echo esc_html($admin_data['main-color']); ?>;}
	input#submit{background-color:<?php echo esc_html($admin_data['main-color']); ?>;}
	a.send{background-color:<?php echo esc_html($admin_data['main-color']); ?>;}
	input.wpcf7-submit{background-color:<?php echo esc_html($admin_data['main-color']); ?>;}
	.pagination ul li a:hover{background-color:<?php echo esc_html($admin_data['main-color']); ?>;}
	::-moz-selection { background: <?php echo esc_html($admin_data['main-color']); ?>; color: #fff; text-shadow: none; }
	.::selection { background: <?php echo esc_html($admin_data['main-color']); ?>; color: #fff; text-shadow: none; }
	
	h5.line{
		text-transform:<?php echo esc_html($admin_data['main_title_transform']); ?>;
	}
		
	h1{
		font-family: '<?php echo esc_html($admin_data['font_h1']['face']); ?>', Arial, Helvetica, sans-serif; 
		font-size:<?php echo esc_html($admin_data['font_h1']['size']); ?>; 
		font-weight:<?php echo esc_html($admin_data['font_h1']['style']); ?>;  
		color:<?php echo esc_html($admin_data['font_h1']['color']); ?>;	
	}
	
	h2{
		font-family: '<?php echo esc_html($admin_data['font_h2']['face']); ?>', Arial, Helvetica, sans-serif; 
		font-size:<?php echo esc_html($admin_data['font_h2']['size']); ?>; 
		font-weight:<?php echo esc_html($admin_data['font_h2']['style']); ?>;  
		color:<?php echo esc_html($admin_data['font_h2']['color']); ?>;	
	}
	
	h3{
		font-family: '<?php echo esc_html($admin_data['font_h3']['face']); ?>', Arial, Helvetica, sans-serif; 
		font-size:<?php echo esc_html($admin_data['font_h3']['size']); ?>; 
		font-weight:<?php echo esc_html($admin_data['font_h3']['style']); ?>;  
		color:<?php echo esc_html($admin_data['font_h3']['color']); ?>;	
	}
	
	h4{
		font-family: '<?php echo esc_html($admin_data['font_h4']['face']); ?>', Arial, Helvetica, sans-serif; 
		font-size:<?php echo esc_html($admin_data['font_h4']['size']); ?>; 
		font-weight:<?php echo esc_html($admin_data['font_h4']['style']); ?>;  
		color:<?php echo esc_html($admin_data['font_h4']['color']); ?>;	
	}
	
	h5{
		font-family: '<?php echo esc_html($admin_data['font_h5']['face']); ?>', Arial, Helvetica, sans-serif; 
		font-size:<?php echo esc_html($admin_data['font_h5']['size']); ?>; 
		font-weight:<?php echo esc_html($admin_data['font_h5']['style']); ?>;  
		color:<?php echo esc_html($admin_data['font_h5']['color']); ?>;	
	}
	
	h6{
		font-family: '<?php echo esc_html($admin_data['font_h6']['face']); ?>', Arial, Helvetica, sans-serif; 
		font-size:<?php echo esc_html($admin_data['font_h6']['size']); ?>; 
		font-weight:<?php echo esc_html($admin_data['font_h6']['style']); ?>;  
		color:<?php echo esc_html($admin_data['font_h6']['color']); ?>;	
	}
	.ui-tabs .ui-tabs-nav li{
		font-family: '<?php echo esc_html($admin_data['font_h6']['face']); ?>', Arial, Helvetica, sans-serif; 
		font-size:<?php echo esc_html($admin_data['font_h6']['size']); ?>; 
		font-weight:<?php echo esc_html($admin_data['font_h6']['style']); ?>;  
		color:<?php echo esc_html($admin_data['font_h6']['color']); ?>;	
	}
	
	#mypassion-review-wrapper p, .mypassion-review-wrapper span .mypassion-user-review-description span, .mypassion-user-review-description b, .mypassion-review-criteria span{
		font-family: '<?php echo esc_html($admin_data['review_p']['face']); ?>', Arial, Helvetica, sans-serif; 
		font-size:<?php echo esc_html($admin_data['review_p']['size']); ?>; 
		font-weight:<?php echo esc_html($admin_data['review_p']['style']); ?>;  
	}
	#mypassion-review-wrapper h1{
		font-family: '<?php echo esc_html($admin_data['review_h1']['face']); ?>', Arial, Helvetica, sans-serif; 
		font-size:<?php echo esc_html($admin_data['review_h1']['size']); ?>; 
		font-weight:<?php echo esc_html($admin_data['review_h1']['style']); ?>;  
	}
	#mypassion-review-wrapper h6{
		font-family: '<?php echo esc_html($admin_data['review_h6']['face']); ?>', Arial, Helvetica, sans-serif; 
		font-size:<?php echo esc_html($admin_data['review_h6']['size']); ?>; 
		font-weight:<?php echo esc_html($admin_data['review_h6']['style']); ?>;  
	}
	#mypassion-review-wrapper #mypassion-review-header{
		font-family: '<?php echo esc_html($admin_data['review_header']['face']); ?>', Arial, Helvetica, sans-serif; 
		font-size:<?php echo esc_html($admin_data['review_header']['size']); ?>; 
		font-weight:<?php echo esc_html($admin_data['review_header']['style']); ?>;  
	}
	
	.next:hover, .prev:hover {
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo esc_html($admin_data['button_color_top']); ?>), to(<?php echo esc_html($admin_data['button_color_bottom']); ?>)); /* Safari 4-5, Chrome 1-9 */ 
		background: -webkit-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>);/* Safari 5.1, Chrome 10+ */  
		background: -moz-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>); /* Firefox 3.6+ */ 
		background: -ms-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>); /* IE 10 */ 
		background: -o-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>);/* Opera 11.10+ */ 
	}
	input#submit, input[type="submit"]{
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo esc_html($admin_data['button_color_top']); ?>), to(<?php echo esc_html($admin_data['button_color_bottom']); ?>)); /* Safari 4-5, Chrome 1-9 */ 
		background: -webkit-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>);/* Safari 5.1, Chrome 10+ */  
		background: -moz-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>); /* Firefox 3.6+ */ 
		background: -ms-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>); /* IE 10 */ 
		background: -o-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>);/* Opera 11.10+ */ 
	}
	input#submit:hover, input[type="submit"]:hover{
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo esc_html($admin_data['button_color_bottom']); ?>), to(<?php echo esc_html($admin_data['button_color_top']); ?>)); /* Safari 4-5, Chrome 1-9 */ 
		background: -webkit-linear-gradient(top, <?php echo esc_html($admin_data['button_color_bottom']); ?>, <?php echo esc_html($admin_data['button_color_top']); ?>);/* Safari 5.1, Chrome 10+ */  
		background: -moz-linear-gradient(top, <?php echo esc_html($admin_data['button_color_bottom']); ?>, <?php echo esc_html($admin_data['button_color_top']); ?>); /* Firefox 3.6+ */ 
		background: -ms-linear-gradient(top, <?php echo esc_html($admin_data['button_color_bottom']); ?>, <?php echo esc_html($admin_data['button_color_top']); ?>); /* IE 10 */ 
		background: -o-linear-gradient(top, <?php echo esc_html($admin_data['button_color_bottom']); ?>, <?php echo esc_html($admin_data['button_color_top']); ?>);/* Opera 11.10+ */ 
		background-color:#555;
	}
	a.send{
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo esc_html($admin_data['button_color_top']); ?>), to(<?php echo esc_html($admin_data['button_color_bottom']); ?>)); /* Safari 4-5, Chrome 1-9 */ 
		background: -webkit-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>);/* Safari 5.1, Chrome 10+ */  
		background: -moz-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>); /* Firefox 3.6+ */ 
		background: -ms-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>); /* IE 10 */ 
		background: -o-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>);/* Opera 11.10+ */ 
	}
	a.send:hover{
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo esc_html($admin_data['button_color_bottom']); ?>), to(<?php echo esc_html($admin_data['button_color_top']); ?>)); /* Safari 4-5, Chrome 1-9 */ 
		background: -webkit-linear-gradient(top, <?php echo esc_html($admin_data['button_color_bottom']); ?>, <?php echo esc_html($admin_data['button_color_top']); ?>);/* Safari 5.1, Chrome 10+ */  
		background: -moz-linear-gradient(top, <?php echo esc_html($admin_data['button_color_bottom']); ?>, <?php echo esc_html($admin_data['button_color_top']); ?>); /* Firefox 3.6+ */ 
		background: -ms-linear-gradient(top, <?php echo esc_html($admin_data['button_color_bottom']); ?>, <?php echo esc_html($admin_data['button_color_top']); ?>); /* IE 10 */ 
		background: -o-linear-gradient(top, <?php echo esc_html($admin_data['button_color_bottom']); ?>, <?php echo esc_html($admin_data['button_color_top']); ?>);/* Opera 11.10+ */ 
		background-color:#555;
		text-decoration:none;
	}
	.pagination ul li a:hover{
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo esc_html($admin_data['button_color_top']); ?>), to(<?php echo esc_html($admin_data['button_color_bottom']); ?>)); /* Safari 4-5, Chrome 1-9 */ 
		background: -webkit-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>);/* Safari 5.1, Chrome 10+ */  
		background: -moz-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>); /* Firefox 3.6+ */ 
		background: -ms-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>); /* IE 10 */ 
		background: -o-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>);/* Opera 11.10+ */ 
	}
	.pagination ul li span{
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo esc_html($admin_data['button_color_top']); ?>), to(<?php echo esc_html($admin_data['button_color_bottom']); ?>)); /* Safari 4-5, Chrome 1-9 */ 
		background: -webkit-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>);/* Safari 5.1, Chrome 10+ */  
		background: -moz-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>); /* Firefox 3.6+ */ 
		background: -ms-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>); /* IE 10 */ 
		background: -o-linear-gradient(top, <?php echo esc_html($admin_data['button_color_top']); ?>, <?php echo esc_html($admin_data['button_color_bottom']); ?>);/* Opera 11.10+ */ 
	}
	div#tabs{
		border:none;
	}
	div#tabs ul{background:none;}
	div#tabs li{
		border-left:none;
		border-top:none;
		border-right:none;	
	}
	.caroufredsel_wrapper{
		min-height:175px;		
	}

		<?php if($admin_data['layout_skin'] == "white"){?>
.controller2{ 	background:#FFF; }
.sf-menu>li>a{ 	border-bottom:3px solid #FFF; }
.sf-menu li ul{	background:#fafafa;}
div.search{		background:#fafafa;}
div.search2{	background:#fafafa;}
.block li, .bestreview li, .block3 li{border-bottom:1px solid #dbdbdb;}
.block a, .bestreview a{		color:#696969;}
#footer{		background:#fafafa;}
footer#footer h1, footer#footer h2, footer#footer h3, footer#footer h4, footer#footer h5, footer#footer h6 {color:#696969;}
h1 a, h2 a, h3 a, h4 a, h5 a, h6 a{	color:#696969;}
h1, h2, h3, h4, h5, h6{	color:#696969;}

<?php if($admin_data['posts_bg'] == true){ ?>
	.block3 li:nth-child(2n-1){
		background:#f5f5f5;
		padding-right:20px;
		padding-left:20px;
	}
	.block3 li:nth-child(2n){
		background:#fafafa;
		padding-right:20px;
		padding-left:20px;
	}
	.block3 li a.thumbnail_image img{
		width:250px;
	}
	<?php } ?>


.ui-state-active a,
.ui-state-active a:link,
.ui-state-active a:visited {color: #696969;}

.ui-state-default a,
.ui-state-default a:link,
.ui-state-default a:visited {	color: #696969;}

.ui-tabs-panel ul li{border-bottom:1px solid #dbdbdb;}
.tagcloud a{background:#f4f4f4;}
.sidebar ul.social li{background:#fafafa;}
.sidebar ul.social li span{color:#696969;}
.ui-tabs-panel a.title{	color:#696969;}
.sidebar ul.ads125 li a{background:#fafafa;}
.widget_nav_menu ul a{color:#696969;}

.ui-state-hover a,
.ui-state-hover a:hover,
.ui-state-hover a:link,
.ui-state-hover a:visited {
	color: #696969;
}
.ui-state-active,
.ui-widget-content .ui-state-active,
.ui-widget-header .ui-state-active {
	color: #696969;
}
.ui-state-default,
.ui-widget-content .ui-state-default,
.ui-widget-header .ui-state-default {
	color: #696969;
}
.breadcrumbs{
	border-bottom:1px solid #dbdbdb;
}
.pagination ul li a{
	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#e2e2e2), to(#c9c9c9)); /* Safari 4-5, Chrome 1-9 */ 
	background: -webkit-linear-gradient(top, #e2e2e2, #c9c9c9);/* Safari 5.1, Chrome 10+ */  
	background: -moz-linear-gradient(top, #e2e2e2, #c9c9c9); /* Firefox 3.6+ */ 
	background: -ms-linear-gradient(top, #e2e2e2, #c9c9c9); /* IE 10 */ 
	background: -o-linear-gradient(top, #e2e2e2, #c9c9c9);/* Opera 11.10+ */ 
	background-color:#555;
}
nav.is-sticky{
	background:url(<?php echo get_template_directory_uri(); ?>/framework/img/nav_bg1.png);
}

	<?php }else{?>
.controller2{ 	background:#212121; }
.sf-menu>li>a{ 	border-bottom:3px solid #212121; }
.sf-menu li ul{	background:#171717;}
div.search{		background:#171717;}
div.search2{	background:#171717;}
.block li, .bestreview li, .block3 li{		border-bottom:1px solid #3E3E3E;}
.block a, .bestreview a{		color:#ffffff;}
#footer{		background:#171717;}
footer#footer h1, footer#footer h2, footer#footer h3, footer#footer h4, footer#footer h5, footer#footer h6 {color:#ffffff;}
h1 a, h2 a, h3 a, h4 a, h5 a, h6 a{	color:#ffffff;}
h1, h2, h3, h4, h5, h6{	color:#ffffff;}


<?php if($admin_data['posts_bg'] == true){ ?>
	.block3 li:nth-child(2n-1){
		background:#191919;
		padding-right:20px;
		padding-left:20px;
	}
	.block3 li:nth-child(2n){
		background:#111;
		padding-right:20px;
		padding-left:20px;
	}
	.block3 li a.thumbnail_image img{
		width:250px;
	}
	<?php } ?>

.ui-state-active a,
.ui-state-active a:link,
.ui-state-active a:visited {color: #ffffff;}

.ui-state-default a,
.ui-state-default a:link,
.ui-state-default a:visited {color: #ffffff;}

.ui-tabs-panel ul li{border-bottom:1px solid #3E3E3E;}
.tagcloud a{background:#111111;}
.sidebar ul.social li{background:#171717;}
.sidebar ul.social li span{color:#ffffff;}
.ui-tabs-panel a.title{	color:#ffffff;}
.sidebar ul.ads125 li a{background:#171717;}
.widget_nav_menu ul a{color:#ffffff;}

.ui-state-hover a,
.ui-state-hover a:hover,
.ui-state-hover a:link,
.ui-state-hover a:visited {
	color: #ffffff;
}
.ui-state-active,
.ui-widget-content .ui-state-active,
.ui-widget-header .ui-state-active {
	color: #ffffff;
}
.ui-state-default,
.ui-widget-content .ui-state-default,
.ui-widget-header .ui-state-default {
	color: #ffffff;
}
.breadcrumbs{
	border-bottom:1px solid #3E3E3E;
}
.pagination ul li a{
	background-color:#6c6c6c;
	color:#FFF;
}
nav.is-sticky{
	background:url(<?php echo get_template_directory_uri(); ?>/framework/img/nav_bg2.png);
}
ul.sharebox li a{
	color:#ffffff;
	border:1px solid #3e3e3e;
	padding:5px 15px 2px 10px;
	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#212121), to(#171717)); /* Safari 4-5, Chrome 1-9 */ 
	background: -webkit-linear-gradient(top, #212121, #171717);/* Safari 5.1, Chrome 10+ */  
	background: -moz-linear-gradient(top, #212121, #171717); /* Firefox 3.6+ */ 
	background: -ms-linear-gradient(top, #212121, #171717); /* IE 10 */ 
	background: -o-linear-gradient(top, #212121, #171717);/* Opera 11.10+ */ 
	background-color:#f0f0f0;
}
ul.sharebox li a:hover{
	text-decoration:none;
	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#171717), to(#212121)); /* Safari 4-5, Chrome 1-9 */ 
	background: -webkit-linear-gradient(top, #171717, #212121);/* Safari 5.1, Chrome 10+ */  
	background: -moz-linear-gradient(top, #171717, #212121); /* Firefox 3.6+ */ 
	background: -ms-linear-gradient(top, #171717, #212121); /* IE 10 */ 
	background: -o-linear-gradient(top, #171717, #212121);/* Opera 11.10+ */ 
	background-color:#fff;
}
.authorbox{
	background:#444;
	border-bottom:1px solid #555;
}
.post-tags{
	background:#333;
	border-bottom:1px solid #444;
}
.single-navigation{
	background:#333;
}

.comments ul li>div.comment-body{
	background:#171717;	
}
ul.children{
	border-left:1px solid #171717;
}
a.url{
	color:#fff;
}
.comment-data p{
	color:#fff;
}
a.comment-reply-link{
	background:#333;
}
.form textarea{
	border:1px solid #3E3E3E;
}
.input input{
	border:1px solid #3E3E3E;
}
.relatednews ul li a{
	color:#fff;
}
.block2 li{
	border-bottom:1px solid #3E3E3E;
}
.block2 li a{
	color:#FFF;
}
.contact-info{
	background:#171717;
}
input.wpcf7-text{
	border:1px solid #3E3E3E;
}
.wpcf7 textarea{
	border:1px solid #3E3E3E;
}
table{
	width:100%;
	text-align:left;
	border-top:1px solid #111;
	border-left:1px solid #111;
	border-spacing: 0;
	margin-bottom:15px;
	color:#929292;
}
table th{
	vertical-align:top;
	background:#111;
	border-right:1px solid #111;
	border-bottom:1px solid #111;
	padding:3px;
}
table td{
	vertical-align:top;
	border-right:1px solid #111;
	border-bottom:1px solid #111;
	padding:3px;
}

	<?php }?>


	<?php echo esc_html($admin_data['custom_css']); ?>
	
</style>

<?php }
add_action( 'wp_head', 'mypassion_styles_custom', 100 );
?>