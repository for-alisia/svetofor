<?php 

//О компании
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Svetofor_About_Module extends WPBakeryShortCode {}
}

if ( function_exists( 'vc_map' ) ) {
    vc_map( array(
        'name'                            => 'О компании',
        'base'                            => 'svetofor_about_module',
        'category'                        => 'Светофор',
        'description'                     => 'Блок страницы О компании',
        'show_settings_on_create'         => true,
        'icon'                            => 'svetofor_icon',
        'params'                          => array(
            array(
                "type"         => "textfield",
                "heading"      => "Заголовок модуля",
                "param_name"   => "about_module_header",
                "value"        => "",
                "description"  => "Заголовок модуля"
            ),
            array(
                "type"         => "textarea",
                "heading"      => "Описание модуля",
                "param_name"   => "about_module_desc",
                "value"        => "",
                "description"  => "Текст модуля"
            ),
            array(
                "type"        => "attach_image",
                "heading"     => "Картика модуля",
                "param_name"  => "about_module_image",
                "value"       => '',
                "description" => "Загрузите картинку"
            ),
            array(
                "type"         => "textfield",
                "heading"      => "Текст ссылки (если она нужна)",
                "param_name"   => "about_module_simple_link_text",
                "value"        => "",
                "description"  => "Текст на ссылке"
            ),
            array(
                "type"         => "vc_link",
                "heading"      => "Ссылка",
                "param_name"   => "about_module_simple_link",
                "value"        => "",
                "description"  => "Ссылка на VK"
            ),
            array(
                "type"         => "textfield",
                "heading"      => "Надпись на кнопке",
                "param_name"   => "about_module_link_text",
                "value"        => "",
                "description"  => "Текст на кнопке, если будет кнопка"
            ),
            array(
                "type"         => "vc_link",
                "heading"      => "Ссылка на кнопке",
                "param_name"   => "about_module_link",
                "value"        => "",
                "description"  => "Ссылка для кнопки"
            ),
        )

    ));
}

//Главный экран
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Svetofor_Main_Section extends WPBakeryShortCode {}
}

if ( function_exists( 'vc_map' ) ) {
    vc_map( array(
        'name'                            => 'Первый экран',
        'base'                            => 'svetofor_main_section',
        'category'                        => 'Светофор',
        'description'                     => 'Первый экран (для главной страницы)',
        'show_settings_on_create'         => true,
        'icon'                            => 'svetofor_icon',
        'params'                          => array(
            array(
                "type"         => "textfield",
                "heading"      => "Заголовок модуля",
                "param_name"   => "main_section_header",
                "value"        => "Всегда низкие цены",
                "description"  => "Заголовок модуля"
            ),
            array(
                "type"         => "textarea",
                "heading"      => "Текст под заголовком",
                "param_name"   => "main_section_desc",
                "value"        => "",
                "description"  => "Текст под заголовком (УТП-предложение)"
            ),
            array(
                "type"         => "vc_link",
                "heading"      => "Ссылка на первой кнопке",
                "param_name"   => "main_section_link1",
                "value"        => "",
                "description"  => "Ссылка для первой кнопки"
            ),
            array(
                "type"         => "vc_link",
                "heading"      => "Ссылка на второй кнопке",
                "param_name"   => "main_section_link2",
                "value"        => "",
                "description"  => "Ссылка для второй кнопки"
            ),
            array(
                "type"        => "attach_image",
                "heading"     => "Картика модуля",
                "param_name"  => "main_section_image",
                "value"       => '',
                "description" => "Загрузите картинку"
            ),
        )

    ));
}

//Блок преимуществ
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Svetofor_Advantage extends WPBakeryShortCode {}
}

if ( function_exists( 'vc_map' ) ) {
    vc_map( array(
        'name'                            => 'Иконки Преимущества',
        'base'                            => 'svetofor_advantage',
        'category'                        => 'Светофор',
        'description'                     => 'Инфографика (для главной)',
        'show_settings_on_create'         => true,
        'icon'                            => 'svetofor_icon',
        'params'                          => array(
            array(
                "type"         => "textfield",
                "heading"      => "Первое преимущество",
                "param_name"   => "advantage_text1",
                "value"        => "Магазины рядом с вами",
                "description"  => "Введите описание первого преимущества"
            ),
            array(
                "type"        => "attach_image",
                "heading"     => "Картика первого преимущества",
                "param_name"  => "advantage_img1",
                "value"       => '',
                "description" => "Загрузите картинку"
            ),
            array(
                "type"         => "textfield",
                "heading"      => "Второе",
                "param_name"   => "advantage_text2",
                "value"        => "Только самые выгодные цены",
                "description"  => "Введите описание второго преимущества"
            ),
            array(
                "type"        => "attach_image",
                "heading"     => "Картика второго преимущества",
                "param_name"  => "advantage_img2",
                "value"       => '',
                "description" => "Загрузите картинку"
            ),
            array(
                "type"         => "textfield",
                "heading"      => "Третье преимущество",
                "param_name"   => "advantage_text3",
                "value"        => "Продукция местных производителей",
                "description"  => "Введите описание третьего преимущества"
            ),
            array(
                "type"        => "attach_image",
                "heading"     => "Картика третьего преимущества",
                "param_name"  => "advantage_img3",
                "value"       => '',
                "description" => "Загрузите картинку"
            ),
        )

    ));
}

