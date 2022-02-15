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
                        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                                $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                                ?>

                                <div class="cart__item">
                                    <div class="cart__img">
                                        <img src="<?php echo get_the_post_thumbnail_url($product_id); ?>" alt=""/>
                                    </div>
                                    <div class="cart__info">
                                        <div class="cart__brand">

                                               <?php
                                               //echo $_product->name;;
                                                if (!$product_permalink) {
                                                    echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
                                                } else {
                                                    echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<h2><a href="%s">%s</a></h2>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                                                }
                                                ?>

                                            <p><?php
                                                echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                                                ?></p>
                                        </div>
                                        <div class="cart__model">
                                            <p><?php //echo  $product->get_attribute('модель');?></p>
                                        </div>
                                        <div class="cart__size">
                                            <span>Площа:</span>
                                            <p>25м²</p>
                                        </div>
                                        <div class="cart__btn">
                                            <?php // do_action('woocommerce_after_quantity_input_field'); ?>
                                            <div class="cart__count-item"><span>                                        <?php
                                                    if ($_product->is_sold_individually()) {
                                                        $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                                                    } else {
                                                        $product_quantity = woocommerce_quantity_input(
                                                            array(
                                                                'input_name' => "cart[{$cart_item_key}][qty]",
                                                                'input_value' => $cart_item['quantity'],
                                                                'max_value' => $_product->get_max_purchase_quantity(),
                                                                'min_value' => '0',
                                                                'product_name' => $_product->get_name(),
                                                            ),
                                                            $_product,
                                                            false
                                                        );
                                                    }

                                                    echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
                                                   // echo get_template_directory_uri() . '/assets/img/trash.svg' ?></span></div>
                                            <?php //do_action('woocommerce_before_quantity_input_field'); ?>
                                        </div>
                                        <button class="remove__item"> <?php
                                            echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                'woocommerce_cart_item_remove_link',
                                                sprintf(
                                                    '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><img src="http://localhost/Eco-alt/wp-content/themes/eco-alt/assets/img/trash.svg" alt=""></a>',
                                                    esc_url(wc_get_cart_remove_url($cart_item_key)),
                                                    esc_html__('Remove this item', 'woocommerce'),
                                                    esc_attr($product_id),
                                                    esc_attr($_product->get_sku())
                                                ),
                                                $cart_item_key
                                            );
                                            ?></button>
                                    </div>
                                </div>


                                <?php
                            }
                        }
                        ?>

                    </div>
                    <div class="cart__total">
                        <h3>Ваше замовлення</h3>
                        <div class="cart__total-price">
                            <span>Всього</span>
                            <p>
                                <?php wc_cart_totals_order_total_html(); ?></p>
                        </div>
                        <div class="cart__total-description">
                            <p>Після підтвердження замовлення наш менеджер зв'яжеться з вами найближчим часом для
                                уточнення деталей</p>
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
