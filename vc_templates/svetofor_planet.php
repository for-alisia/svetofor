<?php  
$args = array(
    'planet_header'       => '',
    'planet_subheader'    => '',
    'planet_text'         => '',
    'planet_img'          => '',
    'planet_link'         => '',
);
global $svetofor_options;

$atts = vc_map_get_attributes( $this->getShortCode(), $atts);
extract ( $atts );

if (is_numeric( $planet_img) ) { 
    $planet_img_url = wp_get_attachment_url( $planet_img );
}

$planet_link_pre =  vc_build_link( $planet_link, true );
$planet_link_url = $planet_link_pre['url'];
$planet_link_title = $planet_link_pre['title'];
?>
<section class="planet-section">
    <div class="container">
        <div class="planet-desc">
            <h3 class="section-header"><?php echo $planet_header ?></h3>
            <h4 class="planet-subheader"><?php echo $planet_subheader ?></h4>
        </div>
    </div>
</section>

<section class="hidden-shop">
    <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
          $shop = new WP_Query( array(
                    'post_type'      => 'shop',
                    'paged'          => $paged,
                    'posts_per_archive_page' => -1
                ) ); ?>
    <?php if ( $shop->have_posts() ) :  while ( $shop->have_posts() ) : $shop->the_post();  ?> 
    <div class="shop-card" data-lang="<?php echo get_metadata('post', get_the_ID(), 'svetofor_shop_lang', true) ?>" data-alt="<?php echo get_metadata('post', get_the_ID(), 'svetofor_shop_alt', true) ?>">
        <div class="shop-img"><?php echo get_the_post_thumbnail(get_the_ID(), 'svetofor-shop-thumb'); ?></div>
        <div class="shop-main-desc">
            <p class="adress"><?php the_title(); ?></p>
            <p class="graphic" data-timeOpen="<?php echo get_metadata('post', get_the_ID(), 'svetofor_shop_open_time', true) ?>" data-timeClose="<?php  echo get_metadata('post', get_the_ID(), 'svetofor_shop_close_time', true)?>">
            <?php echo $svetofor_options['shops_archive_time_before'].' '.get_metadata('post', get_the_ID(), 'svetofor_shop_open_time', true).' '.$svetofor_options['shops_archive_time_between'].' '.get_metadata('post', get_the_ID(), 'svetofor_shop_close_time', true); ?>,
            <?php echo $svetofor_options['shops_archive_time_after']; ?></p>
            <p class="phone"><?php echo get_metadata('post', get_the_ID(), 'svetofor_shop_phone', true); ?></p>
            <div class="shop-main-icons">
                <?php if (get_metadata('post', get_the_ID(), 'svetofor_shop_parking', true) == 'on') { ?>                        
                <i title="<?php echo $svetofor_options['shops_archive_parking']; ?>" class="parking"></i>
                <?php } ?>
                <?php if (get_metadata('post', get_the_ID(), 'svetofor_shop_alc', true) == 'on') { ?>   
                <i title="<?php echo $svetofor_options['shops_archive_alc']; ?>" class="alc"></i>
                <?php } ?>
                <?php if (get_metadata('post', get_the_ID(), 'svetofor_shop_credit', true) == 'on') { ?>   
                <i title="<?php echo $svetofor_options['shops_archive_credit']; ?>" class="credit"></i>
                <?php } ?>
            </div>
            <p class="more-info"><a href="<?php echo get_permalink() ?>"><?php echo $svetofor_options['shops_archive_more_link']; ?></a></p>
        </div>
    </div>
  <?php endwhile;   wp_reset_postdata();    endif; ?>   
</section>
<section class="main-map" id="main-map" data-pin="<?php echo $svetofor_options['pin_img']['url'];?>" data-pinenter="<?php echo $svetofor_options['pin_img_enter']['url'];?>" data-center-lang="<?php echo $svetofor_options['map_center_lang'];?>" 
data-center-alt="<?php echo $svetofor_options['map_center_alt'];?>"
data-zoom="<?php echo $svetofor_options['map_zoom'];?>"></section>