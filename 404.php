<?php
get_header();
?>
  <div class="hero page">
        <div class="container">
          <div class="">
            <h1 class="page-title text-center"> Something went wrong </h1>
            <h2 class="text-center text-white ">404 Page not found</h2>
            <div class="text-center">
            <a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">Go To Home</a>
</div>
</div>
</div>
  </div>
<?php get_footer(); ?>