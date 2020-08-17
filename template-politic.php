<?php 
/**
 * Template name: Шаблон "Политика конфиденциальности"
 */
global $svetofor_options;
get_header();?>
<?php while ( have_posts() ) :	the_post(); ?>
<section class="policy">
    <div class="container">
        <h1 class="section-header"><?php the_title(); ?></h1>
<?php the_content(); ?>            
    
<?php	endwhile; ?>
</div>       
</section>

<?php get_footer(); ?>