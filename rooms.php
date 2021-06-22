<?php
/**
 * Template Name: Rooms
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

<!-- Booking Form -->
<?php
  get_template_part('template-parts/booking-form','booking-from');
?>
<!---->

<!-- Page Info -->
<?php
    get_template_part('template-parts/post','post');
?>
<!--  -->

<!-- Content Margin -->
<div class="page-content">

<!-- Display Rooms -->
<?php
  get_template_part('template-parts/rooms-section','rooms-section');
?>
<!---->

</div>
<!---->

<?php get_footer(); ?>