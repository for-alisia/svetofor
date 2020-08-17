<?php  
$args = array(
    'main_section_header'             => '',
    'main_section_desc'               => '',
    'main_section_link1'              => '',
    'main_section_link2'              => '',
    'main_section_image'              => '',
);
global $svetofor_options;

$atts = vc_map_get_attributes( $this->getShortCode(), $atts);
extract ( $atts );
if (is_numeric( $main_section_image) ) {
    $main_section_image_url = wp_get_attachment_url( $main_section_image );
}
$main_section_link1_pre =  vc_build_link( $main_section_link1, true );
$main_section_link1_url = $main_section_link1_pre['url'];
$main_section_link1_text = $main_section_link1_pre['title'];
$main_section_link2_pre =  vc_build_link( $main_section_link2, true );
$main_section_link2_url = $main_section_link2_pre['url'];
$main_section_link2_text = $main_section_link2_pre['title'];
?>
<section class="first-section">
    <div class="container">
        <div class="utp">
            <h2 class="utp-header"><?php echo $main_section_header ?></h2>
            <p class="utp-text"><?php echo $main_section_desc ?></p>
            <div class="btn-wrapper">
                <a class="btn color-btn" href="<?php echo $main_section_link1_url ?>"><?php echo $main_section_link1_text ?></a>
                <a class="btn line-btn" href="<?php echo $main_section_link2_url ?>"><?php echo $main_section_link2_text ?></a>
            </div>
        </div>
        <div class="utp-ill">
            <img src="<?php echo $main_section_image_url ?>" alt="">
        </div> 
    </div>        
</section>
