<?php
/*
	Template Name: 当前作者文章列表
*/
	if(!is_user_logged_in()){
		wp_redirect(get_bloginfo('url').'/wp-login.php');
	}
?>
<?php get_header();
	$current_userid = get_current_user_id();
?>
<section id="content"><!-- Content -->
	<div class="container">  <!-- Main Content -->
    <div class="full-width">
			<!-- Single -->
			<div class="single">
				<div class="column"><h5 class="line"><?php the_title(); ?></h5><span class="liner"></span></div>
					<div class="form column clearfix wrap">
							<table>
							<?php $wp_query = new WP_query(array('author'=>$current_userid));
								while($wp_query->have_posts()) : $wp_query->the_post();
								?>								
								<tr><td><a href="<?php the_permalink()?>"><?php the_title();?></a></td><td><a href="<?php bloginfo('url');?>/edit?id=<?php the_ID()?>&action=edit">编辑</a></td></tr>
							<?php	endwhile;
								wp_reset_postdata();
							?>
							</table>
					</div>

			</div>
			<!-- /Single -->
		</div>
  </div><!-- /Main Content -->
</section><!-- / Content -->
<?php get_footer(); ?>