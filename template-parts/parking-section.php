<div class="parking_section">
  <div class="section_title">
    <h1>Park and Ride (P+R)</h1>
  </div>
  <div class="parkings_display">
    <div class="parkings">
      <?php global $post;
        $post_slug = $post->post_name;?>
      <?php $loopb = new WP_Query( array( 'post_type' =>
        'post', 'tax_query' => array( array( 'taxonomy' => 'category', 'field' =>
        'slug', 'terms' => $post_slug, ) ) ) ); ?>
      <?php while ( $loopb->have_posts() ) : $loopb->the_post();?>
        <?php
            get_template_part('template-parts/parking-post','parking-post');
        ?>
      <?php endwhile;?>
      <?php wp_reset_postdata();?>
    </div>
  </div>
</div>