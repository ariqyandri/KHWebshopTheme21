<div id="post-parking" class="post">
    <!-- Text -->
    <div class="post_text">
        <div class="post_text-box">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
    </div>
    <!--  -->
    <div class="post_objects">
      <div class="post_img" post-id="<?php echo $post->ID; ?>">
        <div class="show_map hvr-sweep-to-right invert" post-id="<?php echo $post->ID; ?>">
          <i class="fas fa-map"></i>
          <h1>Show Map</h1>
        </div>  
        <?php the_field('map'); ?>
      </div>
      <div class="post_features">
          <a id="first" class="post_feature hvr-sweep-to-right hvr-grow" href="<?php     the_field('link'); ?>" 
            rel="noreferrer"
            target="_blank">
            <div class="display-parking-box">
                    <h1>Address</h1> 
                <p><?php the_field('address'); ?></p>
            </div>
          </a>
          <!--  -->
          <a id="first" class="post_feature hvr-sweep-to-right hvr-grow" href="tel:<?php the_field('phone');?>" 
            rel="noreferrer"
            target="_blank">
            <div class="display-parking-box">
                    <h1>Phone</h1> 
                <p><?php the_field('phone'); ?></p>
            </div>
          </a>
          <!--  -->
          <div id="second" class="post_feature hvr-grow">
            <div class="display-parking-box">
                    <h1>Hours</h1> 
                <p><?php the_field('hours'); ?></p>
            </div>
          </div>
          <!--  -->
          <div id="second" class="post_feature hvr-grow">
            <div class="display-parking-box">
                    <h1>Stops</h1> 
                <p><?php the_field('stops'); ?></p>
            </div>
          </div>
          <!--  -->
      </div>
    </div>
</div>

