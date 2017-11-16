<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $post, $product;

?>
<div class="qodef-single-product-images">
    <div class="images">

        <?php
        if ( has_post_thumbnail() ) {

            $attachment_count = count( $product->get_gallery_image_ids() );
            $props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
            $image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
                'title'	 => $props['title'],
                'alt'    => $props['alt'],
            ) );

            echo apply_filters(
                'woocommerce_single_product_image_html',
                sprintf(
                    '<a href="%s" itemprop="image" class="woocommerce-main-image woocommerce-product-gallery__image zoom" title="%s">%s</a>',
                    esc_url( $props['url'] ),
                    esc_attr( $props['caption'] ),
                    $image
                ),
                $post->ID
            );

        } else {

            echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), esc_html__( 'Placeholder', 'mixtapewp' ) ), $post->ID );

        }



        // print out of sale on image
        if($product->is_in_stock()){
            add_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
            remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
            do_action( 'woocommerce_before_single_product_summary' );
        }

        ?>

        <?php do_action( 'woocommerce_product_thumbnails' ); ?>

    </div>
</div>