<?php
/*
Plugin Name: Ads Banner Widget
Plugin URI: http://themeforest.net/user/MyPassion
Description: A simple but powerful widget to display ads banners.
Version: 1.0.0
Author: MyPassion
Author URI: http://themeforest.net/user/MyPassion
*/


// 125x125 BANNERS
add_action('widgets_init', 'ad_125_125_load_widgets');

function ad_125_125_load_widgets()
{
	register_widget('Ad_125_125_Widget');
}

class Ad_125_125_Widget extends WP_Widget {
	
	function Ad_125_125_Widget()
	{
		$widget_ops = array('classname' => 'ad_125_125', 'description' => 'Add 125x125 ads.');

		$control_ops = array('id_base' => 'ad_125_125-widget');

		$this->WP_Widget('ad_125_125-widget', 'MyPassion - 125x125 Ads', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		?>
		<div class="sidebar">
            <h5 class="line"><span><?php echo esc_html($title) ?></span></h5>
            <span class="liner"></span>
            <ul class="ads125">
				<?php
                $ads = array(1, 2, 3, 4);
                foreach($ads as $ad_count):
                    if($instance['ad_125_img_'.$ad_count] && $instance['ad_125_link_'.$ad_count]):
                ?>
                    <li><a href="<?php echo $instance['ad_125_link_'.$ad_count]; ?>"  target="_blank"><img src="<?php echo $instance['ad_125_img_'.$ad_count]; ?>" alt="<?php bloginfo('description'); ?>" width="125" height="125" /></a></li>
                
                <?php endif; endforeach; ?>
        	</ul>        
		</div>
		<?php
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
			
		$instance['ad_125_img_1'] = $new_instance['ad_125_img_1'];
		$instance['ad_125_link_1'] = $new_instance['ad_125_link_1'];
		$instance['ad_125_img_2'] = $new_instance['ad_125_img_2'];
		$instance['ad_125_link_2'] = $new_instance['ad_125_link_2'];
		$instance['ad_125_img_3'] = $new_instance['ad_125_img_3'];
		$instance['ad_125_link_3'] = $new_instance['ad_125_link_3'];
		$instance['ad_125_img_4'] = $new_instance['ad_125_img_4'];
		$instance['ad_125_link_4'] = $new_instance['ad_125_link_4'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array();
		$defaults = array( 'title' =>__('Ads Spot', 'framework') );
		$instance = wp_parse_args((array) $instance, $defaults); ?>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p><strong>Ads 1</strong></p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_img_1'); ?>">Image Ads Link:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('ad_125_img_1'); ?>" name="<?php echo $this->get_field_name('ad_125_img_1'); ?>" value="<?php echo $instance['ad_125_img_1']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_link_1'); ?>">Ads Link:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('ad_125_link_1'); ?>" name="<?php echo $this->get_field_name('ad_125_link_1'); ?>" value="<?php echo $instance['ad_125_link_1']; ?>" />
		</p>
		<p><strong>Ads 2</strong></p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_img_2'); ?>">Image Ads Link:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('ad_125_img_2'); ?>" name="<?php echo $this->get_field_name('ad_125_img_2'); ?>" value="<?php echo $instance['ad_125_img_2']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_link_2'); ?>">Ads Link:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('ad_125_link_2'); ?>" name="<?php echo $this->get_field_name('ad_125_link_2'); ?>" value="<?php echo $instance['ad_125_link_2']; ?>" />
		</p>
		<p><strong>Ads 3</strong></p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_img_3'); ?>">Image Ads Link:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('ad_125_img_3'); ?>" name="<?php echo $this->get_field_name('ad_125_img_3'); ?>" value="<?php echo $instance['ad_125_img_3']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_link_3'); ?>">Ads Link:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('ad_125_link_3'); ?>" name="<?php echo $this->get_field_name('ad_125_link_3'); ?>" value="<?php echo $instance['ad_125_link_3']; ?>" />
		</p>
		<p><strong>Ads 4</strong></p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_img_4'); ?>">Image Ads Link:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('ad_125_img_4'); ?>" name="<?php echo $this->get_field_name('ad_125_img_4'); ?>" value="<?php echo $instance['ad_125_img_4']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_link_4'); ?>">Ads Link:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('ad_125_link_4'); ?>" name="<?php echo $this->get_field_name('ad_125_link_4'); ?>" value="<?php echo $instance['ad_125_link_4']; ?>" />
		</p>
	<?php
	}
}


// 300PX WIDE BANNERS
add_action('widgets_init', 'ad_300_load_widgets');

function ad_300_load_widgets()
{
	register_widget('Ad_300_Widget');
}

class Ad_300_Widget extends WP_Widget {
	
	function Ad_300_Widget()
	{
		$widget_ops = array('classname' => 'ad_300', 'description' => 'Add 300px wide ads.');

		$control_ops = array('id_base' => 'ad_300-widget');

		$this->WP_Widget('ad_300-widget', 'MyPassion - 300px Ads', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		?>
		<div class="sidebar">
            <h5 class="line"><span><?php echo $title ?></span></h5>
            <span class="liner"></span>

            <a href="<?php echo $instance['ad_300_link']; ?>" target="_blank"><img src="<?php echo $instance['ad_300_img']; ?>" alt="<?php bloginfo('description'); ?>" width="300" height="" /></a></li>

		</div>
		<?php
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
			
		$instance['ad_300_img'] = $new_instance['ad_300_img'];
		$instance['ad_300_link'] = $new_instance['ad_300_link'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array();
		$defaults = array( 'title' =>__('Ads Spot', 'framework') );
		$instance = wp_parse_args((array) $instance, $defaults); ?>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_300_img'); ?>">Image Ads Link:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('ad_125_img_1'); ?>" name="<?php echo $this->get_field_name('ad_300_img'); ?>" value="<?php echo $instance['ad_300_img']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_300_link'); ?>">Ads Link:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('ad_125_link_1'); ?>" name="<?php echo $this->get_field_name('ad_300_link'); ?>" value="<?php echo $instance['ad_300_link']; ?>" />
		</p>
		
	<?php
	}
}
?>