<?php $postaudio_soundcloud = get_post_meta(get_the_ID(),'mypassion_audio_soundcloud', true); global $admin_data; ?>

<?php if($postaudio_soundcloud){ ?>
<div class="post-type-wrapper">
    <div class="audio">
        <h1>This is a audio page. Time to have some fun. </h1>
    </div>
</div>
<?php } ?>