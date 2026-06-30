<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo esc_attr(get_theme_mod('hero_description', 'Top Rated Upwork freelancer specializing in WordPress bug fixing, Figma to WordPress, Elementor, custom plugins & themes.')); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a href="#services" class="skip-link screen-reader-text">Skip to content</a>

<!-- NAVIGATION -->
<nav>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo">
        <?php 
        $profile_name = get_theme_mod('profile_name', 'Junaid S.');
        $first_name = explode(' ', trim($profile_name))[0];
        echo esc_html($first_name); ?><span>.</span>dev
    </a>
    
    <ul class="nav-links">
        <li><a href="#services">Services</a></li>
        <li><a href="#process">Process</a></li>
        <li><a href="#why">Why me</a></li>
        <li><a href="#reviews">Reviews</a></li>
        <li><a href="#tools">Tools</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
    
    <a href="<?php echo esc_url(get_theme_mod('upwork_url', 'https://www.upwork.com/freelancers/~0139f4995660a6a8ea')); ?>" 
       target="_blank" 
       rel="noopener noreferrer" 
       class="nav-cta">
        Hire on Upwork
    </a>
    
    <button class="hamburger" onclick="toggleMenu()" aria-label="Menu">
        <span></span><span></span><span></span>
    </button>
</nav>

<!-- MOBILE MENU -->
<div class="mobile-menu" id="mobileMenu">
    <a href="#services" onclick="toggleMenu()">Services</a>
    <a href="#process" onclick="toggleMenu()">Process</a>
    <a href="#why" onclick="toggleMenu()">Why me</a>
    <a href="#reviews" onclick="toggleMenu()">Reviews</a>
    <a href="#tools" onclick="toggleMenu()">Tools</a>
    <a href="#contact" onclick="toggleMenu()">Contact</a>
    <a href="<?php echo esc_url(get_theme_mod('upwork_url', '#')); ?>" 
       target="_blank" 
       rel="noopener noreferrer" 
       class="nav-cta">
        Hire on Upwork
    </a>
</div>