<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' ); ?>
<div class="card" id="sight_card">
    <a class="card_image image" style="background-image: url(<?php echo $image[0];?>)" href="<?php the_field('website_link'); ?>"
    rel="noreferrer"
    target="_blank">
    </a>
    <div class="card_info hvr-sweep-to-right">
        <a
        href="<?php the_field('website_link'); ?>"
        rel="noreferrer"
        target="_blank"
        >
        <h1>
            <?php the_title(); ?>
        </h1>
        </a>
        <a
        href="<?php the_field('address_link'); ?>"
        rel="noreferrer"
        target="_blank"
        >
            <p>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="22"
                    height="22"
                    fill="currentColor"
                    class="bi bi-geo-alt-fill"
                    viewBox="0 0 16 16"
                >
                    <path
                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"
                    />
                </svg>
                <?php the_field('address'); ?>
            </p>
        </a>
        <div class="card_description">
            <?php the_content(); ?>
        </div>
        <a 
        class="card_visit"
        href="<?php the_field('website_link'); ?>"
        rel="noreferrer"
        target="_blank">
            <p>View Site<p>
        </a>
    </div>
</div>