//Блок Банер
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Svetofor_Baner extends WPBakeryShortCode {}
}

if ( function_exists( 'vc_map' ) ) {
    vc_map( array(
        'name'                            => 'Случайный банер',
        'base'                            => 'svetofor_baner',
        'category'                        => 'Светофор',
        'description'                     => 'Добавляет случайный банер',
        'show_settings_on_create'         => false,
        'icon'                            => 'svetofor_icon',
        'params'                          => array()
        
    ));
}

//Блок "Почему у нас такие низкие цены"
if ( class_exists("WPBakeryShortCodesContainer")) {
    class WPBakeryShortCode_Svetofor_Reason_Module extends WPBakeryShortCodesContainer {}
}
if (function_exists('vc_map')) {
    vc_map( array(
        'name'                    => "Второй экран (почему мы)",
        'base'                    => 'svetofor_reason_module',
        'as_parent'             => array('only' => 'svetofor_reason_item'),
        'category'                => 'Светофор',
        'description'             => 'Модуль с блоками картинка + текст',
        'content_element'         => true,
        'show_settings_on_create' => false,
        'icon'                    => 'svetofor_icon',
        'weight'                  => -5,
        'params'                  => array(),
        'js_view'                 => 'VcColumnView'
    ));
}
if ( class_exists("WPBakeryShortCode")) {
    class WPBakeryShortCode_Svetofor_Reason_Item extends WPBakeryShortCode {}
}
if (function_exists('vc_map')) {
    vc_map( array(
        'name'                    => 'Отдельный блок модуля причин',
        'base'                    => 'svetofor_reason_item',
        'category'                => 'Светофор',
        'description'             => 'Заполните данные',
        'show_settings_on_create' => true,
        'as_child'                => array('only' => 'svetofor_reason_module'),
        'icon'                    => '',
        'weight'                  => -5,
        'params'                  => array(
            array(
                "type"         => "textfield",
                "heading"      => "Номер причины",
                "param_name"   => "reason_number",
                "value"        => "",
                "description"  => "Введите номер или символ причины"
            ),
            array(
                "type"         => "textfield",
                "heading"      => "Заголовок причины",
                "param_name"   => "reason_header",
                "value"        => "",
                "description"  => "Введите заголовок"
            ), 
            array(
                "type"         => "textarea",
                "heading"      => "Описание причины",
                "param_name"   => "reason_text",
                "value"        => "",
                "description"  => "Введите описание"
            ), 
            array(
                "type"        => "attach_image",
                "heading"     => "Картика причины",
                "param_name"  => "reason_img",
                "value"       => '',
                "description" => "Загрузите картинку"
            ),
            
        ),
    ));
}
//Блок Лучшие предложения
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Svetofor_Product extends WPBakeryShortCode {}
}

if ( function_exists( 'vc_map' ) ) {
    vc_map( array(
        'name'                            => 'Избранные товары',
        'base'                            => 'svetofor_product',
        'category'                        => 'Светофор',
        'description'                     => 'Список лучших товаров',
        'show_settings_on_create'         => false,
        'icon'                            => 'svetofor_icon',
        'params'                          => array()
        
    ));
}

//Блок с планетой и картой
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Svetofor_Planet extends WPBakeryShortCode {}
}

if ( function_exists( 'vc_map' ) ) {
    vc_map( array(
        'name'                            => 'Карта для главной',
        'base'                            => 'svetofor_planet',
        'category'                        => 'Светофор',
        'description'                     => 'Количество и расположение магазинов',
        'show_settings_on_create'         => true,
        'icon'                            => 'svetofor_icon',
        'params'                          => array(
            array(
                "type"         => "textfield",
                "heading"      => "Заголовок блока",
                "param_name"   => "planet_header",
                "value"        => "23 магазина в пермском крае",
                "description"  => "Введите заголовок"
            ),
            array(
                "type"         => "textfield",
                "heading"      => "Подзаголовок блока",
                "param_name"   => "planet_subheader",
                "value"        => "237 магазинов в России, 4 магазина в странах Евросоюза",
                "description"  => "Введите подзаголовок"
            ),
            array(
                "type"         => "textarea",
                "heading"      => "описание блока",
                "param_name"   => "planet_text",
                "value"        => "",
                "description"  => "Введите описание"
            ),
            array(
                "type"        => "attach_image",
                "heading"     => "Картика блока",
                "param_name"  => "planet_img",
                "value"       => '',
                "description" => "Загрузите картинку"
            ),
            array(
                "type"         => "vc_link",
                "heading"      => "Ссылка на основной сайт",
                "param_name"   => "planet_link",
                "value"        => "",
                "description"  => "Ссылка на основной сайт светофора"
            ),
           
        )

    ));
}

