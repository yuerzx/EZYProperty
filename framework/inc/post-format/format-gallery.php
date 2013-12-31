<?php $postgallery = get_post_meta(get_the_ID(),'mypassion_postgallery', false); ?>
<?php if($postgallery){ ?>
<div class="post-type-wrapper">
    <div class="flexslider">
        <ul class="slides">
        <?php
            if ( !is_array( $postgallery ) ) $postgallery = ( array ) $postgallery;
        
            $postgallery = implode( ',', $postgallery );
            global $wpdb;
            $images = $wpdb->get_col( "SELECT ID FROM $wpdb->posts WHERE post_type = 'attachment' AND ID IN ( $postgallery ) ORDER BY menu_order ASC " );
            foreach($images as $img){
            
            $src = wp_get_attachment_image_src( $img, 'slider-thumb' );
            $src2 = wp_get_attachment_image_src( $img, '');
            $src = $src[0];
            $src2 = $src2[0];
        ?>
            <li>
                <a><img src="<?php echo esc_html($src); ?>" alt="<?php bloginfo('description'); ?>" /></a>
            </li>
        <?php } ?>
        </ul>
    </div>
</div>
<?php } ?>

