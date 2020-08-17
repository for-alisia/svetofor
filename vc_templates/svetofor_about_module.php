<?php  
$args = array(
    'about_module_header'             => '',
    'about_module_desc'               => '',
    'about_module_image'              => '',
    'about_module_link_text'          => '',
    'about_module_link'               => '',
    'about_module_simple_link'        => '',
    'about_module_simple_link_text'   => '',
);
global $svetofor_options;

$atts = vc_map_get_attributes( $this->getShortCode(), $atts);
extract ( $atts );

if (is_numeric( $about_module_image) ) {
    $about_module_image_url = wp_get_attachment_url( $about_module_image );
}
$about_module_link_pre =  vc_build_link( $about_module_link, true );
$about_module_link_url = $about_module_link_pre['url'];
$about_module_simple_link_pre = vc_build_link( $vc_build_link, true );
$about_module_simple_link_url = $about_module_simple_link_pre['url'];
?>

        <div class="join-reason">
            <div class="join-desc">
                <h4 class="join-header"><?php echo $about_module_header; ?></h4>
                <div class="join-text">
                    <p><?php echo $about_module_desc; ?></p>
                </div>
                <?php if ( !empty($about_module_simple_link) && ( !empty($about_module_simple_link_text))) { ?>
                <a href="<?php  echo $about_module_simple_link_url ?>" class="vk-link"><?php echo $about_module_simple_link_text; ?></a>
                <?php } ?>
                <?php if ( !empty($about_module_link) ) { ?>
                <a href="<?php echo $about_module_link_url ?>" class="btn color-btn"><?php echo $about_module_link_text; ?></a>
                <?php } ?>
            </div>
            <div class="join-img"><img src="<?php echo $about_module_image_url; ?>" alt=""></div>
        </div> 
    
