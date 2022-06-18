<?php
add_action('woocommerce_before_main_content', 'dasmedicine_open_container', 4);
add_action('woocommerce_after_main_content', 'dasmedicine_close_container', 5);
add_action( 'woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1 );

function remove_add_to_cart_buttons() {
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
    }
function dasmedicine_open_container()
{
  echo '<section class="das-shop"><div class="container">';
}

function dasmedicine_close_container()
{
  echo  '</div></section>';
}
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);


add_action('template_redirect', 'custom_template_redirect');

function custom_template_redirect()
{
  if(is_shop()){
    remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
  }

  if (is_shop() || is_product_category()) {

add_action('woocommerce_before_shop_loop','dasmedicine_add_sidebar_filter',10);

function dasmedicine_add_sidebar_filter(){

  if(is_active_sidebar('sidebar-2'))
    { echo '<div class="dasmedicinefilter">';
        dynamic_sidebar('sidebar-2');
        echo '</div>';
    }
}
    add_action('woocommerce_before_main_content', 'dasmedicine_open_row', 4);
    function dasmedicine_open_row()
    {
      echo '<div class="shop-row">';
    }
    add_action('woocommerce_before_main_content', 'woocommerce_get_sidebar', 6);
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
    add_filter('woocommerce_show_page_title', 'dasmedicine_remove_shop_title', 3);
    function dasmedicine_remove_shop_title($var)
    {
      $var = true;
      return $var;
    }


    remove_action(
      'woocommerce_before_main_content',
      'woocommerce_breadcrumb',
      20
    );
    add_action(
      'woocommerce_before_main_content',
      'woocommerce_breadcrumb',
      1
    );

    add_action('woocommerce_before_main_content', 'dasmedicine_section_before_breadcrumb', 0);

    add_action('woocommerce_before_main_content', 'dasmedicine_section_after_breadcrumb', 1);

    function dasmedicine_section_before_breadcrumb()
    {
      if(is_shop()){
      echo '<div class="hero page">
        <div class="container">
          <div class="heroBox"><h1 class="page-title"> Get 20% discount on your first oder';
         echo '</h1>';
      }
          if(is_product_category()){
            echo '<div class="hero page">
        <div class="container">
          <div class="heroBox"><h1 class="page-title"> Get 20% discount on your first oder.';
         echo '</h1>';
          }
    }
    function dasmedicine_section_after_breadcrumb()
    {
      echo '</div></div></div>';
    }

    add_filter('woocommerce_show_page_title', 'dasmedicine_shop_title_remove');
    function dasmedicine_shop_title_remove($var)
    {
      $var = false;
      return $var;
    }
    
  }
}
