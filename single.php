<?php get_header();?>
<?php global $admin_data;?>


<?php

	$divider = '&nbsp;  '. $admin_data['divider2'] .' &nbsp;'; 

	// Call to rating class!
	$ratings = new mypassion_user_rating();
	
	//Ratings data
    $mypassion_review_enable = get_post_meta(get_the_ID(), 'mypassion_review_enable', true);
    $mypassion_user_ratings_visibility = get_post_meta(get_the_ID(), 'mypassion_user_ratings_visibility', true);
    $mypassion_final_score = get_post_meta(get_the_ID(), 'mypassion_final_score', true);
    $mypassion_longer_summary = get_post_meta(get_the_ID(), 'mypassion_longer_summary', true);
    $mypassion_brief_summary = get_post_meta(get_the_ID(), 'mypassion_brief_summary', true);
    $mypassion_review_type = get_post_meta(get_the_ID(), 'mypassion_review_type', true);
    $mypassion_criteria_display = get_post_meta(get_the_ID(), 'mypassion_criteria_display', true);
    $mypassion_criteria_header = get_post_meta(get_the_ID(), 'mypassion_criteria_header', true);
    
	$mypassion_c1_rating = get_post_meta(get_the_ID(), 'mypassion_c1_rating', true);
    $mypassion_c1_description = get_post_meta(get_the_ID(), 'mypassion_c1_description', true);
    $mypassion_c2_rating = get_post_meta(get_the_ID(), 'mypassion_c2_rating', true);
    $mypassion_c2_description = get_post_meta(get_the_ID(), 'mypassion_c2_description', true);
    $mypassion_c3_rating = get_post_meta(get_the_ID(), 'mypassion_c3_rating', true);
    $mypassion_c3_description = get_post_meta(get_the_ID(), 'mypassion_c3_description', true);
    $mypassion_c4_rating = get_post_meta(get_the_ID(), 'mypassion_c4_rating', true);
    $mypassion_c4_description = get_post_meta(get_the_ID(), 'mypassion_c4_description', true);
    $mypassion_c5_rating = get_post_meta(get_the_ID(), 'mypassion_c5_rating', true);
    $mypassion_c5_description = get_post_meta(get_the_ID(), 'mypassion_c5_description', true);
    $mypassion_c6_rating = get_post_meta(get_the_ID(), 'mypassion_c6_rating', true);
    $mypassion_c6_description = get_post_meta(get_the_ID(), 'mypassion_c6_description', true);
	$mypassion_c7_rating = get_post_meta(get_the_ID(), 'mypassion_c7_rating', true);
    $mypassion_c7_description = get_post_meta(get_the_ID(), 'mypassion_c7_description', true);
    $mypassion_c8_rating = get_post_meta(get_the_ID(), 'mypassion_c8_rating', true);
    $mypassion_c8_description = get_post_meta(get_the_ID(), 'mypassion_c8_description', true);

    // Calculate the percentages from the star ratings
    $mypassion_c1_percentage = $mypassion_c1_rating * 20;
    $mypassion_c2_percentage = $mypassion_c2_rating * 20;
    $mypassion_c3_percentage = $mypassion_c3_rating * 20;
    $mypassion_c4_percentage = $mypassion_c4_rating * 20;
    $mypassion_c5_percentage = $mypassion_c5_rating * 20;
    $mypassion_c6_percentage = $mypassion_c6_rating * 20;
	$mypassion_c7_percentage = $mypassion_c7_rating * 20;
    $mypassion_c8_percentage = $mypassion_c8_rating * 20;
    $mypassion_final_percentage = $mypassion_final_score * 20;

    // Setup new variable to echo out the sprite width
    $mypassion_c1_width = $mypassion_c1_percentage + 2;
    $mypassion_c2_width = $mypassion_c2_percentage + 2;
    $mypassion_c3_width = $mypassion_c3_percentage + 2;
    $mypassion_c4_width = $mypassion_c4_percentage + 2;
    $mypassion_c5_width = $mypassion_c5_percentage + 2;
    $mypassion_c6_width = $mypassion_c6_percentage + 2;
	$mypassion_c7_width = $mypassion_c7_percentage + 2;
	$mypassion_c8_width = $mypassion_c8_percentage + 2;
    $mypassion_final_width = $mypassion_final_percentage + 2;
