<?php get_header();?>

        <!-- Content -->
        <section id="content">
            <div class="container">
            	
                <?php if($admin_data['breadcrumbs'] == true){ ?>
                <div class="breadcrumbs column">
                	<?php mypassion_breadcrumbs(); ?>
                </div>
            	<?php }?>
                
                <?php $pagestyle = get_post_meta(get_the_ID(),'mypassion_pagestyle', true);?>
                
				<?php if($pagestyle == 'mpfw'){?>
                <!-- Main Content -->
                <div class="full-width">
                    
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <!-- Single -->
                    <div class="single">
                    	
                    	<?php get_template_part( 'framework/inc/post-format/format', get_post_format() ); ?>
                        
                        <div class="column"><h5 class="line"><?php the_title(); ?></h5><span class="liner"></span></div>
                        
                        
                        <?php the_content(); ?>
                        <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'framework').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                                             

                    </div>
                    <!-- /Single -->
                    <?php endwhile; endif;?>
                </div>
                <!-- /Main Content -->
            	<?php }else{
				?>
                <!-- Main Content -->
                <div class="main-content <?php if($pagestyle == 'mpls'){?>left-sidebar<?php }?>">
                    
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <!-- Single -->
                    <div class="column-two-third single">
                    	
                    	<?php get_template_part( 'framework/inc/post-format/format', get_post_format() ); ?>
                        
                        <h5 class="line"><?php the_title(); ?></h5><span class="liner"></span>
                        
                        
                        <?php the_content(); ?>
                                             

                    </div>
                    <!-- /Single -->
                    <?php endwhile; endif;?>
                </div>
                <!-- /Main Content -->
                
                <?php }?>
                
                <?php if($pagestyle == 'mpls' || $pagestyle == 'mprs'){ get_sidebar();} ?>
                
            </div>    
        </section>
        <!-- / Content -->
        
        <?php get_footer(); ?>