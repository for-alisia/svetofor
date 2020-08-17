<?php  
$args = array(
    'promo_header'           => '',
    'promo_text'             => '',
    'promo_img'              => '',
);
global $svetofor_options;

$atts = vc_map_get_attributes( $this->getShortCode(), $atts);
extract ( $atts );
if (is_numeric( $promo_img) ) { 
    $promo_img_url = wp_get_attachment_url( $promo_img );
} ?>
<section class="promo">
    <div class="promo-bg"><img src="<?php echo $promo_img_url ?>" alt=""></div>
    <div class="container-promo">
        <h3 class="promo-header"><?php echo $promo_header ?></h3>
        <p class="promo-desc"><?php echo $promo_text ?></p>       
    </div>
</section>