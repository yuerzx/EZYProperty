<?php


class best_reviews_widget extends WP_Widget {


    /** constructor */
    function best_reviews_widget() {
        parent::WP_Widget(false, $name = 'MyPassion - Best Reviews');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {	
        extract( $args );
		global $wpdb, $admin_data;
		
        $title = apply_filters('widget_title', $instance['image']);
		$title = $instance['title'];
		$image = $instance['image'];
		$number = $instance['number'];
	
		
		echo $before_widget; ?>
  	<?php echo $before_title . $title . $after_title; ?>
	
	<ul class="bestreview">
		<?php  	
				$idObj = get_category_by_slug($image);
				$id = $idObj->term_id;
				$category_link = get_category_link( $id );
				$category_name = get_cat_name( $id );
		
				$new = new WP_Query(array('showposts' => $number, 'meta_key' => 'mypassion_final_score', 'orderby' => 'meta_value', 'cat' => $id, 'nopaging' => 0, 'post_status' => 'publish'));
				if ($new->have_posts()) : while ($new->have_posts()) : $new->the_post(); 
				
				
				
		?>
		<li>
        	<?php if (has_post_thumbnail()) { ?>
			<a href="<?php the_permalink();?>">							
				<?php the_post_thumbnail('main-small-thumb', array('class' => 'wpp-thumbnail wp-post-image')); ?>											
			</a>	
            <?php } ?>			
			 <p>
                <span><?php the_time(get_option('date_format')); ?>.</span>
                <a href="<?php the_permalink();?>"><?php echo substr(get_the_title(), 0, 41); ?> ...</a>
            </p>
            <?php
                $mypassion_review_enable =  get_post_meta(get_the_ID(), 'mypassion_review_enable', true);
                $mypassion_review_type =  get_post_meta(get_the_ID(), 'mypassion_review_type', true);
                $mypassion_final_score =  get_post_meta(get_the_ID(), 'mypassion_final_score', true);
                $mypassion_final_percentage = $mypassion_final_score * 20 ;
            ?>
            <?php if($admin_data['review_switcher'] == true){ ?>
            <?php if($mypassion_review_enable == 'enable'){ ?><span class="mypassion-rating mypassion-rating-<?php echo esc_html($mypassion_review_type); ?>"><span style="width:<?php echo esc_html($mypassion_final_percentage); ?>%;"></span></span>
            <?php } ?>
            <?php } ?>
            	
		</li><?php endwhile; endif; wp_reset_query(); ?>
	</ul>
	
  	<?php echo $after_widget;
	}

  // Save the settings for this instance
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['image'] = strip_tags($new_instance['image']);
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] =  strip_tags($new_instance['number']);
		
		return $instance;
	}

  // Display the widget form in the admin interface
	function form( $instance ) {
		
		$defaults = array('title' => 'Best Reviews');
		$instance = wp_parse_args((array) $instance, $defaults);
?>
    	<p>
        	<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
        	<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_html($title); ?>" />
        </p>
		
		<p>
			<label for="<?php echo $this->get_field_id('image'); ?>">Category Slug:				
				<input class="widefat" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="text" value="<?php echo $instance['image']; ?>" />
			</label>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of reviews to show:', 'gonzo'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $instance['number']; ?>" size="3" /><br />
		<small><?php _e('(at most 15)', 'gonzo'); ?></small></p>
		

	

        <?php 
    }


} // class utopian_recent_posts
// register Recent Posts widget
add_action('widgets_init', create_function('', 'return register_widget("best_reviews_widget");'));
