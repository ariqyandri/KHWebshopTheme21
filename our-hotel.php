<?php
/**
 * Template Name: Our Hotel
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>

<?php
    get_header();
?>
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

<div class="page-content">
<?php global $post;
    $post_slug = $post->post_name; ?>

<!--Display Rooms-->
<?php
  get_template_part('template-parts/room-slider','room-slider');
?>
<!---->

<!-- Display Gallery -->
<div class="section_title single">
    <h1>Discover the legacy of our hotel and the surroundings!</h1>
    <p><a href="<?php echo get_permalink( get_page_by_path( 'history' ) )?>">Discovery our history</a></p>
</div>

<?php $loopb = new WP_Query( array( 'post_type' =>
'post', 'tax_query' => array('relation' => 'AND',
array( 'taxonomy' => 'category', 'field' =>
'slug', 'terms' => $post_slug), array( 'taxonomy' => 'category', 'field' =>
'slug', 'terms' => "gallery") ) ) ); ?>
<?php while ( $loopb->have_posts() ) : $loopb->the_post();?>
    
        <?php
            get_template_part('template-parts/gallery','gallery');
        ?>

<?php endwhile;?>
<?php wp_reset_postdata();?>
<!---->

<!-- Location Section -->
<?php
    get_template_part('template-parts/contact-location','location-section');
?>
<!---->

<?php
    get_footer();
?>