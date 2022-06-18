<?php

// Add wishlist to product
add_action('woocommerce_before_shop_loop_item_title','wishlist_toggle',15);
add_action('woocommerce_single_product_summary','wishlist_toggle',25);
function wishlist_toggle(){
 
    global $product;
    echo '<span class="wishlist-title">'.esc_attr__("Add to wishlist").'</span><a class="wishlist-toggle" data-product="'.esc_attr($product->get_id()).'" href="#" title="Add to wishlist">'
    ?>

<svg viewBox="0 0 471.701 471.701" xmlns="http://www.w3.org/2000/svg">
    <path class="heart" d="M433.601,67.001c-24.7-24.7-57.4-38.2-92.3-38.2s-67.7,13.6-92.4,38.3l-12.9,12.9l-13.1-13.1
            c-24.7-24.7-57.6-38.4-92.5-38.4c-34.8,0-67.6,13.6-92.2,38.2c-24.7,24.7-38.3,57.5-38.2,92.4c0,34.9,13.7,67.6,38.4,92.3
            l187.8,187.8c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-3.9l188.2-187.5c24.7-24.7,38.3-57.5,38.3-92.4
            C471.801,124.501,458.301,91.701,433.601,67.001z M414.401,232.701l-178.7,178l-178.3-178.3c-19.6-19.6-30.4-45.6-30.4-73.3
            s10.7-53.7,30.3-73.2c19.5-19.5,45.5-30.3,73.1-30.3c27.7,0,53.8,10.8,73.4,30.4l22.6,22.6c5.3,5.3,13.8,5.3,19.1,0l22.4-22.4
            c19.6-19.6,45.7-30.4,73.3-30.4c27.6,0,53.6,10.8,73.2,30.3c19.6,19.6,30.3,45.6,30.3,73.3
            C444.801,187.101,434.001,213.101,414.401,232.701z"/>
    <g class="loading">
        <path d="M409.6,0c-9.426,0-17.067,7.641-17.067,17.067v62.344C304.667-5.656,164.478-3.386,79.411,84.479
            c-40.09,41.409-62.455,96.818-62.344,154.454c0,9.426,7.641,17.067,17.067,17.067S51.2,248.359,51.2,238.933
            c0.021-103.682,84.088-187.717,187.771-187.696c52.657,0.01,102.888,22.135,138.442,60.976l-75.605,25.207
            c-8.954,2.979-13.799,12.652-10.82,21.606s12.652,13.799,21.606,10.82l102.4-34.133c6.99-2.328,11.697-8.88,11.674-16.247v-102.4
            C426.667,7.641,419.026,0,409.6,0z"/>
        <path d="M443.733,221.867c-9.426,0-17.067,7.641-17.067,17.067c-0.021,103.682-84.088,187.717-187.771,187.696
            c-52.657-0.01-102.888-22.135-138.442-60.976l75.605-25.207c8.954-2.979,13.799-12.652,10.82-21.606
            c-2.979-8.954-12.652-13.799-21.606-10.82l-102.4,34.133c-6.99,2.328-11.697,8.88-11.674,16.247v102.4
            c0,9.426,7.641,17.067,17.067,17.067s17.067-7.641,17.067-17.067v-62.345c87.866,85.067,228.056,82.798,313.122-5.068
            c40.09-41.409,62.455-96.818,62.344-154.454C460.8,229.508,453.159,221.867,443.733,221.867z"/>
    </g>
    <g class="check">
        <path d="M238.933,0C106.974,0,0,106.974,0,238.933s106.974,238.933,238.933,238.933s238.933-106.974,238.933-238.933
            C477.726,107.033,370.834,0.141,238.933,0z M238.933,443.733c-113.108,0-204.8-91.692-204.8-204.8s91.692-204.8,204.8-204.8
            s204.8,91.692,204.8,204.8C443.611,351.991,351.991,443.611,238.933,443.733z"/>
        <path d="M370.046,141.534c-6.614-6.388-17.099-6.388-23.712,0v0L187.733,300.134l-56.201-56.201
            c-6.548-6.78-17.353-6.967-24.132-0.419c-6.78,6.548-6.967,17.353-0.419,24.132c0.137,0.142,0.277,0.282,0.419,0.419
            l68.267,68.267c6.664,6.663,17.468,6.663,24.132,0l170.667-170.667C377.014,158.886,376.826,148.082,370.046,141.534z"/>
    </g>
</svg>

    <?php 
    echo '</a>';
}


