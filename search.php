<?php 

    get_header(); 

?>
<section class="hero page">
  <div class="container">
    <div class="heroBox">
      <h1> Search for: <?php echo '<span>' . get_search_query() . '</span>' ?> </h1>
    </div>
  </div>
</section>


<section>
    <div class="container">
<h1 class="text-center">Search Results</h1>
 <?php if (have_posts()) : ?>
               <?php while (have_posts()) : the_post(); ?>
               <div class="product_search">
                   <div>
                        <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'small' ) ?>
                    </a>
                   </div>
                   <div>
                       <a href="<?php the_permalink(); ?>">
                    <?php the_title('<h1>','</h1>'); ?>
                    </a>
                     <?php echo $product->get_price_html(); ?>
                    <?php the_excerpt(); ?>
                   </div>
               </div>
<?php endwhile; ?> 

<?php else : ?> 

<?php _e( 'Nothing Found' ); ?> 
<?php endif; ?>
</div>
</section>

<?php
    get_footer(); 

?>
