<?php 
/**
 * Template name: Шаблон "Корзина"
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main cart_main_page">
            <div class="container">

		<?php
		while ( have_posts() ) : the_post();

			the_content();

		endwhile; // End of the loop.
		?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();