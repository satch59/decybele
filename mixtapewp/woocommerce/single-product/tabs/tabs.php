<?php
/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

    <div class="qodef-tabs woocommerce-tabs wc-tabs-wrapper qodef-horizontal-tab">
        <ul class="qodef-tabs-nav tabs wc-tabs">
            <?php foreach ( $tabs as $key => $tab ) : ?><!-- these comments are used for clearing spaces between inline-block elements
                 --><li class="<?php echo esc_attr( $key ); ?>_tab">
                        <a href="#tab-<?php echo esc_attr( $key ); ?>"><h5><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></h5></a>
                </li><!--
            --><?php endforeach; ?>
        </ul>
        <?php foreach ( $tabs as $key => $tab ) : ?>
            <div class="qodef-tab-container panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>">
                <?php call_user_func( $tab['callback'], $key, $tab ); ?>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>
