<?php
/*Template name: contact*/
get_header();
?>

    <main>
        <section class="conatact">
            <div id="map"></div>
            <div class="contact__container">
                <div class="section__title">
                    <h2 class="title">Контакти</h2>
                </div>
                <div class="contact__info">
                    <div class="contact__item">
                        <p>Адрес: </p>
                        <span><?php the_field('address'); ?></span>
                    </div>
                    <div class="contact__item">
                        <p>Телефон: </p>
                        <a href="tel:+<?php the_field('phone'); ?>">+<?php the_field('phone'); ?></a>
                    </div>
                    <div class="contact__item">
                        <p>Email:: </p>
                        <a href="mailto:<?php the_field('e_mail'); ?>"><?php the_field('e_mail'); ?></a>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();
