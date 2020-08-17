<?php
    if ( in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option( 'active_plugins')))) {
        
        // Добавляем поддержку темы Woocommerce
        function svetofor_add_woocommerce_support() {
            add_theme_support('woocommerce');
        }
        add_action( 'after_setup_theme', 'svetofor_add_woocommerce_support');

        // Убираем старый сайдбар и заменяем персональным
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

        add_action( 'woocommerce_sidebar', function() {
            get_sidebar('woocommerce');
        });

        // Убираем основной редактор для описания товара
        function svetofor_remove_product_editor() {
            remove_post_type_support( 'product', 'editor' );
          }
        add_action( 'init', 'svetofor_remove_product_editor' );

        // Добавляем поддержку Ajax для иконки корзины в header
        add_filter('woocommerce_add_to_cart_fragments', 'svetofor_header_add_to_cart');

        function svetofor_header_add_to_cart( $fragments ) {
            global $woocommerce;
            global $svetofor_options;

            ob_start();

            echo '<a href="' . esc_url(wc_get_cart_url()) .'" class="header-cart-link"><img src="' . $svetofor_options['company_cart_icon']['url'] . '"><span>'. WC()->cart->get_cart_total() . '</span></a>';

            $fragments['a.header-cart-link'] = ob_get_clean();

            return $fragments;
        }

        // Добавляем поддержку слайдера на странице товара
        add_action('after_setup_theme', function() {
            add_theme_support('wc-product-gallery-zoom');
            add_theme_support('wc-product-gallery-lightbox');
            add_theme_support('wc-product-gallery-slider');
        });

         // Находим города, у которых указан код города для доставки
         function svetofor_add_delivery_cities( $taxonomy ) {
            $cities_array = array();
            $terms = get_terms( array(
                'taxonomy'   => $taxonomy,
                'hide_empty' => true, 
            ));
            foreach ($terms as $term ) {
                $term_id = $term->term_id;
                $city_code = get_term_meta($term_id, 'city_code', 1);
                $city_name = $term->name;
                if ($city_code) {
                    $cities_array[$city_code] = $city_name;
                }                
            }
            return $cities_array;            
        }

        // Находим города с доставкой и определяем для них почту
        function svetofor_delivery_data( $taxonomy ) {
            $cities_data = array();
            $terms = get_terms(array(
                'taxonomy' => $taxonomy,
                'hide_empty' => true
            ));
            foreach ($terms as $term) {
                $term_id = $term->term_id;
                $city_code = get_term_meta($term_id, 'city_code', 1);
                $city_mail = get_term_meta($term_id, 'order_email', 1);
                if ($city_code) {
                    $cities_data[$city_code] = $city_mail;
                }
            }

            return $cities_data;
        }

        // Добавляем нужные регионы доставки к России       
        add_filter( 'woocommerce_states', 'svetofor_woocommerce_states' );
        function svetofor_woocommerce_states( $states ) {

            $cities = svetofor_add_delivery_cities('city');

            $states['RU'] = $cities;

        return $states;
        }

        // Убираем поля города и индекса из калькулятора доставки на странице корзины
        add_filter( 'woocommerce_shipping_calculator_enable_city', '__return_false' );
        add_filter( 'woocommerce_shipping_calculator_enable_postcode', '__return_false' );
        
        
        // Отправляем письма на разные адреса в зависимости от города покупателя

        function wc_change_admin_new_order_email_recipient( $recipient, $order ) {
            global $woocommerce;
            global $svetofor_options;
            $delivery_cities = svetofor_delivery_data('city');
            
            if ($order) {
                $order_state = strtolower($order->get_shipping_state());

                foreach ($delivery_cities as $key => $value) {
                    if ($order_state AND $order_state == strtolower($key)) {
                        $recipient = $value . ', ' . $svetofor_options['mail'];  
                    }
                }
            }            
            
            return $recipient;
        }
        add_filter('woocommerce_email_recipient_new_order', 'wc_change_admin_new_order_email_recipient', 1, 2);


        // Кастомные функции 

        // Создаем ярлык со скидкой для карточки товара
        function svetofor_product_sale() { 
            global $product;
            if( $product->is_on_sale() ) {
                $new_price = $product->get_sale_price();
            }
            $old_price = $product->get_regular_price();

            if ($old_price && $new_price) {
                $discount = 100 - $new_price*100/$old_price;
            
            
        ?>

        <div class="product__discount">
            <?php echo round($discount, 0)  ?>%
        </div>
        
        <?php } }

        // Создаем круг с ценами для карточки товара
        function svetofor_price_circle() { ?>
            <div class="circle__price"><?php  echo woocommerce_template_loop_price() ?></div>
        <?php }

        
        // Создаем дополнительное описание товара в карточке из данных метабоксов
        function svetofor_product_description_meta() { ?>
        <p class="meta__description">
           <?php  
            if(get_metadata('post', get_the_ID(), 'svetofor_product_manufacturer', true)) { ?>  
            <span class="product__add_desc">
            <?php
                echo get_metadata('post', get_the_ID(), 'svetofor_product_manufacturer', true); ?>
             </span>,      
            <?php  } ?>
           
            <span class="product_weight">
            <?php
            if(get_metadata('post', get_the_ID(), 'svetofor_product_weight', true)) {
                echo get_metadata('post', get_the_ID(), 'svetofor_product_weight', true);
            }           
           ?> 
           </span>
        </p>
        <?php }

        // Создаем дополнительные пункты описания для страницы товара
        function svetofor_single_product_description_meta() { ?>
            <div class="svetofor_prodict" >   
            <?php if (get_metadata('post', get_the_ID(), 'svetofor_product_manufacturer', true)) { ?>
                <p class="svetofor_product_add_desc">
                    <span class="svetofor_prodict_add_desc_title">Характеристики:</span>
                    <span class="svetofor_prodict_add_desc_info">
                        <?php echo get_metadata('post', get_the_ID(), 'svetofor_product_manufacturer', true); ?>
                    </span>
                </p>
            <?php } ?>
            <?php if (get_metadata('post', get_the_ID(), 'svetofor_product_weight', true)) { ?>
                <p class="svetofor_product_add_weight">
                    <span class="svetofor_prodict_add_weight_title">Вес (кол-во):</span>
                    <span class="svetofor_prodict_add_weight_info">
                        <?php echo get_metadata('post', get_the_ID(), 'svetofor_product_weight', true); ?>
                    </span>
                </p>
            <?php } ?>
            </div>
        <?php }

        // Удаляем хуки

        //Удаляем описание таксономи и архива (страница магазина)
        remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
        remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);
        // Убираем хлебные крошки (страница магазина и товара)
        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);        
        // Убираем цену в карточке с ее обычного места (карточка товара)
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
        // Убираем рейтинг (карточка товара)
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
        // Убираем ярлычок распродажи (карточка товара)
        remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
        // Убираем табы с описанием со страницы товара
        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
        // Удаляем рейтинг со страницы товара
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
        // Удаляем цену со страницы товара (перенесем ее ниже)
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);


        // Добавляем хуки

        // Добавляем ярлычок со скидкой (карточка товара)
        add_action('woocommerce_before_shop_loop_item', 'svetofor_product_sale', 5);
        // Добавляем кружок с ценами
        add_action('woocommerce_before_shop_loop_item', 'svetofor_price_circle', 4);       
        // Добавляем дополнительное описание (из метабоксов) (карточка товара)    
        add_action('woocommerce_shop_loop_item_title', 'svetofor_product_description_meta', 20);
        // Добавляем дополнительное описание (из метабоксов) (страницы товара)
        add_action('woocommerce_single_product_summary', 'svetofor_single_product_description_meta', 10);
        // Переносим цену товара на странице товара ниже
        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 25);
    }
