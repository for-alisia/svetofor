<div class="news-wrapper">
    <div  class="news-card">
        <a class="news-img" href="<?php echo get_permalink() ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'svetofor-news-thumb'); ?></a>
        <div class="news-desc">
            <?php $terms = get_the_terms( $news->ID, 'news_type' );
            if ($terms) { 
                foreach($terms as $term) { ?>
            <a class="news-category" href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a> 
                <?php    } } ?>
            <a href="<?php echo get_permalink() ?>" class="news-header"><?php the_title(); ?></a>
            <?php if (has_excerpt()) {
                $short_text = get_the_excerpt();
            } else {
                $short_text = wp_trim_words(get_the_content(), 18);
            } ?>
            <p class="news-text"><?php echo $short_text; ?></p>
            <p class="news-details">
                <span><?php echo get_the_date(); ?></span>
                <a href="<?php echo get_permalink() ?>">Подробнее..</a>                        
            </p>                        
        </div>
    </div>
</div>   