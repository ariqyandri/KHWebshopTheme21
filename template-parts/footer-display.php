  <div id="footer">
    <img
    class="footer_svg"
    src='<?php echo get_template_directory_uri()."/assets/images/footer.svg" ?>'
    alt="footer"
    style="filter: brightness(0) saturate(1);"
    />
    <div class="footer_content_background">
        <div class="footer_content">
            <img
            class="logo"
            src='<?php echo get_template_directory_uri()."/assets/images/logo.png" ?>'
            alt="logo"
            />
            <div class="footer_contacts">
                <?php $loopb = new WP_Query( array( 'post_type' =>
                'contactinfo', 'tax_query' => array( array( 'taxonomy' =>
                'contacttype', 'field' => 'slug', 'terms' => 'footer', ) ) ) ); ?>
                <?php while ( $loopb->have_posts() ) : $loopb->the_post();?>
                    <a class="footer_contact" href="<?php the_field('link'); ?>"     
                    rel="noreferrer"
                    target="_blank">
                        <?php the_content();?>
                    </a>
    
                <?php endwhile;?>
                <?php wp_reset_postdata();?>      
            </div>
        </div>
    </div>
    <div class="footer_end_background">
        <div class="footer_end">
            <p>
            Hotel Museum Lane ©
            <?php echo date('Y');?>
            | 
            </p>
            <a href="<?php echo get_privacy_policy_url();?>">            
                <p>Privacy Policy</p>
            </a>
        </div>
    </div>
  </div>
