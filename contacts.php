<?php
/**
 * Template Name: Contacts
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>

<?php get_header(); ?>

<!-- Page Header -->
<?php
  get_template_part('template-parts/page-header','page-header');
?>
<!---->

<!-- Content Margin -->
<div class="page-content">

<!-- Page Info -->
<?php
    get_template_part('template-parts/contact-post','contact-post');
?>
<!---->

<!-- Location Section -->
<?php
    get_template_part('template-parts/contact-location','location-section');
?>
<!---->

</div>
<!---->

<?php get_footer(); ?>