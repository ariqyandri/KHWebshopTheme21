<?php $terms = get_terms( array('taxonomy'=>'sight_category') );
  foreach($terms as $term) {
      $name = $term->name; 
      $slug = $term->slug; 
      $id = $term->term_id; ?>
<div class="sights_section">
  <div class="section_title">
    <h1><?php echo  $name;?></h1>
  </div>
  <div class="sights_display">
    <div class="sights">
    <?php $loopb = new WP_Query( array( 'post_type' => 'sights', 
        'tax_query' => array( array( 
        'taxonomy' => 'sight_category',
        'field' => 'slug', 
        'terms' => $slug, ) ) ) );
    ?>
    <?php while ( $loopb->have_posts() ) : $loopb->the_post();?>

        <?php
            get_template_part('template-parts/sight-card','card');
        ?>

    <?php endwhile;?>
    </div>
  </div>
</div>
<?php } ?>
<?php wp_reset_postdata();?>