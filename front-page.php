<?php
    get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
    
<!-- Home Headline -->
    <?php
        get_template_part('template-parts/home-slider','home-slider');
    ?>
<!---->


<!-- Booking Form -->
<?php
        get_template_part('template-parts/booking-form','booking-from');
        ?>
<!---->


<div class="page-content">
    
    <!-- Page Info -->
    <?php
        get_template_part('template-parts/post','post');
    ?>

<?php endwhile;?>
<!---->

<?php wp_reset_postdata();?>

<!--Display Rooms Home-->
<?php
  get_template_part('template-parts/room-slider','room-slider');
?>
<!---->

<!-- Display Post -->
<?php global $post;
    $post_slug = $post->post_name; ?>
    
<?php $loopb = new WP_Query( array( 'post_type' =>
'post', 'tax_query' => array( array( 'taxonomy' => 'category', 'field' =>
'slug', 'terms' => $post_slug, ) ) ) ); 
while ( $loopb->have_posts() ) : $loopb->the_post();

  get_template_part('template-parts/post','post');

endwhile;
wp_reset_postdata();?>
<!---->


<!-- Guestbook Entries -->
<?php
  get_template_part('template-parts/guestbook-slider','guestbook-slider');
?>
<!---->


<?php
    get_footer();
?>