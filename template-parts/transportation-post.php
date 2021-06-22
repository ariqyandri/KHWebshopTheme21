<div id="post-transportation" class="post">
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
                <h1>Show Direction</h1>
            </div>  
            <?php the_field('map'); ?>
        </div>
        <div class="post_features">
        <?php $terms = get_the_terms( $post->ID, 'features');
            foreach($terms as $term) {
                $name = $term->name;
                $description = $term->description;
                $id = $term->term_id;
            ?>       
            <div class="post_feature  hvr-grow ">
                <!-- <img title="<?php echo  $name;?>" src='<?php the_field('icon', 'facilities_'.$id );?>' alt='<?php echo  $name;?>' /> -->
                <?php the_field('icon_fa', 'facilities_'.$id );?>
                <p><?php echo $name ;?></p>
            </div>
        <?php } ?>
        </div>
    </div>
</div>
