<?php

add_action( 'widgets_init', 'video_widget_box' );
function video_widget_box() {
	register_widget( 'video_widget' );
}
class video_widget extends WP_Widget {

	function video_widget() {
		$widget_ops = array( 'classname' => 'video-widget', 'description' => ''  );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'video-widget' );
		$this->WP_Widget( 'video-widget','MyPassion - Video', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$youtube_video = $instance['youtube_video'];
		$vimeo_video = $instance['vimeo_video'];
		
		$embed_code = $instance['embed_code'];
		$width = 'width="100%"';
		$height = 'height="210"';
		$embed_code = preg_replace('/width="([3-9][0-9]{2,}|[1-9][0-9]{3,})"/',$width,$embed_code);
		$embed_code = preg_replace( '/height="([0-9]*)"/' , $height , $embed_code );
			
		$width1 = 'width: 100%';
		$height1 = 'height: 210';
		$embed_code = preg_replace('/width:"([3-9][0-9]{2,}|[1-9][0-9]{3,})"/',$width1,$embed_code);
		$embed_code = preg_replace( '/height: ([0-9]*)/' , $height1 , $embed_code );  
			
		echo $before_widget;
		if ( $title )
			echo $before_title;
			echo esc_html($title) ; ?>
		<?php echo $after_title; ?>
		
		<?php if ( $embed_code ): echo esc_html($embed_code) ?>

		<?php elseif ( $youtube_video ):?>
			<iframe width="100%" height="170" src="http://www.youtube.com/embed/<?php echo esc_html($youtube_video) ?>?rel=0&wmode=opaque" frameborder="0" allowfullscreen></iframe>
		<?php elseif ( $vimeo_video ):?>
			<iframe src="http://player.vimeo.com/video/<?php echo esc_html($vimeo_video) ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="100%" height="170" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		<?php endif; ?>
		
		
		
	<?php 
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['embed_code'] = $new_instance['embed_code'] ;
		$instance['youtube_video'] = strip_tags( $new_instance['youtube_video'] );
		$instance['vimeo_video'] = strip_tags( $new_instance['vimeo_video'] );
		return $instance;
	}

	function form( $instance ) {
		$defaults = array('title' =>__('Featured Video', 'framework'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'embed_code' ); ?>">Embed Code : </label>
			<textarea id="<?php echo $this->get_field_id( 'embed_code' ); ?>" name="<?php echo $this->get_field_name( 'embed_code' ); ?>" class="widefat" ><?php echo $instance['embed_code']; ?></textarea>
		</p>
		<em style="display:block; border-bottom:1px solid #CCC; margin-bottom:15px;">OR</em>
		<p>
			<label for="<?php echo $this->get_field_id( 'youtube_video' ); ?>">Youtube Video ID : </label>
			<input id="<?php echo $this->get_field_id( 'youtube_video' ); ?>" name="<?php echo $this->get_field_name( 'youtube_video' ); ?>" value="<?php echo $instance['youtube_video']; ?>" class="widefat" type="text" />
			<small>if video url : http://www.youtube.com/watch?v=tBpi4PKPehg  Enter above <strong>tBpi4PKPehg</strong></small>
		</p>
		<em style="display:block; border-bottom:1px solid #CCC; margin-bottom:15px;">OR</em>
		<p>
			<label for="<?php echo $this->get_field_id( 'vimeo_video' ); ?>">Vimeo Video ID : </label>
			<input id="<?php echo $this->get_field_id( 'vimeo_video' ); ?>" name="<?php echo $this->get_field_name( 'vimeo_video' ); ?>" value="<?php echo $instance['vimeo_video']; ?>" class="widefat" type="text" />
			<small>if video url : http://vimeo.com/64664185  Enter above <strong>64664185</strong></small>
		</p>


	<?php
	}
}
?>