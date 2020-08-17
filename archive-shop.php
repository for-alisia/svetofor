<?php 
global $svetofor_options;
get_header(); ?>
<section class="shops">
    <div class="container">
        <div class="shop-header-wrapper">
            <h1 class="section-header"><?php echo $svetofor_options['shops_archive_header']; ?></h1>
           
            <div class="select" >
                <ul id="selectbox" class="closed">
                    <li  class="option choosed">
                        <form id="selectCityForm"><input type="text" placeholder="Введите город..." name="cityName"/></form>                      
                    <?php //echo $svetofor_options['shops_archive_select'] ?></li>
                    <?php
                        $cities = get_terms(array(
                            'taxonomy'   =>'city',
                            'hide_empty' => true,
                        ));
                    foreach( $cities as $city ) { ?>
                    <li data-city="<?php echo $city->slug; ?>" class="option city-option"><?php echo $city->name; ?></li>
                    <?php }
                     ?>
                </ul>                                                      
            </div> 
        </div> 
        <ul class="shop-region" id="shop-region">
        <?php
            $regions = get_terms(array(
                    'taxonomy'   =>'region',
                    'hide_empty' => true,
            ));
            foreach( $regions as $region ) { ?>
            <li data-region="<?php echo $region->slug; ?>" class="item-region"><?php echo $region->name; ?></li>
            <?php }
             ?>
        </ul>            
        <div class="shops-cards">
        <?php 
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $shop = new WP_Query( array(
                    'post_type'      => 'shop',
                    'paged'          => $paged
                ) );
        ?>
        <?php if ( $shop->have_posts() ) :  while ( $shop->have_posts() ) : $shop->the_post();    
              
            ?> 
            <div class="shop-card" data-city="<?php 
            $city_slugs = get_the_terms( get_the_ID(), 'city' );
                if( is_array( $city_slugs ) ){
                    foreach( $city_slugs as $city_slug ){ 
                         echo $city_slug->slug; 
                    }
                } 
             ?>" data-region="<?php 
             $region_slugs = get_the_terms( get_the_ID(), 'region' );
                 if( is_array( $region_slugs ) ){
                     foreach( $region_slugs as $region_slug ){ 
                          echo $region_slug->slug; 
                     }
                 } 
              ?>" data-lang="<?php echo get_metadata('post', get_the_ID(), 'svetofor_shop_lang', true) ?>" data-alt="<?php echo get_metadata('post', get_the_ID(), 'svetofor_shop_alt', true) ?>">
              <?php if (has_post_thumbnail( get_the_ID() )) {?>
                <div class="shop-img"><?php echo get_the_post_thumbnail(get_the_ID(), 'svetofor-shop-thumb'); ?></div> 
              <?php } ?>
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
                    
                </div>
            </div>
        <?php endwhile;   wp_reset_postdata();   else :  echo "Нет магазинов";    endif; ?>                   
        </div>
    </div> 
</section>
<section class="main-map" id="main-map" data-pin="<?php echo $svetofor_options['pin_img']['url'];?>" data-pinenter="<?php echo $svetofor_options['pin_img_enter']['url'];?>" data-center-lang="<?php echo $svetofor_options['map_center_lang'];?>" 
data-center-alt="<?php echo $svetofor_options['map_center_alt'];?>"
data-zoom="<?php echo $svetofor_options['map_zoom'];?>">
</section>
<?php  echo do_shortcode('[svetofor_product_widget]'); ?>
<?php get_footer(); ?>