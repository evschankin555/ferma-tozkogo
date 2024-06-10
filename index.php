<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Ферма Тоцкого предлагает всем желающим качественные и натуральные продукты в Пензе. Производим экологически чистые фермерские продукты. Заказы для доставки с фермы Тоцкого формируем под заявки. Поэтому фермерские продукты попадут свежими к вашему столу.");
$APPLICATION->SetPageProperty("keywords", "фермерские продукты");
$APPLICATION->SetPageProperty("title", "Натуральные фермерские продукты от производителя по доступным ценам");
$APPLICATION->SetTitle("Ферма Тоцкого - Натуральные фермерские продукты");?>

<?
//include module
\Bitrix\Main\Loader::includeModule("dw.deluxe");

//vars
$catalogIblockId = null;
$arPriceCodes = array();

//get template settings
$arTemplateSettings = DwSettings::getInstance()->getCurrentSettings();
if(!empty($arTemplateSettings)){
    $catalogIblockId = $arTemplateSettings["TEMPLATE_PRODUCT_IBLOCK_ID"];
    $arPriceCodes = explode(", ", $arTemplateSettings["TEMPLATE_PRICE_CODES"]);
}
?>

<?php
// Проверяем параметр в URL для шаблона Dresscode V1 2024
$urlParam = $_GET['dev'] ?? null;
if (false && $urlParam == null):
    // Код для шаблона Dresscode V1
    echo '<!-- Dresscode V1 /--!>';
