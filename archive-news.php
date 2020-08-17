<?php  get_header();
       global $svetofor_options;?>


<section class="news page">
    <div class="container">
        <h3 class="section-header"><?php echo $svetofor_options['news_archive_header']; ?></h3>
        <div class="grid-news">
            <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                  $news = new WP_Query( array(
                    'post_type'      => 'news',
                    'paged'          => $paged
                  ) );
    
                 if ( $news->have_posts() ) :  while ( $news->have_posts() ) : $news->the_post(); 
        
                    get_template_part('template-parts/content', 'news'); 

                    endwhile;
                    wp_reset_postdata();
                else :  echo "Нет новостей";
                endif; ?>
        </div>
        <div class="pagination">
            <?php  echo paginate_links( array(
                'prev_text'     => '&#8592',
                'next_text'     => '&#8594',
                'total'         => $news->max_num_pages
            )); ?>
        </div>

    </div>
</section>

<?php echo do_shortcode('[svetofor_product_widget]'); ?>
<?php get_footer(); ?>





