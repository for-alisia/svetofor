<?php 
global $svetofor_options;
get_header();
?>
<section class="shop-main">
    <div class="container">
    <?php while ( have_posts() ) :    the_post(); ?>
        <div class="shop-main-img"><?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?></div>
        <div class="shop-main-desc">
            <h1 class="section-header">
                <?php 
                    $shop_header = get_metadata('post', get_the_ID(), 'svetofor_shop_header', true); 
                    if ($shop_header) {
                        echo $shop_header;
                    } else {
                        the_title();
                    }
                ?>
            </h1>
            <p class="adress"><?php the_title(); ?></p>
            <p class="graphic"><?php echo $svetofor_options['shops_archive_time_before'].' '.get_metadata('post', get_the_ID(), 'svetofor_shop_open_time', true).' '.$svetofor_options['shops_archive_time_between'].' '.get_metadata('post', get_the_ID(), 'svetofor_shop_close_time', true); ?>,
                    <?php echo $svetofor_options['shops_archive_time_after']; ?></p>
            <p class="phone"><?php echo get_metadata('post', get_the_ID(), 'svetofor_shop_phone', true); ?></p>
			<?php if (get_metadata('post', get_the_ID(), 'svetofor_shop_VK', true)) { ?>
            <p class="vk-contact"><a href="<?php echo get_metadata('post', get_the_ID(), 'svetofor_shop_VK', true); ?>"><?php echo $svetofor_options['shop_single_vk_link'] ?></a></p>
			<?php } ?>
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
</section>
    <section class="shop-desc">
        <div class="container">
            <div class="shop-desc-text">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
	
    
        <?php endwhile; ?>   
        </div>
    </section>
    <?php echo do_shortcode('[svetofor_product_widget]'); 
          echo do_shortcode('[svetofor_shop_widget]');
    ?>

    

<?php get_footer(); ?>

