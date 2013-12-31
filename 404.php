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
                
                <?php if($admin_data['404_style'] == "404_fullwidth"){?>
                        
                    <!-- Popular News -->
                    <div class="column">
                            <div class="errorpage">
                                <h1><?php _e('Oops! 404', 'framework') ?></h1>
                                <p><?php _e('Sorry, but you are looking for something that is not here.', 'framework') ?></p>
                            </div>
                    </div>
                    <!-- /Popular News -->
				
				<?php }else{ ?>
                
                    <div class="main-content <?php if($admin_data['404_style'] == "404_leftsidebar"){?> left-sidebar <?php } ?>">
                        
                        <!-- Popular News -->
                        <div class="column-two-third">
                            
                            <div class="outerwide">
                                <div class="errorpage">
                                    <h1><?php _e('Oops! 404', 'framework') ?></h1>
                                    <p><?php _e('Sorry, but you are looking for something that is not here.', 'framework') ?></p>
                                </div>
                            </div>
                            
                            
                        </div>
                        <!-- /Popular News -->
                        
                    </div>
                    <!-- /Main Content -->
                    
                    <?php get_sidebar(); ?>
                <?php } ?>
            </div>    
        </section>
        <!-- / Content -->
        
       <?php get_footer(); ?>