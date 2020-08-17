<?php 
global $svetofor_options;
get_header();
?>
<section class="news-one">
<div class="container">
    <h1 class="section-header"><?php echo $svetofor_options['news_archive_header'] ?></h1>
    <?php while ( have_posts() ) :    the_post(); ?>
    <h2 class="news-header"><?php the_title(); ?></h2>
    <?php 
        $terms = get_the_terms( $news->ID, 'news_type' ); 
        foreach($terms as $term) { ?>
        <a href="<?php echo get_term_link($term); ?>" class="news-category-single">
            <?php echo $term->name; ?>
        </a> 
    <?php    } ?>
    <div class="news-one-wrapper clearfix">
        <div class="news-one-img"><?php echo get_the_post_thumbnail(get_the_ID(), 'full') ?></div>
        <div><?php the_content(); ?></div>
        <?php $link = get_metadata('post', get_the_ID(), 'svetofor_news_social_link', true);
            if ( $link ) { ?>        
        <div class="vk-invite-wrapper">
            <img src="<?php echo $svetofor_options['social_img']['url'];?>" alt="">
            <a href="<?php echo esc_url($link); ?>" class="vk-invite"><?php echo get_metadata('post', get_the_ID(), 'svetofor_news_social_text', true); ?></a>
        </div> 
            <?php }
         endwhile; ?>       
        <div class="btn-wrapper">
            <a href="<?php echo get_post_type_archive_link('shop') ?>" class="btn color-btn"><?php echo $svetofor_options['link1-text']; ?></a>
            <a href="<?php echo get_post_type_archive_link('news') ?>" class="btn line-btn"><?php echo $svetofor_options['link2-text']; ?></a>
        </div>
    </div>
</div>
</section>
<?php echo do_shortcode('[svetofor_shop_widget]'); ?>
<?php get_footer(); ?>



<?php /* Блок длявиджета со слайдером
<section class="shop-slider">
    <div class="container">
        <div class="slider-header-wrapper">
             <h3 class="section-header"><?php echo $svetofor_options['shops_widget_header'] ?></h3>
        </div>       
        <div class="slider-wrapper">
        <?php 
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $shop = new WP_Query( array(
                    'post_type'      => 'shop',
                    'paged'          => $paged,
                    'posts_per_archive_page' => -1
                ) );
            ?>
            <?php if ( $shop->have_posts() ) :  while ( $shop->have_posts() ) : $shop->the_post(); ?>
            <a href="<?php echo get_permalink() ?>" class="shop-slide">
                <div class="slide-img">
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'svetofor-shop-thumb'); ?>
                </div>
                <p class="slide-text">
                    <?php echo get_the_title(); ?>
                </p>
            </a>
            <?php endwhile;   wp_reset_postdata();   endif; ?>            
        </div>
        <div class="btn-wrapper">
            <a href="<?php echo get_post_type_archive_link('shop') ?>" class="btn color-btn"><?php echo $svetofor_options['shops_widget_link']; ?></a>
        </div>
    </div>
</section> */ ?>
