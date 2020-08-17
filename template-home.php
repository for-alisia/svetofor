<?php 
/**
 * Template name: Шаблон "Главная"
 */
get_header();
global $svetofor_options;
?>
<?php while ( have_posts() ) :	the_post(); ?>
<?php the_content(); ?>
<?php	endwhile; ?>
<?php get_footer(); ?>

