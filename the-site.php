<?php
/**
 * Template Name: The Site
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
    <h1>Travel around amsterdam and experience great sights!</h1>
    <p><a href="<?php echo get_permalink( get_page_by_path( 'sights' ) )?>">View Sights</a></p>
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
<!---->

<!-- Display Parking -->
<div class="section_title single">
    <h1>Park your vehicle!</h1>
    <p><a href="<?php echo get_permalink( get_page_by_path( 'parking' ) )?>">View Parking</a></p>
</div>

<?php $loopb = new WP_Query(    array( 'pagename' => 'parking' ) ); ?>
<?php while ( $loopb->have_posts() ) : $loopb->the_post();?>
    
        <?php
            get_template_part('template-parts/post-summary','post-summary');
        ?>

<?php endwhile;?>
<?php wp_reset_postdata();?>
<!---->

<!-- Display Transport -->
<div class="section_title single">
    <h1>Travel around Amsterdam conveniently!</h1>
    <p><a href="<?php echo get_permalink( get_page_by_path( 'transportation' ) )?>">View Transportation</a></p>
</div>

<?php $loopb = new WP_Query(    array( 'pagename' => 'transportation' ) ); ?>
<?php while ( $loopb->have_posts() ) : $loopb->the_post();?>
    
        <?php
            get_template_part('template-parts/post-summary','post-summary');
        ?>

<?php endwhile;?>
<?php wp_reset_postdata();?>
<!---->

<?php
    get_footer();
?>