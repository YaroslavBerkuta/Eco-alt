<?php
get_header();
?>
    <main class="main">
        <section>
            <div class="container">
                <div class="section__title">
                    <h1 class="title">Каталог</h1>
                    <?php
                    get_product_search_form();
                    ?>
                    <!--<form action="" class="form__search" method="get">
                        <input type="text" placeholder="Я шукаю..."/>
                        <div class="search-btn">
                            <button type="submit">
                                <img src="img/search.svg" alt=""/>
                            </button>
                        </div>
                    </form>-->
                </div>
            </div>
        </section>
        <section class="shop">
            <div class="container">
                <?php
                /**
                 * Hook: woocommerce_before_shop_loop.
                 *
                 * @hooked woocommerce_output_all_notices - 10
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                do_action('woocommerce_before_shop_loop');
                ?>

                <!--<div class="shop__top">
                    <p>720 товарів знайдено</p>
                    <form action="" class="filter">
                        <select name="" id="">
                            <option>За замовчуваням</option>
                            <option value="">За ціною від меншої до більшої</option>
                            <option value="">За ціною від більшої до меншої</option>
                        </select>
                    </form>
                </div>-->
                <div class="shop__bottom">
                    <aside class="shop__filter">
                        <form action="" class="shop__filter-form">
                            <div class="shop__filter-item">
                                <div class="accordion">
                                    <p>Виробник</p>
                                    <svg
                                            width="20"
                                            height="11"
                                            viewBox="0 0 20 11"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                                d="M0.666664 2.33336C0.666056 2.02182 0.774555 1.71991 0.97333 1.48003C1.08526 1.34501 1.22273 1.23341 1.37786 1.15161C1.53299 1.06981 1.70273 1.01941 1.87737 1.00331C2.052 0.98721 2.2281 1.00572 2.39557 1.05778C2.56304 1.10984 2.7186 1.19442 2.85333 1.30669L10 7.28003L17.16 1.52003C17.2964 1.40927 17.4533 1.32656 17.6218 1.27666C17.7902 1.22675 17.9669 1.21062 18.1416 1.22921C18.3163 1.24779 18.4856 1.30072 18.6398 1.38495C18.794 1.46919 18.93 1.58306 19.04 1.72003C19.1614 1.85798 19.2529 2.01954 19.3089 2.19455C19.3649 2.36957 19.3841 2.55427 19.3653 2.73706C19.3466 2.91985 19.2902 3.09679 19.1998 3.25676C19.1094 3.41674 18.9869 3.5563 18.84 3.66669L10.84 10.1067C10.6014 10.3028 10.3022 10.41 9.99333 10.41C9.6845 10.41 9.38524 10.3028 9.14666 10.1067L1.14666 3.44003C0.985308 3.30627 0.857756 3.13636 0.774357 2.94408C0.69096 2.7518 0.654062 2.54257 0.666664 2.33336Z"
                                                fill="#1B1B1B"
                                        />
                                    </svg>
                                </div>
                                <div class="panel">
                                    <label
                                    >Toshiba
                                        <input type="checkbox"/>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label
                                    >LG
                                        <input type="checkbox"/>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label
                                    >Gree
                                        <input type="checkbox"/>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="shop__filter-item">
                                <div class="accordion">
                                    <p>Компресор</p>
                                    <svg
                                            width="20"
                                            height="11"
                                            viewBox="0 0 20 11"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                                d="M0.666664 2.33336C0.666056 2.02182 0.774555 1.71991 0.97333 1.48003C1.08526 1.34501 1.22273 1.23341 1.37786 1.15161C1.53299 1.06981 1.70273 1.01941 1.87737 1.00331C2.052 0.98721 2.2281 1.00572 2.39557 1.05778C2.56304 1.10984 2.7186 1.19442 2.85333 1.30669L10 7.28003L17.16 1.52003C17.2964 1.40927 17.4533 1.32656 17.6218 1.27666C17.7902 1.22675 17.9669 1.21062 18.1416 1.22921C18.3163 1.24779 18.4856 1.30072 18.6398 1.38495C18.794 1.46919 18.93 1.58306 19.04 1.72003C19.1614 1.85798 19.2529 2.01954 19.3089 2.19455C19.3649 2.36957 19.3841 2.55427 19.3653 2.73706C19.3466 2.91985 19.2902 3.09679 19.1998 3.25676C19.1094 3.41674 18.9869 3.5563 18.84 3.66669L10.84 10.1067C10.6014 10.3028 10.3022 10.41 9.99333 10.41C9.6845 10.41 9.38524 10.3028 9.14666 10.1067L1.14666 3.44003C0.985308 3.30627 0.857756 3.13636 0.774357 2.94408C0.69096 2.7518 0.654062 2.54257 0.666664 2.33336Z"
                                                fill="#1B1B1B"
                                        />
                                    </svg>
                                </div>
                                <div class="panel">
                                    <label
                                    >Toshiba
                                        <input type="checkbox"/>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label
                                    >LG
                                        <input type="checkbox"/>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label
                                    >Gree
                                        <input type="checkbox"/>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="shop__filter-item">
                                <div class="accordion">
                                    <p>Площа приміщення, м²</p>
                                    <svg
                                            width="20"
                                            height="11"
                                            viewBox="0 0 20 11"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                                d="M0.666664 2.33336C0.666056 2.02182 0.774555 1.71991 0.97333 1.48003C1.08526 1.34501 1.22273 1.23341 1.37786 1.15161C1.53299 1.06981 1.70273 1.01941 1.87737 1.00331C2.052 0.98721 2.2281 1.00572 2.39557 1.05778C2.56304 1.10984 2.7186 1.19442 2.85333 1.30669L10 7.28003L17.16 1.52003C17.2964 1.40927 17.4533 1.32656 17.6218 1.27666C17.7902 1.22675 17.9669 1.21062 18.1416 1.22921C18.3163 1.24779 18.4856 1.30072 18.6398 1.38495C18.794 1.46919 18.93 1.58306 19.04 1.72003C19.1614 1.85798 19.2529 2.01954 19.3089 2.19455C19.3649 2.36957 19.3841 2.55427 19.3653 2.73706C19.3466 2.91985 19.2902 3.09679 19.1998 3.25676C19.1094 3.41674 18.9869 3.5563 18.84 3.66669L10.84 10.1067C10.6014 10.3028 10.3022 10.41 9.99333 10.41C9.6845 10.41 9.38524 10.3028 9.14666 10.1067L1.14666 3.44003C0.985308 3.30627 0.857756 3.13636 0.774357 2.94408C0.69096 2.7518 0.654062 2.54257 0.666664 2.33336Z"
                                                fill="#1B1B1B"
                                        />
                                    </svg>
                                </div>
                                <div class="panel">
                                    <label
                                    >Toshiba
                                        <input type="checkbox"/>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label
                                    >LG
                                        <input type="checkbox"/>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label
                                    >Gree
                                        <input type="checkbox"/>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="shop__filter-item">
                                <div class="accordion">
                                    <p>Режими роботи</p>
                                    <svg
                                            width="20"
                                            height="11"
                                            viewBox="0 0 20 11"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                                d="M0.666664 2.33336C0.666056 2.02182 0.774555 1.71991 0.97333 1.48003C1.08526 1.34501 1.22273 1.23341 1.37786 1.15161C1.53299 1.06981 1.70273 1.01941 1.87737 1.00331C2.052 0.98721 2.2281 1.00572 2.39557 1.05778C2.56304 1.10984 2.7186 1.19442 2.85333 1.30669L10 7.28003L17.16 1.52003C17.2964 1.40927 17.4533 1.32656 17.6218 1.27666C17.7902 1.22675 17.9669 1.21062 18.1416 1.22921C18.3163 1.24779 18.4856 1.30072 18.6398 1.38495C18.794 1.46919 18.93 1.58306 19.04 1.72003C19.1614 1.85798 19.2529 2.01954 19.3089 2.19455C19.3649 2.36957 19.3841 2.55427 19.3653 2.73706C19.3466 2.91985 19.2902 3.09679 19.1998 3.25676C19.1094 3.41674 18.9869 3.5563 18.84 3.66669L10.84 10.1067C10.6014 10.3028 10.3022 10.41 9.99333 10.41C9.6845 10.41 9.38524 10.3028 9.14666 10.1067L1.14666 3.44003C0.985308 3.30627 0.857756 3.13636 0.774357 2.94408C0.69096 2.7518 0.654062 2.54257 0.666664 2.33336Z"
                                                fill="#1B1B1B"
                                        />
                                    </svg>
                                </div>
                                <div class="panel">
                                    <label
                                    >Toshiba
                                        <input type="checkbox"/>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label
                                    >LG
                                        <input type="checkbox"/>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label
                                    >Gree
                                        <input type="checkbox"/>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="shop__filter-item">
                                <div class="accordion">
                                    <p>Ціна</p>
                                    <svg
                                            width="20"
                                            height="11"
                                            viewBox="0 0 20 11"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                                d="M0.666664 2.33336C0.666056 2.02182 0.774555 1.71991 0.97333 1.48003C1.08526 1.34501 1.22273 1.23341 1.37786 1.15161C1.53299 1.06981 1.70273 1.01941 1.87737 1.00331C2.052 0.98721 2.2281 1.00572 2.39557 1.05778C2.56304 1.10984 2.7186 1.19442 2.85333 1.30669L10 7.28003L17.16 1.52003C17.2964 1.40927 17.4533 1.32656 17.6218 1.27666C17.7902 1.22675 17.9669 1.21062 18.1416 1.22921C18.3163 1.24779 18.4856 1.30072 18.6398 1.38495C18.794 1.46919 18.93 1.58306 19.04 1.72003C19.1614 1.85798 19.2529 2.01954 19.3089 2.19455C19.3649 2.36957 19.3841 2.55427 19.3653 2.73706C19.3466 2.91985 19.2902 3.09679 19.1998 3.25676C19.1094 3.41674 18.9869 3.5563 18.84 3.66669L10.84 10.1067C10.6014 10.3028 10.3022 10.41 9.99333 10.41C9.6845 10.41 9.38524 10.3028 9.14666 10.1067L1.14666 3.44003C0.985308 3.30627 0.857756 3.13636 0.774357 2.94408C0.69096 2.7518 0.654062 2.54257 0.666664 2.33336Z"
                                                fill="#1B1B1B"
                                        />
                                    </svg>
                                </div>
                                <div class="panel">
                                    <div class="price-slider">
                                        <div class="price__range">
                                            <input
                                                    value="25000"
                                                    min="0"
                                                    max="120000"
                                                    step="500"
                                                    type="range"
                                            />
                                            <input
                                                    value="50000"
                                                    min="0"
                                                    max="120000"
                                                    step="500"
                                                    type="range"
                                            />
                                        </div>
                                        <div class="price__value">
                                            <input
                                                    type="number"
                                                    value="0"
                                                    min="0"
                                                    max="120000"
                                            />
                                            <span>-</span>
                                            <input
                                                    type="number"
                                                    value="50000"
                                                    min="0"
                                                    max="120000"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </aside>
                    <div class="shop__main">
                        <div class="shop__list">

                            <?php

                            if (wc_get_loop_prop('total')) {
                                while (have_posts()) {
                                    the_post();

                                    /**
                                     * Hook: woocommerce_shop_loop.
                                     */
                                    do_action('woocommerce_shop_loop');

                                    wc_get_template_part('content', 'product');
                                }
                            }

                            ?>
                        </div>

                        <?php
                        /**
                         * Hook: woocommerce_after_shop_loop.
                         *
                         * @hooked woocommerce_pagination - 10
                         */
                        do_action('woocommerce_after_shop_loop');
                        ?>
                        <!--<div class="catalog__pagination">
                            <a href="" class="pagination__arrow"
                            ><img src="img/paginationLeft.svg" alt=""
                                /></a>
                            <div class="pagination__page">
                                <a class="number__page active">
                                    <span>1</span>
                                </a>
                                <a class="number__page">
                                    <span>2</span>
                                </a>
                                <a class="number__page">
                                    <span>3</span>
                                </a>
                                <a class="number__page">
                                    <span>4</span>
                                </a>
                            </div>
                            <a href="" class="pagination__arrow"
                            ><img src="img/paginationRight.svg" alt=""
                                /></a>
                        </div>-->
                    </div>
                </div>
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
                        <input type="tel" placeholder="Номер телефону">
                        <input type="submit" value="Відправити">
                    </form>
                </div>
            </div>
        </section>

    </main>
    <script>
        jQuery(document).ready(function ($) {
            $(".subscribe__flex form").submit(function () {
                var str = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "https://develooper.website/mail1.php", // здесь указываем путь к второму файлу
                    data: str,
                    success: function () {
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