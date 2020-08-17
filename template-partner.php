<?php 
/**
 * Template name: Шаблон "Партнерам"
 */
get_header();
global $svetofor_options;
?>
<?php while ( have_posts() ) :	the_post(); ?>
<section class="partners">
    <div class="container">
        <h1 class="section-header"><?php echo $svetofor_options['partners_header'] ?></h1>
        <div class="partners-wrapper">
            <div class="tab-nav">
                <span id="buy" class="active"><?php echo $svetofor_options['partners_buy'] ?></span>
                <span id="rent"><?php echo $svetofor_options['partners_rent'] ?></span>
        </div>
        <div class="tabs">
            <div id="buy-tab" class="tab show">
                <div class="tab-desc">
                    <h3><?php echo get_metadata('post', get_the_ID(), 'svetofor_partner_buy_header', true); ?></h3>
                    <?php echo get_metadata('post', get_the_ID(), 'svetofor_partner_buy_text', true); ?>   
                    <a href="mailto:<?php echo get_metadata('post', get_the_ID(), 'svetofor_partner_buy_link', true); ?>" class="mail"><?php echo get_metadata('post', get_the_ID(), 'svetofor_partner_buy_link_text', true); ?></a>
                </div>
                <div class="tab-img">
                    <img src="<?php echo get_metadata('post', get_the_ID(), 'svetofor_partner_buy_img', true); ?>" alt="">
                </div>
            </div>
            <div id="rent-tab" class="tab">
                <div class="tab-desc">
                    <h3><?php echo $svetofor_options['partners_rent'] ?></h3>
                    <?php echo get_metadata('post', get_the_ID(), 'svetofor_partner_rent_text', true); ?>   
                    <a href="mailto:<?php echo get_metadata('post', get_the_ID(), 'svetofor_partner_rent_link', true); ?>" class="mail"><?php echo get_metadata('post', get_the_ID(), 'svetofor_partner_rent_link_text', true); ?></a>
                        </div>
                        <div class="tab-img">
                            <img src="<?php echo get_metadata('post', get_the_ID(), 'svetofor_partner_rent_img', true); ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php	endwhile;   
    echo do_shortcode('[svetofor_product_widget]');
    echo do_shortcode('[svetofor_shop_widget]'); 
    get_footer() 
?>