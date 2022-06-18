<?php

function myshoph_css_js()
{
  wp_enqueue_style('theme-css', get_stylesheet_uri(), array(), 1.0, 'all');
    wp_enqueue_style('slider', get_template_directory_uri() . '/assets/css/splide-core.min.css', array(), 1.0, 'all');
  wp_enqueue_style('theem', get_template_directory_uri() . '/assets/css/style.css', array(), 1.0, 'all');
  wp_enqueue_style('font', get_template_directory_uri() . '/assets/css/ranade.css', array(), 1.0, 'all');

 wp_enqueue_script('slider-js', get_template_directory_uri() . '/assets/js/splide.min.js', array(), 1.0, true);
  wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), 1.0, true);
  //wp_enqueue_script('wishlist', get_template_directory_uri() . '/assets/js/wishlist.js', array('jquery'), 1.0, true);
  // wp_localize_script(
  //       'wishlist',
  //       'opt',
  //       array(
  //           'ajaxUrl'        => admin_url('admin-ajax.php'),
  //           'ajaxPost'       => admin_url('admin-post.php'),
  //           'restUrl'        => rest_url('wp/v2/product'),
  //           'shopName'       => sanitize_title_with_dashes(sanitize_title_with_dashes(get_bloginfo('name'))),
  //           'inWishlist'     => esc_html__("Already in wishlist","text-domain"),
  //           'removeWishlist' => esc_html__("Remove from wishlist","text-domain"),
  //           'buttonText'     => esc_html__("Details","text-domain"),
  //           'error'          => esc_html__("Something went wrong, could not add to wishlist","text-domain"),
  //           'noWishlist'     => esc_html__("No wishlist found","text-domain"),
  //       )
  //   );

 if(is_shop() || is_product_category() || is_product_tag()){
   wp_enqueue_script('ajax-filter', get_template_directory_uri() . '/assets/js/ajax_filter.js', array(), 1.0, true);
 }


}
add_action('wp_enqueue_scripts', 'myshoph_css_js');
