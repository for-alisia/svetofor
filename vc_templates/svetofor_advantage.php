<?php  
$args = array(
    'advantage_text1'             => '',
    'advantage_img1'               => '',
    'advantage_text2'              => '',
    'advantage_img2'              => '',
    'advantage_text3'              => '',
    'advantage_img2'              => '',
);
global $svetofor_options;

$atts = vc_map_get_attributes( $this->getShortCode(), $atts);
extract ( $atts );
if (is_numeric( $advantage_img1) ) {
    $advantage_img1_url = wp_get_attachment_url( $advantage_img1 );
}
if (is_numeric( $advantage_img2) ) {
    $advantage_img2_url = wp_get_attachment_url( $advantage_img2 );
}
if (is_numeric( $advantage_img3) ) {
    $advantage_img3_url = wp_get_attachment_url( $advantage_img3 );
}
?>
<section class="features-section">
    <div class="features-wrapper">
        <h3 class="section-header">Почему в Светофоре такие низкие цены?</h3>
        <div class="container">
            <a href="<?php echo get_post_type_archive_link('product') ?>" class="feature">
                 <div class="feature-img" >
                    <img src="<?php echo $advantage_img1_url ?>" class="svg" alt="">
                </div>
                <p class="feature-text"><?php echo $advantage_text1 ?></p>
            </a>
             <a href="<?php echo get_post_type_archive_link('product') ?>" class="feature">    
                <div class="feature-img">
                    <img src="<?php echo $advantage_img2_url ?>" class="svg " alt="">
                </div>
                <p class="feature-text"><?php echo $advantage_text2 ?></p>
            </a>
            <a href="<?php echo get_post_type_archive_link('product'); ?>" class="feature">    
                <div class="feature-img">
                    <img src="<?php echo $advantage_img3_url ?>" class="svg " alt="">
                </div>
                <p class="feature-text"><?php echo $advantage_text3 ?></p>               
            </a>  
        </div>            
    </div>
</section>
