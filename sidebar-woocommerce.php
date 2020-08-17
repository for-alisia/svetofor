<?php
    if ( ! is_active_sidebar( 'woocommerce' ) ) {
        return;
    }
?>

<div class="svetofor-woo-widget">
    <?php dynamic_sidebar('woocommerce'); ?>
</div>