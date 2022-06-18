<?php get_header(); ?>


<section class="hero page">
  <div class="container">
    <div class="heroBox">
      <h1><?php
        if(is_account_page() && is_user_logged_in()){
        echo 'Hello, ';  echo wp_get_current_user()->display_name;
}
elseif(!is_user_logged_in() && is_account_page()){
  echo 'Log In Or Register';

}
 else{ wp_title('', true, 'left');}  ?> </h1>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
    ?>
        <?php the_content(); ?>
      <?php
      endwhile;
    else :
      ?>
      <p>There is no content to show</p>
    <?php
    endif;
    ?>
  </div>
</section>

<?php get_footer(); ?>