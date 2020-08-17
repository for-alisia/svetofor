<?php
/**
 * Header
 */
global $svetofor_options;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="yandex-verification" content="d38b711987ff9bf7" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://api-maps.yandex.ru/<?php echo $svetofor_options['map_version'] ?>/?lang=ru_RU&apikey=<?php echo $svetofor_options['map_api'] ?>" type="text/javascript"></script>
	<?php echo $svetofor_options['vk_ver'] ?>
	<?php wp_head(); ?>
	
</head>

<body <?php body_class();?>>
	<div class="nav-wrapper">
	         <nav class="top-nav">
	            <div class="burger-wrapper">
	                <i class="burger"></i>
					<?php wp_nav_menu( array(
							'theme_location' => 'menu-header',
							'menu_class'     => 'main-menu',
							'container'      => '',
							'depth'          => '1',
			) );
			?>
	            </div>            
	            <ul class="social-menu">
					<?php $social_links = $svetofor_options['social_links'];
						foreach ( $social_links as $social => $link) {
							$label = '';
							$class = '';
							if ($social == 'Vkontakte') {
								$label = 'VK';
								$class = 'vk';
							} else if ( $social == 'Viber') {
								$label = 'Viber';
								$class = 'viber';
							}
							if ( $link ) { ?>
					<li><a href="<?php echo $link; ?>" class="<?php echo $class; ?>" target="_blank"><?php echo $label; ?></a></li>
							<?php }
						} ?>
	                
                </ul>
                <?php 
                        
                        if ( in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option( 'active_plugins')))) {

                        global $woocommerce;
                    ?>
                <div class="header-cart">                    
                    <a href="<?php echo esc_url(wc_get_cart_url());?>" class="header-cart-link"><img src="<?php echo $svetofor_options['company_cart_icon']['url'];?>">
                    <span><?php echo WC()->cart->get_cart_total() ?></span></a>
                </div>
                <?php } ?>
	            <a href="<?php echo get_site_url(); ?>" class="logo">
					<img src="<?php echo $svetofor_options['company_logo']['url'];?>" alt="svetofor-logo">
	                <div class="logo-text">
	                    <h2 class="company-name"><?php echo $svetofor_options['company_name']; ?></h2>
 	                   <p class="company-desc"><?php echo $svetofor_options['company_text']; ?></p>
	                </div>
				</a>
	        </nav>
	    </div>