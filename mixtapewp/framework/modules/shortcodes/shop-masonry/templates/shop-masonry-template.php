
<div class='qodef-shop-product <?php echo esc_attr($image_size_class); echo esc_html($cats);  echo esc_attr($out_stock_class);  echo esc_attr($on_sale_class);?>'>

    <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>


    <div class="qodef-masonry-product-image-holder">
    <?php

    echo woocommerce_get_product_thumbnail($thumb_size);

    ?>
    </div>
    <?php
    /**
     * woocommerce_before_shop_loop_item_title hook
     *
     * @hooked woocommerce_show_product_loop_sale_flash - 10
     * @hooked woocommerce_template_loop_product_thumbnail - 10
     */
    remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail');
    do_action( 'woocommerce_before_shop_loop_item_title' );
    add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
    do_action('mixtape_qodef_woocommerce_out_of_stock');
    ?>
    <div class="qodef-masonry-product-meta-wrapper">

        <div class="qodef-masonry-product-overlay-outer">
            <div class="qodef-masonry-product-info">
                <a href="<?php the_permalink(); ?>">
                    <?php

                    the_title('<h2 class="qodef-product-list-product-title">', '</h2>');

                    ?>
                </a>
                <?php
                /**
                 * woocommerce_after_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_template_loop_rating - 5
                 * @hooked woocommerce_template_loop_price - 10
                 */

                do_action( 'woocommerce_after_shop_loop_item_title' );
            ?>
            </div>
            <div class="qodef-masonry-product-button">
                <?php
                /**
                 * woocommerce_after_shop_loop_item hook
                 *
                 * @hooked woocommerce_template_loop_add_to_cart - 10
                 */
                do_action( 'woocommerce_after_shop_loop_item' );

                ?>
            </div>
        </div>
    </div>
</div>
