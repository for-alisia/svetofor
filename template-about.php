<?php 
/**
 * Template name: Шаблон "О компании"
 */
global $svetofor_options;
get_header();?>
<?php while ( have_posts() ) :	the_post(); ?>
<section class="company-section">
    <div class="container">
        <h1 class="section-header"><?php echo $svetofor_options['about_company_header'] ?></h1>
<?php the_content(); ?>            
    
<?php	endwhile; ?>
</div>       
</section>

<?php get_footer(); ?>