?>

    <div id="promoBlock">
    <?$APPLICATION->IncludeComponent(
    "dresscode:slider",
    "promoSlider",
    Array(
        "CACHE_TIME" => "3600000",
        "CACHE_TYPE" => "Y",
        "IBLOCK_ID" => "7",
        "IBLOCK_TYPE" => "slider",
        "PICTURE_HEIGHT" => "555",
        "PICTURE_WIDTH" => "1181"
    )
);

    echo '<!-- slider end 123 /--!>';
    ?> <?$APPLICATION->IncludeComponent(
    "dresscode:special.product",
    ".default",
    Array(
        "CACHE_TIME" => "3600000",
        "CACHE_TYPE" => "Y",
        "COMPONENT_TEMPLATE" => ".default",
        "ELEMENTS_COUNT" => "10",
        "HIDE_MEASURES" => "N",
        "HIDE_NOT_AVAILABLE" => "N",
        "IBLOCK_ID" => $catalogIblockId,
        "IBLOCK_TYPE" => "catalog",
        "PICTURE_HEIGHT" => "180",
        "PICTURE_WIDTH" => "200",
        "PRODUCT_PRICE_CODE" => $arPriceCodes,
        "PROP_NAME" => "PRODUCT_DAY",
        "SORT_PROPERTY_NAME" => "SORT",
        "SORT_VALUE" => "ASC"
    ),
    false,
    Array(
        'ACTIVE_COMPONENT' => 'Y'
    )
);?>
    </div>
    <?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "indexBanners",
    Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "COMPONENT_TEMPLATE" => "indexBanners",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"XML_ID",3=>"NAME",4=>"TAGS",5=>"SORT",6=>"PREVIEW_TEXT",7=>"PREVIEW_PICTURE",8=>"DETAIL_TEXT",9=>"DETAIL_PICTURE",10=>"DATE_ACTIVE_FROM",11=>"ACTIVE_FROM",12=>"DATE_ACTIVE_TO",13=>"ACTIVE_TO",14=>"SHOW_COUNTER",15=>"SHOW_COUNTER_START",16=>"IBLOCK_TYPE_ID",17=>"IBLOCK_ID",18=>"IBLOCK_CODE",19=>"IBLOCK_NAME",20=>"IBLOCK_EXTERNAL_ID",21=>"DATE_CREATE",22=>"CREATED_BY",23=>"CREATED_USER_NAME",24=>"TIMESTAMP_X",25=>"MODIFIED_BY",26=>"USER_NAME",27=>"",),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "2",
        "IBLOCK_TYPE" => "info",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "15",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Р‘Р°РЅРµСЂС‹",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(0=>"",1=>"",),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N"
    ),
    false,
    Array(
        'ACTIVE_COMPONENT' => 'Y'
    )
);?>
    <?$APPLICATION->IncludeComponent(
    "dresscode:offers.product",
    ".default",
    Array(
        "CACHE_TIME" => "3600000",
        "CACHE_TYPE" => "Y",
        "COMPONENT_TEMPLATE" => ".default",
        "ELEMENTS_COUNT" => "10",
        "IBLOCK_ID" => $catalogIblockId,
        "IBLOCK_TYPE" => "catalog",
        "PICTURE_HEIGHT" => "200",
        "PICTURE_WIDTH" => "220",
        "PRODUCT_PRICE_CODE" => $arPriceCodes,
        "PROP_NAME" => "OFFERS",
        "PROP_VALUE" => array(0=>"9",1=>"10",2=>"11",3=>"12",4=>"13",),
        "SORT_PROPERTY_NAME" => "SORT",
        "SORT_VALUE" => "ASC"
    ),
    false,
    Array(
        'ACTIVE_COMPONENT' => 'Y'
    )
);?>
    <?$APPLICATION->IncludeComponent(
    "dresscode:pop.section",
    ".default",
    Array(
        "CACHE_TIME" => "3600000",
        "CACHE_TYPE" => "Y",
        "COMPONENT_TEMPLATE" => ".default",
        "ELEMENTS_COUNT" => "10",
        "IBLOCK_ID" => $catalogIblockId,
        "IBLOCK_TYPE" => "catalog",
        "PICTURE_HEIGHT" => "100",
        "PICTURE_WIDTH" => "120",
        "POP_LAST_ELEMENT" => "Y",
        "PROP_NAME" => "UF_POPULAR",
        "PROP_VALUE" => "Y",
        "SELECT_FIELDS" => array(0=>"NAME",1=>"SECTION_PAGE_URL",2=>"DETAIL_PICTURE",3=>"UF_IMAGES",4=>"UF_MARKER",5=>"",),
        "SORT_PROPERTY_NAME" => "7",
        "SORT_VALUE" => "DESC"
    ),
    false,
    Array(
        'ACTIVE_COMPONENT' => 'Y'
    )
);?>
    <?$APPLICATION->IncludeComponent(
    "dresscode:slider",
    "middle",
    Array(
        "CACHE_TIME" => "3600000",
        "CACHE_TYPE" => "Y",
        "IBLOCK_ID" => "8",
        "IBLOCK_TYPE" => "slider",
        "PICTURE_HEIGHT" => "202",
        "PICTURE_WIDTH" => "1476"
    ),
    false,
    Array(
        'ACTIVE_COMPONENT' => 'N'
    )
);?>
    <?$APPLICATION->IncludeComponent(
    "dresscode:brands.list",
    ".default",
    Array(
        "CACHE_TIME" => "360000",
        "CACHE_TYPE" => "A",
        "COMPONENT_TEMPLATE" => ".default",
        "ELEMENTS_COUNT" => "15",
        "IBLOCK_ID" => "1",
        "IBLOCK_TYPE" => "info",
        "PICTURE_HEIGHT" => "120",
        "PICTURE_WIDTH" => "150",
        "PROP_NAME" => "",
        "PROP_VALUE" => "",
        "SELECT_FIELDS" => array(0=>"",1=>"*",2=>"",),
        "SORT_PROPERTY_NAME" => "7",
        "SORT_VALUE" => "ASC"
    ),
    false,
    Array(
        'ACTIVE_COMPONENT' => 'N'
    )
);?>
    <?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    ".default",
    Array(
        "AREA_FILE_RECURSIVE" => "Y",
        "AREA_FILE_SHOW" => "sect",
        "AREA_FILE_SUFFIX" => "simplyText",
        "COMPONENT_TEMPLATE" => ".default",
        "EDIT_TEMPLATE" => ""
    )
);?>
<?php else:
    // Ваш код для шаблона Dresscode V1 2024 при условии параметра в URL dev=1
    echo '<!-- Dresscode V1 2024 /--!>';
