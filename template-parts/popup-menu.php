<div id="circularMenu1" class="circular-menu circular-menu-left">

  <a class="floating-btn" onclick="document.getElementById('circularMenu1').classList.toggle('active');">
    <i class="far fa-comment-dots"></i>
  </a>

  <button class="hubspotModalOpen">
    <?php $loopb = new WP_Query( array( 'post_type' =>
    'post', 'tax_query' => array( array( 'taxonomy' => 'category', 'field' =>
    'slug', 'terms' => "hubspot", ) ) ) );
    while ( $loopb->have_posts() ) : $loopb->the_post();
      
      the_field("headline");

    endwhile;
    wp_reset_postdata();?>
  </button>

  <menu class="items-wrapper">
    <?php $loopb = new WP_Query( array( 'post_type' =>
    'contactinfo', 'tax_query' => array( array( 'taxonomy' => 'contacttype',
    'field' => 'slug', 'terms' => 'popup', ) ) ) ); 
    while ( $loopb->have_posts() ) : $loopb->the_post();?>

    <a
      class="menu-item"
      href="<?php the_field('link'); ?>"
      rel="noreferrer"
      target="_blank"

    >
      <?php the_field('icon'); ?>
    </a>
    
    <?php endwhile;?>
    <?php wp_reset_postdata();?>
  </menu>

</div>