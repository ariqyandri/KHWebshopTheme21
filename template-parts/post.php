<?php $postID = $post->ID; ?>
<div id="post-<?php the_field('type'); ?>" class="post">
    <!-- Image -->
    <?php   if (has_block('gallery', $post->post_content)) {    ?>
    <div class="post_img">
        <div class="splide post-<?php echo $postID; ?>" id="post-slider">
	        <div class="splide__track">
		        <ul class="splide__list">

                    <?php
                    get_template_part('template-parts/gallery-load','gallery-load');
                    ?>
	
    	        </ul>
	        </div>
        </div>
    </div>
    <?php   } else if (wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )) { 
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
    <div class="post_img">
        <div class="splide non-gallery post-<?php echo $postID; ?>" id="post-slider">
	        <div class="splide__track">
		        <ul class="splide__list">
                    <li class="splide__slide image" style="background-image: url(<?php echo $image[0];?>)">
                    </li>
    	        </ul>
	        </div>
        </div>
    </div>
    <?php } else {} ?>
    <!--  -->

    <!-- Features w/ Icons -->
    <?php   if (get_the_terms( $post->ID, 'features')) {    ?>
    <div class="post_features">
    <?php $terms = get_the_terms( $post->ID, 'features');
        foreach($terms as $term) {
            $name = $term->name;
            $description = $term->description;
            $id = $term->term_id;
        ?>       
        <div class="post_feature <?php if ($description ) {?>
            hvr-sweep-to-right <?php } else {?> hvr-grow <?php }?>">
            <!-- <img title="<?php echo  $name;?>" src='<?php the_field('icon', 'facilities_'.$id );?>' alt='<?php echo  $name;?>' /> -->
            <div><?php the_field('icon_fa', 'facilities_'.$id );?></div>
            <p><?php echo $name ;?></p>
            <?php if ($description ) {?>
                <p class="post_description"><?php echo $description ;?></p>
            <?php }?>
        </div>
    <?php } ?>
    </div>
    <?php } ?>
    <!--  -->

    <!-- Text -->
    <div class="post_text  <?php if (get_the_terms( $post->ID, 'sight_category')) {?>hvr-sweep-to-right invert<?php }?>">
        <div class="post_text-box">
            <?php if (get_the_terms( $post->ID, 'sight_category')) {?>
                <a href="<?php the_field('website_link'); ?>"
                rel="noreferrer"
                target="_blank">
                    <h1><?php the_field('header'); ?></h1>
                </a>
                <a href="<?php the_field('address_link'); ?>"
                rel="noreferrer"
                target="_blank">
                    <h2><?php the_field('header_second'); ?></h2>
                </a>
            <?php } else {?>
                <h1><?php the_field('header'); ?></h1>
                <h2><?php the_field('header_second'); ?></h2>
            <?php }?>
            <?php the_content(); ?>
        </div>
    </div>
    <!--  -->
    <script>
        new Splide(".post-<?php echo $postID; ?>", {
        type: "fade",
        rewind: true,
        height: "50vh",
        focus: "center",
        perPage: 1,
        autoplay: true,
      }).mount();
    </script>
</div>
