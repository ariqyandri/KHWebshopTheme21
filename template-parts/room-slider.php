<div id="room-slider_section">
  <div class="section_title">
    <h1>Our Rooms</h1>
    <p><a href="<?php echo get_permalink( get_page_by_path( 'rooms' ) )?>">View All Rooms</a></p>
  </div>
  <div class="room-slider_box">
    <div class="splide" id="room-slider">
      <div class="splide__track">
        <ul class="splide__list">
        <?php $loopb = new WP_Query( array( 'post_type' => 'rooms' ) ); ?>
        <?php while ( $loopb->have_posts() ) : $loopb->the_post(); ?>
          
          <li class="splide__slide"> <?php
              get_template_part('template-parts/room-card','room-card');
          ?></li>   

        <?php endwhile;?>
        <?php wp_reset_postdata();?>
        </ul>
      </div>
    </div>
  </div>  
</div>