<?php
/**
 * Template Name: Transportation
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>

<?php get_header(); ?>

<!-- Page Title -->
<?php
  get_template_part('template-parts/page-header','page-header');
?>
<!---->

<!-- Page Info -->
<?php
    get_template_part('template-parts/post','post');
?>
<!--  -->

<div class="section_title single">
    <h1>Travel to our Hotel comfortably!</h1>
</div>
<!-- Display Post -->
<?php global $post;
$post_slug = $post->post_name; 
$loopb = new WP_Query( array( 'post_type' =>
'post', 'tax_query' => array( array( 'taxonomy' => 'category', 'field' =>
'slug', 'terms' => $post_slug, ) ) ) ); ?>

<?php while ( $loopb->have_posts() ) : $loopb->the_post();?>
    
    <?php
        get_template_part('template-parts/transportation-post','post');
    ?>

<?php endwhile;?>
<?php wp_reset_postdata();?>
<!---->

<!-- Content Margin -->
<div class="page-content">

</div>
<!---->

<?php get_footer(); ?>