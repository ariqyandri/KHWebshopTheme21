<?php
/**
 * Template Name: History
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


<!-- Display Gallery -->
<div class="section_title single">
    <h1>Take a look at the past</h1>
</div>

<?php $loopb = new WP_Query( array( 'post_type' =>
'post', 'tax_query' => array('relation' => 'AND',
array( 'taxonomy' => 'category', 'field' =>
'slug', 'terms' => $post_slug), array( 'taxonomy' => 'category', 'field' =>
'slug', 'terms' => "gallery") ) ) ); 
while ( $loopb->have_posts() ) : $loopb->the_post();

    get_template_part('template-parts/gallery','gallery');
       
endwhile;
wp_reset_postdata();?>
<!---->

<!-- Display Post -->
<div class="section_title single">
    <h1>Historical Sights to Visit!</h1>
</div>

<?php $loopb = new WP_Query( array( 'post_type' =>
'sights', 'tax_query' => array( array( 'taxonomy' => 'sight_category', 'field' =>
'slug', 'terms' => $post_slug, ) ) ) ); 
while ( $loopb->have_posts() ) : $loopb->the_post();

    get_template_part('template-parts/post','post');
        
endwhile;
wp_reset_postdata();?>
<!---->


<?php
    get_footer();
?>
