<?php

//THEME
function mlh_theme_support(){
	//dynamic title support
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
}
add_action('after_setup_theme','mlh_theme_support');
//

//STYLES
function mlh_register_style(){
     wp_enqueue_style( 'style', get_template_directory_uri()."/style.css", array(),'','all');
}
add_action( 'wp_enqueue_scripts', 'mlh_register_style' );
//

//SCRIPTS
function mlh_register_scripts() {
	wp_enqueue_script('jquery',"https://code.jquery.com/jquery-3.4.1.slim.min.js", array(),'3.4.1', true);
	
    wp_register_script('home-js',get_template_directory_uri()."/assets/js/home.js", array(), '', true);

    wp_register_script('sights-js',get_template_directory_uri()."/assets/js/sights.js", array(), '', true);

    wp_register_script('rooms-js',get_template_directory_uri()."/assets/js/rooms.js", array(), '', true);

    wp_register_script('parking-js',get_template_directory_uri()."/assets/js/parking.js", array(), '', true);

    wp_enqueue_script('script-js',get_template_directory_uri()."/assets/js/main.js", array(), '', true);

	wp_register_script('modal-script', get_template_directory_uri(). '/assets/js/modal.js', array(), '', true);
    
    // Localize the script with new data
    $script_data_array = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'security' => wp_create_nonce( 'view_post' ),
    );
    wp_localize_script( 'modal-script', 'blog', $script_data_array );
    wp_localize_script( 'main-script', 'blog', $script_data_array );
    //
}
add_action( 'wp_enqueue_scripts', 'mlh_register_scripts' );
//

//Enqueue Scripts
function home_scripts() {
    if(get_the_title() == 'Home'){
        wp_enqueue_script('home-js');
    }
}
add_action('wp_enqueue_scripts', 'home_scripts');

function sights_scripts() {
    if(get_the_title() == 'Sights'){
        wp_enqueue_script('sights-js');
    }
}
add_action('wp_enqueue_scripts', 'sights_scripts');

function rooms_scripts() {
    if(get_the_title() == 'Rooms'){
        wp_enqueue_script('rooms-js');
    }
}
add_action('wp_enqueue_scripts', 'rooms_scripts');

function parking_scripts() {
    if(get_the_title() == 'Parking'){
        wp_enqueue_script('parking-js');
    }
}
add_action('wp_enqueue_scripts', 'parking_scripts');

function modal_scripts() {
    if(get_the_title() == 'Home'||get_the_title() == 'Rooms'||get_the_title() == 'Our Hotel'){
        wp_enqueue_script('modal-script');
    }
}
add_action('wp_enqueue_scripts', 'modal_scripts');
//

// remove bloat
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
//

//MENUS
function mlh_menus(){
	$locations=array(
		'primary' => "Primary Menu",
		'sub' => "Sub Menu",
		'footer' => "Footer Menu"
	);
	register_nav_menus($locations);
}
add_action('init', 'mlh_menus');
//

// Ajax

// Room
add_action('wp_ajax_load_post_by_ajax', 'load_room');
add_action('wp_ajax_nopriv_load_post_by_ajax', 'load_room');

function load_room() {
    check_ajax_referer('view_post', 'security');
    $args = array(
        'post_type' => 'rooms',
        'post_status' => 'publish',
        'p' => $_POST['id'],
    );
    $posts = new WP_Query( $args );
    $response='';
    if ($posts->have_posts()) {
        while($posts->have_posts()) {
            $posts->the_post();
            $response .= get_template_part('template-parts/room-modal','room-modal');
        }
    }
    wp_reset_postdata();
    echo $response;
    wp_die();
    exit;
}
//

// Offer Availability
add_action('wp_ajax_load_offer_availability_by_ajax', 'load_offer_availability');
add_action('wp_ajax_nopriv_load_offer_availability_by_ajax', 'load_offer_availability');

function load_offer_availability() {
    check_ajax_referer('view_post', 'security');
    $args = array(
        'post_type' => 'offers',
        'post_status' => 'publish',
    );
    $response = array();
    function get_code($code) {
        array_push($response, $code);
    };
    query_posts($args);
	if( have_posts() ) :
		while( have_posts() ): the_post();
            array_push($response,array(get_field("code"), get_field("description"), get_field("default")));
		endwhile;
	endif;
    echo json_encode($response);
    die;
}
//
