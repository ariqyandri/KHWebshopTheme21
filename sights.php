<?php
/**
 * Template Name: Sights
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
<!---->

<!-- Content Margin -->
<div class="page-content">

<!-- Sights Display -->
<?php
    get_template_part('template-parts/sights-section','sights-section');
?>
<!---->

<!-- Display Post -->
<?php global $post;
$post_slug = $post->post_name; 
$loopb = new WP_Query( array( 'post_type' =>
'post', 'tax_query' => array( array( 'taxonomy' => 'category', 'field' =>
'slug', 'terms' => $post_slug, ) ) ) ); ?>

<?php while ( $loopb->have_posts() ) : $loopb->the_post();?>
    
    <div id="<?php echo $post_slug?>" class="post-display">
        <?php
            get_template_part('template-parts/post','post');
        ?>
    </div>

<?php endwhile;?>
<?php wp_reset_postdata();?>
<!---->

<?php wp_reset_postdata();?>
</div>
<!---->

<?php get_footer(); ?>