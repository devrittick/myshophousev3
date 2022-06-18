<?php
add_filter('pre_get_posts','lw_search_filter_pages');
function lw_search_filter_pages($query) {
    // Frontend search only
    if ( ! is_admin() && $query->is_search() ) {
        $query->set('post_type', 'product');
        $query->set( 'wc_query', 'product_query' );
    }
    return $query;
}

add_filter('pre_get_posts','lw_search_filter_pages');
// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => 5, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'product' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>
        <div class="searchItem">
		<div><a href="<?php echo esc_url( post_permalink() ); ?>"><?php echo get_the_post_thumbnail($the_query->post->ID, ' gallery_thumbnail_image_width');?></a></div>
		<div><a class="text" href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a>
		 <a class="text" href="<?php echo esc_url( post_permalink() ); ?>">
		 <p class="price">
                    <?php 
                    global $post;
                    $product = new WC_Product($post->ID); 
                    echo     wc_price($product->get_price_including_tax(1,$product->get_price()));
                    ?>
                </p>
		 </a>
		</div>
		</div>
        <?php endwhile;
		wp_reset_postdata();  
	else: 
		echo '<p>No Results Found</p>';
    endif;

    die();
}
// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetchResults(){
	var keyword = jQuery('#s').val();
	if(keyword == ""){
		jQuery('#datafetch').html("");
		jQuery('#datafetch').removeClass("showdata");
	}
	 else {
		jQuery('#datafetch').addClass("showdata");
		jQuery.ajax({
			url: '<?php echo admin_url('admin-ajax.php'); ?>',
			type: 'post',
			data: { action: 'data_fetch', keyword: keyword },
			success: function(data) {
				jQuery('#datafetch').html( data );
			}
		});
	}

	// if(element.addEventListener('blur', true)){
	// 	jQuery('#datafetch').removeClass("showdata");
	// 	console.log('body clicked In');
	// }
	
}
// if(jQuery('.serchfrm').focusin()){
//     if(jQuery('.serchfrm').focusout()){
// 		jQuery('#datafetch').removeClass("showdata");
// 		console.log('Box Should hide');
// 	}

// 	console.log('Focused In');
// }
</script>

<?php
}