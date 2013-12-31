<?php
function mypassion_js_custom() {
global $admin_data;
?>

<script type="text/javascript">



jQuery(document).ready(function(){
		
	"use strict";
	
// -----------------------------------------------------  Sticky Menu
	<?php if($admin_data['sticky']){ ?> // 
	jQuery("nav").sticky({ topSpacing: 0});
	<?php } ?>

// -----------------------------------------------------  Carousels
	jQuery('#carousel').carouFredSel({
		width: '100%',
		direction   : "<?php echo esc_html($admin_data['m2_carousel_direction']); ?>",
		scroll : 400,
		items: {
			visible: <?php echo esc_html($admin_data['m2_visiblenumberofposts']); ?>
		},
		auto: {
			items: <?php echo esc_html($admin_data['m2_slidenumberofposts']); ?>,
			timeoutDuration : 4000
		},
		prev: {
			button: '#prev1',
			items: <?php echo esc_html($admin_data['m2_slidenumberofposts']); ?>
		},    
		next: {
			button: '#next1',
			items: <?php echo esc_html($admin_data['m2_slidenumberofposts']); ?>
		}
	});
	
	jQuery('#carousel2').carouFredSel({
		width: '100%',
		direction   : "<?php echo esc_html($admin_data['m3_carousel_direction']); ?>",
		scroll : {
	        duration : 800
	    },
		items: {
			visible: 1
		},
		auto: {
			items: 1,
			timeoutDuration : 4000
		},
		prev: {
			button: '#prev2',
			items: 1
		},    
		next: {
			button: '#next2',
			items: 1
		}
	});
	
// -----------------------------------------------------  Mobile Menu	
	jQuery('#nav ul.sf-menu').mobileMenu({
		defaultText: '<?php _e('Go to...', 'framework'); ?>',
		className: 'device-menu',
		subMenuDash: '&ndash;'
	});
	
// -----------------------------------------------------  ADD SUBMENU LIST TYPE
    jQuery("nav#nav ul li ul.sub-menu li").each(function () {
		jQuery(this).prepend('<i class="icon-right-open"></i>');
        /*if (jQuery(this).children('ul').length > 0) {
            jQuery(this).find('a:first').append('<span class="raquo"> &raquo;</span>');
        }*/
		
    });
	
	jQuery(".widget_nav_menu ul li").each(function () {
		jQuery(this).prepend('<i class="icon-right-open"></i>');
        /*if (jQuery(this).children('ul').length > 0) {
            jQuery(this).find('a:first').append('<span class="raquo"> &raquo;</span>');
        }*/
		
    });
	
	<?php if ($admin_data['point_design'] == true){ ?>
	
		<?php if ($admin_data['point_design2'] == true){ ?>
		jQuery("nav#nav ul li a").each(function () {
			jQuery(this).append('.');
			
		});
		<?php }?>
	
		jQuery(".widget_nav_menu ul li a").each(function () {
			jQuery(this).append('.');
			
		});
		
		jQuery("h5.line span").each(function () {
			jQuery(this).append('.');
			
		});
		
		jQuery("#tabs>ul").each(function () {
			jQuery(this).find("li a").append('.');
			
		});
		
		jQuery(".tabs>ul").each(function () {
			jQuery(this).find("li a").append('.');
			
		});
		
		jQuery(".accordion").each(function () {
			jQuery(this).find("h3").append('.');
			
		});
	<?php }?>
});
</script>	

<?php 
}
add_action( 'wp_footer', 'mypassion_js_custom');
?>