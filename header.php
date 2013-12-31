<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
<?php global $admin_data; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if($data['check_responsive'] == 1) { ?> <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> <?php } ?>

<title><?php bloginfo('name'); ?> <?php wp_title(' - ', true, 'left'); ?></title>


<?php if($admin_data['favicon'] != "") { ?><link rel="shortcut icon" href="<?php echo esc_html($admin_data['favicon']); ?>" /><?php } ?>

<?php if($admin_data['media_favicon_iphone'] != "") { ?><link rel="apple-touch-icon" href="<?php echo esc_html($admin_data['media_favicon_iphone']); ?>"><?php } ?>

<?php if($admin_data['media_favicon_iphone_retina'] != "") { ?><link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_html($admin_data['media_favicon_iphone_retina']); ?>"><?php } ?>

<?php if($admin_data['media_favicon_ipad'] != "") { ?><link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_html($admin_data['media_favicon_ipad']); ?>"><?php } ?>

<?php if($admin_data['media_favicon_ipad_retina'] != "") { ?><link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_html($admin_data['media_favicon_ipad_retina']); ?>"><?php } ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Body Wrapper -->
<div class="body-wrapper">
	<div class="controller">
    <div class="controller2">
    
    <!-- Header -->
        <header id="header">
            <div class="container">
                <div class="column">
                    <div class="logo">
                        <a href="<?php echo home_url(); ?>"><img src="<?php if($admin_data['logo']){echo esc_html($admin_data['logo']);} else{ echo get_template_directory_uri(); ?>/framework/img/logo.png<?php } ?>" alt="<?php bloginfo('description'); ?>" /></a>
                    </div>
                    
                    <?php if($admin_data['header_search']){ ?>
                    <div class="search">
                        <form action="<?php echo home_url(); ?>/" method="get">
                            <input type="text" value="<?php _e('Search', 'framework');?>..." onblur="if(this.value=='') this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue) this.value='';" class="ft" name="s"/>
                            <input type="submit" value="" class="fs">
                        </form>
                    </div>
                    <?php } ?>
                    
                    
                    <?php $main = array(
						'theme_location'  => 'main_menu',
						'menu_class'      => 'sf-menu', 
						'menu_id'         => 'menu-main',);
					?>
                    <!-- Nav -->
                    <nav id="nav">
                        <?php if(has_nav_menu('main_menu')){ wp_nav_menu( $main );} else{echo '<ul class="sf-menu"><li><a href="">No menu assigned!</a></li></ul>';}?>
                    </nav>
                    <!-- /Nav -->
                </div>
            </div>
        </header>
        <!-- /Header -->