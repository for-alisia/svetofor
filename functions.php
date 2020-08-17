<?php
/**
 * svetofor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package svetofor
 */

if ( ! function_exists( 'svetofor_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function svetofor_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on svetofor, use a find and replace
		 * to change 'svetofor' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'svetofor', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		//Регистрируем локации для меню
		register_nav_menus( array(
			'menu-header' => esc_html__( 'Меню в шапке', 'svetofor' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'svetofor_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		 //Размеры для картинок
		 add_image_size('svetofor-news-thumb', 330, 220, true);
		 add_image_size('svetofor-product-thumb', 243, 241, true);
		 add_image_size('svetofor-shop-thumb', 310, 197, true);

	}
endif;
add_action( 'after_setup_theme', 'svetofor_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function svetofor_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'svetofor_content_width', 640 );
}
add_action( 'after_setup_theme', 'svetofor_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function svetofor_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'svetofor' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'svetofor' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Shop Pages', 'svetofor' ),
		'id'            => 'woocommerce',
		'description'   => esc_html__( 'Add widgets here.', 'svetofor' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Products', 'svetofor' ),
		'id'            => 'products_widget',
		'description'   => esc_html__( 'Add widgets here.', 'svetofor' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'svetofor_widgets_init' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}




/*Кастомный код шаблона*/

/**
 * Подключаем стили и скрипты
 */
function svetofor_scripts() {
	//Стили
	wp_enqueue_style( 'svetofor-style', get_stylesheet_uri() );
	wp_enqueue_style( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array());
	wp_enqueue_style( 'svetofor-vendor', get_template_directory_uri() . '/assets/css/vendor.css', array(), '1.0');
	wp_enqueue_style( 'svetofor-main', get_template_directory_uri() . '/assets/css/main.css?v214', array(), '1.0');

	//Скрипты
	wp_enqueue_script('jquery');
	//Подключаем кастомные js
	wp_enqueue_script( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', false);
   	wp_enqueue_script( 'svetofor-main', get_template_directory_uri() . '/assets/js/main.js?v211', array('jquery'), '1.0', true );	
	//Необходим для страницы с комментариями
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'svetofor_scripts' );

/**Подключаем скрипты для админки (для корректной работы метабоксов и тд) */
function svetofor_admin_scripts($hook) {
    // Add scripts for metaboxes
    if ( $hook == 'post.php' || $hook == 'post-new.php' || $hook == 'page-new.php' || $hook == 'page.php' ) {
        wp_enqueue_style( 'svetofor-metaboxes', get_template_directory_uri() . '/assets/css/libs/metaboxes.css', array(), '1.0' );
        wp_enqueue_script( 'svetofor-metaboxes', get_template_directory_uri() . '/assets/js/libs/metaboxes.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox') );
	}
	wp_enqueue_style( 'svetofor-admin', get_template_directory_uri() . '/assets/css/libs/admin.css', array(), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'svetofor_admin_scripts', 10 );



// Подключаем дополнительные файлы

// Подключаем кастомный шаблон Woocommerce
require get_template_directory() . '/inc/woo.php';

// Подключаем WPBakery
require get_template_directory() . '/inc/wpbakery.php';

// Подключаем файл настроек для Redux Option Panel 
require get_template_directory() . '/inc/options-panel-redux.php';

// Подключаем метабоксы 
require get_template_directory() . '/inc/metaboxes/metaboxes.php';
require get_template_directory() . '/inc/metaboxes/register_metabox.php';

// Подключаем файл добавления полей в категории Регионов
require get_template_directory() . '/inc/delivery-region.php';




// Добавляем поддержку SVG-формата при загрузке файлов
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');


//Добавляем хук для пагинации - количество постов на странице архива
function svetofor_posts_per_archieve_page( $query ) {
	global $svetofor_options;
	$posts_per_page = -1;
	//news
	if ( is_post_type_archive('news') ) {
		if ( $svetofor_options['news_posts_per_page']  && (!is_admin())) {
			$posts_per_page = $svetofor_options['news_posts_per_page'];
		}
		$query->set( 'posts_per_page', $posts_per_page);
	}
	//product
	if ( is_post_type_archive('product')  && (!is_admin())) {
		if ( $svetofor_options['product-posts-per-page'] ) {
			$posts_per_page = $svetofor_options['product-posts-per-page'];
		}
		$query->set( 'posts_per_page', $posts_per_page);
	}
	//shop
	if ( is_post_type_archive('shop')  && (!is_admin())) {
		$query->set( 'posts_per_page', $posts_per_page);
	}
	//baner
	if ( is_post_type_archive('baner')  && (!is_admin())) {
		$posts_per_page = 1;
		$query->set( 'posts_per_page', $posts_per_page);
	}

}
add_action( 'pre_get_posts', 'svetofor_posts_per_archieve_page');



//Создаем шорткоды
//Шорткод для отображения случайного банера
function svetofor_random_baner() {
	global $svetofor_options;
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$baner = new WP_Query(array(
		'post_type' => 'baner',
		'orderby'   => 'rand',
		'posts_per_page' => 1,
		'paged'   =>   $paged,
		'posts_per_archive_page' => 1 
	));
	if ( $baner-> have_posts() ) {
		$baner_html .=  '';
		while ( $baner->have_posts() ) {
			$baner->the_post();
			$baner_html .= ' <section class="banner-section"><div class="bgi-baner"><img src="'. get_metadata('post', get_the_ID(), 'svetofor_baner_bgi', true) .
			'" alt=""></div><div class="container"><div class="banner-product"><h3 class="banner-name">' . get_the_title() . '</h3><p class="banner-price">' . 
			$svetofor_options['baner_text'] . '<span>' . get_metadata('post', get_the_ID(), 'svetofor_baner_price', true) . '</span><span class="rub">Р</span></p>
		    </div><div class="banner-img wow fadeInUp" data-wow-offset="200">' . get_the_post_thumbnail(get_the_ID(), 'full') . '</div></div></section>';
		}
		wp_reset_postdata(); 
	} else {
		$baner_html = '';
	}
	return $baner_html;
}
add_shortcode( 'svetofor_random_baner', 'svetofor_random_baner');

//Шорткод для отображения блока Лучшие цены
function svetofor_product_widget() {
    global $svetofor_options;
    global $woocommerce;
    
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$product = new WP_Query(array(
		'post_type' => 'product',
		'posts_per_page' => 8,
		'paged'   =>   $paged,
		'posts_per_archive_page' => 8
	));
	if ( $product-> have_posts() ) {
        
		$product_html .=  '<section class="products"><div class="container"><h3 class="section-header">' . $svetofor_options['product-header'] . '</h3><div class="grid-products">';
		while ( $product->have_posts() ) {
            $product->the_post();
            $wc_product = wc_get_product( get_the_ID());
			$product_html .= '<div class="product-wrapper"><a href="' . get_the_permalink() . '" class="product"><div class="product-img">' . get_the_post_thumbnail(get_the_ID(), 'svetofor-product-thumb') .
							  '</div><div class="product-desc-wrapper"><p class="product-name"><span>' . get_the_title() . '</span>, <span>' . get_metadata('post', get_the_ID(), 'svetofor_product_brand', true) .
							  '</span></p><p class="product-desc"><span class="product-weight">' . get_metadata('post', get_the_ID(), 'svetofor_product_weight', true) . '</span><span class="product-brand">' .
							  get_metadata('post', get_the_ID(), 'svetofor_product_manufacturer', true) . '</span><span>' . get_metadata('post', get_the_ID(), 'svetofor_product_country', true) .
							  '</span></p><p class="product-old-price"><span class="price-desc">' . $svetofor_options['product-price-old'] . '</span><span class="price-amount">' .
							  $wc_product->get_regular_price() . '</span><span class="rub">Р</span></p><p class="product-new-price"><span class="price-desc">' .
							  $svetofor_options['product-price-new'] . '</span><span class="price-amount">' . $wc_product->get_sale_price() .
							  '</span><span class="rub">Р</span></p></div><i class="product-type ' . get_metadata('post', get_the_ID(), 'svetofor_product_category', true) .
							  '"></i></a></div>';
		}
		wp_reset_postdata();
		$product_html .= '</div><div class="btn-wrapper"><a href="' . get_post_type_archive_link('shop') . '" class="btn color-btn">' . $svetofor_options['product-button-text'] .
						 '</a><a href="' . get_post_type_archive_link('product') . '" class="btn line-btn">' . $svetofor_options['product-more-text'] . '</a></div></div></section>'; 
	} else {
		$product_html = '';
	}
	return $product_html;
}
add_shortcode( 'svetofor_product_widget', 'svetofor_product_widget');

//Шорткод для блока магазинов со слайдером
function svetofor_shop_widget() {
    global $svetofor_options;
    if ($svetofor_options['use_slick_slider']) {
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $shop = new WP_Query(array(
            'post_type' => 'shop',
            'posts_per_page' => -1,
            'paged'   =>   $paged,
            'posts_per_archive_page' => -1
        ));
        if ( $shop-> have_posts() ) {
            $shop_html .= '<section class="shop-slider"><div class="container"><div class="slider-header-wrapper"><h3 class="section-header">' . $svetofor_options['shops_widget_header'] .
                        '</h3></div><div class="slider-wrapper">';
            while ( $shop->have_posts() ) {
                $shop->the_post();
                $shop_html .= '<a href="' . get_permalink() . '" class="shop-slide"><div class="slide-img">' . get_the_post_thumbnail(get_the_ID(), 'svetofor-shop-thumb') . 
                            '</div><p class="slide-text">' . get_the_title() . '</p></a>'	;
            }
            wp_reset_postdata();
            $shop_html .= '</div><div class="btn-wrapper"><a href="' . get_post_type_archive_link('shop') . '" class="btn color-btn">' . $svetofor_options['shops_widget_link'] . 
                        '</a></div></div></section>';
        } else {
            $shop_html = '';
        }
        return $shop_html;
    } else return;
}
add_shortcode( 'svetofor_shop_widget', 'svetofor_shop_widget');

add_filter('widget_text', 'do_shortcode');



//Регистрируем post-types
function svetofor_register_custom_post_type() { 
	//Магазины
	register_post_type( 'shop',  array(
        'labels'             => array(
            'name'                  => 'Магазины',
            'singular_name'         => 'Магазин',
            'add_new'               => 'Добавить новый магазин',

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'shops' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 2,
        'menu_icon'          => 'dashicons-store',
        'supports'           => array( 'title', 'editor',  'thumbnail' ),
	) );
	//Новости
	register_post_type( 'news',  array(
        'labels'             => array(
            'name'                  => 'Новости',
            'singular_name'         => 'Новость',
            'add_new'               => 'Добавить новую новость',

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'news' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 3,
        'menu_icon'          => 'dashicons-megaphone',
        'supports'           => array( 'title', 'editor',  'thumbnail', 'excerpt' ),
	) );
	//Товары
	register_post_type( 'product',  array(
        'labels'             => array(
            'name'                  => 'Товары',
            'singular_name'         => 'Товар',
            'add_new'               => 'Добавить новый товар',

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'products' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-carrot',
        'supports'           => array( 'title', 'thumbnail' ),
	) ); 
	//Банеры
	register_post_type( 'baner',  array(
        'labels'             => array(
            'name'                  => 'Банеры',
            'singular_name'         => 'Банер',
            'add_new'               => 'Добавить новый банер',

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'baners' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-id',
        'supports'           => array( 'title',  'thumbnail' ),
	) );

    //Регистрируем Taxonomy
    
    // Города для магазинов
	register_taxonomy(
        'city',
        'shop',
        array(
            'label' =>'Город',
            'rewrite' => array( 'slug' => 'city' ),
            'hierarchical' => true,
        )
    );


    // Регионы для магазинов 
    register_taxonomy(
        'region',
        'shop',
        array(
            'label' =>'Регион',
            'rewrite' => array( 'slug' => 'region' ),
            'hierarchical' => true,
        )
    );

    // Типы новостей
    register_taxonomy(
        'news_type',
        'news',
        array(
            'label' =>'Тип новости',
            'rewrite' => array( 'slug' => 'news_type' ),
            'hierarchical' => true,
            'public' => true,
            'publicly_queryable' => true,
        )
    );
}
add_action( 'init', 'svetofor_register_custom_post_type' );


// Убираем основной редактор на странице магазинов

function svetofor_remove_shop_editor() {
    remove_post_type_support( 'shop', 'editor' );
  }
add_action( 'init', 'svetofor_remove_shop_editor' );