?>

    <div class="container">
        <div class="adv-grid">
            <div class="adv-grid__item">
                <svg class="adv-grid__icon"><use xlink:href="#adv-1"></use></svg>
                Доставка продукции <br>в течение суток
            </div>
            <div class="adv-grid__item">
                <svg class="adv-grid__icon"><use xlink:href="#adv-2"></use></svg>
                Широкий ассортимент, <br>более 500 позиций
            </div>
            <div class="adv-grid__item">
                <svg class="adv-grid__icon"><use xlink:href="#adv-3"></use></svg>
                Собственные <br>фермерские хозяйства
            </div>
            <div class="adv-grid__item">
                <svg class="adv-grid__icon"><use xlink:href="#adv-4"></use></svg>
                Контроль качества <br>от грядки до тарелки
            </div>
        </div>
        <!-- /.adv-grid -->

        <div class="products-grid">
            <a href="/catalog/goryashchiy_tsekh_myasnye_i_ovoshchnye_blyuda/" class="products-grid__item">
                <span class="products-grid__top"><span>Готовые блюда</span> <svg class="products-grid__arrow"><use xlink:href="#arrow-right-short"></use></svg></span>
                <img src="/dist/images/dist/product-img-1.jpg" width="524" height="432" class="products-grid__img" alt="">
            </a>
            <a href="/catalog/ovoshchnoy_tsekh/" class="products-grid__item">
                <span class="products-grid__top"><span>Фрукты и Овощи</span> <svg class="products-grid__arrow"><use xlink:href="#arrow-right-short"></use></svg></span>
                <img src="/dist/images/dist/fruits-and-vegetables.jpg" width="250" height="158" class="products-grid__img" alt="">
            </a>
            <a href="/catalog/molochnyy_tsekh/" class="products-grid__item">
                <span class="products-grid__top"><span>Молочная продукция</span> <svg class="products-grid__arrow"><use xlink:href="#arrow-right-short"></use></svg></span>
                <img src="/dist/images/dist/milk-products.jpg" width="524" height="158" class="products-grid__img" alt="">
            </a>
            <a href="/catalog/kolbasnyy_tsekh/" class="products-grid__item">
                <span class="products-grid__top"><span>Колбасы</span> <svg class="products-grid__arrow"><use xlink:href="#arrow-right-short"></use></svg></span>
                <img src="/dist/images/dist/sausages.jpg" width="250" height="158" class="products-grid__img" alt="">
            </a>
            <a href="/catalog/rybnyy_tsekh/" class="products-grid__item">
                <span class="products-grid__top"><span>Рыба</span> <svg class="products-grid__arrow"><use xlink:href="#arrow-right-short"></use></svg></span>
                <img src="/dist/images/dist/fish.jpg" width="250" height="158" class="products-grid__img" alt="">
            </a>
            <a href="/catalog/syrovarnya/" class="products-grid__item">
                <span class="products-grid__top"><span>Сыры</span> <svg class="products-grid__arrow"><use xlink:href="#arrow-right-short"></use></svg></span>
                <img src="/dist/images/dist/cheeses.jpg" width="250" height="158" class="products-grid__img" alt="">
            </a>
            <a href="/catalog/myasnoy_tsekh/" class="products-grid__item">
                <span class="products-grid__top"><span>Парное мясо</span> <svg class="products-grid__arrow"><use xlink:href="#arrow-right-short"></use></svg></span>
                <img src="/dist/images/dist/meat.jpg" width="524" height="432" class="products-grid__img" alt="">
            </a>
            <a href="/catalog/pelmeni_vareniki_manty/" class="products-grid__item">
                <span class="products-grid__top"><span>Заморозка</span> <svg class="products-grid__arrow"><use xlink:href="#arrow-right-short"></use></svg></span>
                <img src="/dist/images/dist/freezing.jpg" width="250" height="158" class="products-grid__img" alt="">
            </a>
            <a href="/catalog/pekarnya/" class="products-grid__item">
                <span class="products-grid__top"><span>Хлеб и выпечка</span> <svg class="products-grid__arrow"><use xlink:href="#arrow-right-short"></use></svg></span>
                <img src="/dist/images/dist/bread.jpg" width="250" height="158" class="products-grid__img" alt="">
            </a>
            <a href="/catalog/konditerskiy_tsekh/" class="products-grid__item">
                <span class="products-grid__top"><span>Десерты</span> <svg class="products-grid__arrow"><use xlink:href="#arrow-right-short"></use></svg></span>
                <img src="/dist/images/dist/Dessert.jpg" width="250" height="158" class="products-grid__img" alt="">
            </a>
            <a href="/" class="products-grid__item">
                <span class="products-grid__top"><span>Напитки</span> <svg class="products-grid__arrow"><use xlink:href="#arrow-right-short"></use></svg></span>
                <img src="/dist/images/dist/drinks.jpg" width="250" height="158" class="products-grid__img" alt="">
            </a>

        </div>
        <!-- /.products-grid container -->

        <div class="recommend">
            <div class="heading">
                <h3 class="h3">Ферма Тоцкого рекомендует</h3>

            </div>
            <?$APPLICATION->IncludeComponent(
                "dresscode:offers.product_recommended",
                ".default",
                Array(
                    "CACHE_TIME" => "3600000",
                    "CACHE_TYPE" => "Y",
                    "COMPONENT_TEMPLATE" => ".default",
                    "ELEMENTS_COUNT" => "10",
                    "IBLOCK_ID" => $catalogIblockId,
                    "IBLOCK_TYPE" => "catalog",
                    "PICTURE_HEIGHT" => "186",
                    "PICTURE_WIDTH" => "384",
                    "PRODUCT_PRICE_CODE" => $arPriceCodes,
                    "PROP_NAME" => "OFFERS",
                    "PROP_VALUE" => array(0=>"9",1=>"10",2=>"11",3=>"12",4=>"13",),
                    "SORT_PROPERTY_NAME" => "SORT",
                    "SORT_VALUE" => "ASC"
                ),
                false,
                Array(
                    'ACTIVE_COMPONENT' => 'Y'
                )
            );?>
        </div>
        <!-- /.recommend -->
        <div class="hit">
            <div class="heading">
                <h3 class="h3">Хиты продаж</h3>
            </div>

            <?$APPLICATION->IncludeComponent(
                "dresscode:offers.product_best_sellers",
                ".default",
                Array(
                    "CACHE_TIME" => "3600000",
                    "CACHE_TYPE" => "Y",
                    "COMPONENT_TEMPLATE" => ".default",
                    "ELEMENTS_COUNT" => "10",
                    "IBLOCK_ID" => $catalogIblockId,
                    "IBLOCK_TYPE" => "catalog",
                    "PICTURE_HEIGHT" => "186",
                    "PICTURE_WIDTH" => "384",
                    "PRODUCT_PRICE_CODE" => $arPriceCodes,
                    "PROP_NAME" => "OFFERS",
                    "PROP_VALUE" => array(0=>"9",1=>"10",2=>"11",3=>"12",4=>"13",),
                    "SORT_PROPERTY_NAME" => "SORT",
                    "SORT_VALUE" => "ASC"
                ),
                false,
                Array(
                    'ACTIVE_COMPONENT' => 'Y'
                )
            );?>
        </div>
        <!-- /.hit -->

        <div class="green-box">
            <div class="green-box__wrap">
                <h2 class="h2 green-box__title">Покупайте и экономьте вместе с дисконтной картой</h2>
                <p class="green-box__text">Данная карта дает право на получение специальных условий при приобретении товаров в нашем магазине</p>
                <a href="/catalog/" class="btn-arrow green-box__btn-arrow">Купить продукты <svg class="btn-arrow__icon"><use xlink:href="#arrow-right-long"></use></svg></a>
            </div>
        </div>
        <!-- /.green-box -->

        <div class="articles">
            <div class="heading">
                <h3 class="h3 articles__title">Полезные статьи</h3>
                <a href="/news/" class="simple-btn">Посмотреть все</a>
            </div>
            <div class="articles__grid">
                <div class="articles__grid-item">
                    <div class="articles__grid-wrap">
                        <h5 class="h5 articles__grid-title">Домашние сыры</h5>
                        <div class="articles__grid-descript">Пробовали ли вы настоящую домашнюю брынзу? Ту, которую готовят по традиционной рецептуре на Кавказе и выдерживают в деревянных бочках?</div>
                    </div>
                    <a href="/news/domashnie-syry/" class="articles__more">Подробнее<svg class="articles__more-icon"><use xlink:href="#arrow-right-short"></use></svg></a>
                </div>
                <div class="articles__grid-item">
                    <div class="articles__grid-wrap">
                        <h5 class="h5 articles__grid-title">Натуральное молоко — как выбрать?</h5>
                        <div class="articles__grid-descript">Нам с самого детства твердили, что нет ничего полезнее молока. Правда, в современном мире этот совет не работает</div>
                    </div>
                    <a href="/news/kak-vibrat-naturalnoe-moloko/" class="articles__more">Подробнее<svg class="articles__more-icon"><use xlink:href="#arrow-right-short"></use></svg></a>
                </div>
                <div class="articles__grid-item">
                    <div class="articles__grid-wrap">
                        <h5 class="h5 articles__grid-title">Сезон пикников</h5>
                        <div class="articles__grid-descript">Сезон шашлыков в самом разгаре, впереди еще много жарких летних дней, а значит мы еще не раз будем придирчиво осматривать мясо  на прилавках магазинов</div>
                    </div>
                    <a href="/news/sezon-piknikov/" class="articles__more">Подробнее<svg class="articles__more-icon"><use xlink:href="#arrow-right-short"></use></svg></a>
                </div>
            </div>
            <!-- /.articles__grid -->
        </div>
        <!-- /.articles -->
    </div>
    <!-- /.container -->

<?php endif; ?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>