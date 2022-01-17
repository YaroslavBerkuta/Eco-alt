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
                <img src="img/logo.svg" alt="logo" />
            </div>
            <nav class="header__menu">
                <ul class="menu">
                    <li>
                        <a href="">Каталог</a>
                        <svg
                                width="20"
                                height="11"
                                viewBox="0 0 20 11"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                    d="M0.666664 2.33324C0.666056 2.0217 0.774555 1.71979 0.97333 1.47991C1.08526 1.34489 1.22273 1.23329 1.37786 1.15149C1.53299 1.06969 1.70273 1.01929 1.87737 1.00319C2.052 0.987089 2.2281 1.0056 2.39557 1.05766C2.56304 1.10972 2.7186 1.1943 2.85333 1.30657L10 7.2799L17.16 1.51991C17.2964 1.40915 17.4533 1.32644 17.6218 1.27653C17.7902 1.22662 17.9669 1.2105 18.1416 1.22908C18.3163 1.24767 18.4856 1.3006 18.6398 1.38483C18.794 1.46906 18.93 1.58294 19.04 1.71991C19.1614 1.85786 19.2529 2.01941 19.3089 2.19443C19.3649 2.36945 19.3841 2.55415 19.3653 2.73694C19.3466 2.91973 19.2902 3.09666 19.1998 3.25664C19.1094 3.41662 18.9869 3.55618 18.84 3.66657L10.84 10.1066C10.6014 10.3027 10.3022 10.4099 9.99333 10.4099C9.6845 10.4099 9.38524 10.3027 9.14666 10.1066L1.14666 3.43991C0.985308 3.30615 0.857756 3.13624 0.774357 2.94396C0.69096 2.75168 0.654062 2.54245 0.666664 2.33324Z"
                                    fill="#1B1B1B"
                            />
                        </svg>
                        <ul class="sub-menu">
                            <li><a href="">Кондиціонери</a></li>
                            <li><a href="">Керамічні обігрівачі</a></li>
                            <li><a href="">Осушувачі повітря</a></li>
                            <li><a href="">Очищувачі повітря</a></li>
                            <li><a href="">Зволожувачі повітря</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Послуги</a>
                        <svg
                                width="20"
                                height="11"
                                viewBox="0 0 20 11"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                    d="M0.666664 2.33324C0.666056 2.0217 0.774555 1.71979 0.97333 1.47991C1.08526 1.34489 1.22273 1.23329 1.37786 1.15149C1.53299 1.06969 1.70273 1.01929 1.87737 1.00319C2.052 0.987089 2.2281 1.0056 2.39557 1.05766C2.56304 1.10972 2.7186 1.1943 2.85333 1.30657L10 7.2799L17.16 1.51991C17.2964 1.40915 17.4533 1.32644 17.6218 1.27653C17.7902 1.22662 17.9669 1.2105 18.1416 1.22908C18.3163 1.24767 18.4856 1.3006 18.6398 1.38483C18.794 1.46906 18.93 1.58294 19.04 1.71991C19.1614 1.85786 19.2529 2.01941 19.3089 2.19443C19.3649 2.36945 19.3841 2.55415 19.3653 2.73694C19.3466 2.91973 19.2902 3.09666 19.1998 3.25664C19.1094 3.41662 18.9869 3.55618 18.84 3.66657L10.84 10.1066C10.6014 10.3027 10.3022 10.4099 9.99333 10.4099C9.6845 10.4099 9.38524 10.3027 9.14666 10.1066L1.14666 3.43991C0.985308 3.30615 0.857756 3.13624 0.774357 2.94396C0.69096 2.75168 0.654062 2.54245 0.666664 2.33324Z"
                                    fill="#1B1B1B"
                            />
                        </svg>
                        <ul class="sub-menu">
                            <li><a href="">Кондиціонери</a></li>
                            <li><a href="">Керамічні обігрівачі</a></li>
                            <li><a href="">Осушувачі повітря</a></li>
                            <li><a href="">Очищувачі повітря</a></li>
                            <li><a href="">Зволожувачі повітря</a></li>
                        </ul>
                    </li>
                    <li><a href="">Об'єкти</a></li>
                    <li><a href="">Контакти</a></li>
                    <li><a href="">Про нас</a></li>
                </ul>
            </nav>
            <div class="header__contact">
                <a href="tel:+380978596027">+380 97 859 6027</a>
            </div>
            <div class="heaedr__cart">
                <a href="" class="cart">
                    <img src="img/cart.svg" alt="" />
                </a>
                <div class="cart__count">
                    <span>1</span>
                </div>
            </div>
        </div>
    </div>
</header>
