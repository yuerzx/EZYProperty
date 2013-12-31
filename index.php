<?php get_header();?>
<?php global $admin_data; ?>
		
        <?php
		if($admin_data['slider_section'] == 1){ 
			get_template_part( 'slider' );  
		}
		?>
        
        <!-- Content -->
        <section id="content">
            <div class="container">
            	<!-- Main Content -->
                <div class="main-content <?php if($admin_data['home_style'] == "home_leftsidebar"){?> left-sidebar <?php } ?>">
                	<?php 
						
						$layout = $admin_data['homepage_moduls']['enabled'];
						
						if ($layout):
						foreach ($layout as $key=>$value) {
						
							switch($key) {
						
							case 'module_one': 	 get_template_part( 'module/module-1' );
							break;
							
							case 'module_two': 	 get_template_part( 'module/module-2' );
							break;
							
							case 'module_three': get_template_part( 'module/module-3' );
							break;
							
							case 'module_four':  get_template_part( 'module/module-4' );
							break;

							}	
						}
						endif;
					?>
                    
                </div>
                <!-- /Main Content -->
                
                <?php get_sidebar(); ?>
                
            </div>    
        </section>
        <!-- / Content -->
        
       <?php get_footer(); ?>