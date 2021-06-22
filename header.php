<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Blog Site Template" />
    <?php 
        if(function_exists('the_custom_logo')){
          $custom_logo_id=get_theme_mod('custom_logo');		
          $logo=wp_get_attachment_image_src($custom_logo_id);
		}
    ?>
    <link
      rel="shortcut icon"
      href="<?php echo $logo[0] ?>"
    />	

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <!---->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K05Y1FSWLS"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-K05Y1FSWLS');
    </script>
    <!---->

    <!-- Splide JS -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <!--  -->

    <!-- Splide JS -->
    <script src="https://www.mews.li/distributor/distributor.min.js"></script>
    <!--  -->
    
    <!-- Google Maps API -->
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbsKaZKm75mrBuxH2PWh2G_jyg0liQHd0&callback=initMap">
    </script>
    <!--  -->
    
    <?php wp_head(); ?>
    
  </head>

  <body>
    <header class="header">
      <!-- Navbar -->
        <?php
          get_template_part('template-parts/navbar','navbar');
        ?>
      <!---->
    </header>
    <main class="main-content">
        <div class="page">