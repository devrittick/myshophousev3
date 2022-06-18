<?php
/*
Template Name: Home
*/
get_header();
?>
<section class="hero home woocommerce">
  <div class="splide">
	<div class="splide__track">
		<ul class="splide__list">
			<li class="splide__slide woman">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/woman.webp" alt="woman">
    </li>

    	<li class="splide__slide man">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/man.webp" alt="man">
    </li>

    	<li class="splide__slide kid">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/kid_banner.webp" alt="kid_banner">
    </li>
        	<li class="splide__slide electronice">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/electronice.webp" alt="electronice">
    </li>
		</ul>
	</div>
  </div>
</section>
<!-- <section class="fitures">
<div class="container">
<ul>
  <li>
<span><img src="<?php echo get_template_directory_uri(). '/assets/img/24-hours-support.png' ?>" alt="payment option"></span>
<span><h4>Customer Supprot</h4><p>Face any isue WhatsApp us <a target="_blank" href="https://api.whatsapp.com/send?phone=918617416052">+918617416052</a></p></span>
</li>
<li>
<span><img src="<?php echo get_template_directory_uri(). '/assets/img/hand.png' ?>" alt="payment option"></span>
<span><h4>Payment Option</h4><p>Cash on delivery & Online payment available</p></span>
</li>
<li>
<span><img src="<?php echo get_template_directory_uri(). '/assets/img/return.png' ?>" alt="payment option"></span>
<span><h4>Easy Return</h4><p>Any issue with the product, we offer a 7-day return policy</p></span>
</li>
<li>
<span><img src="<?php echo get_template_directory_uri(). '/assets/img/orignalproduct.png' ?>" alt="payment option"></span>
<span><h4>100% Original</h4><p>Guarantee for all products at myshophouse.in</p></span>
</li>
</ul>
</div>
</section> -->
<section class="catagories product-list">
  <div class="container">
  <div class="fourcol">
<?php
    $prod_categories = get_terms( 'product_cat', array(
        'order'      => 'ASC',
        'hide_empty' => 0,
        'parent' => 0,
    ));
    foreach( $prod_categories as $prod_cat ) :
        $cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
        $cat_thumb_url = wp_get_attachment_image_src( $cat_thumb_id, 'full');
?>
    <div class="catitem"><div class="text"><h3><a href="<?php echo get_category_link( $prod_cat->term_id ); ?>"><?php echo $prod_cat->name; ?></a></h3></div><div><a href="<?php echo get_category_link( $prod_cat->term_id ); ?>"><img src="<?php echo $cat_thumb_url[0]; ?>" alt="<?php echo $prod_cat->name; ?>" /></a></div></div>
<?php endforeach; wp_reset_query(); ?></div>
                  </div>
                  </section>



<section class="product-list">
<div class="container">
<h2>Newest Products</h2>
<?php echo do_shortcode( '[products limit="4" columns="4" orderby="id" order="DESC" visibility="visible"]' ); ?>
</div>
</section>
<!-- <section class="product-list dokan">
<div class="container">
<h2>Most Popular Products</h2>
<?php //echo do_shortcode( '[dokan-best-selling-product no_of_product="4" seller_id="" ]' ); ?>
</div>
</section>

<section class="product-list">
<div class="container">
<h2>Featured Stores</h2>
<?php // echo do_shortcode( '[dokan-stores with_products_only=’yes’]' ); ?>
</div>
</section>

<section class="product-list cta">
<div class="container box text-center">
<h2>What to sell your products online without invesment?</h2>
<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis, error? Debitis et aliquam nihil? Placeat, iste perspiciatis, repudiandae provident illo adipisci quasi molestiae consectetur at culpa dolores? Fugiat, laborum! Adipisci!</p>
<a href="http://myshophouse-v2.test/seller-registration/" class="btn btn-primary text-center">Became a seller</a>
</div>
</section> -->

<section class="product-list">
<div class="container">
<h2>Most Popular Products</h2>
<?php echo do_shortcode( '[products limit="4" columns="4" orderby="popularity" class="quick-sale" on_sale="true" ]' ); ?>
</div>
</section>

<section class="product-list">
<div class="container">
<h2>Featured Products</h2>
<?php echo do_shortcode( '[products limit="4" columns="4" visibility="featured" ]' ); ?>
</div>
</section>
<section class="fitures">
<div class="container">
<ul>
  <li>
<span><img src="<?php echo get_template_directory_uri(). '/assets/img/24-hours-support.png' ?>" alt="payment option"></span>
<span><h4>Customer Supprot</h4><p>Face any isue WhatsApp us <a target="_blank" href="https://api.whatsapp.com/send?phone=918617416052">+918617416052</a></p></span>
</li>
<li>
<span><img src="<?php echo get_template_directory_uri(). '/assets/img/hand.png' ?>" alt="payment option"></span>
<span><h4>Payment Option</h4><p>Cash on delivery & Online payment available</p></span>
</li>
<li>
<span><img src="<?php echo get_template_directory_uri(). '/assets/img/return.png' ?>" alt="payment option"></span>
<span><h4>Easy Return</h4><p>Any issue with the product, we offer a 7-day return policy</p></span>
</li>
<li>
<span><img src="<?php echo get_template_directory_uri(). '/assets/img/orignalproduct.png' ?>" alt="payment option"></span>
<span><h4>100% Original</h4><p>Guarantee for all products at myshophouse.in</p></span>
</li>
</ul>
</div>
</section>
<?php get_footer(); ?>