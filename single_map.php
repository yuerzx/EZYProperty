<?php get_header();//地图内容展示
	global $admin_data;?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtW3Xu9QdadpH7im8viJYhVugtskMbuY4&sensor=false&libraries=places"></script>
	<!-- Content -->
  <section id="content">
    <div class="container">
      <?php if($admin_data['breadcrumbs'] == true){ ?>
        <div class="breadcrumbs column">
          <?php mypassion_breadcrumbs(); ?>
        </div>
      <?php }?>
			<!-- Main Content -->
      <div class="main-content <?php if($pagestyle == 'mpls2'){?>left-sidebar<?php }?>">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="column-two-third single">
						<h6 class="title"><?php the_title(); ?></h6>
						<!-- Meta -->
						<?php if($admin_data['meta_box'] == true){ ?>
							<span class="meta"><?php the_time(get_option('date_format')); echo $divider; _e('By:', 'framework'); ?> <?php the_author_posts_link(); echo $divider; the_category(', '); echo $divider; comments_popup_link(__( 'No Comment', 'framework' ),__( '1 comment', 'framework' ),__( '% Comments', 'framework' ),'',__( 'Comments are off', 'framework' )); ?>  	
								<?php if($admin_data['postview_box'] == true){ ?>
									&nbsp;  //  &nbsp;  <?php echo getPostViews(get_the_ID()); ?>
								<?php } ?>
             </span>
						<?php } ?>  
					</div> 
        <?php endwhile; endif;?>
			</div>
			<!-- /Main Content -->
      <?php get_sidebar(); ?>
		</div>    
  </section>
	<!-- / Content -->
<?php get_footer(); ?>