<?php 

include_once('inc/theme_config.php');
include_once('inc/theme_css_js.php');

include_once('inc/myshoph_live_search.php');

include_once('inc/shop_page_customization.php');

include_once('inc/cart-customization.php');

include_once('inc/single-product-page-customization.php');

include_once('inc/myshoph_live_search.php');

include_once('inc/checkout-page-customization.php');
include_once('inc/account_customization.php');

//include_once('inc/wishlist.php');



add_action( 'woocommerce_sale_flash', 'sale_badge_percentage', 25 );
 
function sale_badge_percentage() {
   global $product;
   if ( ! $product->is_on_sale() ) return;
   if ( $product->is_type( 'simple' ) ) {
      $max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
   } elseif ( $product->is_type( 'variable' ) ) {
      $max_percentage = 0;
      foreach ( $product->get_children() as $child_id ) {
         $variation = wc_get_product( $child_id );
         $price = $variation->get_regular_price();
         $sale = $variation->get_sale_price();
         if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
         if ( $percentage > $max_percentage ) {
            $max_percentage = $percentage;
         }
      }
   }
   if ( $max_percentage > 0 ) echo "<span class='onsale'>" . round($max_percentage) . "% OFF</span>";
}
// Display saved amount for Woocommerce discounted products
add_action( 'woocommerce_after_shop_loop_item', 'you_save_for_archives', 1 ); // Change your hook priority
function you_save_for_archives() {
	global $product;

	// works for Simple and Variable type
	$regular_price 	= get_post_meta( $product->get_id(), '_regular_price', true ); // For example: 49.99
	$sale_price 	= get_post_meta( $product->get_id(), '_sale_price', true ); // For example: 39.99
		
	if( !empty($sale_price) ) {
	
		$saved_amount 		= $regular_price - $sale_price;
		$currency_symbol 	= get_woocommerce_currency_symbol();

		$percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
		?>
			<span class="you-save-price">You save: <?php echo $currency_symbol .''. number_format($saved_amount, 2, '.', ''); ?></span>				
		<?php		
	} 	
}
// For simple products
add_action( 'woocommerce_single_product_summary', 'simple_product_saving_amount', 11 );
function simple_product_saving_amount() {
    global $product;

    if( $product->is_type('simple') && $product->is_on_sale() ) {
        $regular_price = (float) wc_get_price_to_display( $product, array('price' => $product->get_regular_price() ) );
        $active_price  = (float) wc_get_price_to_display( $product, array('price' => $product->get_sale_price() ) );

        $saved_amount  = $regular_price - $active_price;
        $percentage    = round( $saved_amount / $regular_price * 100 );

        echo '<mark id="saving_total_price">'. __("You Save") .': ' . wc_price($saved_amount) . ' ('.$percentage.'%)</mark>';
    }
}

// For product variations (on variable products)
add_filter( 'woocommerce_available_variation', 'variable_product_saving_amount', 10, 3 );
function variable_product_saving_amount( $data, $product, $variation ) {

    if( $variation->is_on_sale() ) {
        $saved_amount  = $data['display_regular_price'] - $data['display_price'];
        $percentage    = round( $saved_amount / $data['display_regular_price'] * 100 );

        $data['price_html'] .= '<mark id="saving_total_price">'. __("You Save") .': ' . wc_price($saved_amount) . ' ('.$percentage.'%)</mark>';
    }
    return $data;
}

// Display product attributes on WooCommerce shop pages
add_action( 'woocommerce_after_shop_loop_item_title', 'display_size_attribute', 85 );
function display_size_attribute() {
    global $product;

    if ( $product->is_type('variable') ) {
        $taxonomy = 'pa_size'; // Change your attribute slug if needed
		if($product->get_attribute($taxonomy) != null) {
        	echo '<p class="attribute-size attribute">Size: ' . $product->get_attribute($taxonomy) . '<br/></p>';
		}
    }
    if ( $product->is_type('variable') ) {
        $taxonomy = 'pa_color';  // Change your attribute slug if needed
		if($product->get_attribute($taxonomy) != null) {
        	echo '<p class="attribute-size attribute">Color: ' . $product->get_attribute($taxonomy) . '</p>';
		}
    }
}



// You can use all Woocommerce shortcodes here below. See available shortcodes here https://docs.woocommerce.com/document/woocommerce-shortcodes/

add_action( 'woocommerce_no_products_found', 'featured_products_on_not_found', 20 );
function featured_products_on_not_found() {
	echo '<h4>' . __( 'No products were found matching your selection. Although... You may be interested in these products', 'domain' ) . '</h4>';
	echo do_shortcode( '[featured_products per_page="4"]' ); // Here goes your shortcode
}

add_filter( 'woocommerce_cart_needs_shipping_address', '__return_false');

 ?>