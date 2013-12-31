<?php get_header();?>
<?php /* Get author data */
	if(get_query_var('author_name')) :
	$curauth = get_userdatabylogin(get_query_var('author_name'));
	else :
	$curauth = get_userdata(get_query_var('author'));
	endif;
?>
    <!-- Content -->
        <section id="content">
            <div class="container">
            	<!-- Main Content -->
                
                <?php if($admin_data['breadcrumbs'] == true){ ?>
                <div class="breadcrumbs column">
                	<?php mypassion_breadcrumbs(); ?>
                </div>
            	<?php }?>
                
                <div class="main-content <?php if($admin_data['archive_style'] == "archive_leftsidebar"){?> left-sidebar <?php } ?>">
                	<div class="column-two-third">
						<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
                        <?php /* If this is a category archive */ if (is_category()) { ?>
                            <h6 class="title"><?php printf(__('All posts in %s', 'framework'), single_cat_title('',false)); ?></h6>
                        <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                            <h6 class="title"><?php printf(__('All posts tagged %s', 'framework'), single_tag_title('',false)); ?></h6>
                        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                            <h6 class="title"><?php _e('Archive for', 'framework') ?> <?php the_time('F jS, Y'); ?></h6>
                         <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                            <h6 class="title"><?php _e('Archive for', 'framework') ?> <?php the_time('F, Y'); ?></h6>
                        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                            <h6 class="title"><?php _e('Archive for', 'framework') ?> <?php the_time('Y'); ?></h6>
                        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                            <h6 class="title"><?php _e('All posts by', 'framework') ?> <?php echo esc_html($curauth->display_name); ?></h6>
                        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                            <h6 class="title"><?php _e('Blog Archives', 'framework') ?></h6>
                        <?php } ?>
                    
                        <div class="outerwide">
    
                            <ul class="block2">
                                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                                
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
                                
                                <?php endwhile; endif;?>
                            </ul>
                        </div>
                        
                        <?php mypassion_pagination();?>
                    </div>
                </div>
            <!-- /Main -->
            <?php wp_reset_query(); ?>
            <?php get_sidebar(); ?>
        </div>    
    </section>
    <!-- / Content -->
    
    <?php get_footer(); ?>