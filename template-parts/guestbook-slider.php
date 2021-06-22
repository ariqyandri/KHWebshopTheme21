<div id="guestbook-slider_section">
  <div class="section_title">
    <h1>Guestbook</h1>
  </div>
  <div class="guestbook-slider_box">
    <div class="splide" id="guestbook-slider">
      <div class="splide__track">
        <ul class="splide__list">
        <?php $loopb = new WP_Query( array( 'post_type' =>'guestbook' ) ); ?>
        <?php while ( $loopb->have_posts() ) : $loopb->the_post(); ?>

            <li class="splide__slide guestbook-slider_display"> 
                <?php the_content(); ?>
                <h4><strong><?php the_field('name'); ?></strong> | <?php the_field('date'); ?></h4>    
            </li>   
        
        <?php endwhile;?>
        <?php wp_reset_postdata();?>
        </ul>
      </div>
    </div>
  </div>  
</div>