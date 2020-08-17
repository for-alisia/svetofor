<?php global $svetofor_options;
get_header(); ?>
<section class="products">
    <div class="container">
        <h3 class="section-header"><?php echo $svetofor_options['product-header']; ?></h3>
        <div class="grid-products">
            <?php 
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $product = new WP_Query( array(
                    'post_type'      => 'product',
                    'paged'          => $paged
                ) );
            ?>
            <?php if ( $product->have_posts() ) :  while ( $product->have_posts() ) : $product->the_post(); ?>
                <div class="product-wrapper">
                    <div class="product">
                        <div class="product-img">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'svetofor-product-thumb'); ?>
                        </div>
                        <div class="product-desc-wrapper">
                            <p class="product-name">
                                <span><?php the_title(); ?></span>, <span><?php echo get_metadata('post', get_the_ID(), 'svetofor_product_brand', true); ?></span></p>
                            <p class="product-desc">
                                <span class="product-weight"><?php echo get_metadata('post', get_the_ID(), 'svetofor_product_weight', true); ?></span>                               
                                <span class="product-brand"><?php echo get_metadata('post', get_the_ID(), 'svetofor_product_manufacturer', true); ?></span> 
                                <span><?php echo get_metadata('post', get_the_ID(), 'svetofor_product_country', true); ?></span>
                            </p>
                            <p class="product-old-price">
                                <span class="price-desc"><?php echo $svetofor_options['product-price-old']; ?></span>
                                <span class="price-amount"><?php echo get_metadata('post', get_the_ID(), 'svetofor_product_old_price', true); ?></span>
                                <span class="rub">Р</span>
                            </p>
                            <p class="product-new-price">
                                <span class="price-desc"><?php echo $svetofor_options['product-price-new']; ?></span>
                                <span class="price-amount"><?php echo get_metadata('post', get_the_ID(), 'svetofor_product_new_price', true); ?></span>
                                <span class="rub">Р</span> 
                            </p>
                        </div>      
                        <i class="product-type <?php echo get_metadata('post', get_the_ID(), 'svetofor_product_category', true) ?>"></i>
                    </div>
                </div> 
            <?php endwhile;   wp_reset_postdata();   else :  echo "Нет товаров";    endif; ?>               
        </div>
        <div class="pagination">
            <?php  echo paginate_links( array(
                'prev_text'     => '&#8592',
                'next_text'     => '&#8594',
                'total'         => $product->max_num_pages
            )); ?>
        </div>     
        <div class="btn-wrapper">
            <a href="<?php echo get_post_type_archive_link('shop') ?>" class="btn color-btn"><?php echo $svetofor_options['product-button-text']; ?></a>
        </div>		
	</div>
	<div><p class="product_notice">Информация носит ознакомительный характер. На сайте представлен неполный ассортимент товаров сети. Наличие уточняйте по телефону интересующего вас магазина или в группе VK.</p></div>
</section>

<?php get_footer(); ?>