<?php
/*Template name: home*/
get_header();
?>

<main>
    <section class="hero">
        <div class="container">
            <div class="hero__flex">
                <div class="hero__title">
                    <h1>Системи кондиціонування та вентиляції</h1>
                </div>
                <div class="hero__media">
                    <video src="" autoplay loop muted poster="img/videoCover.png"></video>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="menu__flex">
                <ul class="small-menu">
                    <li><a href="">Кондиціонери</a></li>
                    <li><a href="">Побутові кондиціонери</a></li>
                    <li><a href="">Напівпромислові кондиціонери</a></li>
                    <li><a href="">Мультиспліт</a></li>
                    <li><a href="">Мобільні кондиціонери</a></li>
                </ul>
                <ul class="small-menu">
                    <li><a href="">Керамічні обігрівачі</a></li>
                    <li><a href="">Керамічні панелі</a></li>
                    <li><a href="">Конвекційні обігрівачі</a></li>
                    <li><a href="">Керамічні рушникосушки</a></li>
                    <li><a href="">Аксесуари для обігрівачів</a></li>
                </ul>
                <ul class="small-menu">
                    <li><a href="">Керамічні обігрівачі</a></li>
                    <li><a href="">Керамічні панелі</a></li>
                    <li><a href="">Конвекційні обігрівачі</a></li>
                </ul>
                <ul class="small-menu">
                    <li><a href="">Керамічні обігрівачі</a></li>
                </ul>
                <ul class="small-menu">
                    <li><a href="">Керамічні обігрівачі</a></li>
                </ul>
                <ul class="small-menu">
                    <li><a href="">Керамічні обігрівачі</a></li>
                </ul>
                <ul class="small-menu">
                    <li><a href="">Керамічні обігрівачі</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="section__title">
                <h2 class="title">Ми пропонуємо</h2>
                <a href="">Всі</a>
            </div>
        </div>
        <div class="brand-swiper">
            <div class="brand-wrapper">
                <?php
                $args = array(

                    'taxonomy' => 'vendors',

                );
                $vendors = get_terms($args);
                // foreach ($vendors as $vendor) { 
                ?>
                <a class="brand-item" href=""><img src="<?php the_field('brand_logo'); ?>" alt="" /></a>

                <?php
                // }
                ?>

            </div>
        </div>
    </section>
    <section class="section-relative-navigation">
        <div class="container">
            <div class="section__title">
                <h2 class="title">Каталог</h2>
                <a href="Каталог">Всі</a>
            </div>
            <div class="filter__catalog">
                <div class="filter__flex">

                    <?php
                    $args = array(
                        'taxonomy' => 'product_cat', # таксономия - категории товаро
                    );

                    $product_categories = get_terms($args);
                    foreach ($product_categories as $product_category) {
                    ?>
                        <div class="filter__item" data-filter-category-id="<?php echo $product_category->term_id ?>">
                            <button><?php echo $product_category->name; ?></button>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <div class="filter__tovar">
                <div class="swiper-wrapper">
                    <?php
                    global $product;
                    $mypost_Query = new WP_Query(array(
                        'post_type' => 'product',
                        'post_status' => 'publish',
                        'product_tag' => 'хіт',
                    ));

                    if ($mypost_Query->have_posts()) {
                        while ($mypost_Query->have_posts()) {
                            $mypost_Query->the_post();
                    ?>
                            <a class="filter__cart" href="<?php echo get_the_permalink(); ?>" data-category-id="<?php echo implode(';', $product->get_category_ids()) ?>">
                                <div class="tovar__label">
                                    <div class="label">
                                        <p>хіт</p>
                                    </div>
                                </div>
                                <div class="filter__img">
                                    <img src="<?php $product_image_url = get_the_post_thumbnail_url($product->get_id(), 'large');
                                                echo $product_image_url; ?>" alt="" />
                                </div>
                                <div class="tovar__info">
                                    <p class="art"><?php echo $product->get_sku(); ?></p>
                                    <h2 class="tovar__name"><?php echo $product->name; ?></h2>
                                    <p class="tovar__model"><?php echo $product->get_attribute('model'); ?></p>
                                    <p class="price"><?php echo $product->get_price(); ?></p>
                                </div>
                            </a>

                    <?php
                        }
                    } else {
                        echo ('<p>Извините, нет товаров.</p>');
                    }
                    wp_reset_postdata();
                    ?>

                    <?php
                    //sale product

                    $product_ids_on_sale = wc_get_product_ids_on_sale();

                    $args = array(
                        'post_type' => 'product',
                        'post__in' => array_merge(array(0), $product_ids_on_sale)
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) {
                        while ($loop->have_posts()) : $loop->the_post();
                            wc_get_template_part('content', 'product');
                        endwhile;
                    } else {
                        echo __('Продуктов не найдено');
                    }
                    wp_reset_postdata();

                    ?>

                </div>
                <div class="swiper-pagination filter__tovar-pagination"></div>
            </div>
        </div>
        <div class="swiper-button-prev">
            <svg width="11" height="20" viewBox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.33336 19.3333C2.02182 19.3339 1.71991 19.2254 1.48003 19.0267C1.34502 18.9147 1.23341 18.7773 1.15161 18.6221C1.06981 18.467 1.01941 18.2973 1.00331 18.1226C0.987211 17.948 1.00572 17.7719 1.05778 17.6044C1.10984 17.437 1.19442 17.2814 1.30669 17.1467L7.28003 10L1.52003 2.84C1.40927 2.70362 1.32656 2.54669 1.27666 2.37824C1.22675 2.20979 1.21062 2.03313 1.22921 1.85843C1.24779 1.68372 1.30072 1.51441 1.38495 1.36023C1.46919 1.20605 1.58306 1.07003 1.72003 0.960002C1.85798 0.83862 2.01954 0.747063 2.19455 0.691078C2.36957 0.635093 2.55427 0.615888 2.73706 0.634667C2.91985 0.653447 3.09679 0.709807 3.25676 0.800209C3.41674 0.890612 3.5563 1.01311 3.66669 1.16L10.1067 9.16C10.3028 9.39858 10.41 9.69784 10.41 10.0067C10.41 10.3155 10.3028 10.6148 10.1067 10.8533L3.44003 18.8533C3.30627 19.0147 3.13636 19.1422 2.94408 19.2256C2.7518 19.309 2.54257 19.3459 2.33336 19.3333Z" fill="#00A759" />
            </svg>
        </div>
        <div class="swiper-button-next">
            <svg width="11" height="20" viewBox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.33336 19.3333C2.02182 19.3339 1.71991 19.2254 1.48003 19.0267C1.34502 18.9147 1.23341 18.7773 1.15161 18.6221C1.06981 18.467 1.01941 18.2973 1.00331 18.1226C0.987211 17.948 1.00572 17.7719 1.05778 17.6044C1.10984 17.437 1.19442 17.2814 1.30669 17.1467L7.28003 10L1.52003 2.84C1.40927 2.70362 1.32656 2.54669 1.27666 2.37824C1.22675 2.20979 1.21062 2.03313 1.22921 1.85843C1.24779 1.68372 1.30072 1.51441 1.38495 1.36023C1.46919 1.20605 1.58306 1.07003 1.72003 0.960002C1.85798 0.83862 2.01954 0.747063 2.19455 0.691078C2.36957 0.635093 2.55427 0.615888 2.73706 0.634667C2.91985 0.653447 3.09679 0.709807 3.25676 0.800209C3.41674 0.890612 3.5563 1.01311 3.66669 1.16L10.1067 9.16C10.3028 9.39858 10.41 9.69784 10.41 10.0067C10.41 10.3155 10.3028 10.6148 10.1067 10.8533L3.44003 18.8533C3.30627 19.0147 3.13636 19.1422 2.94408 19.2256C2.7518 19.309 2.54257 19.3459 2.33336 19.3333Z" fill="#00A759" />
            </svg>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="subscribe__flex">
                <h2 class="title">
                    Є питання? Залиште свій номер телефону і отримайте безкоштовну
                    консультацію
                </h2>
                <form action="https://develooper.website/mail1.php" method="post">
                    <input type="tel" placeholder="Номер телефону" name="tel" class="clear-input">
                    <input type="submit" value="Відправити">
                </form>
            </div>
        </div>
    </section>

    <section class="section-relative">
        <div class="section__title">
            <h2 class="title">Ми на карті</h2>
        </div>
        <div id="map"></div>
    </section>
</main>
<script>
    jQuery(document).ready(function($) {
        $(".subscribe__flex form").submit(function() {
            var str = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "https://develooper.website/mail1.php", // здесь указываем путь к второму файлу
                data: str,
                success: function() {
                    $('.clear-input', '.subscribe__flex form') // выполняем очистку полей после отправки сообщения
                        .not(':button, :submit, :reset, :hidden')
                        .val('')
                }
            });
            return false;
        });
    });
</script>
<?php
get_footer();
