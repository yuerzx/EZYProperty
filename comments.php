<?php // Custom Comment template
function mytheme_comment( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment;
   $template_dir_url = get_template_directory_uri(); ?>


    
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?> ">
        <div id="comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="comment-avatar"><?php echo get_avatar( $comment, $size='50' ); ?></div>
            <div class="commment-text-wrap">
                <div class="comment-data">
                    <p><?php comment_author_link() ?> <br /> 
                    <span> <?php printf(__('<span class="time">%3$s</span>'), get_comment_time(__('g:i a')), get_comment_ID(), get_comment_date(__('F j, Y')) );?> - <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));  edit_comment_link(esc_html__('edit'),'&nbsp;&nbsp;','');?></span></p>
                </div>
                <div class="comment-text">
                	<?php if ($comment->comment_approved == '0') : ?>
                    <br /><em><?php _e('Your comment is awaiting moderation.', 'framework') ?></em>
                    <br />
                    <?php endif; ?>
                    <?php comment_text() ?>
                </div>
            </div>
        </div>
    
<?php } ?>

<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (_e('Please do not load this page directly. Thanks!', 'framework'));

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'framework'); ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h5 id="comments"  class="line"> <span><?php comments_number( __( 'No Responses', 'framework' ), __( '1 Comment', 'framework' ), __( '% Comments', 'framework' ) );?> to &#8220;<?php the_title(); ?>&#8221;</span></h5><span class="liner"></span>

	<ul class="commentlist">
	    <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
	</ul>

    <!-- Comment Navigation -->
    <?php if ( get_comment_pages_count() > 1 ) : ?>
        <br>
        <div class="comments-navigation">
            <div class="previous"> <?php previous_comments_link(_e('Older Comments', 'framework')); ?> </div>
            <div class="next"> <?php next_comments_link(_e('Newer Comments', 'framework')); ?> </div>
        </div>
    <?php endif; ?>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.', 'framework'); ?></p>

	<?php endif; ?>
<?php endif; ?>


<?php 
	$comment_form = array( 
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '<div class="form"><label>Name*</label><br /><div class="input"><input class="com-text" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" tabindex="1" /></div></div>',
						
			'email'  => '<div class="form"><label>Email*</label><br /><div class="input"><input class="com-text" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" tabindex="2" /></div></div>',
						
			'url'    => '<div class="form"><label>Website</label><br /><div class="input"><input class="com-text id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" tabindex="3" /></div></div>',)),
			
			'comment_field' => '<div class="form"><label>Comment*</label><textarea id="comment" name="comment" aria-required="true"></textarea></div>',
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'title_reply'=>'<h5 class="line"><span>'. __('Leave a reply', 'framework') .'</span></h5><span class="liner"></span>'
	);
	comment_form($comment_form, $post->ID);
?>