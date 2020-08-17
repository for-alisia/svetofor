<?php 
global $svetofor_options;
get_header();
?>
<?php if ( have_posts() ) :  while (have_posts() ) : the_post(); ?>
<section class="banner-section">
        <div class="bgi-baner">
            <img src="<?php echo get_metadata('post', get_the_ID(), 'svetofor_baner_bgi', true) ?>" alt="">
        </div>   
        <div class="container">        
            <div class="banner-product">
                <h3 class="banner-name"><?php the_title(); ?></h3>
                <p class="banner-price"><?php echo $svetofor_options['baner_text']; ?> <span><?php echo get_metadata('post', get_the_ID(), 'svetofor_baner_price', true) ?></span>
                <span class="rub">Р</span></p>
            </div>
            <div class="banner-img"><?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?></div>
        </div>         
</section>
<?php endwhile;   else :  echo "Нет банеров";    endif; ?>
<?php get_footer(); ?>