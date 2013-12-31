<?php global $admin_data; ?>
<!-- Footer -->
        <footer id="footer">
            <div class="container">
            	<?php get_sidebar('footer-1'); ?>
                <?php get_sidebar('footer-2'); ?>
                <?php get_sidebar('footer-3'); ?>
                <?php get_sidebar('footer-4'); ?>
                
                <div class="clearfix"></div>
                
                <ul class="social2">
                    <?php if($admin_data['facebook']){ ?><li><a href="<?php echo esc_html($admin_data['facebook']) ?>" target="_blank"><i class="icon-facebook"></i></a></li><?php }?>
                    <?php if($admin_data['dribble']){ ?><li><a href="<?php echo esc_html($admin_data['dribble']) ?>" target="_blank"><i class="icon-dribbble"></i></a></li><?php }?>
                    <?php if($admin_data['twitter']){ ?><li><a href="<?php echo esc_html($admin_data['twitter']) ?>" target="_blank"><i class="icon-twitter"></i></a></li><?php }?>
                    <?php if($admin_data['flickr']){ ?><li><a href="<?php echo esc_html($admin_data['flickr']) ?>" target="_blank"><i class="icon-flickr"></i></a></li><?php }?>
                    <?php if($admin_data['google']){ ?><li><a href="<?php echo esc_html($admin_data['google']) ?>" target="_blank"><i class="icon-gplus"></i></a></li><?php }?>
                    <?php if($admin_data['linkedin']){ ?><li><a href="<?php echo esc_html($admin_data['linkedin']) ?>" target="_blank"><i class="icon-linkedin"></i></a></li><?php }?>
                    <?php if($admin_data['tumblr']){ ?><li><a href="<?php echo esc_html($admin_data['tumblr']) ?>" target="_blank"><i class="icon-tumblr"></i></a></li><?php }?>
                    <?php if($admin_data['skype']){ ?><li><a href="<?php echo esc_html($admin_data['skype']) ?>" target="_blank"><i class="icon-skype"></i></a></li><?php }?>
                    <?php if($admin_data['vimeo']){ ?><li><a href="<?php echo esc_html($admin_data['vimeo']) ?>" target="_blank"><i class="icon-vimeo"></i></a></li><?php }?>
                    <?php if($admin_data['pinterest']){ ?><li><a href="<?php echo esc_html($admin_data['pinterest']) ?>" target="_blank"><i class="icon-pinterest"></i></a></li><?php }?>
                    <?php if($admin_data['instagram']){ ?><li><a href="<?php echo esc_html($admin_data['instagram']) ?>" target="_blank"><i class="icon-instagram"></i></a></li><?php }?>        
                </ul>
                
                <p class="copyright"><?php echo $admin_data['copyright']; ?></p>
            </div>
        </footer>
        <!-- / Footer -->
    
    </div>
	</div>
</div>
<!-- / Body Wrapper -->

<?php if($admin_data['trackingcode'] != '') { echo $admin_data['trackingcode']; } ?>
<?php wp_footer(); ?>
<!--<?php echo get_num_queries().'|'; timer_stop(1,10);?>-->
</body>
</html>
