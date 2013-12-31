<?php $postvideo_vimeo = get_post_meta(get_the_ID(),'mypassion_postvideo_v', true); global $admin_data; ?>
<?php $postvideo_youtube = get_post_meta(get_the_ID(),'mypassion_postvideo_y', true);?>
<?php $postvideo_dailymotion = get_post_meta(get_the_ID(),'mypassion_postvideo_d', true);?>

<?php if($postvideo_vimeo){ ?>
<div class="post-type-wrapper">
    <div class="video">
    <h1>Goog DAYYYYYYYYYYYYYYYYYYYYYYYYY</h1>
        <iframe src="http://player.vimeo.com/video/<?php echo esc_html($postvideo_vimeo); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="100%" height="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
    </div>
</div>

<?php }else if($postvideo_youtube){ ?>
<div class="post-type-wrapper">
    <div class="video">
       <iframe src='http://www.youtube.com/embed/<?php echo esc_html($postvideo_youtube); ?>?HD=1;rel=0;showinfo=0' width='100%' height='100%' class='iframe'></iframe>
    </div>
</div>

<?php }else{ ?>
<div class="post-type-wrapper">
    <div class="video">
       <iframe src='http://www.dailymotion.com/embed/video/<?php echo esc_html($postvideo_dailymotion); ?>?width=$width&amp;autoPlay={$autoplay}&foreground=%23FFFFFF&highlight=%23CCCCCC&background=%23000000&logo=0&hideInfos=1' width='100%' height='100%' class='iframe'></iframe>
    </div>
</div>
<?php } ?>