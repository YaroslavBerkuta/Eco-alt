<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Eco-alt
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;900&display=swap&_v=20220117155756"
            rel="stylesheet"
    />
    <link
            rel="stylesheet"
            href="https://unpkg.com/swiper/swiper-bundle.min.css?_v=20220117155756"
    />

	<?php wp_head(); ?>
</head>


<body>
<header class="header">
    <div class="container">
        <div class="header__flex">
            <div class="header__logo">
                <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri()."/assets/img/logo.svg" ?>" alt="logo" /></a>
            </div>
            <nav class="header__menu">
                <?php
                wp_nav_menu( [
                    'menu'            => 'header_menu',
                    'container'       => false,
                    'menu_class'      => 'menu',
                ] );
                ?>

            </nav>
            <div class="header__contact">
                <a href="tel:+<?php the_field('phone'); ?>">+<?php the_field('phone'); ?></a>
            </div>
            <div class="heaedr__cart">
                <a href="<?php echo esc_url(wc_get_cart_url()); ?> " class="cart">
                    <img src="<?php echo  get_template_directory_uri().'/assets/img/cart.svg' ?>" alt="" />
                </a>
                <?php
                if(WC()->cart->get_cart_contents_count() > 0): ?>
                    <div class="cart__count">
                        <span><?php  echo WC()->cart->get_cart_contents_count()  ?></span>
                    </div>
                    <?php endif;
            ?>




            </div>
        </div>
    </div>
</header>
