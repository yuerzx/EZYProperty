<?php global $admin_data; ?>
<!-- World News -->
					
                    <?php
						$divider = '&nbsp;  '. $admin_data['divider2'] .' &nbsp;'; 
						
						
						$cat_name = $admin_data['m3_category'];
						$tente = get_cat_ID( $cat_name );

						 query_posts('cat='.$tente);
								
					?>
                    <div class="column-two-third">
                    	<h5 class="line">
                        	<span><?php echo esc_html($cat_name); ?></span>
                            <div class="navbar">
                                <a id="next2" class="next" href="#"><span></span></a>	
                                <a id="prev2" class="prev" href="#"><span></span></a>
                            </div>
                        </h5>
                        <span class="liner"></span>
                        
                        <div class="outerwide" >
                        	<ul class="wnews" id="carousel2">
                            
                            	<?php

									$i = 0;
									
									while (have_posts()) : the_post();
									  
									$i++;
									if ($i <= $admin_data['m3_maxnumberofposts']) {
								?>
                            
                            	<li>
                                	<?php the_post_thumbnail('main-medium-thumb'); ?>
                                    <h6 class="regular"><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                                    <span class="meta"><?php the_time(get_option('date_format')); echo $divider; the_category(', '); echo $divider; comments_popup_link(__( 'No Comment', 'framework' ),__( '1 comment', 'framework' ),__( '% Comments', 'framework' ),'',__( 'Comments are off', 'framework' )); ?> </span>
                                    <p><?php the_excerpt(); ?></p>
                                </li>
								<?php } 
									endwhile;
								wp_reset_query();?>	
                            </ul>
                        </div>
                        
                        
                        <?php query_posts('offset='.$admin_data['m3_maxnumberofposts'].'&cat='.$tente); ?>
                        <div class="outerwide">
                        	<ul class="block2">
                            	
                                <?php
									$i = 0;
									while (have_posts()) : the_post(); 
									$i++;
									if ($i <= 4) {
								?>
                                <li>
                                   	<a href="<?php the_permalink();?>"><?php the_post_thumbnail('main-small-thumb'); ?></a>
                                    <p>
                                        <span><?php the_time(get_option('date_format')); ?>.</span>
                                        <a href="<?php the_permalink();?>"><?php echo mb_strimwidth(get_the_title(), 0, 41); ?> ...</a>
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
                                <?php } 
                                    endwhile;
                                wp_reset_query();?>	
                            </ul>
                        </div>
                    </div>
                    <!-- /World News -->