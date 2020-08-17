<?php
    if ( ! is_active_sidebar( 'products_widget' ) ) {
        return;
    }
?>

<div class="svetofor-product-widget">
    <?php dynamic_sidebar('products_widget'); ?>
</div>