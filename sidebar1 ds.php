<?php

// echo '<div>';

// function get_sub_categories() {
//     $cats = get_categories(
//       array(
//             'hide_empty' =>  0,
//             //'exclude'  =>  1,
//             'post_type' => 'product' // mention taxonomy here. 
//         )
//     );
//     $subcats = array();
//     foreach( $cats as $cat ) {
//         if ($cat->parent != '0') {
//             $subcats[] = '<a href="' . get_category_link( $cat->term_id ) .'">' . $cat->name . '</a>';
//         }
//     }
//     return $subcats;
// }
// echo '</div>';


$cat_args = array(
    'orderby'    => 'name',
    'order'      => 'asc',
    'hide_empty' => true,
);
 
$product_categories = get_terms( 'product_cat', $cat_args );
 
if( !empty($product_categories) ){
    echo '
 
<ul  class="cat-list"><li><a class="cat-list_item active" href="#!" data-slug="">All projects</a></li>';

    foreach ($product_categories as $key => $category) {
        echo '
 
<li>';
        echo '<a  class="cat-list_item" href="#!" data-slug="<?= $category->slug; ?>">';
        echo $category->name;
        echo '</a>';
        echo '</li>';
    }
    echo '</ul>
 
 
';
}


function filter_projects() {
  $postType = $_POST['type'];
  $catSlug = $_POST['category'];

  $ajaxposts = new WP_Query([
    'post_type' => $postType,
    'posts_per_page' => -1,
    'category_name' => $catSlug,
    'orderby' => 'menu_order', 
    'order' => 'desc',
  ]);
  $response = '';

  if($ajaxposts->have_posts()) {
    while($ajaxposts->have_posts()) : $ajaxposts->the_post();
      $response .= get_template_part('templates/_components/project-list-item');
    endwhile;
  } else {
    $response = 'empty';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filter_projects', 'filter_projects');
add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');

