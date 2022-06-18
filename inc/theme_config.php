<?php


function myshoph_theme_config()
{
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  register_nav_menu('main-menu', 'Main-Menu');
  add_theme_support('woocommerce', array(
    'thumbnail_image_width' => 480,
    'search_image' => 50,
    'gallery_thumbnail_image_width' => 100,
    'single_image_width' => 500,
    'product_grid' => array(
      'defult_rows' => 3,
      'min_rows' => 1,
      'max_rows' => 5,
      'defult_columns' => 4,
      'min_colimns' => 2,
      'max_columns' => 4,
    )
  ));

  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');
}

if (!isset($content_width)) {
  $content_width = 600;
}
add_action('after_setup_theme', 'myshoph_theme_config', 0);
