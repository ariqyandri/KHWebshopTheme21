<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<div class="page_header" style="background: url(<?php echo $image[0];?>) no-repeat center center / cover">
    <h1><?php the_title(); ?></h1>
</div>