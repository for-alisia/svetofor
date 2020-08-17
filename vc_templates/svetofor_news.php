<?php  
$args = array(
    'news_button' => ''
);
global $svetofor_options;

$atts = vc_map_get_attributes( $this->getShortCode(), $atts);
extract ( $atts );
$news_button_pre =  vc_build_link( $news_button, true );
$news_button_url = $news_button_pre['url'];
$news_button_title = $news_button_pre['title']; ?>

<section class="news">
    <div class="container">
        <h3 class="section-header"><?php echo $svetofor_options['news_archive_header']; ?></h3>
        <div class="grid-news">
        <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
              $news = new WP_Query( array(
                    'post_type'      => 'news',
                    'paged'          => $paged,
                    'posts_per_archive_page' => 4
        ) );
        ?>
        <?php if ( $news->have_posts() ) :  while ( $news->have_posts() ) :             $news->the_post(); 

        get_template_part('template-parts/content', 'news');
        
        endwhile;  wp_reset_postdata();   endif; ?>
        </div>
        <div class="btn-wrapper">
            <a href="<?php echo $news_button_url ?>" class="btn line-btn"><?php echo $news_button_title ?></a>
        </div>            
    </div>
</section>


