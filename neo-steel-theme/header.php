<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="masthead">
    <div class="container">
        <div class="header-container">
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <div class="site-logo">
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </h1>
                        <?php
                        $neo_steel_description = get_bloginfo('description', 'display');
                        if ($neo_steel_description || is_customize_preview()) :
                        ?>
                            <p class="site-description"><?php echo esc_html($neo_steel_description); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <button class="mobile-menu-toggle" aria-label="Toggle Menu" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>

            <nav class="main-navigation" id="site-navigation" aria-label="Primary Navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'fallback_cb'    => 'neo_steel_default_menu',
                ));
                ?>
            </nav>
        </div>
    </div>
</header>

<main id="main" class="site-main">