?>
        
        <!-- Content -->
        <section id="content">
            <div class="container">
            	
                <?php if($admin_data['breadcrumbs'] == true){ ?>
                <div class="breadcrumbs column">
                	<?php mypassion_breadcrumbs(); ?>
                </div>
            	<?php }?>
            
            	<?php $pagestyle = get_post_meta(get_the_ID(),'mypassion_pagestyle2', true);?>
            	
            	<!-- Main Content -->
                <div class="main-content <?php if($pagestyle == 'mpls2'){?>left-sidebar<?php }?>">
                    
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php setPostViews(get_the_ID()); ?>
                    
                    <?php $format = get_post_meta(get_the_ID(), 'mypassion_postformat', true); ?>
                    <!-- Single -->
                    <div class="column-two-third single">
                    	
                    	<?php get_template_part( 'framework/inc/post-format/format', $format ); ?>
                        
                        <!-- Title -->
                        <h6 class="title"><?php the_title(); ?></h6>
                        
                        
                        <!-- Meta -->
                        <?php if($admin_data['meta_box'] == true){ ?>
                        <span class="meta"><?php the_time(get_option('date_format')); echo $divider; _e('By:', 'framework'); ?> <?php the_author_posts_link(); echo $divider; the_category(', '); echo $divider; comments_popup_link(__( 'No Comment', 'framework' ),__( '1 comment', 'framework' ),__( '% Comments', 'framework' ),'',__( 'Comments are off', 'framework' )); ?>  
							
							<?php if($admin_data['postview_box'] == true){ ?>
                            &nbsp;  //  &nbsp;  <?php echo getPostViews(get_the_ID()); ?>
                            <?php } ?>
                            
                        </span>
                        <?php } ?>
                        
                        
                        
                        <!-- Review -->
                        <?php  
						$mypassion_review_enable = get_post_meta(get_the_ID(), 'mypassion_review_enable', true);
						$mypassion_review_skin = get_post_meta(get_the_ID(), 'mypassion_review_skin', true);
						$mypassion_review_position = get_post_meta(get_the_ID(), 'mypassion_criteria_position', true);
						if($mypassion_review_enable == 'enable'){
							if($mypassion_review_position == 'bottom'){
								the_content();
								get_template_part( 'framework/inc/sharebox' );
							}?>
                        
                        
						<?php if($admin_data['review_switcher'] == true){ ?>
                        <!-- Review Wrapper -->
                        <div id="mypassion-review-wrapper" class="mypassion-review-skin-<?php echo esc_html($mypassion_review_skin); ?> mypassion-review-placement-<?php echo esc_html($mypassion_review_position); ?>">

							<?php if ($mypassion_criteria_header !== '') { ?>

                            <!-- Review Header -->
                            <div id="mypassion-review-header">
                                <?php echo esc_html($mypassion_criteria_header); ?>
                            </div>
                            
                            
                            <!-- Review Summary -->
                            <div class="mypassion-review-summary mypassion-final-score-<?php echo esc_html($mypassion_review_type); ?>">
                
                                
                                <!-- Short Summary -->
                                <div id="mypassion-short-summary">
                                    <p><strong>Summary:</strong> <?php echo esc_html($mypassion_longer_summary);?></p>
                                </div>
                                
                				
                                <!-- Final Score -->
                                <div id="mypassion-criteria-final-score">
                                    <span itemprop="rating">
                                    	<h1>
											<?php if ($mypassion_review_type == 'percent') {
												echo (esc_html($mypassion_final_percentage) . '<span>%</span>');
											} else {
												echo esc_html($mypassion_final_score);
											} ?>
                                    	</h1>
                                    </span>
                                    
                                    <h6><?php echo esc_html($mypassion_brief_summary);?></h6>
                                    
									<?php if ($mypassion_review_type != 'percent') { ?>
                                    	<span id="mypassion-final-score" class="mypassion-criteria-<?php echo esc_html($mypassion_review_type); ?>"><span id="mypassion-final-score-cover" class="mypassion-criteria-cover" style="width:<?php echo esc_html($mypassion_final_width);?>%"></span></span> 
									<?php } ?>
                                </div>
                                
                
                            </div>
                            <?php } ?>
                
                            
							
							<?php if ($mypassion_review_type == 'percent') { ?>
                
                            	<?php if ($mypassion_c1_rating !== '') { ?>
                                <div class="mypassion-review-criteria mypassion-criteria-percent">
                                    
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c1_description); ?> - <?php echo esc_html($mypassion_c1_percentage); ?>%</span>
                                    <span class="mypassion-criteria-percentage" style="width:<?php echo esc_html($mypassion_c1_percentage); ?>%"></span>
                                </div>
                                <?php } ?>
                
                            	<?php if ($mypassion_c2_rating !== '') { ?>
                                <div class="mypassion-review-criteria mypassion-criteria-percent">
                                    
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c2_description); ?> - <?php echo esc_html($mypassion_c2_percentage); ?>%</span>
                                    <span class="mypassion-criteria-percentage" style="width:<?php echo esc_html($mypassion_c2_percentage); ?>%"></span>
                                </div>
                                <?php } ?>
                
                            	<?php if ($mypassion_c3_rating !== '') { ?>
                                <div class="mypassion-review-criteria mypassion-criteria-percent">
                                    
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c3_description); ?> - <?php echo esc_html($mypassion_c3_percentage); ?>%</span>
                                    <span class="mypassion-criteria-percentage" style="width:<?php echo esc_html($mypassion_c3_percentage); ?>%"></span>
                                </div>
                                <?php } ?>
                
                            	<?php if ($mypassion_c4_rating !== '') { ?>
                                <div class="mypassion-review-criteria mypassion-criteria-percent">
                                    
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c4_description); ?> - <?php echo esc_html($mypassion_c4_percentage); ?>%</span>
                                    <span class="mypassion-criteria-percentage" style="width:<?php echo esc_html($mypassion_c4_percentage); ?>%"></span>
                                </div>
                                <?php } ?>
                
                            	<?php if ($mypassion_c5_rating !== '') { ?>
                                <div class="mypassion-review-criteria mypassion-criteria-percent">
                                    
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c5_description); ?> - <?php echo esc_html($mypassion_c5_percentage); ?>%</span>
                                    <span class="mypassion-criteria-percentage" style="width:<?php echo esc_html($mypassion_c5_percentage); ?>%"></span>
                                </div>
                                <?php } ?>
                
                            	<?php if ($mypassion_c6_rating !== '') { ?>
                                <div class="mypassion-review-criteria mypassion-criteria-percent">
                                    
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c6_description); ?> - <?php echo esc_html($mypassion_c6_percentage); ?>%</span>
                                    <span class="mypassion-criteria-percentage" style="width:<?php echo esc_html($mypassion_c6_percentage); ?>%"></span>
                                </div>
                                <?php } ?>
                                
                            	<?php if ($mypassion_c7_rating !== '') { ?>
                                <div class="mypassion-review-criteria mypassion-criteria-percent">
                                    
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c7_description); ?> - <?php echo esc_html($mypassion_c7_percentage); ?>%</span>
                                    <span class="mypassion-criteria-percentage" style="width:<?php echo esc_html($mypassion_c7_percentage); ?>%"></span>
                                </div>
                                <?php } ?>
                
                            	<?php if ($mypassion_c8_rating !== '') { ?>
                                <div class="mypassion-review-criteria mypassion-criteria-percent">
                                    
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c8_description); ?> - <?php echo esc_html($mypassion_c8_percentage); ?>%</span>
                                    <span class="mypassion-criteria-percentage" style="width:<?php echo esc_html($mypassion_c8_percentage); ?>%"></span>
                                </div>
                                <?php } ?>
                
                            <?php } else { // ---------START OTHER LOOPS----------- // ?>
                
                            	<?php if ($mypassion_c1_rating !== '') { ?>
                                <div class="mypassion-review-criteria">
                                    <span class="mypassion-criteria-<?php echo esc_html($mypassion_review_type); ?>"><span class="mypassion-criteria-cover" style="width:<?php echo esc_html($mypassion_c1_width);?>%"></span></span>
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c1_description); ?></span>
                                </div>
                                <?php } ?>
                
                            	<?php if ($mypassion_c2_rating !== '') { ?>
                                <div class="mypassion-review-criteria">
                                    <span class="mypassion-criteria-<?php echo esc_html($mypassion_review_type); ?>"><span class="mypassion-criteria-cover" style="width:<?php echo esc_html($mypassion_c2_width);?>%"></span></span>
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c2_description); ?></span>
                                </div>
                                <?php } ?>
                
                            	<?php if ($mypassion_c3_rating !== '') { ?>
                                <div class="mypassion-review-criteria">
                                    <span class="mypassion-criteria-<?php echo esc_html($mypassion_review_type); ?>"><span class="mypassion-criteria-cover" style="width:<?php echo esc_html($mypassion_c3_width);?>%"></span></span>
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c3_description); ?></span>
                                </div>
                                <?php } ?>
                
                            	<?php if ($mypassion_c4_rating !== '') { ?>
                                <div class="mypassion-review-criteria">
                                    <span class="mypassion-criteria-<?php echo esc_html($mypassion_review_type); ?>"><span class="mypassion-criteria-cover" style="width:<?php echo esc_html($mypassion_c4_width);?>%"></span></span>
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c4_description); ?></span>
                                </div>
                                <?php } ?>
                
                            	<?php if ($mypassion_c5_rating !== '') { ?>
                                <div class="mypassion-review-criteria">
                                    <span class="mypassion-criteria-<?php echo esc_html($mypassion_review_type); ?>"><span class="mypassion-criteria-cover" style="width:<?php echo esc_html($mypassion_c5_width);?>%"></span></span>
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c5_description); ?></span>
                                </div>
                                <?php } ?>
                
                            	<?php if ($mypassion_c6_rating !== '') { ?>
                                <div class="mypassion-review-criteria">
                                    <span class="mypassion-criteria-<?php echo esc_html($mypassion_review_type); ?>"><span class="mypassion-criteria-cover" style="width:<?php echo esc_html($mypassion_c6_width);?>%"></span></span>
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c6_description); ?></span>
                                </div>
                                <?php } ?>
                                
                            	<?php if ($mypassion_c7_rating !== '') { ?>
                                <div class="mypassion-review-criteria">
                                    <span class="mypassion-criteria-<?php echo esc_html($mypassion_review_type); ?>"><span class="mypassion-criteria-cover" style="width:<?php echo esc_html($mypassion_c7_width);?>%"></span></span>
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c7_description); ?></span>
                                </div>
                                <?php } ?>
                
                            	<?php if ($mypassion_c8_rating !== '') { ?>
                                <div class="mypassion-review-criteria">
                                    <span class="mypassion-criteria-<?php echo esc_html($mypassion_review_type); ?>"><span class="mypassion-criteria-cover" style="width:<?php echo esc_html($mypassion_c8_width);?>%"></span></span>
                                    <span class="mypassion-criteria-description"><?php echo esc_html($mypassion_c8_description); ?></span>
                                </div>
                                <?php } ?>
                
                            <?php } ?>
                
                
                
                            
                            
                            <?php if($mypassion_user_ratings_visibility == 1) {?>		
								<!-- User Review -->
                                <div class="mypassion-user-review-criteria">
                                    <span class="mypassion-user-review-description">
                                    	<b>
                                        	<span class="your_rating" style="display:none;"><?php _e('Your Rating', 'framework'); ?></span>
                                            <span class="user_rating"><?php _e('User Rating', 'framework'); ?></span>
                                        </b>: 
                                        <span class="score"><?php echo esc_html($ratings->current_rating); ?></span> 
                                        <em>(<span class="count"><?php echo esc_html($ratings->count); ?></span> <?php _e('votes', 'framework'); ?>)</em>
                                   	</span>
                                    <span class="mypassion-user-review-rating">
                                        <span class="mypassion-criteria-<?php echo esc_html($mypassion_review_type); ?> mypassion-cri"><span class="mypassion-criteria-cover" style="width:<?php echo esc_html($ratings->current_position); ?>%"></span></span>
                                    </span>
                                </div>
                        	<?php } ?>

                        </div>
                        <!-- /Review Wrapper -->
                        <?php } ?>
							
							<?php
                            if($mypassion_review_position == 'top' || $mypassion_review_position == 'topright'){
                                the_content();
                                get_template_part( 'framework/inc/sharebox' );
                            }?>
                            
                        <?php 
						}else{
							the_content();
							get_template_part( 'framework/inc/sharebox' );
						}?>
                        
                        
                        
                        <!-- Authorbox -->
						<?php if($admin_data['author_box'] == true){ ?>
                        <div class="authorbox">
                            <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php echo get_avatar( get_the_author_meta('user_email'), '80', '' ); ?></a>
                            <h6><?php _e('About the Author : ', 'framework'); ?> <?php the_author_posts_link(); ?></h6>
                            <p><?php the_author_meta('description'); ?></p>
                        </div>
                        <?php } ?>
                        
                       <!-- Metabox -->
                        <?php if($admin_data['tag_box'] == true){ ?>
                        <div class="post-tags"><?php the_tags('<b>Tags:</b> ', ', ', '<br />'); ?></div>
                        <?php } ?>
                        
                        
                        <!-- Paginationbox -->
						<?php if($admin_data['prev_next_box'] == true){ ?>
                        <div class="single-navigation">
							<span class="alignleft"><?php previous_post_link('%link', __('Previous Post', 'framework')); ?></span>
                            <span class="alignright"><?php next_post_link('%link', __('Next Post', 'framework')); ?></span>
                        </div>
                        <?php } ?>
                        
                        
                        <!-- Related Box -->
						<?php if($admin_data['related_post_box'] == true){ ?>
                        <?php $related = get_related_posts(get_the_ID()); ?>
						<?php if($related->have_posts()): ?>
                        <div class="relatednews">
                            <h5 class="line"><span><?php _e('Related News', 'framework') ?></span></h5>
                            <span class="liner"></span>
                            <ul>
                            	<?php while($related->have_posts()): $related->the_post(); ?>
								<?php if(has_post_thumbnail()): ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('main-small-thumb'); ?></a>
                                    <p>
                                        <span><?php the_time(get_option('date_format')); ?>.</span>
                                        <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 41); ?> ...</a>
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
                                </li>
                                <?php endif; endwhile; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <?php } ?>
                        
                        
                        
                        <!-- Comments -->
                        <div class="comments">
                        	<?php wp_reset_query(); ?>
                            <?php comments_template(); ?>
                        </div>

                    </div>
                    <!-- /Single -->
                    <?php endwhile; endif;?>
                </div>
                <!-- /Main Content -->
                
                <?php get_sidebar(); ?>
                
            </div>    
        </section>
        <!-- / Content -->
        
        <?php get_footer(); ?>