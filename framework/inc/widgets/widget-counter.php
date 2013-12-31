<?php

add_action( 'widgets_init', 'counter_widget_box' );
function counter_widget_box() {
	register_widget( 'counter_widget' );
}
class counter_widget extends WP_Widget {

	function counter_widget() {
		$widget_ops = array( 'classname' => 'counter-widget', 'description' => ''  );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'counter-widget' );
		$this->WP_Widget( 'counter-widget','MyPassion - Social Counter', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		
		$title = apply_filters('widget_title', $instance['title']);
		$facebook_page = $instance['facebook'] ;
		$rss_id = $instance['rss'] ;
		$twitter_id =  $instance['twitter'] ;
		$followers =  $instance['followers'] ;


		$counter = 0;
		if( $rss_id ) $counter ++ ;
		if( $twitter_id ) $counter ++ ;
		if( $followers ) $counter ++ ;
		if( $facebook_page ) $counter ++ ;

		?>
      	<div class="sidebar">
        	<h5 class="line"><span><?php echo esc_html($title) ?></span></h5><span class="liner"></span>
			<ul class="social">
				<?php if( $facebook_page ): // FACEBOOK ?>
				<li>
                    <a href="http://www.facebook.com/<?php echo esc_html($facebook_page) ?>" class="facebook" target="_blank"><i class="icon-facebook"></i></a>
                    <span><?php echo @number_format(fb_fanpage_count($facebook_page)); ?> <br/> <i><?php _e('Fans' , 'framework' ) ?></i></span>
                </li>
				<?php endif; ?>
                
				<?php if( $twitter_id ): // TWITTER ?>
            	<li>
                    <a href="http://twitter.com/<?php echo esc_html($twitter_id); ?>" class="twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <span><?php echo @number_format($followers); ?> <br/> <i><?php _e('Followers' , 'framework' ) ?></i></span>
                </li>
				<?php endif; ?> 
				
                <?php if( $rss_id ): // RSS ?>
				<li>
                    <a href="<?php echo esc_html($rss_id) ?>" class="rss" target="_blank"><i class="icon-rss"></i></a>
                    <span><i><?php _e('Subscribe via rss' , 'framework' ) ?></i></span>
                </li>
				<?php endif; ?>
			
			</ul>
		</div>
	<?php 
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['facebook'] = $new_instance['facebook'] ;
		$instance['rss'] =  $new_instance['rss'] ;
		$instance['twitter'] =  strip_tags($new_instance['twitter']) ;
		$instance['followers'] =  strip_tags($new_instance['followers']) ;
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' =>__(' Stay Connected', 'framework') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>">Feed URL : </label>
			<input id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo $instance['rss']; ?>" class="widefat" type="text" />
            <small>Full URL</small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>">Facebook Page URL : </label>
			<input id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>" class="widefat" type="text" />
			<small>Facebook ID here (e.g 80655071208)</small>

		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>">Enable Twitter : </label>
			<input id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>"  value="<?php echo $instance['twitter']; ?>" class="widefat" type="text" />
            <small>Twitter USERNAME here</small>
            <input id="<?php echo $this->get_field_id( 'followers' ); ?>" name="<?php echo $this->get_field_name( 'followers' ); ?>"  value="<?php echo $instance['followers']; ?>" class="widefat" type="text" />
			<small>Twitter followers number here</small>
		</p>


	<?php
	}
}


?>