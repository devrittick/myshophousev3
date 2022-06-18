<?php
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
unset($fields['billing']['billing_address_2']);
unset($fields['billing']['billing_last_name']);
unset($fields['billing']['billing_address_1']);
unset($fields['order']['order_comments']);
unset( $fields['billing']['billing_company'] );

unset( $fields['shipping']['shipping_company'] );
    unset( $fields['shipping']['shipping_address_2'] );
    unset( $fields['shipping']['shipping_last_name'] );
return $fields;
}
remove_action('woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text',20);
remove_action('woocommerce_checkout_order_review', 'woocommerce_order_review', 10);
remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);
add_action('woocommerce_checkout_shipping', 'woocommerce_order_review',6);
add_action('woocommerce_checkout_shipping', 'woocommerce_checkout_payment',20);
add_action('woocommerce_checkout_shipping', 'woocommerce_order_review_heading',4);
function woocommerce_order_review_heading(){
    echo'<h3 style="border-radius: 2px; padding:30px 20px 20px; background-color:var(--bg)">Your Order</h3>';
}
add_filter( 'woocommerce_cart_needs_shipping_address', '__return_false');

add_filter( 'woocommerce_checkout_fields' , 'misha_labels_placeholders', 9999 );
 
function misha_labels_placeholders( $f ) {
 
	$f['billing']['billing_first_name']['label'] = 'Your Name';
 
	return $f;
 
}

function js_sort_checkout_fields( $fields ) {
  $fields['billing']['billing_email']['priority'] = 22;
  $fields['billing']['billing_phone']['priority'] = 23;
  $fields['billing']['billing_state']['priority'] = 70;
  $fields['billing']['billing_city']['priority'] = 80;
//   $fields['city']['priority'] = 85;

  return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'js_sort_checkout_fields' );
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
 

 add_action( 'woocommerce_checkout_shipping', 'berore_woocommerce_checkout_coupon_form', 1 );
add_action( 'woocommerce_checkout_shipping', 'woocommerce_checkout_coupon_form', 2 );
add_action( 'woocommerce_checkout_shipping', 'after_woocommerce_checkout_coupon_form', 3 );
function berore_woocommerce_checkout_coupon_form(){
    echo "<div class='addcoupon'>";
}
function after_woocommerce_checkout_coupon_form(){
    echo "</div>";
}

// add_filter( 'woocommerce_ship_to_different_address_checked', 'bbloomer_open_shipping_checkout' );
 
// function bbloomer_open_shipping_checkout() {
//    return 0;
// }


add_action( 'woocommerce_review_order_after_submit', 'bloomer_phone_checkout_page' );
 
function bloomer_phone_checkout_page() {
   ?>
   <p>Need help? Give us a call at <a href="https://api.whatsapp.com/send?phone=918617416052">+918617416052</a></p>
   <?php
}
