<?php
function aletheme_metaboxes($meta_boxes) {

    $meta_boxes = array();
    $prefix = "svetofor_";
    //Поля для страниц новостей
    $meta_boxes[] = array(
        'id'         => 'news_metaboxes',
        'title'      => 'Данные для страницы новости',
        'pages'      => array( 'news', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-press.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => 'Ссылка на новость в соцсети',
                'desc' => 'Введите ссылку на новость в соцсети',
                'id'   => $prefix . 'news_social_link',
                'type' => 'text',
            ),
            array(
                'name' => 'Текст ссылки на новость',
                'desc' => 'Введите текст ссылки, которая будет вести на страницу новости в соцсети',
                'id'   => $prefix . 'news_social_text',
                'type' => 'text',
            ),
        )
    );
    //Поля для страницы товаров
    $meta_boxes[] = array(
        'id'         => 'product_metaboxes',
        'title'      => 'Данные для товаров',
        'pages'      => array( 'product', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-press.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            /*
            array(
                'name' => 'Торговая марка',
                'desc' => 'Введите марку товара (отображается в заголовке)',
                'id'   => $prefix . 'product_brand',
                'type' => 'text',
            ),*/
            array(
                'name' => 'Доп. свойства товара',
                'desc' => 'Введите доп. свойства (вкус, жирность, цвет и тд)',
                'id'   => $prefix . 'product_manufacturer',
                'type' => 'text',
            ),
            array(
                'name' => 'Фасовка',
                'desc' => 'Введите вес или фасовку продукта',
                'id'   => $prefix . 'product_weight',
                'type' => 'text',
            ),
            array(
                'name' => 'Страна производства',
                'desc' => 'Введите страну-производителя товара',
                'id'   => $prefix . 'product_country',
                'type' => 'text',
            ),
            /*array(
                'name' => 'Старая цена товара',
                'desc' => 'Введите большую цену на товар',
                'id'   => $prefix . 'product_old_price',
                'type' => 'text',
            ),
            array(
                'name' => 'Новая цена товара',
                'desc' => 'Введите меньшую цену на товар',
                'id'   => $prefix . 'product_new_price',
                'type' => 'text',
            ),
            array(
                'name' => 'Категория товара',
                'desc' => 'Выберите категорию товара',
                'id'   => $prefix . 'product_category',
                'type' => 'select',
                'options' => array(
                    array('name'=>'Нет категории',    'value'=>''),
                    array('name'=>'Эко',              'value'=>'eco'),
                    array('name'=>'Распродажа',       'value'=>'sale'),
                    array('name'=>'Новинка',          'value'=>'new'),
                ),
            ),*/
        )
    );
    //Поля для страницы магазина
    $meta_boxes[] = array(
        'id'         => 'shop_metaboxes',
        'title'      => 'Данные для страницы магазина',
        'pages'      => array( 'shop', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-press.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => 'Заголовок страницы магазина',
                'desc' => 'Введите заголовок, который будет отображаться на странице магазина',
                'id'   => $prefix . 'shop_header',
                'type' => 'text',
            ),
            array(
                'name' => 'Время открытия магазина',
                'desc' => 'Укажите время открытия в формате 00.00',
                'id'   => $prefix . 'shop_open_time',
                'type' => 'text',
            ),
            array(
                'name' => 'Время закрытия магазина',
                'desc' => 'Укажите время закрытия в формате 00.00',
                'id'   => $prefix . 'shop_close_time',
                'type' => 'text',
            ),
            array(
                'name' => 'Телефон магазина',
                'desc' => 'Укажите телефон в формате (342)123-45-67',
                'id'   => $prefix . 'shop_phone',
                'type' => 'text',
            ),
            array(
                'name' => 'Парковка',
                'desc' => 'Укажите, есть ли парковка в магазине',
                'id'   => $prefix . 'shop_parking',
                'type' => 'checkbox',
            ),
            array(
                'name' => 'Алкоголь',
                'desc' => 'Укажите, продается ли алкоголь в магазине',
                'id'   => $prefix . 'shop_alc',
                'type' => 'checkbox',
            ),
            array(
                'name' => 'Банковские карты',
                'desc' => 'Укажите, принимаются ли банковские карты',
                'id'   => $prefix . 'shop_credit',
                'type' => 'checkbox',
            ),
            /*
            array(
                'name' => 'Группа VK',
                'desc' => 'Укажите ссылку на группу магазина',
                'id'   => $prefix . 'shop_VK',
                'type' => 'text',
            ),*/
            array(
                'name' => 'Долгота (карта)',
                'desc' => 'Долгота магазина',
                'id'   => $prefix . 'shop_lang',
                'type' => 'text',
            ),
            array(
                'name' => 'Широта (карта)',
                'desc' => 'Широта магазина',
                'id'   => $prefix . 'shop_alt',
                'type' => 'text',
            ),
           
        )
    );
    //Поля для страниц баннеров
    $meta_boxes[] = array(
        'id'         => 'baner_metaboxes',
        'title'      => 'Данные для страницы банеров',
        'pages'      => array( 'baner', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-press.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => 'Цена на товавр',
                'desc' => 'Введите цену на товар',
                'id'   => $prefix . 'baner_price',
                'type' => 'text',
            ),
            array(
                'name' => 'Фото фона банера',
                'desc' => 'Загрузите фото, используемое как фон банера ',
                'id'   => $prefix . 'baner_bgi',
                'type' => 'file',
            ),
        )
    );
    //Поля для страницы Партнерам
    $meta_boxes[] = array(
        'id'         => 'news_metaboxes',
        'title'      => 'Данные для страницы Партнерам',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-partner.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => 'Заголовок первого таба',
                'desc' => 'Введите заголовок первого таба',
                'id'   => $prefix . 'partner_buy_header',
                'type' => 'text',
            ),
            array(
                'name' => 'Текст первого таба',
                'desc' => 'Введите текст первого таба (используйте тэг p для разбиения на абзацы',
                'id'   => $prefix . 'partner_buy_text',
                'type' => 'textarea_code',
            ),
            array(
                'name' => 'Изображение первого таба',
                'desc' => 'Загрузите изображение для первого таба ',
                'id'   => $prefix . 'partner_buy_img',
                'type' => 'file',
            ),
            array(
                'name' => 'Текст ссылки на почту первого таба',
                'desc' => 'Введите текст ссылки на почту',
                'id'   => $prefix . 'partner_buy_link_text',
                'type' => 'text',
            ),
            array(
                'name' => 'Почта первого таба',
                'desc' => 'Введите адрес электронной почты для первого таба',
                'id'   => $prefix . 'partner_buy_link',
                'type' => 'text',
            ),
            array(
                'name' => 'Заголовок второго таба',
                'desc' => 'Введите заголовок второго таба',
                'id'   => $prefix . 'partner_rent_header',
                'type' => 'text',
            ),
            array(
                'name' => 'Текст второго таба',
                'desc' => 'Введите текст второго таба (используйте тэг p для разбиения на абзацы',
                'id'   => $prefix . 'partner_rent_text',
                'type' => 'textarea_code',
            ),
            array(
                'name' => 'Изображение второго таба',
                'desc' => 'Загрузите изображение для второго таба ',
                'id'   => $prefix . 'partner_rent_img',
                'type' => 'file',
            ),
            array(
                'name' => 'Текст ссылки на почту второго таба',
                'desc' => 'Введите текст ссылки на почту',
                'id'   => $prefix . 'partner_rent_link_text',
                'type' => 'text',
            ),
            array(
                'name' => 'Почта второго таба',
                'desc' => 'Введите адрес электронной почты для второго таба',
                'id'   => $prefix . 'partner_rent_link',
                'type' => 'text',
            ),
        )
    );
    return $meta_boxes;
}