<?php  
$args = array(
    'reason_number'       => '',
    'reason_header'       => '',
    'reason_text'         => '',
    'reason_img'          => '',
);
global $svetofor_options;

$atts = vc_map_get_attributes( $this->getShortCode(), $atts);
extract ( $atts );

if (is_numeric( $reason_img) ) {
    $reason_img_url = wp_get_attachment_url( $reason_img );
}
?>

<div class="reason">
    <div class="reasons-img"><img src="<?php echo $reason_img_url ?>" alt=""></div>
    <div class="reasons-desc">
        <p class="reasons-number green"><?php echo $reason_number ?></p>
        <div class="reasons-text-wrapper">
            <h3 class="reasons-header"><?php echo $reason_header ?></h3>
            <p class="reasons-text"><?php echo $reason_text ?></p>
        </div>
    </div>
</div>

