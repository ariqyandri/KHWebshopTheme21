
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' ); ?>
<?php
global $post;
$post_slug = $post->post_name; ?>

<div class="modal" id="room_modal" room-id="<?php the_field("id")?>">
    <div class="modal_description">
        <div class="modal_image">
            <!-- <img src="<?php echo $image[0];?>" alt="<?php the_title(); ?>"/> -->
            <div class="splide" id="room-gallery-slider">
                <div class="splide__track">
                    <ul class="splide__list">
                    <?php $regex = '/src="([^"]*)"/';
                    preg_match_all( $regex, get_the_content(), $gallery);
                    $gallery = array_reverse($gallery);
                    if($gallery[0]){        
                        foreach ($gallery[0] as $src) { ?> 
    
                        <li class="splide__slide image" style="background-image: url(<?php echo $src?>)">
                        </li>
    
                    <?php  }
                        }   ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="modal_info">
            <h1><?php the_title(); ?></h1>
            <h2 class="modal_price"><?php the_field('price'); ?> € | p.n.</h2>
            <a  href="#modal_booking"><p >Book Now</p></a >
            <?php the_content(); ?>
        </div>
    </div>

    <div class="modal_facilities">
    <h2 >Facilities</h2>
    <div class="facilities">
    <?php 
        $terms = get_the_terms( $post->ID, 'facilities' );
        foreach($terms as $term) {
            $name = $term->name;
            $slug = $term->slug;
            $id = $term->term_id;
    ?>       

        <div class="facility hvr-grow">
            <img title="<?php echo  $name;?>" src='<?php the_field('icon', 'facilities_'.$id );?>' alt='<?php echo $name;?>' />
            <p><?php echo $name;?></p>
        </div>

    <?php } ?>
    </div>
    </div>
    <div class="modal_policies">
    <h2 >Policies</h2>
    <div class="policies">
    <?php 
        $terms = get_the_terms( $post->ID, 'policies' );
        foreach($terms as $term) {
            $name = $term->name;
            $slug = $term->slug;
            $description = $term->description;
            $id = $term->term_id;
    ?>       
        <div class="policy">
            <h3><?php echo $name ?></h3>
            <p><?php echo $description?></p>
        </div>
    <?php } ?>
    </div>

    </div>

    <div class="modal_booking" id="modal_booking">
        <p class="text"><?php echo get_field('offer');?></p>
        <?php
            get_template_part('template-parts/booking-form','booking-from');
        ?>
    </div>
</div>

<script>
    new Splide("#room-gallery-slider", {
        type: "fade",
        rewind: true,
        height: "80%",
        cover: true,
        lazyLoad: "nearby",
    }).mount();
</script>