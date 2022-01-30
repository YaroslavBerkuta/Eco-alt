<?php
get_header();
global $product;
?>

    <main class="main">
        <section>
            <div class="container">
                <div class="section__title">
                    <h2 class="title">Корзина</h2>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="cart__flex">
                    <div class="cart__list">

                        <?php
                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                ?>
                                <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">


                                    <!-- кусок який відповідає за кнопку видалення з корзіни-->
                                    <td class="product-remove">
                                        <?php
                                    echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                            'woocommerce_cart_item_remove_link',
                                            sprintf(
                                                '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                esc_html__( 'Remove this item', 'woocommerce' ),
                                                esc_attr( $product_id ),
                                                esc_attr( $_product->get_sku() )
                                            ),
                                            $cart_item_key
                                        );
                                        ?>
                                    </td>

                                    <!-- кусок який відповідає за вивод фотки-->
                                    <td class="product-thumbnail">
                                        <?php
                                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                        if ( ! $product_permalink ) {
                                            echo $thumbnail; // PHPCS: XSS ok.
                                        } else {
                                            printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                                        }
                                        ?>
                                    </td>

                                    <!-- кусок кий відповідає за назву продукта-->
                                    <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                                        <?php
                                        if ( ! $product_permalink ) {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                        } else {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                        }

                                        do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                        //хз за шо відповідає цей кусок.
                                        // Meta data.
                                        echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                                        //нагадуваня про товар в корзіні?
                                        // Backorder notification.
                                        if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                        }
                                        ?>
                                    </td>

                                    <!-- кусок відповідає за прайс-->
                                    <td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                                        <?php
                                        echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                        ?>
                                    </td>

                                    <td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                                        <?php
                                        if ( $_product->is_sold_individually() ) {
                                            $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                        } else {
                                            $product_quantity = woocommerce_quantity_input(
                                                array(
                                                    'input_name'   => "cart[{$cart_item_key}][qty]",
                                                    'input_value'  => $cart_item['quantity'],
                                                    'max_value'    => $_product->get_max_purchase_quantity(),
                                                    'min_value'    => '0',
                                                    'product_name' => $_product->get_name(),
                                                ),
                                                $_product,
                                                false
                                            );
                                        }

                                        echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                                        ?>
                                    </td>

                                    <!-- тотал прайс одного продукта(від кількості продукта)-->
                                    <td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
                                        <?php
                                        echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                        ?>


















                        <div class="cart__item">
                            <div class="cart__img">
                                <?php
                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                if ( ! $product_permalink ) {
                                    echo $thumbnail; // PHPCS: XSS ok.
                                } else {
                                    printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                                }
                                ?>
                            </div>
                            <div class="cart__info">
                                <div class="cart__brand">
                                    <h2><?php
                                        if ( ! $product_permalink ) {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                        } else {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                        }

                                        do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                        //хз за шо відповідає цей кусок.
                                        // Meta data.
                                        echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                                        //нагадуваня про товар в корзіні?
                                        // Backorder notification.
                                        if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                        }
                                        ?></h2>
                                    <p><?php
                                        echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                        ?></p>
                                </div>
                                <div class="cart__model">
                                    <p><?php //echo  $product->get_attribute('модель');?></p>
                                </div>
                                <div class="cart__size">
                                    <span>Площа:</span><p>25м²</p>
                                </div>
                                <div class="cart__btn">
                                    <button><img src="img/minus-circle.svg" alt=""></button>
                                    <div class="cart__count-item"><span>1</span></div>
                                    <button><img src="img/plus-circle-outline.svg" alt=""></button>
                                </div>
                                <button class="remove__item"><img src="<?php echo get_template_directory_uri().'/assets/img/trash.svg'?>" alt=""> <?php
                                    echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                        'woocommerce_cart_item_remove_link',
                                        sprintf(
                                            '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                            esc_html__( 'Remove this item', 'woocommerce' ),
                                            esc_attr( $product_id ),
                                            esc_attr( $_product->get_sku() )
                                        ),
                                        $cart_item_key
                                    );
                                    ?></button>
                            </div>
                        </div>





                        <div class="cart__item">
                            <div class="cart__img">
                                <img src="img/conder.png" alt="" />
                            </div>
                            <div class="cart__info">
                                <div class="cart__brand">
                                    <h2>NEOCLIMA – SKYCOLD NORDIC </h2>
                                    <p>₴16499</p>
                                </div>
                                <div class="cart__model">
                                    <p>NS/NU-09ESNIW</p>
                                </div>
                                <div class="cart__size">
                                    <span>Площа:</span><p>25м²</p>
                                </div>
                                <div class="cart__btn">
                                    <button><img src="img/minus-circle.svg" alt=""></button>
                                    <div class="cart__count-item"><span>1</span></div>
                                    <button><img src="img/plus-circle-outline.svg" alt=""></button>
                                </div>
                                <button class="remove__item"><img src="<?php echo  get_template_directory_uri().'/assets/img/trash.svg';?>" alt=""></button>
                            </div>
                        </div>
                    </div>
                    <div class="cart__total">
                        <h3>Ваше замовлення</h3>
                        <div class="cart__total-price">
                            <span>Всього</span>
                            <p>₴32998</p>
                        </div>
                        <div class="cart__total-description">
                            <p>Після підтвердження замовлення наш менеджер зв'яжеться з вами найближчим часом для уточнення деталей</p>
                        </div>
                        <div class="cart__total-btn">
                            <a href=""><span>Підтвердити замовлення</span><img src="img/arrow-next.svg" alt=""></a>
                        </div>
                    </div>
                </div>
        </section>
    </main>
<?php
get_footer();
