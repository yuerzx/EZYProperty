<?php get_header();?>


        <!-- Content -->
        <section id="content">
            <div class="container">
            	<!-- Main Content -->
                
                <?php if($admin_data['breadcrumbs'] == true){ ?>
                <div class="breadcrumbs column">
                	<?php mypassion_breadcrumbs(); ?>
                </div>
            	<?php }?>
                
                <div class="main-content <?php if($admin_data['search_style'] == "search_leftsidebar"){?> left-sidebar <?php } ?>">
                    
                    <!-- Popular News -->
                	<div class="column-two-third">
                        
                        <div class="outerwide">
                        	<h6><?php printf( __('Search results for &ldquo; %s &rdquo;', 'framework'), get_search_query()); ?></h6>
                        	<ul class="block2">
                            	<?php $i = 0; ?>
								<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                                <?php if( $post->post_type == 'post' ) { $i++; ?>
                                
                                <li>
                                	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('main-small-thumb'); ?></a>
                                        <p>
                                            <span><?php the_time(get_option('date_format')); ?>.</span>
                                            <a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(), 0, 40); ?> ...</a>
                                        </p>
                                        <?php
											$mypassion_review_enable =  get_post_meta(get_the_ID(), 'mypassion_review_enable', true);
											$mypassion_review_type =  get_post_meta(get_the_ID(), 'mypassion_review_type', true);
											$mypassion_final_score =  get_post_meta(get_the_ID(), 'mypassion_final_score', true);
											$mypassion_final_percentage = $mypassion_final_score * 20 ;
										?>
                                        <?php if($mypassion_review_enable == 'enable'){ ?><span class="mypassion-rating mypassion-rating-<?php echo esc_html($mypassion_review_type); ?>"><span style="width:<?php echo esc_html($mypassion_final_percentage); ?>%;"></span></span>
										<?php }else{ ?>
                                        	
                                            <span class="meta2"><?php echo getPostViews(get_the_ID()); ?> </span>
                                            
                                        <?php } ?>
                                    </div>
                                </li>
								<?php } endwhile; endif;?>
                                <?php if( $i == 0 ) { printf('<li>%s</li>', __('No posts match the search terms', 'framework')); } ?>
                            </ul>
                        </div>
                        
                        <?php mypassion_pagination();  wp_reset_query(); ?>
                        
                    	
                    </div>
                    <!-- /Popular News -->
                    
                </div>
                <!-- /Main Content -->
                
                <?php get_sidebar(); ?>
                
            </div>    
        </section>
        <!-- / Content -->
        
       <?php get_footer(); ?>