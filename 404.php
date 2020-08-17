<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package svetofor
 */

get_header(); ?>
<section class="not-found">
	<div class="container">
		<p class="error404">404</p>
		<p class="error-desc">Запрашиваемая страница не найдена</p>
	</div>
</section>
<?php echo do_shortcode('[svetofor_shop_widget]'); ?>
<?php echo do_shortcode('[svetofor_product_widget]'); ?>

<?php get_footer();
