<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' ); ?>
<?php
global $post;
$post_slug = $post->post_name; ?>

<div class="card modalOpen hvr-grow" id="room_card" data-id="<?php the_ID(); ?>">
    <div class="card_image image" style="background-image: url(<?php echo $image[0];?>)"></div>
    <div class="card_price">            
        <h2><?php the_field('price'); ?> €</h2>
    </div>
    <div class="card_info hvr-sweep-to-right">
        <h1><?php the_title(); ?></h1>
        <div class="card_facilities">
            <?php $terms = get_the_terms( $post->ID, 'facilities' );?>
            <?php 
            foreach($terms as $term) {
            $name = $term->name;
            $slug = $term->slug;
            $id = $term->term_id;
            ?>        
            <div class="facility">         
                <img title="<?php echo  $name;?>" src='<?php the_field('icon', 'facilities_'.$id );?>' alt='<?php echo  $name;?>' />
            </div>  
            <?php } ?>
      </div>
    </div>
</div>

