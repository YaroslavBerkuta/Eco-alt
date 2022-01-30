<?php
get_header();
global $product;
?>

    <main>
        <section class="breadcrumbs">
            <div class="container">
                <?php
                woocommerce_breadcrumb();
                ?>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="product__flex">
                    <aside class="product__info">
                        <div class="product__name">
                            <h1><?php echo $product->name; ?></h1>
                        </div>
                        <div class="product__model">
                            <h3><?php echo $product->get_attribute('модель'); ?></h3>
                        </div>

                        <?php
                        if ($product->get_attributes()) {
                            foreach($product->get_attributes() as $attribute){?>

                                <div class="product__atribute">
                                    <div class="accordion">
                                        <p><?php echo $attribute['name']; ?></p>
                                        <svg
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                    d="M12 2.00003C10.0222 2.00003 8.08879 2.58652 6.4443 3.68533C4.79981 4.78415 3.51809 6.34593 2.76121 8.1732C2.00433 10.0005 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6726 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.482 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38645 21.2388 8.1732C20.7363 6.95994 19.9997 5.85755 19.0711 4.92896C18.1425 4.00038 17.0401 3.26378 15.8268 2.76124C14.6136 2.25869 13.3132 2.00003 12 2.00003ZM12 20C10.4178 20 8.87104 19.5308 7.55544 18.6518C6.23985 17.7727 5.21447 16.5233 4.60897 15.0615C4.00347 13.5997 3.84504 11.9912 4.15372 10.4393C4.4624 8.88746 5.22433 7.462 6.34315 6.34318C7.46197 5.22436 8.88743 4.46243 10.4393 4.15375C11.9911 3.84507 13.5997 4.00349 15.0615 4.60899C16.5233 5.2145 17.7727 6.23988 18.6518 7.55547C19.5308 8.87106 20 10.4178 20 12C20 14.1218 19.1572 16.1566 17.6569 17.6569C16.1566 19.1572 14.1217 20 12 20Z"
                                                    fill="#AFB1BD"
                                            />
                                            <path
                                                    d="M15 11H13V9.00003C13 8.73481 12.8946 8.48046 12.7071 8.29292C12.5196 8.10539 12.2652 8.00003 12 8.00003C11.7348 8.00003 11.4804 8.10539 11.2929 8.29292C11.1054 8.48046 11 8.73481 11 9.00003V11H9C8.73478 11 8.48043 11.1054 8.29289 11.2929C8.10536 11.4805 8 11.7348 8 12C8 12.2652 8.10536 12.5196 8.29289 12.7071C8.48043 12.8947 8.73478 13 9 13H11V15C11 15.2652 11.1054 15.5196 11.2929 15.7071C11.4804 15.8947 11.7348 16 12 16C12.2652 16 12.5196 15.8947 12.7071 15.7071C12.8946 15.5196 13 15.2652 13 15V13H15C15.2652 13 15.5196 12.8947 15.7071 12.7071C15.8946 12.5196 16 12.2652 16 12C16 11.7348 15.8946 11.4805 15.7071 11.2929C15.5196 11.1054 15.2652 11 15 11Z"
                                                    fill="#AFB1BD"
                                            />
                                        </svg>
                                    </div>
                                    <div class="panel">
                                        <div class="product__atribute-wrapper">

                                            <p class="product__atribute-value"><?php
                                                foreach ($attribute['options'] as $key=>$option){
                                                    echo $option.'<br>';
                                                }
                                                ?></p>
                                        </div>
                                </div>

                                    <?php
                            }
                        }
                        ?>







                    </aside>
                    <div class="product__gallery">
                        <div class="product__gallery-wrapper">
                            <?php
                            // Вывод галереи товаров
                            $attachment_ids = $product->get_gallery_image_ids(); # Получаем id изображений

                            foreach ($attachment_ids as $attachment_id) {
                                if ($attachment_id) {

                                } ?>
                                <div class="product__gallery-img">
                                    <img src="<?php echo  wp_get_attachment_image_src($attachment_id);?>" alt=""/>
                                </div>
                                <?php
                            }
                            ?>
                            <!--                            <div class="product__gallery-img">
                                                            <img src="img/gallery1.png" alt=""/>
                                                        </div>
                                                        <div class="product__gallery-img">
                                                            <img src="img/gallery1.png" alt=""/>
                                                        </div>
                                                        <div class="product__gallery-img">
                                                            <img src="img/gallery1.png" alt=""/>
                                                        </div>-->
                        </div>
                        <div class="gallery__btn">
                            <div class="product__gallery-prev">
                                <svg
                                        width="11"
                                        height="20"
                                        viewBox="0 0 11 20"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            d="M2.33336 19.3333C2.02182 19.3339 1.71991 19.2254 1.48003 19.0267C1.34502 18.9147 1.23341 18.7773 1.15161 18.6221C1.06981 18.467 1.01941 18.2973 1.00331 18.1226C0.987211 17.948 1.00572 17.7719 1.05778 17.6044C1.10984 17.437 1.19442 17.2814 1.30669 17.1467L7.28003 10L1.52003 2.84C1.40927 2.70362 1.32656 2.54669 1.27666 2.37824C1.22675 2.20979 1.21062 2.03313 1.22921 1.85843C1.24779 1.68372 1.30072 1.51441 1.38495 1.36023C1.46919 1.20605 1.58306 1.07003 1.72003 0.960002C1.85798 0.83862 2.01954 0.747063 2.19455 0.691078C2.36957 0.635093 2.55427 0.615888 2.73706 0.634667C2.91985 0.653447 3.09679 0.709807 3.25676 0.800209C3.41674 0.890612 3.5563 1.01311 3.66669 1.16L10.1067 9.16C10.3028 9.39858 10.41 9.69784 10.41 10.0067C10.41 10.3155 10.3028 10.6148 10.1067 10.8533L3.44003 18.8533C3.30627 19.0147 3.13636 19.1422 2.94408 19.2256C2.7518 19.309 2.54257 19.3459 2.33336 19.3333Z"
                                            fill="#00A759"
                                    />
                                </svg>
                            </div>
                            <div class="product__gallery-next">
                                <svg
                                        width="11"
                                        height="20"
                                        viewBox="0 0 11 20"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            d="M2.33336 19.3333C2.02182 19.3339 1.71991 19.2254 1.48003 19.0267C1.34502 18.9147 1.23341 18.7773 1.15161 18.6221C1.06981 18.467 1.01941 18.2973 1.00331 18.1226C0.987211 17.948 1.00572 17.7719 1.05778 17.6044C1.10984 17.437 1.19442 17.2814 1.30669 17.1467L7.28003 10L1.52003 2.84C1.40927 2.70362 1.32656 2.54669 1.27666 2.37824C1.22675 2.20979 1.21062 2.03313 1.22921 1.85843C1.24779 1.68372 1.30072 1.51441 1.38495 1.36023C1.46919 1.20605 1.58306 1.07003 1.72003 0.960002C1.85798 0.83862 2.01954 0.747063 2.19455 0.691078C2.36957 0.635093 2.55427 0.615888 2.73706 0.634667C2.91985 0.653447 3.09679 0.709807 3.25676 0.800209C3.41674 0.890612 3.5563 1.01311 3.66669 1.16L10.1067 9.16C10.3028 9.39858 10.41 9.69784 10.41 10.0067C10.41 10.3155 10.3028 10.6148 10.1067 10.8533L3.44003 18.8533C3.30627 19.0147 3.13636 19.1422 2.94408 19.2256C2.7518 19.309 2.54257 19.3459 2.33336 19.3333Z"
                                            fill="#00A759"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <aside class="product__info">
                        <div class="size__flex">
                            <h3>Виберіть площу</h3>
                            <button class="active">25м²</button>
                            <button>35м²</button>
                            <button>45м²</button>
                        </div>
                        <p class="price"><span>₴</span><?php echo $product->get_price(); ?></p>


                        <form class="cart" action="<?php echo esc_url($product->add_to_cart_url()); ?>" method="post"
                              enctype="multipart/form-data">
                            <button class="add-cart" data-id="<?php the_ID(); ?>" type="submit">В корзину</button>
                        </form>
                        <!--<form class="cart" action="<?php /*echo esc_url($product->add_to_cart_url()); */ ?>" method="post" enctype="multipart/form-data">
                           <a class="add-cart" href="cart/cart.php">В корзину</a>
                        </form>-->

                    </aside>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();
