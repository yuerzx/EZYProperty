<?php global $admin_data; ?>
<!-- Slider -->
<?php

	 $querydetails = "
	   SELECT wposts.*
	   FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
	   WHERE wposts.ID = wpostmeta.post_id
	   AND wpostmeta.meta_key = 'mypassion_mainslider'
	   AND wpostmeta.meta_value = '1'
	   AND wposts.post_status = 'publish'
	   AND wposts.post_type = 'post'
	   ORDER BY wposts.post_date DESC
	 ";

	 $pageposts = $wpdb->get_results($querydetails, OBJECT);
	 
	 
	 if ($pageposts == true){
?>

        <section id="slider">
            <div class="container">
                <div class="main-slider">
                <div class="animate"></div>
                	<?php if($admin_data['ribbons_switcher'] == 1): ?>
                    <div class="badg">
                    	<p><a href="#"><?php echo esc_html($admin_data['slider_ribbon1']); ?></a></p>
                    </div>
                    <?php endif; ?>
                    
                	<div class="flexslider">
                        <ul class="slides">
                        	<?php 
                
                                $i = 0;
                                if ($pageposts):
                                foreach ($pageposts as $post):
                                setup_postdata($post); 
                                $i++;
                                if ($i <= $admin_data['slider_post_number']) {
                                ?>
                            <li>
                                <?php the_post_thumbnail('slider-thumb'); ?>
                                <p class="flex-caption"><a href="<?php the_permalink(); ?>"><?php the_title(); ?>.</a> <?php echo mb_strimwidth(get_the_excerpt(), 0, 80); ?> ... </p>
                            </li>
                            <?php } 
                                    endforeach; 	
                                endif; 
                                wp_reset_query();?>	
                            
                        </ul>
                    </div>
                </div>
                
                
                 <?php

					 $querydetails2 = "
					   SELECT wposts.*
					   FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
					   WHERE wposts.ID = wpostmeta.post_id
					   AND wpostmeta.meta_key = 'mypassion_hotstuff'
					   AND wpostmeta.meta_value = '1'
					   AND wposts.post_status = 'publish'
					   AND wposts.post_type = 'post'
					   ORDER BY wposts.post_date DESC
					 ";
	
					 $pageposts2 = $wpdb->get_results($querydetails2, OBJECT)
							
				?>
                <div class="slider2">
                	
					<?php if($admin_data['ribbons_switcher'] == 1): ?>
                    <div class="badg">
                    	<p><a href="#"><?php echo esc_html($admin_data['slider_ribbon2']); ?></a></p>
                    </div>
                    <?php endif; ?>
                    
                    
                    <?php 
                
						$i = 0;
						if ($pageposts2):
						foreach ($pageposts2 as $post):
						setup_postdata($post); 
						$i++;
						if ($i <2) {
					?>
                    
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slider-thumb-2'); ?></a>
                    <p class="caption"><a href="<?php the_permalink(); ?>"><?php the_title(); ?>.</a> <?php echo mb_strimwidth(get_the_excerpt(), 0, 50); ?>... </p>
                    <?php } 
							endforeach; 	
						endif; 
						wp_reset_query();?>
                </div>
                
                
                <?php 
                
						$i = 0;
						if ($pageposts2):
						foreach (array_slice($pageposts2, 1) as $post):
						setup_postdata($post); 
						$i++;
						if ($i <3) {
					?>
                <div class="slider3">
                	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slider-thumb-3'); ?></a>
                    <p class="caption"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                </div>
                <?php } 
							endforeach; 	
						endif; 
						wp_reset_query();?>
                
            </div>    
        </section>
        <!-- / Slider -->
<?php }else{ ?>
		<section id="slider">
            <div class="container">
            	<div class="column">
                	<p><?php echo __('No posts attached to slider','framework') ?></p>
                </div>
            </div>
        </section>
<?php }?>