<?php  
$args = array(
);
global $svetofor_options;

$atts = vc_map_get_attributes( $this->getShortCode(), $atts);
extract ( $atts ); ?>

<section class="join">
    <div class="container">
    <?php echo do_shortcode($content); ?>
    </div>
</section>