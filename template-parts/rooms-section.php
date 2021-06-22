<div class="rooms_section">
  <div class="section_title">
    <h1>Our Rooms</h1>
  </div>
  <div class="rooms_display">
    <div class="rooms">
      <?php $loopb = new WP_Query( array( 'post_type' => 'rooms' ) ); ?>
      <?php while ( $loopb->have_posts() ) : $loopb->the_post(); ?>
        
        <?php
            get_template_part('template-parts/room-card','card');
        ?>

      <?php endwhile;?>
      <?php wp_reset_postdata();?>
    </div>
  </div>
</div>