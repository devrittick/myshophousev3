<?php
add_action('template_redirect', 'product_page_dasmedicine');

function product_page_dasmedicine()

{

  if (is_product()) {

    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

    add_action( 'woocommerce_after_add_to_cart_form', 'woocommerce_template_single_excerpt', 10 );

    // Show Product Additional information tab content after Product summary on Single Page 
    // add_action ( 'woocommerce_after_add_to_cart_form', 'show_attributes', 25 );
    // function show_attributes() {
    //   global $product;
    //   $product->list_attributes(); 
    // }



    // add_filter('woocommerce_get_price_html', 'lw_hide_variation_price', 10, 2);
    // function lw_hide_variation_price( $v_price, $v_product ) {
    // $v_product_types = array( 'variable');
    // if ( in_array ( $v_product->product_type, $v_product_types ) && !(is_shop()) ) {
    // return '';
    // }
    // // return regular price
    // return $v_price;
    // }





    function iconic_button_class($class)

    {

      $class .= ' btn';

      return $class;

    }



    add_filter('jck_wssv_add_to_cart_button_class', 'iconic_button_class', 10);

add_filter( 'wc_product_sku_enabled', '__return_false' );

    remove_action(

      'woocommerce_sidebar','woocommerce_get_sidebar',10

    );

    // remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);







    // add_filter( 'woocommerce_product_tabs', 'wpd_wc_remove_product_review_tab', 15 );

    // function wpd_wc_remove_product_review_tab( $tabs ) {

    //     //Removing Reviews tab

    //     if ( comments_open() ) {

    //         unset( $tabs['reviews'] );

    //         unset($tabs['description']);

    //         unset($tabs['additional_information']);

    //     }

    //     return $tabs;

    // }

     



  





    

    

  }

}

