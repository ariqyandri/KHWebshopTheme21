<div class="navbar_background">
</div>
<nav id="navbar">
    <div class="logo">
            <a href="<?php echo get_home_url() ?>">
                <img src='<?php echo get_template_directory_uri()."/assets/images/logo.png" ?>' alt="logo" />
            </a>
            <div class="menu-icon">
          <i class="fas fa-bars"></i>
        </div>
    </div>
    <ul id="menu">
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </ul>
    <div class="nav-button">
        <button class="distributor book-button">
        <p>Book Now</p>
        </button>
    </div>
</nav>