// Wishlist table shortcode
add_shortcode('wishlist', 'wishlist');
function wishlist( $atts, $content = null ) {
 
    extract(shortcode_atts(array(), $atts));
 
    return '<table class="wishlist-table loading">
                <tr>
                    <th><!-- Left for image --></th>
                    <th>'.esc_html__("Name","text-domain").'</th>
                    <th>'.esc_html__("Price","text-domain").'</th>
                    <th>'.esc_html__("Stock","text-domain").'</th>
                    <th><!-- Left for button --></th>
                </tr>
            </table>';
 
}



// Wishlist option in the user profile
add_action( 'show_user_profile', 'wishlist_user_profile_field' );
add_action( 'edit_user_profile', 'wishlist_user_profile_field' );
function wishlist_user_profile_field( $user ) { ?>
    <table class="form-table wishlist-data">
        <tr>
            <th><?php echo esc_attr__("Wishlist","text-domain"); ?></th>
            <td>
                <input type="text" name="wishlist" id="wishlist" value="<?php echo esc_attr( get_the_author_meta( 'wishlist', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
    </table>
<?php }
 
add_action( 'personal_options_update', 'save_wishlist_user_profile_field' );
add_action( 'edit_user_profile_update', 'save_wishlist_user_profile_field' );
function save_wishlist_user_profile_field( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'wishlist', $_POST['wishlist'] );
}


// Get current user data
function fetch_user_data() {
    if (is_user_logged_in()){
        $current_user = wp_get_current_user();
        $current_user_wishlist = get_user_meta( $current_user->ID, 'wishlist',true);
        echo json_encode(array('user_id' => $current_user->ID,'wishlist' => $current_user_wishlist));
    }
    die();
}
add_action( 'wp_ajax_fetch_user_data', 'fetch_user_data' );
add_action( 'wp_ajax_nopriv_fetch_user_data', 'fetch_user_data' );


function update_wishlist_ajax(){
    if (isset($_POST["user_id"]) && !empty($_POST["user_id"])) {
        $user_id   = $_POST["user_id"];
        $user_obj = get_user_by('id', $user_id);
        if (!is_wp_error($user_obj) && is_object($user_obj)) {
            update_user_meta( $user_id, 'wishlist', $_POST["wishlist"]);
        }
    }
    die();
}
add_action('admin_post_nopriv_user_wishlist_update', 'update_wishlist_ajax');
add_action('admin_post_user_wishlist_update', 'update_wishlist_ajax');



// Extend REST API
function rest_register_fields(){
 
    register_rest_field('product',
        'price',
        array(
            'get_callback'    => 'rest_price',
            'update_callback' => null,
            'schema'          => null
        )
    );
 
    register_rest_field('product',
        'stock',
        array(
            'get_callback'    => 'rest_stock',
            'update_callback' => null,
            'schema'          => null
        )
    );
 
    register_rest_field('product',
        'image',
        array(
            'get_callback'    => 'rest_img',
            'update_callback' => null,
            'schema'          => null
        )
    );
}
add_action('rest_api_init','rest_register_fields');
 
function rest_price($object,$field_name,$request){
 
    global $product;
 
    $id = $product->get_id();
 
    if ($id == $object['id']) {
        return $product->get_price();
    }
 
}
 
function rest_stock($object,$field_name,$request){
 
    global $product;
 
    $id = $product->get_id();
 
    if ($id == $object['id']) {
        return $product->get_stock_status();
    }
 
}
 
function rest_img($object,$field_name,$request){
 
    global $product;
 
    $id = $product->get_id();
 
    if ($id == $object['id']) {
        return $product->get_image();
    }
 
}
 
function maximum_api_filter($query_params) {
    $query_params['per_page']["maximum"]=100;
    return $query_params;
}
add_filter('rest_product_collection_params', 'maximum_api_filter');