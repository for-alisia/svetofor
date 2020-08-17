<?php  
$args = array(
);
global $svetofor_options;

$atts = vc_map_get_attributes( $this->getShortCode(), $atts);
extract ( $atts ); ?>

<section class="reasons">       
    <div class="container">
        <h2 class="section-header"><?php echo $svetofor_options['reason_header']; ?></h2>
        <?php echo do_shortcode($content); ?>
    </div>
</section>