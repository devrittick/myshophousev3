<?php

function CM_woocommerce_account_menu_items_callback($items) {
  unset( $items['downloads'] );
  return $items;
}
 add_filter('woocommerce_account_menu_items', 'CM_woocommerce_account_menu_items_callback', 10, 1);