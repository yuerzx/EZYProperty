<?php global $admin_data; ?>
<?php if($admin_data['all_share'] == true) {?>
<div class="sharebox clearfix">
	
	<div class="social-icons clearfix">
		<ul class="sharebox">
        	<li><small><?php echo __('Share this story:','framework') ?> </small></li>
			
			<?php if($admin_data['facebook_share'] == true) { ?>
			<li class="social-facebook">
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" title="<?php _e( 'Facebook', 'framework' ) ?>" target="_blank"><span class="facebook"><?php _e( 'Facebook', 'framework' ) ?></span></a>
			</li>
			<?php } ?>
			
            <?php if($admin_data['twitter_share'] == true) { ?>
			<li class="social-twitter">
				<a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" title="<?php _e( 'Twitter', 'framework' ) ?>" target="_blank"><span class="twitter"><?php _e( 'Twitter', 'framework' ) ?></span></a>
			</li>
			<?php } ?>
            
            <?php if($admin_data['pinterest_share'] == true) { ?>
			<li class="social-pinterest">
				<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php the_title(); ?>" title="<?php _e( 'Pinterest', 'framework' ) ?>" target="_blank"><span class="pinterest"><?php _e( 'Pinterest', 'framework' ) ?></span></a>
			</li>
			<?php } ?>
			
			<?php if($admin_data['linkedin_share'] == true) { ?>
			<li class="social-linkedin">
				<a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>&amp;title=<?php the_title();?>" title="<?php _e( 'LinkedIn', 'framework' ) ?>" target="_blank"><span class="linkedin"><?php _e( 'LinkedIn', 'framework' ) ?></span></a>
			</li>
			<?php } ?>
			
			<?php if($admin_data['reddit_share'] == true) { ?>
			<li class="social-reddit">
				<a href="http://www.reddit.com/submit?url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php _e( 'Reddit', 'framework' ) ?>" target="_blank"><span class="reddit"><?php _e( 'Reddit', 'framework' ) ?></span></a>
			</li>
			<?php } ?>
			
			<?php if($admin_data['digg_share'] == true) { ?>
			<li class="social-digg">
				<a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;bodytext=&amp;tags=&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" target="_blank" title="<?php _e( 'Digg', 'framework' ) ?>"><span class="digg"><?php _e( 'Digg', 'framework' ) ?></span></a>
			</li>
			<?php } ?>
			
			<?php if($admin_data['delicious_share'] == true) { ?>
			<li class="social-delicious">
				<a href="http://www.delicious.com/post?v=2&amp;url=<?php the_permalink() ?>&amp;notes=&amp;tags=&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php _e( 'Delicious', 'framework' ) ?>" target="_blank"><span class="delicious"><?php _e( 'Delicious', 'framework' ) ?></span></a>
			</li>
			<?php } ?>
			
			<?php if($admin_data['google_share'] == true) { ?>
			<li class="social-googleplus">
				<a href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php _e( 'Google+', 'framework' ) ?>" target="_blank"><span class="googleplus"><?php _e( 'Google+', 'framework' ) ?></span></a>
			</li>
			<?php } ?>
			
			<?php if($admin_data['email_share'] == true) { ?>
			<li class="social-email">
				<a href="mailto:?subject=<?php the_title();?>&amp;body=<?php the_permalink() ?>" title="<?php _e( 'E-Mail', 'framework' ) ?>" target="_blank"><span class="email"><?php _e( 'E-Mail', 'framework' ) ?></span></a>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php } ?>