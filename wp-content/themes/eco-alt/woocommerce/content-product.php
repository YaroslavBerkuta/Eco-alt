<?php
global $product;
global $persentage;
$product_image_url = get_the_post_thumbnail_url($product->get_id(), 'large');//головне фото товара
?>
<div class="filter__cart"
     data-vendor="<?php echo $product->get_attribute('Виробник'); ?>"
data-compressor="<?php echo $product->get_attribute('Компресор'); ?>"
data-area="<?php echo $product->get_attribute('Площа приміщення'); ?>"
data-mode="<?php echo $product->get_attribute('Режим роботи'); ?>"
data-price="<?php echo $product->get_price(); ?>"
>
    <?php
    if($product->is_on_sale()){ ?>
        <div class="tovar__label">
            <?php
            /**
             * Hook: woocommerce_before_shop_loop_item_title.
             *
             * @hooked woocommerce_show_product_loop_sale_flash - 10
             * @hooked woocommerce_template_loop_product_thumbnail - 10
             */
            do_action( 'woocommerce_before_shop_loop_item_title' );
            ?>
        </div>
    <?php
    }
    ?>

    <a class="filter__img" href="<?php echo get_the_permalink(); ?>">
        <img src="<?php echo $product_image_url; ?>" alt=""/>
    </a>
    <div class="tovar__info">
        <p class="art"><?php echo $product->get_sku(); ?></p>
        <h2 class="tovar__name"><?php echo $product->name; ?></h2>
        <p class="tovar__model"><?php echo $product->get_attribute('модель'); ?></p>
        <p class="price"><?php echo $product->get_price(); ?></p>
        <div class="size__flex">
            <?php // Получаем вариации, если они есть у товара
            if ($product->is_type('variable')) { # вариативный товар \
                ?>

            <?php } else { # НЕ вариативный товар ?>

           <?php } ?>
        </div>
        <form class="cart" action="<?php echo esc_url($product->add_to_cart_url()); ?>" method="post" enctype="multipart/form-data">
            <button class="add-cart" data-id="<?php the_ID(); ?>" type="submit">В корзину</button>
        </form>
    </div>
</div>
