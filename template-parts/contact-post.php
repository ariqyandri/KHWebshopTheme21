<div id="post-contact" class="post">
    <div class="post_features">
        <?php $loopb = new WP_Query( array( 'post_type' =>
        'contactinfo', 'tax_query' => array( array( 'taxonomy' =>
        'contacttype', 'field' => 'slug', 'terms' => 'main', ) ) ) ); ?>
        <?php while ( $loopb->have_posts() ) : $loopb->the_post();?>

        <a id="first" class="post_feature hvr-sweep-to-right" href="<?php the_field('link'); ?>" 
        rel="noreferrer"
        target="_blank">
            <div class="feature_text">
            <?php the_field('icon'); ?>  <h1><?php the_title(); ?></h1> 
            </div>
            <?php the_content(); ?>
        </a>

        <?php endwhile;?>
        <?php wp_reset_postdata();?>

        <?php $loopb = new WP_Query( array( 'post_type' =>
        'contactinfo', 'tax_query' => array( array( 'taxonomy' =>
        'contacttype', 'field' => 'slug', 'terms' => 'secondary', ) ) ) );
        ?>
        <?php while ( $loopb->have_posts() ) : $loopb->the_post();?>

        <div id="second" class="post_feature hvr-grow">
            <div class="feature_text">
            <h1><?php the_title(); ?></h1>
            </div>
            <?php the_content(); ?>
        </div>

        <?php endwhile;?>
        <?php wp_reset_postdata();?>
    </div>
    <!-- Text -->
    <div class="post_text">
        <div class="post_text-box">
            <h1><?php the_field('header'); ?></h1>
            <h2><?php the_field('header_second'); ?></h2>
            <?php the_content(); ?>
        </div>
    </div>
    <!--  -->

</div>

