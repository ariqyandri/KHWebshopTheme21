<?php
/**
 * Template Name: Parking
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

<!-- Content Margin -->
<div class="page-content">

<!-- Display Parking -->
<?php
  get_template_part('template-parts/parking-section','parking-section');
?>
<!---->

</div>
<!---->

<?php get_footer(); ?>