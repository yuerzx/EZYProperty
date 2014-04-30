<?php
/**
 * Template Name: Wechat Member Page
 * Created by PhpStorm.
 * User: yuerzx
 * Date: 11/04/14
 * Time: 7:21 PM
 */

?>

<?php get_header();?>

<!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
<div class="content" style="margin-top: 48px">
    <div style="padding-bottom: 10px;">
        <center><img src="<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );echo $url; ?>"></center>
    </div>

    <div id="wp_content" class="content-padded" style="margin-bottom: 53px;">
            <?php if (have_posts()) : while (have_posts()) : the_post();
            the_content();
             endwhile; endif;?>

    </div>


</div>

</body>
</html>