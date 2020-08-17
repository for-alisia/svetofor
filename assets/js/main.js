jQuery(function () {
    /*--burger-menu--*/
    var burger = jQuery('.burger'),
        menu = jQuery('.main-menu');
    burger.click(function () {
        var that = jQuery(this);
        menu.slideToggle(500);
        that.toggleClass('close');
    });
    jQuery(document).mouseup(function (e) {
        var links = jQuery('.main-menu a');
        if (
            !links.is(e.target) &&
            links.has(e.target).length === 0 &&
            !burger.is(e.target) &&
            jQuery(window).width() < 1025
        ) {
            menu.slideUp(500);
            burger.removeClass('close');
        }
    });
    jQuery(window).resize(function () {
        if (jQuery(window).width() > 1048) {
            burger.removeClass('close');
            menu.show();
        } else {
            menu.hide();
        }
    });

    /*-----Tabs----- */
    jQuery('.tab-nav span').click(function () {
        jQuery('.tab-nav span').removeClass('active');
        jQuery(this).addClass('active');
        if (jQuery(this).is('#buy')) {
            jQuery('#buy-tab').addClass('show');
            jQuery('#rent-tab').removeClass('show');
        } else {
            jQuery('#buy-tab').removeClass('show');
            jQuery('#rent-tab').addClass('show');
        }
    });

    // Select на странице архива магазинов
    if (document.getElementById('selectbox')) {
        var ul = document.getElementById('selectbox');
        var formCity = document.getElementById('selectCityForm');
        var inputCity = formCity.elements.cityName;

        ul.addEventListener('click', function (e) {
            if (e.target.classList.contains('option')) {
                var options = ul.querySelectorAll('li.option');

                if (e.target.classList.contains('choosed')) {
                    options.forEach(function (option) {
                        option.style.display = 'block';
                    });
                    inputCity.value = '';
                    e.target.classList.remove('choosed');
                } else {
                    options.forEach(function (option) {
                        option.style.display = 'none';
                    });
                    e.target.classList.add('choosed');
                    e.target.style.display = 'block';

                    showCityCards(e.target.dataset.city);
                }

                ul.classList.toggle('closed');
            }
        });

        inputCity.addEventListener('input', function (e) {
            var currentValue = e.target.value;
            var cities = ul.querySelectorAll('li.city-option');

            if (ul.classList.contains('closed')) {
                ul.classList.remove('closed');
            }

            cities.forEach(function (city) {
                var cityName = city.textContent;

                city.style.display = 'none';

                if (isMatching(cityName, currentValue)) {
                    city.style.display = 'block';
                }
            });
        });
    }

    function isMatching(full, chunk) {
        const lowFull = full.toLowerCase();
        const lowChunk = chunk.toLowerCase();

        return lowFull.includes(lowChunk);
    }

    function showCityCards(name) {
        var shopCards = document.querySelectorAll('.shop-card');

        shopCards.forEach(function (card) {
            if (card.dataset.city == name || card.dataset.region == name) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Выбор региона на странице с картой

    if (document.getElementById('shop-region')) {
        var regions = document.getElementById('shop-region');

        regions.addEventListener('click', function (e) {
            if (e.target.classList.contains('item-region')) {
                showCityCards(e.target.dataset.region);
            }
        });
    }

    //Работа с картой

    var map = document.getElementById('main-map');
    if (map) {
        var shopCards = document.querySelectorAll('.shop-card'),
            pin = document.getElementById('main-map').dataset.pin,
            shops = [],
            mapCenter = [+map.dataset.centerLang, +map.dataset.centerAlt],
            mapZoom = map.dataset.zoom;

        shopCards.forEach(function (elem) {
            var shopObj = {};
            shopObj.coords = [+elem.dataset.lang, +elem.dataset.alt];
            shopObj.address = elem.querySelector('.adress').textContent;
            shopObj.open = elem.querySelector('.graphic').dataset.timeopen;
            shopObj.close = elem.querySelector('.graphic').dataset.timeclose;
            shopObj.phone = elem.querySelector('.phone').textContent;
            shops.push(shopObj);
        });

        ymaps.ready(init);

        function init() {
            var shopMap = new ymaps.Map('main-map', {
                    center: mapCenter,
                    zoom: mapZoom,
                }),
                shopCollection = new ymaps.GeoObjectCollection(
                    {},
                    {
                        iconLayout: 'default#image',
                        iconImageHref: pin,
                        iconImageSize: [26, 35],
                        iconImageOffset: [-13, -30],
                    }
                );
            shopMap.controls.add('routeEditor');
            shopMap.controls.remove('searchControl').remove('rulerControl');
            shopMap.behaviors.disable(['scrollZoom']);

            shops.forEach((elem) => {
                shopCollection.add(
                    new ymaps.Placemark(elem.coords, {
                        balloonContentHeader:
                            '<p class="adress">' + elem.address + '</p>',
                        balloonContentBody:
                            '<p class="graphic">' +
                            elem.open +
                            ' - ' +
                            elem.close +
                            '</p><p class="phone">' +
                            elem.phone +
                            '</p>',
                    })
                );
            });

            shopMap.geoObjects.add(shopCollection);
        }
    }

    // Кнопка наверх на странице товаров

    var pageUpBtn = document.getElementById('page_up');

    if (pageUpBtn) {
        window.addEventListener('scroll', function () {
            if (window.pageYOffset < window.innerHeight) {
                pageUpBtn.style.display = 'none';
            } else {
                pageUpBtn.style.display = 'block';
            }

            console.log(window.pageYOffset + '-' + window.innerHeight);
        });

        pageUpBtn.addEventListener('click', pageUpFn);
    }

    function pageUpFn(e) {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    //Slick-slider
    jQuery('.slider-wrapper').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 780,
                settings: {
                    slidesToShow: 2,
                },
            },
        ],
    });
    jQuery('.slick-arrow').text('');
});
