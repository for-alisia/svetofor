<?php  
$args = array();
global $svetofor_options;

$atts = vc_map_get_attributes( $this->getShortCode(), $atts);
extract ( $atts ); ?>

<?php echo do_shortcode('[svetofor_product_widget]'); ?> 