<?php  
$args = array(
    'callback_header'       => '',
    'callback_text'         => '',
    'callback_img'          => '',
    'callback_link'         => '',
    'callback_button'       => '',
);
global $svetofor_options;

$atts = vc_map_get_attributes( $this->getShortCode(), $atts);
extract ( $atts );

if (is_numeric( $callback_img) ) {
    $callback_img_url = wp_get_attachment_url( $callback_img );
}
$callback_link_pre =  vc_build_link( $callback_link, true );
$callback_link_url = $callback_link_pre['url'];
$callback_link_title = $callback_link_pre['title'];
$callback_button_pre =  vc_build_link( $callback_button, true );
$callback_button_url = $callback_button_pre['url'];
$callback_button_title = $callback_button_pre['title'];
?>

<div class="join-reason">
    <div class="join-desc wow slideInLeft" data-wow-duration="0.7s" data-wow-offset="200">
        <h4 class="join-header"><?php echo $callback_header ?></h4>
        <div class="join-text"><?php echo $callback_text ?></div>
        <?php if ( !empty($callback_button_title) && !empty($callback_button_url) ) { ?>
        <a href="<?php echo $callback_button_url ?>" class="btn color-btn"><?php echo $callback_button_title ?></a>
        <?php }
        if ( !empty($callback_link_title) && !empty($callback_link_url) ) { ?>
        <a href="<?php echo $callback_link_url ?>" class="vk-link"><?php echo $callback_link_title ?></a>
        <?php } ?>
    </div>
    <div class="join-img wow slideInRight" data-wow-duration="0.7s" data-wow-offset="200"><img src="<?php echo $callback_img_url ?>" alt=""></div>
</div> 