//Блок "Обратной связи"
if ( class_exists("WPBakeryShortCodesContainer")) {
    class WPBakeryShortCode_Svetofor_Callback extends WPBakeryShortCodesContainer {}
}
if (function_exists('vc_map')) {
    vc_map( array(
        'name'                    => "Последний экран",
        'base'                    => 'svetofor_callback',
        'as_parent'             => array('only' => 'svetofor_callback_item'),
        'category'                => 'Светофор',
        'description'             => 'Блок с модулями обратной связи',
        'content_element'         => true,
        'show_settings_on_create' => false,
        'icon'                    => 'svetofor_icon',
        'weight'                  => -5,
        'params'                  => array(),
        'js_view'                 => 'VcColumnView'
    ));
}
if ( class_exists("WPBakeryShortCode")) {
    class WPBakeryShortCode_Svetofor_Callback_Item extends WPBakeryShortCode {}
}
if (function_exists('vc_map')) {
    vc_map( array(
        'name'                    => 'Отдельный блок обратной связи',
        'base'                    => 'svetofor_callback_item',
        'category'                => 'Светофор',
        'description'             => 'Заполните данные',
        'show_settings_on_create' => true,
        'as_child'                => array('only' => 'svetofor_callback'),
        'icon'                    => 'svetofor_icon',
        'weight'                  => -5,
        'params'                  => array(
            array(
                "type"         => "textfield",
                "heading"      => "Заголовок блока",
                "param_name"   => "callback_header",
                "value"        => "",
                "description"  => "Введите заголовок"
            ), 
            array(
                "type"         => "textarea",
                "heading"      => "Описание блока",
                "param_name"   => "callback_text",
                "value"        => "",
                "description"  => "Введите описание"
            ), 
            array(
                "type"        => "attach_image",
                "heading"     => "Картика блока",
                "param_name"  => "callback_img",
                "value"       => '',
                "description" => "Загрузите картинку"
            ),
            array(
                "type"         => "vc_link",
                "heading"      => "Ссылка на VK",
                "param_name"   => "callback_link",
                "value"        => "",
                "description"  => "Ссылка на VK"
            ),
            array(
                "type"         => "vc_link",
                "heading"      => "Кнопка",
                "param_name"   => "callback_button",
                "value"        => "",
                "description"  => "Кнопка с ссылкой"
            ),
            
        ),
    ));
}

//Блок Новостей
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Svetofor_News extends WPBakeryShortCode {}
}

if ( function_exists( 'vc_map' ) ) {
    vc_map( array(
        'name'                            => 'Избранные новости',
        'base'                            => 'svetofor_news',
        'category'                        => 'Светофор',
        'description'                     => 'Список лучших товаров',
        'show_settings_on_create'         => true,
        'icon'                            => 'svetofor_icon',
        'params'                          => array(
            array(
                "type"         => "vc_link",
                "heading"      => "Ссылка на архив новостей",
                "param_name"   => "news_button",
                "value"        => "",
                "description"  => "Кнопка с ссылкой на архив новостей"
            ),
        )
        
    ));
}
//Блок Промо-банера
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Svetofor_Promo extends WPBakeryShortCode {}
}

if ( function_exists( 'vc_map' ) ) {
    vc_map( array(
        'name'                            => 'Простой банер с текстом',
        'base'                            => 'svetofor_promo',
        'category'                        => 'Светофор',
        'description'                     => 'Простой банер (фон+текст)',
        'show_settings_on_create'         => true,
        'icon'                            => 'svetofor_icon',
        'params'                          => array(
            array(
                "type"         => "textfield",
                "heading"      => "Заголовок блока",
                "param_name"   => "promo_header",
                "value"        => "",
                "description"  => "Введите заголовок"
            ), 
            array(
                "type"         => "textarea",
                "heading"      => "Описание блока",
                "param_name"   => "promo_text",
                "value"        => "",
                "description"  => "Введите описание"
            ), 
            array(
                "type"        => "attach_image",
                "heading"     => "Картинка блока",
                "param_name"  => "promo_img",
                "value"       => '',
                "description" => "Загрузите картинку"
            ),
        )
        
    ));
}



           