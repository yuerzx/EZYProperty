<?php get_header(); ?>

	<section id="content">
		<div class="container">

		<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>

						<footer class="entry-meta">
							<?php
								$metadata = wp_get_attachment_metadata();
								printf( __( '<span class="meta-prep meta-prep-entry-date">发布于 </span> <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>.', 'twentytwelve' ),
									esc_attr( get_the_date( 'c' ) ),
									esc_html( get_the_date() ),
									esc_url( wp_get_attachment_url() ),
									$metadata['width'],
									$metadata['height'],
									esc_url( get_permalink( $post->post_parent ) ),
									esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
									get_the_title( $post->post_parent )
								);
							?>
							<?php edit_post_link('编辑', '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-meta -->

						<!--<nav id="image-navigation" class="navigation" role="navigation">
						
							<span class="previous-image"><?php //previous_image_link( false, '&larr; 上一幅图'); ?></span>
							<span class="next-image"><?php //next_image_link( false, '下一幅图 &rarr;' ); ?></span>
						</nav><!-- #image-navigation -->
					</header><!-- .entry-header -->

					<div class="entry-content">

						<div class="entry-attachment">
							<div class="attachment">
<?php

 $next_pid = get_adjacent_attachment(true);
 $prev_pid = get_adjacent_attachment(false);
$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
foreach ( $attachments as $k => $attachment ) :
	if ( $attachment->ID == $post->ID )
		break;
endforeach;
$k++;
// 当一篇文章不止一张图片时
//echo '<pre>';
//print_r($attachments);
if ( count( $attachments ) > 1 ) {
	if ( isset( $attachments[ $k ] ) ) {
		// 显示下一张链接
		//echo '显示第k张图K='.$k;
		$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
		if(isset($attachments[$k-2])){
      //echo '这张图是第一张图，不存在上一张图K='.$k;
      $prev_attachment_url = get_attachment_link( $attachments[$k-2]->ID );
    }else{
      //echo '则显示上一篇文章的图K='.$k;
      $attachments_prev = array_values( get_children( array( 'post_parent' => $prev_pid, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );		
      $prev_attachment_url = get_attachment_link( $attachments_prev[$k-1]->ID );
      
    } 
	} else {
	   //echo '最后一张图，不存在下一张图,存在上一张图K='.$k;
		$prev_attachment_url = get_attachment_link( $attachments[$k-2]->ID );
		// 当前显示为最后一张图片显示下一个文章附件
    $attachments_next = array_values( get_children( array( 'post_parent' => $next_pid, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
    //$attachments_prev = array_values( get_children( array( 'post_parent' => $prev_pid, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );		
		$next_attachment_url = get_attachment_link( $attachments_next[0]->ID );
		//$prev_attachment_url = get_attachment_link( $attachments_prev[1]->ID );
  }
} else {
	// 只有一张图片，显示下一页链接
	$attachments_next = array_values( get_children( array( 'post_parent' => $next_pid, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
	$attachments_prev = array_values( get_children( array( 'post_parent' => $prev_pid, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );	
	$next_attachment_url = get_attachment_link($attachments_next[1]->ID);
	$max = count( $attachments );
	$prev_attachment_url = get_attachment_link($attachments_prev[1]->ID);		
  if(empty($attachments_next)){
    $next_attachment_url = get_permalink($next_pid);	
  }
  if(empty($attachments_prev)){
    $prev_attachment_url = get_permalink($prev_pid);	
  }
}


//echo '上一篇：'.$prev_attachment_url;
//echo '下一篇：'.$next_attachment_url;
?>
								<a href="<?php echo esc_url( $prev_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment" class="prevlink"><div class="arrow-prev"></div></a>
								<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment" class="nextlink"><div class="arrow-next"></div></a>
								<?php
                  echo wp_get_attachment_image( $next_attachment_url,'full');
								?>

								<?php if ( ! empty( $post->post_excerpt ) ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div>
								<?php endif; ?>
							</div><!-- .attachment -->

						</div><!-- .entry-attachment -->

						<div class="entry-description">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">分页', 'after' => '</div>' ) ); ?>
						</div><!-- .entry-description -->

					</div><!-- .entry-content -->

				</article><!-- #post -->

				<?php comments_template(); ?>

			<?php endwhile; ?>

		</div><!-- #container -->
	</section><!-- #content -->

<?php get_footer(); ?>