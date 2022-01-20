<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Eco-alt
 */

?>

<footer class="footer">
    <div class="container">
        <div class="footer__flex">
            <div class="footer__item">
                <?php
                wp_nav_menu( [
                    'menu'            => 'footer_menu',
                    'container'       => false,
                ] );
                ?>
            </div>
            <div class="footer__item">
                <ul>
                    <li><img src="<? echo get_template_directory_uri().'/assets/img/masterCart.svg'?>" alt=""></li>
                    <li><img src="<? echo get_template_directory_uri().'/assets/img/visa.svg'?>" alt=""></li>
                    <li><img src="<? echo get_template_directory_uri().'/assets/img/gpay.svg'?>" alt=""></li>
                    <li><img src="<? echo get_template_directory_uri().'/assets/img/applePay.svg'?>" alt=""></li>
                </ul>
            </div>
        </div>
        <div class="footer__flex">
            <div class="footer__item">
                <ul>
                    <li><?php the_field('address'); ?></li>
                    <li><a href="tel:+<?php the_field('phone'); ?>">+<?php the_field('phone'); ?></a></li>
                    <li><a href="mailto:<?php the_field('e_mail'); ?>"><?php the_field('e_mail'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
