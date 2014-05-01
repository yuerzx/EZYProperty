<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
<?php global $admin_data; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Sets initial viewport load and disables zooming  -->
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

<!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title><?php bloginfo('name'); ?> <?php wp_title(' - ', true, 'left'); ?></title>


<?php if($admin_data['favicon'] != "") { ?><link rel="shortcut icon" href="<?php echo esc_html($admin_data['favicon']); ?>" /><?php } ?>

<?php if($admin_data['media_favicon_iphone'] != "") { ?><link rel="apple-touch-icon" href="<?php echo esc_html($admin_data['media_favicon_iphone']); ?>"><?php } ?>

<?php if($admin_data['media_favicon_iphone_retina'] != "") { ?><link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_html($admin_data['media_favicon_iphone_retina']); ?>"><?php } ?>

<?php if($admin_data['media_favicon_ipad'] != "") { ?><link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_html($admin_data['media_favicon_ipad']); ?>"><?php } ?>

<?php if($admin_data['media_favicon_ipad_retina'] != "") { ?><link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_html($admin_data['media_favicon_ipad_retina']); ?>"><?php } ?>

<?php wp_head(); ?>
</head>

<body>
    <!-- Make sure all your bars are the first things in your <body> -->
    <header class="bar bar-nav red_line">
        <img src="<?php echo get_template_directory_uri().'/framework/img/logo.png'; ?>" class="pull-left logo">
    </header>

