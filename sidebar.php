<?php

?>
<div id="sidebar" role="complementary">

<?php 
echo "<h5>Filter by price</h5>";
echo do_shortcode( '[wpf-filters id=4]' );
echo "<h5>Category</h5>";
echo do_shortcode( '[wpf-filters id=1]' );

echo "<h5>Brands</h5>";
echo do_shortcode( '[wpf-filters id=5]' );

echo do_shortcode( '[wpf-filters id=2]' );

echo do_shortcode( '[wpf-filters id=3]' );
 ?>

</div>