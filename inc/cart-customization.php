<?php 


// // Disable Woocommerce cart page shipping info
// add_filter( 'woocommerce_cart_ready_to_calc_shipping', 'remove_cart_shipping_calculator', 99 );
// function remove_cart_shipping_calculator( $show_shipping ) {
//     if( is_cart() ) {
//         return false;
//     }
//     return $show_shipping;
// }

// Adds custom content to Woocommerce empty cart page?
add_action( 'woocommerce_cart_is_empty', 'empty_cart_custom_content' );
function empty_cart_custom_content() {
  echo '<section class="product-list">
<div class="container">
<h2 class="text-center">You haven’t added any products to the cart yet. Although, you may be interested in these products.</h2>';
  echo do_shortcode( '[products limit="4" columns="4" visibility="featured" ]</div></section>' );
}


// add_action( 'woocommerce_cart_totals_after_order_total', 'bbloomer_show_total_discount_cart_checkout', 9999 );
// add_action( 'woocommerce_review_order_after_order_total', 'bbloomer_show_total_discount_cart_checkout', 9999 );
 
// function bbloomer_show_total_discount_cart_checkout() {
//    $discount_total = 0;
//    foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {         
//       $product = $values['data'];
//       if ( $product->is_on_sale() ) {
//          $regular_price = $product->get_regular_price();
//          $sale_price = $product->get_sale_price();
//          $discount = ( $regular_price - $sale_price ) * $values['quantity'];
//          $discount_total += $discount;
//       }
//    }     
//     if ( $discount_total > 0 ) {
//       echo '<tr><th>You Saved</th><td data-title="You Saved">'. wc_price( $discount_total + WC()->cart->get_discount_total() ) .'</td></tr>';
//     }
// }


add_filter( 'woocommerce_cart_item_price', 'bbloomer_change_cart_table_price_display', 30, 3 );
  
function bbloomer_change_cart_table_price_display( $price, $values, $cart_item_key ) {
   $slashed_price = $values['data']->get_price_html();
   $is_on_sale = $values['data']->is_on_sale();
   if ( $is_on_sale ) {
      $price = $slashed_price;
   }
   return $price;
}
add_filter( 'woocommerce_cart_item_permalink', '__return_null' );






add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus quti" ><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
   <path d="M19 10H1" stroke="black" stroke-width="2" stroke-linecap="round"/>
   <path d="M10 1L10 19" stroke="black" stroke-width="2" stroke-linecap="round"/>
   </svg>   
   </button>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus quti" ><svg width="18" height="2" viewBox="0 0 18 2" fill="none" xmlns="http://www.w3.org/2000/svg">
   <path d="M19 1H1" stroke="black" stroke-width="2" stroke-linecap="round"/>
   </svg>
   </button>';
}
  
// -------------
// 2. Trigger update quantity script
  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
 
   if ( ! is_product() && ! is_cart() ) return;
    
   wc_enqueue_js( "   
           
      $('form.cart,form.woocommerce-cart-form').on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max );
            } else {
               qty.val( val + step );
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min );
            } else if ( val > 1 ) {
               qty.val( val - step );
            }
         }
 
      });
        
   " );
   
}



 