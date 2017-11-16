(function($) {
    'use strict';

    var woocommerce = {};
    qodef.modules.woocommerce = woocommerce;

    woocommerce.qodefInitQuantityButtons = qodefInitQuantityButtons;
    woocommerce.qodefInitSelect2 = qodefInitSelect2;

    woocommerce.qodefOnDocumentReady = qodefOnDocumentReady;
    woocommerce.qodefOnWindowLoad = qodefOnWindowLoad;
    woocommerce.qodefOnWindowResize = qodefOnWindowResize;

    $(document).ready(qodefOnDocumentReady);
    $(window).load(qodefOnWindowLoad);
    $(window).resize(qodefOnWindowResize);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function qodefOnDocumentReady() {
        qodefInitQuantityButtons();
        qodefInitSelect2();
        qodefInitButtonLoadingLabel();
        qodefInitSingleProductLightbox();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {

    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function qodefOnWindowResize() {

    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function qodefOnWindowScroll() {

    }
    

    function qodefInitQuantityButtons() {

        $(document).on('click', '.qodef-quantity-minus, .qodef-quantity-plus', function(e) {
            e.stopPropagation();

            var button = $(this),
                inputField = button.parent().siblings('.qodef-quantity-input'),
                step = parseFloat(inputField.data('step')),
                max = parseFloat(inputField.data('max')),
                minus = false,
                inputValue = parseFloat(inputField.val()),
                newInputValue;

            if (button.hasClass('qodef-quantity-minus')) {
                minus = true;
            }

            if (minus) {
                newInputValue = inputValue - step;
                if (newInputValue >= 1) {
                    inputField.val(newInputValue);
                } else {
                    inputField.val(0);
                }
            } else {
                newInputValue = inputValue + step;
                if ( max === undefined ) {
                    inputField.val(newInputValue);
                } else {
                    if ( newInputValue >= max ) {
                        inputField.val(max);
                    } else {
                        inputField.val(newInputValue);
                    }
                }
            }
            inputField.trigger('change');

        });

    }

    function qodefInitSelect2() {

        if ($('.woocommerce-ordering .orderby').length ||  $('#calc_shipping_country').length ) {

            $('.woocommerce-ordering .orderby').select2({
                minimumResultsForSearch: Infinity
            });

            $('#calc_shipping_country, .dropdown_product_cat, .dropdown_layered_nav_color').select2();

        }

    }

    /*
    ** Init Woo loading label
    */
    function qodefInitButtonLoadingLabel() {
        var addToCart = $(".add_to_cart_button");
        
        addToCart.click(function(){
            $(this).children(".qodef-btn-text").text(qodefGlobalVars.vars.qodefAddingToCart);
        });
    }

    /*
     ** Init Product Single Pretty Photo attributes
     */
    function qodefInitSingleProductLightbox() {
        var item = $('.qodef-woocommerce-single-page .qodef-single-product-images .images .woocommerce-product-gallery__image');

        if(item.length) {
            item.each(function() {
                var thisItem = $(this);

                thisItem.attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');
                if (typeof qodef.modules.common.qodefPrettyPhoto === "function") {
                    qodef.modules.common.qodefPrettyPhoto();
                }
            });
        }
    }

})(jQuery);