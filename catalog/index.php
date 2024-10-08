<?
//ini_set('display_errors', 1);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Купить полезные фермерские продукты из каталога, представленного в интернет-магазине натуральных продуктов. Интернет-магазин натуральных продуктов реализует продукцию по доступным ценам по всей Пензе. Доставка осуществляется в день заказа.");
$APPLICATION->SetPageProperty("keywords", "Интернет-магазин натуральных продуктов");
$APPLICATION->SetPageProperty("title", "Интернет-магазин натуральных продуктов в Пензе с доставкой по  город");
$APPLICATION->SetTitle("Каталог товаров");
?><?
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

// Получаем текущий URL
$currentUrl = $_SERVER['REQUEST_URI'];

// Проверяем, является ли текущая страница внутренней страницей каталога
$isInternalCatalogPage = strpos($currentUrl, '/catalog/') !== false;
$parsedUrl = parse_url($currentUrl);
$pathWithoutParams = strtok($parsedUrl['path'], '?');
$pathParts = explode('/', trim($pathWithoutParams, '/'));
$catalog = true;

if(count($pathParts) == 3){
    \Bitrix\Main\Loader::includeModule("dw.deluxe");

    $catalogIblockId = null;
    $arPriceCodes = array();

    $categoryId = false;
    $subCategoryId = false; // Добавляем переменную для подкатегории

// Получение текущего URL
    $url = $APPLICATION->GetCurPageParam();

    // get template settings
    $arTemplateSettings = DwSettings::getInstance()->getCurrentSettings();
    if (!empty($arTemplateSettings)) {
        $catalogIblockId = $arTemplateSettings["TEMPLATE_PRODUCT_IBLOCK_ID"];
        $arPriceCodes = explode(", ", $arTemplateSettings["TEMPLATE_PRICE_CODES"]);

        // Ищем совпадения с шаблоном URL
        if (count($pathParts) == 3) {
            $sectionCode = $pathParts[1];
            $subSectionCode = $pathParts[2];
            // Получаем ID категории по символьному коду
            $rsSection = CIBlockSection::GetList(array(), array("CODE" => $sectionCode, "IBLOCK_ID" => $catalogIblockId));
            if ($arSection = $rsSection->Fetch()) {
                $categoryId = $arSection["ID"];
                // Получаем ID подкатегории по символьному коду
                if($subSectionCode){
                    $rsSubSection = CIBlockSection::GetList(array(), array("CODE" => $subSectionCode, "IBLOCK_ID" => $catalogIblockId, "IBLOCK_SECTION_ID" => $categoryId));

                    $catalog = false;
                    if ($arSubSection = $rsSubSection->Fetch()) {
                        $subCategoryId = $arSubSection["ID"];
                        $catalog = true;
                    }
                }
            }
        }
    }
}

if($pathWithoutParams == '/catalog/'):
    // Ваш код для шаблона Dresscode V1 2024 при условии параметра в URL dev=1
    echo '<!-- Dresscode V1 2024 /--!>'; ?>

    <div class="catalog-page">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="/">Главная страница</a></li>
                <li>Каталог продукции</li>
            </ul>


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
            <div class="green-box">
                <div class="green-box__wrap">
                    <h2 class="h2 green-box__title">Покупайте и экономьте вместе с дисконтной картой</h2>
                    <p class="green-box__text">Данная карта дает право на получение специальных условий при приобретении товаров в нашем магазине</p>
                    <a href="/catalog/" class="btn-arrow green-box__btn-arrow">Купить продукты <svg class="btn-arrow__icon"><use xlink:href="#arrow-right-long"></use></svg></a>
                </div>
            </div>
            <!-- /.green-box -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.catalog -->
    <script>
        $(document).ready(function () {
            function updateCartButton(productId) {
                var $button = $('.addCart[data-id="' + productId + '"]');
                $button.addClass('added').addClass('added').attr('href', '/personal/cart/');

                // Восстанавливаем иконку корзины (замените на свою иконку)
                var iconSvg = '<svg><use xlink:href="#basket"></use></svg>';
                $button.prepend(iconSvg);
            }
           /* setTimeout(function (){
                $('.basket-btn').each(function (){
                    $(this).html('<svg><use xlink:href="#basket"></use></svg>');
                });
            }, 120);*/

            $('.addWishlist').click(function (){
                var th = $(this);
                th.hide();
                setTimeout(function (){
                    th.html('<svg class="mycard__heartBtn heartBtn is-active"><use xlink:href="#heart"></use></svg>');
                    th.show();
                }, 200);
            });
            /*$('.addCartContainer').click(function (){
                var th = $(this);
                th.hide();
                setTimeout(function (){
                    var th = $(this);
                    updateCartButton(th.attr('data-id'));
                }, 200);
            });*/


        });
    </script>
    <?php
    elseif ($catalog && $isInternalCatalogPage && $pathWithoutParams <> '/catalog/' && (count($pathParts) == 2 || count($pathParts) == 3)):

        \Bitrix\Main\Loader::includeModule("dw.deluxe");

        $catalogIblockId = null;
        $arPriceCodes = array();

        $categoryId = false;
        $subCategoryId = false; // Добавляем переменную для подкатегории

// Получение текущего URL
        $url = $APPLICATION->GetCurPageParam();

        // get template settings
        $arTemplateSettings = DwSettings::getInstance()->getCurrentSettings();
        if (!empty($arTemplateSettings)) {
            $catalogIblockId = $arTemplateSettings["TEMPLATE_PRODUCT_IBLOCK_ID"];
            $arPriceCodes = explode(", ", $arTemplateSettings["TEMPLATE_PRICE_CODES"]);

            // Ищем совпадения с шаблоном URL
            if (preg_match('#/catalog/([^/]+)/(?:([^/]+)/)?#u', $url, $matches)) {
                $sectionCode = $matches[1];
                $subSectionCode = isset($matches[2]) ? $matches[2] : null;
                // Получаем ID категории по символьному коду
                $rsSection = CIBlockSection::GetList(array(), array("CODE" => $sectionCode, "IBLOCK_ID" => $catalogIblockId));
                if ($arSection = $rsSection->Fetch()) {
                    $categoryId = $arSection["ID"];
                    // Получаем ID подкатегории по символьному коду
                    if($subSectionCode){
                        $rsSubSection = CIBlockSection::GetList(array(), array("CODE" => $subSectionCode, "IBLOCK_ID" => $catalogIblockId, "IBLOCK_SECTION_ID" => $categoryId));

                        if ($arSubSection = $rsSubSection->Fetch()) {
                            $subCategoryId = $arSubSection["ID"];
                        }
                    }
                }
            }
        }
        $title = $subCategoryId ? $arSubSection['NAME'] : $arSection['NAME'];


        ?>
        <div class="category">
            <div class="container category__container">
                <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", ".default", Array(
                    "START_FROM" => "0",
                    "PATH" => "",
                    "SITE_ID" => "-",
                ),
                    false
                );?>
                <h1 class="h2 category__title"><?=$title?></h1>

                <!-- /.filter-row -->
                <?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", Array(
                    "AREA_FILE_SHOW" => "sect",
                    "AREA_FILE_SUFFIX" => "topSubCategory",
                    "AREA_FILE_RECURSIVE" => "Y",
                    "EDIT_TEMPLATE" => ""
                ),
                    false
                );?>
                <div class="category-header">
                    <div class="category-header__nav">

                    </div>
                </div>


                <div class="category-grid">
                    <?php
                    /*
                    <div class="category-grid__filter">
                        <?$APPLICATION->ShowViewContent("smartFilter");?>
*/
                    ?>
                    </div>
                    <!-- /.category-grid__filter -->
                    <div class="category-grid__products">
                        <? $APPLICATION->IncludeComponent(
                            "dresscode:catalog",
                            ".default",
                            array(
                                "ACTION_VARIABLE" => "action",
                                "ADD_ELEMENT_CHAIN" => "Y",
                                "ADD_PICT_PROP" => "MORE_PHOTO",
                                "ADD_PROPERTIES_TO_BASKET" => "Y",
                                "ADD_SECTIONS_CHAIN" => "Y",
                                "ADD_SECTION_CHAIN" => "Y",
                                "ADVANTAGES_IN_DETAIL_IBLOCK_ID" => "15",
                                "ADVANTAGES_IN_DETAIL_IBLOCK_TYPE" => "catalog",
                                "AJAX_MODE" => "N",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "Y",
                                "ALSO_BUY_ELEMENT_COUNT" => "4",
                                "ALSO_BUY_MIN_BUYES" => "1",
                                "BASKET_URL" => "/personal/cart/",
                                "BIG_DATA_RCM_TYPE" => "any",
                                "CACHE_FILTER" => "N",
                                "CACHE_GROUPS" => "Y",
                                "CACHE_TIME" => "36000000",
                                "CACHE_TYPE" => "N",
                                "CATALOG_HIDE_TAGS_ON_MOBILE" => "N",
                                "CATALOG_MAX_TAGS" => "30",
                                "CATALOG_MAX_VISIBLE_TAGS_DESKTOP" => "10",
                                "CATALOG_MAX_VISIBLE_TAGS_MOBILE" => "6",
                                "CATALOG_SHOW_TAGS" => "Y",
                                "CATALOG_TAGS_DETAIL_LINK_VARIANT" => "SECTION",
                                "CATALOG_TAGS_DETAIL_SECTION_MAX_DELPH_LEVEL" => "5",
                                "CATALOG_TAGS_MAX_DEPTH_LEVEL" => "5",
                                "CATALOG_TAGS_SORT_FIELD" => "NAME",
                                "CATALOG_TAGS_SORT_TYPE" => "DESC",
                                "CATALOG_TAGS_USE_IBLOCK_MAIN_SECTION" => "N",
                                "CHEAPER_FORM_ID" => "1",
                                "COMMON_ADD_TO_BASKET_ACTION" => "ADD",
                                "COMMON_SHOW_CLOSE_POPUP" => "N",
                                "COMPATIBLE_MODE" => "Y",
                                "CONVERT_CURRENCY" => "Y",
                                "CURRENCY_ID" => "RUB",
                                "DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
                                "DETAIL_ADD_TO_BASKET_ACTION" => array(
                                    0 => "BUY",
                                ),
                                "DETAIL_ALLOW_ADD_REVIEW_NOT_REGISTER" => "Y",
                                "DETAIL_BACKGROUND_IMAGE" => "-",
                                "DETAIL_BLOG_EMAIL_NOTIFY" => "N",
                                "DETAIL_BLOG_URL" => "catalog_comments",
                                "DETAIL_BLOG_USE" => "Y",
                                "DETAIL_BRAND_PROP_CODE" => array(
                                    0 => "",
                                    1 => "BRAND_REF",
                                    2 => "",
                                ),
                                "DETAIL_BRAND_USE" => "Y",
                                "DETAIL_BROWSER_TITLE" => "-",
                                "DETAIL_CALCULATE_DELIVERY" => "Y",
                                "DETAIL_CALCULATE_DELIVERY_GROUP_BUTTONS" => array(
                                ),
                                "DETAIL_CALCULATE_DELIVERY_SHOW_IMAGES" => "Y",
                                "DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
                                "DETAIL_COUNT_TOP_PROPERTIES" => "7",
                                "DETAIL_DETAIL_PICTURE_MODE" => "IMG",
                                "DETAIL_DISABLE_PRINT_DIMENSIONS" => "N",
                                "DETAIL_DISABLE_PRINT_WEIGHT" => "N",
                                "DETAIL_DISPLAY_NAME" => "Y",
                                "DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
                                "DETAIL_FB_APP_ID" => "",
                                "DETAIL_FB_USE" => "Y",
                                "DETAIL_META_DESCRIPTION" => "-",
                                "DETAIL_META_KEYWORDS" => "-",
                                "DETAIL_OFFERS_FIELD_CODE" => array(
                                    0 => "",
                                    1 => "",
                                ),
                                "DETAIL_OFFERS_PROPERTY_CODE" => array(
                                    0 => "",
                                    1 => "ARTNUMBER",
                                    2 => "SIZES_SHOES",
                                    3 => "SIZES_CLOTHES",
                                    4 => "",
                                ),
                                "DETAIL_PROPERTY_CODE" => array(
                                    0 => "OFFERS",
                                    1 => "ATT_BRAND",
                                    2 => "PRODUCT_DAY",
                                    3 => "COLOR",
                                    4 => "TIMER_DATE",
                                    5 => "TIMER_LOOP",
                                    6 => "ZOOM2",
                                    7 => "BATTERY_LIFE",
                                    8 => "SWITCH",
                                    9 => "GRAF_PROC",
                                    10 => "LENGTH_OF_CORD",
                                    11 => "DISPLAY",
                                    12 => "LOADING_LAUNDRY",
                                    13 => "FULL_HD_VIDEO_RECORD",
                                    14 => "INTERFACE",
                                    15 => "COMPRESSORS",
                                    16 => "Number_of_Outlets",
                                    17 => "MAX_RESOLUTION_VIDEO",
                                    18 => "MAX_BUS_FREQUENCY",
                                    19 => "MAX_RESOLUTION",
                                    20 => "FREEZER",
                                    21 => "POWER_SUB",
                                    22 => "POWER",
                                    23 => "HARD_DRIVE_SPACE",
                                    24 => "MEMORY",
                                    25 => "OS",
                                    26 => "ZOOM",
                                    27 => "PAPER_FEED",
                                    28 => "SUPPORTED_STANDARTS",
                                    29 => "VIDEO_FORMAT",
                                    30 => "SUPPORT_2SIM",
                                    31 => "MP3",
                                    32 => "ETHERNET_PORTS",
                                    33 => "MATRIX",
                                    34 => "CAMERA",
                                    35 => "PHOTOSENSITIVITY",
                                    36 => "DEFROST",
                                    37 => "SPEED_WIFI",
                                    38 => "SPIN_SPEED",
                                    39 => "PRINT_SPEED",
                                    40 => "SOCKET",
                                    41 => "IMAGE_STABILIZER",
                                    42 => "GSM",
                                    43 => "SIM",
                                    44 => "TYPE",
                                    45 => "MEMORY_CARD",
                                    46 => "TYPE_BODY",
                                    47 => "TYPE_MOUSE",
                                    48 => "TYPE_PRINT",
                                    49 => "CONNECTION",
                                    50 => "TYPE_OF_CONTROL",
                                    51 => "TYPE_DISPLAY",
                                    52 => "TYPE2",
                                    53 => "REFRESH_RATE",
                                    54 => "RANGE",
                                    55 => "AMOUNT_MEMORY",
                                    56 => "MEMORY_CAPACITY",
                                    57 => "VIDEO_BRAND",
                                    58 => "DIAGONAL",
                                    59 => "RESOLUTION",
                                    60 => "TOUCH",
                                    61 => "CORES",
                                    62 => "LINE_PROC",
                                    63 => "PROCESSOR",
                                    64 => "CLOCK_SPEED",
                                    65 => "TYPE_PROCESSOR",
                                    66 => "PROCESSOR_SPEED",
                                    67 => "HARD_DRIVE",
                                    68 => "HARD_DRIVE_TYPE",
                                    69 => "Number_of_memory_slots",
                                    70 => "MAXIMUM_MEMORY_FREQUENCY",
                                    71 => "TYPE_MEMORY",
                                    72 => "BLUETOOTH",
                                    73 => "FM",
                                    74 => "GPS",
                                    75 => "HDMI",
                                    76 => "SMART_TV",
                                    77 => "USB",
                                    78 => "WIFI",
                                    79 => "FLASH",
                                    80 => "ROTARY_DISPLAY",
                                    81 => "SUPPORT_3D",
                                    82 => "SUPPORT_3G",
                                    83 => "WITH_COOLER",
                                    84 => "FINGERPRINT",
                                    85 => "VOZRAST",
                                    86 => "ENERGOPOTREB",
                                    87 => "OBOROTY",
                                    88 => "MINI_BAR",
                                    89 => "SIZES_PRODUCT",
                                    90 => "DISPLAY_TYPE",
                                    91 => "TIP_ELEMENTOV_PITANIA",
                                    92 => "BELKI",
                                    93 => "ZHIRY",
                                    94 => "CALORIES",
                                    95 => "COLLECTION",
                                    96 => "UGLEVODY",
                                    97 => "TOTAL_OUTPUT_POWER",
                                    98 => "VID_ZASTECHKI",
                                    99 => "VID_SUMKI",
                                    100 => "PROFILE",
                                    101 => "VYSOTA_RUCHEK",
                                    102 => "GAS_CONTROL",
                                    103 => "WARRANTY",
                                    104 => "GRILL",
                                    105 => "MORE_PROPERTIES",
                                    106 => "GENRE",
                                    107 => "OTSEKOV",
                                    108 => "CONVECTION",
                                    109 => "MATERIAL",
                                    110 => "INTAKE_POWER",
                                    111 => "NAZNAZHENIE",
                                    112 => "BULK",
                                    113 => "PODKLADKA",
                                    114 => "SURFACE_COATING",
                                    115 => "brand_tyres",
                                    116 => "SEASON",
                                    117 => "SEASONOST",
                                    118 => "DUST_COLLECTION",
                                    119 => "REF",
                                    120 => "COUNTRY_BRAND",
                                    121 => "DRYING",
                                    122 => "REMOVABLE_TOP_COVER",
                                    123 => "TEST_TEST",
                                    124 => "CONTROL",
                                    125 => "FINE_FILTER",
                                    126 => "FORM_FAKTOR",
                                    127 => "SKU_COLOR",
                                    128 => "CML2_ARTICLE",
                                    129 => "DELIVERY",
                                    130 => "PICKUP",
                                    131 => "USER_ID",
                                    132 => "BLOG_POST_ID",
                                    133 => "VIDEO",
                                    134 => "BLOG_COMMENTS_CNT",
                                    135 => "VOTE_COUNT",
                                    136 => "SHOW_MENU",
                                    137 => "SIMILAR_PRODUCT",
                                    138 => "RATING",
                                    139 => "RELATED_PRODUCT",
                                    140 => "VOTE_SUM",
                                    141 => "MAXIMUM_PRICE",
                                    142 => "MINIMUM_PRICE",
                                    143 => "HTML",
                                    144 => "199",
                                    145 => "ATT_BRAND2",
                                    146 => "NEWPRODUCT",
                                    147 => "MANUFACTURER",
                                    148 => "",
                                ),
                                "DETAIL_SET_CANONICAL_URL" => "Y",
                                "DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
                                "DETAIL_SHOW_BASIS_PRICE" => "Y",
                                "DETAIL_SHOW_MAX_QUANTITY" => "N",
                                "DETAIL_STRICT_SECTION_CHECK" => "Y",
                                "DETAIL_USE_COMMENTS" => "Y",
                                "DETAIL_USE_VOTE_RATING" => "Y",
                                "DETAIL_VK_USE" => "N",
                                "DETAIL_VOTE_DISPLAY_AS_RATING" => "rating",
                                "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                                "DISPLAY_BOTTOM_PAGER" => "Y",
                                "DISPLAY_CHEAPER" => "Y",
                                "DISPLAY_OFFERS_TABLE" => "Y",
                                "DISPLAY_SUBSCRIBE" => "Y",
                                "DISPLAY_TOP_PAGER" => "N",
                                "ELEMENT_SORT_FIELD" => "sort",
                                "ELEMENT_SORT_FIELD2" => "sort",
                                "ELEMENT_SORT_ORDER" => "asc",
                                "ELEMENT_SORT_ORDER2" => "asc",
                                "FIELDS" => array(
                                    0 => "TITLE",
                                    1 => "ADDRESS",
                                    2 => "DESCRIPTION",
                                    3 => "PHONE",
                                    4 => "SCHEDULE",
                                    5 => "EMAIL",
                                    6 => "IMAGE_ID",
                                    7 => "COORDINATES",
                                    8 => "",
                                ),
                                "FILE_404" => "",
                                "FILTER_FIELD_CODE" => array(
                                    0 => "SORT",
                                    1 => "",
                                ),
                                "FILTER_INSTANT_RELOAD" => "Y",
                                "FILTER_NAME" => "arrFilter",
                                "FILTER_OFFERS_FIELD_CODE" => array(
                                    0 => "",
                                    1 => "",
                                ),
                                "FILTER_OFFERS_PROPERTY_CODE" => array(
                                    0 => "",
                                    1 => "",
                                ),
                                "FILTER_PRICE_CODE" => array(
                                    0 => "BASE",
                                ),
                                "FILTER_PROPERTY_CODE" => array(
                                    0 => "",
                                    1 => "",
                                ),
                                "FILTER_VIEW_MODE" => "VERTICAL",
                                "FORUM_ID" => "",
                                "GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
                                "GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
                                "GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "12",
                                "GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
                                "GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
                                "GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
                                "GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "12",
                                "GIFTS_MESS_BTN_BUY" => "Выбрать",
                                "GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
                                "GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
                                "GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "12",
                                "GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
                                "GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
                                "GIFTS_SHOW_IMAGE" => "Y",
                                "GIFTS_SHOW_NAME" => "Y",
                                "GIFTS_SHOW_OLD_PRICE" => "Y",
                                "HIDE_AVAILABLE_TAB" => "N",
                                "HIDE_DELIVERY_CALC" => "N",
                                "HIDE_MEASURES" => "N",
                                "HIDE_NOT_AVAILABLE" => "N",
                                "HIDE_NOT_AVAILABLE_OFFERS" => "Y",
                                "IBLOCK_ID" => $catalogIblockId,
                                "IBLOCK_TYPE" => "catalog",
                                "INCLUDE_SUBSECTIONS" => "Y",
                                "LABEL_PROP" => "-",
                                "LAZY_LOAD_PICTURES" => "N",
                                "LINE_ELEMENT_COUNT" => "3",
                                "LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
                                "LINK_IBLOCK_ID" => "",
                                "LINK_IBLOCK_TYPE" => "",
                                "LINK_PROPERTY_SID" => "",
                                "LIST_BROWSER_TITLE" => "-",
                                "LIST_META_DESCRIPTION" => "-",
                                "LIST_META_KEYWORDS" => "-",
                                "LIST_OFFERS_FIELD_CODE" => array(
                                    0 => "",
                                    1 => "",
                                ),
                                "LIST_OFFERS_LIMIT" => "1",
                                "LIST_OFFERS_PROPERTY_CODE" => array(
                                    0 => "",
                                    1 => "SIZES_SHOES",
                                    2 => "SIZES_CLOTHES",
                                    3 => "ARTNUMBER",
                                    4 => "",
                                ),
                                "LIST_PROPERTY_CODE" => array(
                                    0 => "OFFERS",
                                    1 => "ATT_BRAND",
                                    2 => "PRODUCT_DAY",
                                    3 => "COLOR",
                                    4 => "TIMER_DATE",
                                    5 => "TIMER_LOOP",
                                    6 => "ZOOM2",
                                    7 => "BATTERY_LIFE",
                                    8 => "SWITCH",
                                    9 => "GRAF_PROC",
                                    10 => "LENGTH_OF_CORD",
                                    11 => "DISPLAY",
                                    12 => "LOADING_LAUNDRY",
                                    13 => "FULL_HD_VIDEO_RECORD",
                                    14 => "INTERFACE",
                                    15 => "COMPRESSORS",
                                    16 => "Number_of_Outlets",
                                    17 => "MAX_RESOLUTION_VIDEO",
                                    18 => "MAX_BUS_FREQUENCY",
                                    19 => "MAX_RESOLUTION",
                                    20 => "FREEZER",
                                    21 => "POWER_SUB",
                                    22 => "POWER",
                                    23 => "HARD_DRIVE_SPACE",
                                    24 => "MEMORY",
                                    25 => "OS",
                                    26 => "ZOOM",
                                    27 => "PAPER_FEED",
                                    28 => "SUPPORTED_STANDARTS",
                                    29 => "VIDEO_FORMAT",
                                    30 => "SUPPORT_2SIM",
                                    31 => "MP3",
                                    32 => "ETHERNET_PORTS",
                                    33 => "MATRIX",
                                    34 => "CAMERA",
                                    35 => "PHOTOSENSITIVITY",
                                    36 => "DEFROST",
                                    37 => "SPEED_WIFI",
                                    38 => "SPIN_SPEED",
                                    39 => "PRINT_SPEED",
                                    40 => "SOCKET",
                                    41 => "IMAGE_STABILIZER",
                                    42 => "GSM",
                                    43 => "SIM",
                                    44 => "TYPE",
                                    45 => "MEMORY_CARD",
                                    46 => "TYPE_BODY",
                                    47 => "TYPE_MOUSE",
                                    48 => "TYPE_PRINT",
                                    49 => "CONNECTION",
                                    50 => "TYPE_OF_CONTROL",
                                    51 => "TYPE_DISPLAY",
                                    52 => "TYPE2",
                                    53 => "REFRESH_RATE",
                                    54 => "RANGE",
                                    55 => "AMOUNT_MEMORY",
                                    56 => "MEMORY_CAPACITY",
                                    57 => "VIDEO_BRAND",
                                    58 => "DIAGONAL",
                                    59 => "RESOLUTION",
                                    60 => "TOUCH",
                                    61 => "CORES",
                                    62 => "LINE_PROC",
                                    63 => "PROCESSOR",
                                    64 => "CLOCK_SPEED",
                                    65 => "TYPE_PROCESSOR",
                                    66 => "PROCESSOR_SPEED",
                                    67 => "HARD_DRIVE",
                                    68 => "HARD_DRIVE_TYPE",
                                    69 => "Number_of_memory_slots",
                                    70 => "MAXIMUM_MEMORY_FREQUENCY",
                                    71 => "TYPE_MEMORY",
                                    72 => "BLUETOOTH",
                                    73 => "FM",
                                    74 => "GPS",
                                    75 => "HDMI",
                                    76 => "SMART_TV",
                                    77 => "USB",
                                    78 => "WIFI",
                                    79 => "FLASH",
                                    80 => "ROTARY_DISPLAY",
                                    81 => "SUPPORT_3D",
                                    82 => "SUPPORT_3G",
                                    83 => "WITH_COOLER",
                                    84 => "FINGERPRINT",
                                    85 => "VOZRAST",
                                    86 => "ENERGOPOTREB",
                                    87 => "OBOROTY",
                                    88 => "MINI_BAR",
                                    89 => "SIZES_PRODUCT",
                                    90 => "DISPLAY_TYPE",
                                    91 => "TIP_ELEMENTOV_PITANIA",
                                    92 => "BELKI",
                                    93 => "ZHIRY",
                                    94 => "CALORIES",
                                    95 => "COLLECTION",
                                    96 => "UGLEVODY",
                                    97 => "TOTAL_OUTPUT_POWER",
                                    98 => "VID_ZASTECHKI",
                                    99 => "VID_SUMKI",
                                    100 => "PROFILE",
                                    101 => "VYSOTA_RUCHEK",
                                    102 => "GAS_CONTROL",
                                    103 => "WARRANTY",
                                    104 => "GRILL",
                                    105 => "MORE_PROPERTIES",
                                    106 => "GENRE",
                                    107 => "OTSEKOV",
                                    108 => "CONVECTION",
                                    109 => "MATERIAL",
                                    110 => "INTAKE_POWER",
                                    111 => "NAZNAZHENIE",
                                    112 => "BULK",
                                    113 => "PODKLADKA",
                                    114 => "SURFACE_COATING",
                                    115 => "brand_tyres",
                                    116 => "SEASON",
                                    117 => "SEASONOST",
                                    118 => "DUST_COLLECTION",
                                    119 => "REF",
                                    120 => "COUNTRY_BRAND",
                                    121 => "DRYING",
                                    122 => "REMOVABLE_TOP_COVER",
                                    123 => "TEST_TEST",
                                    124 => "CONTROL",
                                    125 => "FINE_FILTER",
                                    126 => "FORM_FAKTOR",
                                    127 => "SKU_COLOR",
                                    128 => "CML2_ARTICLE",
                                    129 => "DELIVERY",
                                    130 => "PICKUP",
                                    131 => "USER_ID",
                                    132 => "BLOG_POST_ID",
                                    133 => "VIDEO",
                                    134 => "BLOG_COMMENTS_CNT",
                                    135 => "VOTE_COUNT",
                                    136 => "SHOW_MENU",
                                    137 => "SIMILAR_PRODUCT",
                                    138 => "RATING",
                                    139 => "RELATED_PRODUCT",
                                    140 => "VOTE_SUM",
                                    141 => "MAXIMUM_PRICE",
                                    142 => "MINIMUM_PRICE",
                                    143 => "HTML",
                                    144 => "199",
                                    145 => "ATT_BRAND2",
                                    146 => "NEWPRODUCT",
                                    147 => "SALELEADER",
                                    148 => "SPECIALOFFER",
                                    149 => "",
                                ),
                                "MAIN_TITLE" => "Наличие на складах",
                                "MESSAGES_PER_PAGE" => "10",
                                "MESSAGE_404" => "",
                                "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                                "MESS_BTN_BUY" => "Купить",
                                "MESS_BTN_COMPARE" => "Сравнение",
                                "MESS_BTN_DETAIL" => "Подробнее",
                                "MESS_NOT_AVAILABLE" => "Нет в наличии",
                                "MIN_AMOUNT" => "10",
                                "OFFERS_CART_PROPERTIES" => array(
                                    0 => "COLOR",
                                ),
                                "OFFERS_SORT_FIELD" => "",
                                "OFFERS_SORT_FIELD2" => "",
                                "OFFERS_SORT_ORDER" => "",
                                "OFFERS_SORT_ORDER2" => "",
                                "OFFERS_TABLE_DISPLAY_PICTURE_COLUMN" => "Y",
                                "OFFERS_TABLE_PAGER_COUNT" => "10",
                                "OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
                                "OFFER_TREE_PROPS" => array(
                                    0 => "COLOR",
                                    1 => "SIZE_CLOTHES",
                                    2 => "MATERIAL",
                                ),
                                "PAGER_BASE_LINK" => "",
                                "PAGER_BASE_LINK_ENABLE" => "Y",
                                "PAGER_DESC_NUMBERING" => "N",
                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
                                "PAGER_PARAMS_NAME" => "arrPager",
                                "PAGER_SHOW_ALL" => "N",
                                "PAGER_SHOW_ALWAYS" => "N",
                                "PAGER_TEMPLATE" => "round",
                                "PAGER_TITLE" => "Товары",
                                "PAGE_ELEMENT_COUNT" => "30",
                                "PARTIAL_PRODUCT_PROPERTIES" => "N",
                                "PATH_TO_SMILE" => "/bitrix//dist/images/forum/smile/",
                                "PRICE_CODE" => array(
                                ),
                                "PRICE_VAT_INCLUDE" => "Y",
                                "PRICE_VAT_SHOW_VALUE" => "N",
                                "PRODUCT_DISPLAY_MODE" => "Y",
                                "PRODUCT_ID_VARIABLE" => "id",
                                "PRODUCT_PROPERTIES" => "",
                                "PRODUCT_PROPS_VARIABLE" => "prop",
                                "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                                "QUANTITY_FLOAT" => "N",
                                "REVIEW_AJAX_POST" => "Y",
                                "REVIEW_IBLOCK_ID" => "12",
                                "REVIEW_IBLOCK_TYPE" => "service",
                                "SALE_IBLOCK_ID" => "6",
                                "SALE_IBLOCK_TYPE" => "info",
                                "SECTIONS_SHOW_PARENT_NAME" => "N",
                                "SECTIONS_VIEW_MODE" => "TEXT",
                                "SECTION_ADD_TO_BASKET_ACTION" => "ADD",
                                "SECTION_BACKGROUND_IMAGE" => "-",
                                "SECTION_COUNT_ELEMENTS" => "Y",
                                "SECTION_ID_VARIABLE" => "SECTION_ID",
                                "SECTION_TOP_DEPTH" => "4",
                                "SEF_FOLDER" => "/catalog/",
                                "SEF_MODE" => "Y",
                                "SERVICES_IBLOCK_ID" => "11",
                                "SERVICES_IBLOCK_TYPE" => "info",
                                "SET_LAST_MODIFIED" => "N",
                                "SET_STATUS_404" => "Y",
                                "SET_TITLE" => "Y",
                                "SHOW_404" => "Y",
                                "SHOW_ADVANTAGES_IN_DETAIL" => "Y",
                                "SHOW_AVAILABLE_TAB" => "Y",
                                "SHOW_DEACTIVATED" => "N",
                                "SHOW_DISCOUNT_PERCENT" => "Y",
                                "SHOW_EMPTY_STORE" => "Y",
                                "SHOW_GENERAL_STORE_INFORMATION" => "N",
                                "SHOW_LINK_TO_FORUM" => "N",
                                "SHOW_MIDDLE_SLIDER" => "N",
                                "SHOW_OLD_PRICE" => "Y",
                                "SHOW_PRICE_COUNT" => "1",
                                "SHOW_SECTION_BANNER" => "Y",
                                "SHOW_SERVICES" => "Y",
                                "SHOW_TOP_ELEMENTS" => "N",
                                "STORES" => array(
                                    0 => "1",
                                ),
                                "STORE_PATH" => "/store/#store_id#",
                                "SUBSCRIBE_RUBRIC_ID" => "1",
                                "TEMPLATE_THEME" => "site",
                                "TOP_ADD_TO_BASKET_ACTION" => "ADD",
                                "URL_TEMPLATES_READ" => "",
                                "USER_CONSENT" => "N",
                                "USER_CONSENT_ID" => "0",
                                "USER_CONSENT_IS_CHECKED" => "Y",
                                "USER_CONSENT_IS_LOADED" => "N",
                                "USER_FIELDS" => array(
                                    0 => "",
                                    1 => "",
                                ),
                                "USE_ALSO_BUY" => "N",
                                "USE_BIG_DATA" => "Y",
                                "USE_CAPTCHA" => "Y",
                                "USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
                                "USE_COMPARE" => "N",
                                "USE_ELEMENT_COUNTER" => "Y",
                                "USE_FILTER" => "Y",
                                "USE_GIFTS_DETAIL" => "Y",
                                "USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
                                "USE_GIFTS_SECTION" => "Y",
                                "USE_MAIN_ELEMENT_SECTION" => "Y",
                                "USE_MIN_AMOUNT" => "N",
                                "USE_PRICE_COUNT" => "N",
                                "USE_PRODUCT_QUANTITY" => "Y",
                                "USE_REVIEW" => "Y",
                                "USE_SALE_BESTSELLERS" => "Y",
                                "USE_STORE" => "N",
                                "USE_STORE_PHONE" => "Y",
                                "USE_STORE_SCHEDULE" => "Y",
                                "COMPONENT_TEMPLATE" => ".default",
                                "SEF_URL_TEMPLATES" => array(
                                    "sections" => "",
                                    "section" => "#SECTION_CODE_PATH#/",
                                    "element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
                                    "compare" => "compare/",
                                    "smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
                                )
                            ),
                            false
                        );?>
                    </div>
                    <!-- /.category-grid__products -->
                </div>
                <!-- /.category-grid -->

                <div class="green-box container">
                    <div class="green-box__wrap">
                        <h2 class="h2 green-box__title">Покупайте и экономьте вместе с дисконтной картой</h2>
                        <p class="green-box__text">Данная карта дает право на получение специальных условий при приобретении товаров в нашем магазине</p>
                        <a href="/catalog/" class="btn-arrow green-box__btn-arrow">Купить продукты <svg class="btn-arrow__icon"><use xlink:href="#arrow-right-long"></use></svg></a>
                    </div>
                </div>
                <!-- /.green-box -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.category -->

    <?php
else:
    \Bitrix\Main\Loader::includeModule("dw.deluxe");

    $catalogIblockId = null;
    $arPriceCodes = array();

    $categoryId = false;
    $subCategoryId = false;
    $skuCode = false; // Добавляем переменную для SKU

// Получение текущего URL
    $url = $APPLICATION->GetCurPageParam();

// get template settings
    $arTemplateSettings = DwSettings::getInstance()->getCurrentSettings();
    if (!empty($arTemplateSettings)) {
        $catalogIblockId = $arTemplateSettings["TEMPLATE_PRODUCT_IBLOCK_ID"];
        $arPriceCodes = explode(", ", $arTemplateSettings["TEMPLATE_PRICE_CODES"]);

        // Ищем совпадения с шаблоном URL
        if (preg_match('#/catalog/([^/]+)/(?:([^/]+)/)?(?:([^/]+)/)?#u', $url, $matches)) {
            $sectionCode = $matches[1];
            $subSectionCode = isset($matches[2]) ? $matches[2] : null;
            $skuCode = isset($matches[3]) ? $matches[3] : null;

            // Получаем ID категории по символьному коду
            $rsSection = CIBlockSection::GetList(array(), array("CODE" => $sectionCode, "IBLOCK_ID" => $catalogIblockId));
            if ($arSection = $rsSection->Fetch()) {
                $categoryId = $arSection["ID"];

                // Получаем ID подкатегории по символьному коду
                if ($subSectionCode) {
                    $rsSubSection = CIBlockSection::GetList(array(), array("CODE" => $subSectionCode, "IBLOCK_ID" => $catalogIblockId, "IBLOCK_SECTION_ID" => $categoryId));
                    if ($arSubSection = $rsSubSection->Fetch()) {
                        $subCategoryId = $arSubSection["ID"];
                    }
                }
            }
        }
    }

// Дополнительно, если есть SKU, получаем информацию о товаре
    if ($skuCode) {
        $rsProduct = CIBlockElement::GetList(array(), array("IBLOCK_ID" => $catalogIblockId, "IBLOCK_SECTION_ID" => $subCategoryId, "CODE" => $skuCode), false, false, array("ID", "NAME"));
        if ($arProduct = $rsProduct->Fetch()) {
            $title = $arProduct['NAME'];
        }
    } else {
        $title = $subCategoryId ? $arSubSection['NAME'] : $arSection['NAME'];
    }

    ?>
    <div class="myproduct">
        <div class="myproduct__container container">
            <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", ".default", Array(
                "START_FROM" => "0",
                "PATH" => "",
                "SITE_ID" => "-",
            ),
                false
            );?>
            <?$APPLICATION->ShowViewContent("no_main_container");?>

            <?php
            $APPLICATION->IncludeComponent(
                "dresscode:catalog",
                ".default",
                array(
                    "ACTION_VARIABLE" => "action",
                    "ADD_ELEMENT_CHAIN" => "Y",
                    "ADD_PICT_PROP" => "MORE_PHOTO",
                    "ADD_PROPERTIES_TO_BASKET" => "Y",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "ADD_SECTION_CHAIN" => "Y",
                    "ADVANTAGES_IN_DETAIL_IBLOCK_ID" => "15",
                    "ADVANTAGES_IN_DETAIL_IBLOCK_TYPE" => "catalog",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "ALSO_BUY_ELEMENT_COUNT" => "4",
                    "ALSO_BUY_MIN_BUYES" => "1",
                    "BASKET_URL" => "/personal/cart/",
                    "BIG_DATA_RCM_TYPE" => "any",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "N",
                    "CATALOG_HIDE_TAGS_ON_MOBILE" => "N",
                    "CATALOG_MAX_TAGS" => "30",
                    "CATALOG_MAX_VISIBLE_TAGS_DESKTOP" => "10",
                    "CATALOG_MAX_VISIBLE_TAGS_MOBILE" => "6",
                    "CATALOG_SHOW_TAGS" => "Y",
                    "CATALOG_TAGS_DETAIL_LINK_VARIANT" => "SECTION",
                    "CATALOG_TAGS_DETAIL_SECTION_MAX_DELPH_LEVEL" => "5",
                    "CATALOG_TAGS_MAX_DEPTH_LEVEL" => "5",
                    "CATALOG_TAGS_SORT_FIELD" => "NAME",
                    "CATALOG_TAGS_SORT_TYPE" => "DESC",
                    "CATALOG_TAGS_USE_IBLOCK_MAIN_SECTION" => "N",
                    "CHEAPER_FORM_ID" => "1",
                    "COMMON_ADD_TO_BASKET_ACTION" => "ADD",
                    "COMMON_SHOW_CLOSE_POPUP" => "N",
                    "COMPATIBLE_MODE" => "Y",
                    "CONVERT_CURRENCY" => "Y",
                    "CURRENCY_ID" => "RUB",
                    "DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
                    "DETAIL_ADD_TO_BASKET_ACTION" => array(
                        0 => "BUY",
                    ),
                    "DETAIL_ALLOW_ADD_REVIEW_NOT_REGISTER" => "Y",
                    "DETAIL_BACKGROUND_IMAGE" => "-",
                    "DETAIL_BLOG_EMAIL_NOTIFY" => "N",
                    "DETAIL_BLOG_URL" => "catalog_comments",
                    "DETAIL_BLOG_USE" => "Y",
                    "DETAIL_BRAND_PROP_CODE" => array(
                        0 => "",
                        1 => "BRAND_REF",
                        2 => "",
                    ),
                    "DETAIL_BRAND_USE" => "Y",
                    "DETAIL_BROWSER_TITLE" => "-",
                    "DETAIL_CALCULATE_DELIVERY" => "Y",
                    "DETAIL_CALCULATE_DELIVERY_GROUP_BUTTONS" => array(
                    ),
                    "DETAIL_CALCULATE_DELIVERY_SHOW_IMAGES" => "Y",
                    "DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
                    "DETAIL_COUNT_TOP_PROPERTIES" => "7",
                    "DETAIL_DETAIL_PICTURE_MODE" => "IMG",
                    "DETAIL_DISABLE_PRINT_DIMENSIONS" => "N",
                    "DETAIL_DISABLE_PRINT_WEIGHT" => "N",
                    "DETAIL_DISPLAY_NAME" => "Y",
                    "DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
                    "DETAIL_FB_APP_ID" => "",
                    "DETAIL_FB_USE" => "Y",
                    "DETAIL_META_DESCRIPTION" => "-",
                    "DETAIL_META_KEYWORDS" => "-",
                    "DETAIL_OFFERS_FIELD_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "DETAIL_OFFERS_PROPERTY_CODE" => array(
                        0 => "",
                        1 => "ARTNUMBER",
                        2 => "SIZES_SHOES",
                        3 => "SIZES_CLOTHES",
                        4 => "",
                    ),
                    "DETAIL_PROPERTY_CODE" => array(
                        0 => "OFFERS",
                        1 => "ATT_BRAND",
                        2 => "PRODUCT_DAY",
                        3 => "COLOR",
                        4 => "TIMER_DATE",
                        5 => "TIMER_LOOP",
                        6 => "ZOOM2",
                        7 => "BATTERY_LIFE",
                        8 => "SWITCH",
                        9 => "GRAF_PROC",
                        10 => "LENGTH_OF_CORD",
                        11 => "DISPLAY",
                        12 => "LOADING_LAUNDRY",
                        13 => "FULL_HD_VIDEO_RECORD",
                        14 => "INTERFACE",
                        15 => "COMPRESSORS",
                        16 => "Number_of_Outlets",
                        17 => "MAX_RESOLUTION_VIDEO",
                        18 => "MAX_BUS_FREQUENCY",
                        19 => "MAX_RESOLUTION",
                        20 => "FREEZER",
                        21 => "POWER_SUB",
                        22 => "POWER",
                        23 => "HARD_DRIVE_SPACE",
                        24 => "MEMORY",
                        25 => "OS",
                        26 => "ZOOM",
                        27 => "PAPER_FEED",
                        28 => "SUPPORTED_STANDARTS",
                        29 => "VIDEO_FORMAT",
                        30 => "SUPPORT_2SIM",
                        31 => "MP3",
                        32 => "ETHERNET_PORTS",
                        33 => "MATRIX",
                        34 => "CAMERA",
                        35 => "PHOTOSENSITIVITY",
                        36 => "DEFROST",
                        37 => "SPEED_WIFI",
                        38 => "SPIN_SPEED",
                        39 => "PRINT_SPEED",
                        40 => "SOCKET",
                        41 => "IMAGE_STABILIZER",
                        42 => "GSM",
                        43 => "SIM",
                        44 => "TYPE",
                        45 => "MEMORY_CARD",
                        46 => "TYPE_BODY",
                        47 => "TYPE_MOUSE",
                        48 => "TYPE_PRINT",
                        49 => "CONNECTION",
                        50 => "TYPE_OF_CONTROL",
                        51 => "TYPE_DISPLAY",
                        52 => "TYPE2",
                        53 => "REFRESH_RATE",
                        54 => "RANGE",
                        55 => "AMOUNT_MEMORY",
                        56 => "MEMORY_CAPACITY",
                        57 => "VIDEO_BRAND",
                        58 => "DIAGONAL",
                        59 => "RESOLUTION",
                        60 => "TOUCH",
                        61 => "CORES",
                        62 => "LINE_PROC",
                        63 => "PROCESSOR",
                        64 => "CLOCK_SPEED",
                        65 => "TYPE_PROCESSOR",
                        66 => "PROCESSOR_SPEED",
                        67 => "HARD_DRIVE",
                        68 => "HARD_DRIVE_TYPE",
                        69 => "Number_of_memory_slots",
                        70 => "MAXIMUM_MEMORY_FREQUENCY",
                        71 => "TYPE_MEMORY",
                        72 => "BLUETOOTH",
                        73 => "FM",
                        74 => "GPS",
                        75 => "HDMI",
                        76 => "SMART_TV",
                        77 => "USB",
                        78 => "WIFI",
                        79 => "FLASH",
                        80 => "ROTARY_DISPLAY",
                        81 => "SUPPORT_3D",
                        82 => "SUPPORT_3G",
                        83 => "WITH_COOLER",
                        84 => "FINGERPRINT",
                        85 => "VOZRAST",
                        86 => "ENERGOPOTREB",
                        87 => "OBOROTY",
                        88 => "MINI_BAR",
                        89 => "SIZES_PRODUCT",
                        90 => "DISPLAY_TYPE",
                        91 => "TIP_ELEMENTOV_PITANIA",
                        92 => "BELKI",
                        93 => "ZHIRY",
                        94 => "CALORIES",
                        95 => "COLLECTION",
                        96 => "UGLEVODY",
                        97 => "TOTAL_OUTPUT_POWER",
                        98 => "VID_ZASTECHKI",
                        99 => "VID_SUMKI",
                        100 => "PROFILE",
                        101 => "VYSOTA_RUCHEK",
                        102 => "GAS_CONTROL",
                        103 => "WARRANTY",
                        104 => "GRILL",
                        105 => "MORE_PROPERTIES",
                        106 => "GENRE",
                        107 => "OTSEKOV",
                        108 => "CONVECTION",
                        109 => "MATERIAL",
                        110 => "INTAKE_POWER",
                        111 => "NAZNAZHENIE",
                        112 => "BULK",
                        113 => "PODKLADKA",
                        114 => "SURFACE_COATING",
                        115 => "brand_tyres",
                        116 => "SEASON",
                        117 => "SEASONOST",
                        118 => "DUST_COLLECTION",
                        119 => "REF",
                        120 => "COUNTRY_BRAND",
                        121 => "DRYING",
                        122 => "REMOVABLE_TOP_COVER",
                        123 => "TEST_TEST",
                        124 => "CONTROL",
                        125 => "FINE_FILTER",
                        126 => "FORM_FAKTOR",
                        127 => "SKU_COLOR",
                        128 => "CML2_ARTICLE",
                        129 => "DELIVERY",
                        130 => "PICKUP",
                        131 => "USER_ID",
                        132 => "BLOG_POST_ID",
                        133 => "VIDEO",
                        134 => "BLOG_COMMENTS_CNT",
                        135 => "VOTE_COUNT",
                        136 => "SHOW_MENU",
                        137 => "SIMILAR_PRODUCT",
                        138 => "RATING",
                        139 => "RELATED_PRODUCT",
                        140 => "VOTE_SUM",
                        141 => "MAXIMUM_PRICE",
                        142 => "MINIMUM_PRICE",
                        143 => "HTML",
                        144 => "199",
                        145 => "ATT_BRAND2",
                        146 => "NEWPRODUCT",
                        147 => "MANUFACTURER",
                        148 => "",
                    ),
                    "DETAIL_SET_CANONICAL_URL" => "Y",
                    "DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
                    "DETAIL_SHOW_BASIS_PRICE" => "Y",
                    "DETAIL_SHOW_MAX_QUANTITY" => "N",
                    "DETAIL_STRICT_SECTION_CHECK" => "Y",
                    "DETAIL_USE_COMMENTS" => "Y",
                    "DETAIL_USE_VOTE_RATING" => "Y",
                    "DETAIL_VK_USE" => "N",
                    "DETAIL_VOTE_DISPLAY_AS_RATING" => "rating",
                    "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "DISPLAY_CHEAPER" => "Y",
                    "DISPLAY_OFFERS_TABLE" => "Y",
                    "DISPLAY_SUBSCRIBE" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "ELEMENT_SORT_FIELD" => "sort",
                    "ELEMENT_SORT_FIELD2" => "sort",
                    "ELEMENT_SORT_ORDER" => "asc",
                    "ELEMENT_SORT_ORDER2" => "asc",
                    "FIELDS" => array(
                        0 => "TITLE",
                        1 => "ADDRESS",
                        2 => "DESCRIPTION",
                        3 => "PHONE",
                        4 => "SCHEDULE",
                        5 => "EMAIL",
                        6 => "IMAGE_ID",
                        7 => "COORDINATES",
                        8 => "",
                    ),
                    "FILE_404" => "",
                    "FILTER_FIELD_CODE" => array(
                        0 => "SORT",
                        1 => "",
                    ),
                    "FILTER_INSTANT_RELOAD" => "Y",
                    "FILTER_NAME" => "arrFilter",
                    "FILTER_OFFERS_FIELD_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "FILTER_OFFERS_PROPERTY_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "FILTER_PRICE_CODE" => array(
                        0 => "BASE",
                    ),
                    "FILTER_PROPERTY_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "FILTER_VIEW_MODE" => "VERTICAL",
                    "FORUM_ID" => "",
                    "GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
                    "GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
                    "GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "12",
                    "GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
                    "GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
                    "GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
                    "GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "12",
                    "GIFTS_MESS_BTN_BUY" => "Выбрать",
                    "GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
                    "GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
                    "GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "12",
                    "GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
                    "GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
                    "GIFTS_SHOW_IMAGE" => "Y",
                    "GIFTS_SHOW_NAME" => "Y",
                    "GIFTS_SHOW_OLD_PRICE" => "Y",
                    "HIDE_AVAILABLE_TAB" => "N",
                    "HIDE_DELIVERY_CALC" => "N",
                    "HIDE_MEASURES" => "N",
                    "HIDE_NOT_AVAILABLE" => "N",
                    "HIDE_NOT_AVAILABLE_OFFERS" => "Y",
                    "IBLOCK_ID" => $catalogIblockId,
                    "IBLOCK_TYPE" => "catalog",
                    "ELEMENT_ID" => $arProduct['ID'],
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "LABEL_PROP" => "-",
                    "LAZY_LOAD_PICTURES" => "N",
                    "LINE_ELEMENT_COUNT" => "3",
                    "LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
                    "LINK_IBLOCK_ID" => "",
                    "LINK_IBLOCK_TYPE" => "",
                    "LINK_PROPERTY_SID" => "",
                    "LIST_BROWSER_TITLE" => "-",
                    "LIST_META_DESCRIPTION" => "-",
                    "LIST_META_KEYWORDS" => "-",
                    "LIST_OFFERS_FIELD_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "LIST_OFFERS_LIMIT" => "1",
                    "LIST_OFFERS_PROPERTY_CODE" => array(
                        0 => "",
                        1 => "SIZES_SHOES",
                        2 => "SIZES_CLOTHES",
                        3 => "ARTNUMBER",
                        4 => "",
                    ),
                    "LIST_PROPERTY_CODE" => array(
                        0 => "OFFERS",
                        1 => "ATT_BRAND",
                        2 => "PRODUCT_DAY",
                        3 => "COLOR",
                        4 => "TIMER_DATE",
                        5 => "TIMER_LOOP",
                        6 => "ZOOM2",
                        7 => "BATTERY_LIFE",
                        8 => "SWITCH",
                        9 => "GRAF_PROC",
                        10 => "LENGTH_OF_CORD",
                        11 => "DISPLAY",
                        12 => "LOADING_LAUNDRY",
                        13 => "FULL_HD_VIDEO_RECORD",
                        14 => "INTERFACE",
                        15 => "COMPRESSORS",
                        16 => "Number_of_Outlets",
                        17 => "MAX_RESOLUTION_VIDEO",
                        18 => "MAX_BUS_FREQUENCY",
                        19 => "MAX_RESOLUTION",
                        20 => "FREEZER",
                        21 => "POWER_SUB",
                        22 => "POWER",
                        23 => "HARD_DRIVE_SPACE",
                        24 => "MEMORY",
                        25 => "OS",
                        26 => "ZOOM",
                        27 => "PAPER_FEED",
                        28 => "SUPPORTED_STANDARTS",
                        29 => "VIDEO_FORMAT",
                        30 => "SUPPORT_2SIM",
                        31 => "MP3",
                        32 => "ETHERNET_PORTS",
                        33 => "MATRIX",
                        34 => "CAMERA",
                        35 => "PHOTOSENSITIVITY",
                        36 => "DEFROST",
                        37 => "SPEED_WIFI",
                        38 => "SPIN_SPEED",
                        39 => "PRINT_SPEED",
                        40 => "SOCKET",
                        41 => "IMAGE_STABILIZER",
                        42 => "GSM",
                        43 => "SIM",
                        44 => "TYPE",
                        45 => "MEMORY_CARD",
                        46 => "TYPE_BODY",
                        47 => "TYPE_MOUSE",
                        48 => "TYPE_PRINT",
                        49 => "CONNECTION",
                        50 => "TYPE_OF_CONTROL",
                        51 => "TYPE_DISPLAY",
                        52 => "TYPE2",
                        53 => "REFRESH_RATE",
                        54 => "RANGE",
                        55 => "AMOUNT_MEMORY",
                        56 => "MEMORY_CAPACITY",
                        57 => "VIDEO_BRAND",
                        58 => "DIAGONAL",
                        59 => "RESOLUTION",
                        60 => "TOUCH",
                        61 => "CORES",
                        62 => "LINE_PROC",
                        63 => "PROCESSOR",
                        64 => "CLOCK_SPEED",
                        65 => "TYPE_PROCESSOR",
                        66 => "PROCESSOR_SPEED",
                        67 => "HARD_DRIVE",
                        68 => "HARD_DRIVE_TYPE",
                        69 => "Number_of_memory_slots",
                        70 => "MAXIMUM_MEMORY_FREQUENCY",
                        71 => "TYPE_MEMORY",
                        72 => "BLUETOOTH",
                        73 => "FM",
                        74 => "GPS",
                        75 => "HDMI",
                        76 => "SMART_TV",
                        77 => "USB",
                        78 => "WIFI",
                        79 => "FLASH",
                        80 => "ROTARY_DISPLAY",
                        81 => "SUPPORT_3D",
                        82 => "SUPPORT_3G",
                        83 => "WITH_COOLER",
                        84 => "FINGERPRINT",
                        85 => "VOZRAST",
                        86 => "ENERGOPOTREB",
                        87 => "OBOROTY",
                        88 => "MINI_BAR",
                        89 => "SIZES_PRODUCT",
                        90 => "DISPLAY_TYPE",
                        91 => "TIP_ELEMENTOV_PITANIA",
                        92 => "BELKI",
                        93 => "ZHIRY",
                        94 => "CALORIES",
                        95 => "COLLECTION",
                        96 => "UGLEVODY",
                        97 => "TOTAL_OUTPUT_POWER",
                        98 => "VID_ZASTECHKI",
                        99 => "VID_SUMKI",
                        100 => "PROFILE",
                        101 => "VYSOTA_RUCHEK",
                        102 => "GAS_CONTROL",
                        103 => "WARRANTY",
                        104 => "GRILL",
                        105 => "MORE_PROPERTIES",
                        106 => "GENRE",
                        107 => "OTSEKOV",
                        108 => "CONVECTION",
                        109 => "MATERIAL",
                        110 => "INTAKE_POWER",
                        111 => "NAZNAZHENIE",
                        112 => "BULK",
                        113 => "PODKLADKA",
                        114 => "SURFACE_COATING",
                        115 => "brand_tyres",
                        116 => "SEASON",
                        117 => "SEASONOST",
                        118 => "DUST_COLLECTION",
                        119 => "REF",
                        120 => "COUNTRY_BRAND",
                        121 => "DRYING",
                        122 => "REMOVABLE_TOP_COVER",
                        123 => "TEST_TEST",
                        124 => "CONTROL",
                        125 => "FINE_FILTER",
                        126 => "FORM_FAKTOR",
                        127 => "SKU_COLOR",
                        128 => "CML2_ARTICLE",
                        129 => "DELIVERY",
                        130 => "PICKUP",
                        131 => "USER_ID",
                        132 => "BLOG_POST_ID",
                        133 => "VIDEO",
                        134 => "BLOG_COMMENTS_CNT",
                        135 => "VOTE_COUNT",
                        136 => "SHOW_MENU",
                        137 => "SIMILAR_PRODUCT",
                        138 => "RATING",
                        139 => "RELATED_PRODUCT",
                        140 => "VOTE_SUM",
                        141 => "MAXIMUM_PRICE",
                        142 => "MINIMUM_PRICE",
                        143 => "HTML",
                        144 => "199",
                        145 => "ATT_BRAND2",
                        146 => "NEWPRODUCT",
                        147 => "SALELEADER",
                        148 => "SPECIALOFFER",
                        149 => "",
                    ),
                    "MAIN_TITLE" => "Наличие на складах",
                    "MESSAGES_PER_PAGE" => "10",
                    "MESSAGE_404" => "",
                    "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                    "MESS_BTN_BUY" => "Купить",
                    "MESS_BTN_COMPARE" => "Сравнение",
                    "MESS_BTN_DETAIL" => "Подробнее",
                    "MESS_NOT_AVAILABLE" => "Нет в наличии",
                    "MIN_AMOUNT" => "10",
                    "OFFERS_CART_PROPERTIES" => array(
                        0 => "COLOR",
                    ),
                    "OFFERS_SORT_FIELD" => "",
                    "OFFERS_SORT_FIELD2" => "",
                    "OFFERS_SORT_ORDER" => "",
                    "OFFERS_SORT_ORDER2" => "",
                    "OFFERS_TABLE_DISPLAY_PICTURE_COLUMN" => "Y",
                    "OFFERS_TABLE_PAGER_COUNT" => "10",
                    "OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
                    "OFFER_TREE_PROPS" => array(
                        0 => "COLOR",
                        1 => "SIZE_CLOTHES",
                        2 => "MATERIAL",
                    ),
                    "PAGER_BASE_LINK" => "",
                    "PAGER_BASE_LINK_ENABLE" => "Y",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
                    "PAGER_PARAMS_NAME" => "arrPager",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "round",
                    "PAGER_TITLE" => "Товары",
                    "PAGE_ELEMENT_COUNT" => "30",
                    "PARTIAL_PRODUCT_PROPERTIES" => "N",
                    "PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
                    "PRICE_CODE" => array(
                    ),
                    "PRICE_VAT_INCLUDE" => "Y",
                    "PRICE_VAT_SHOW_VALUE" => "N",
                    "PRODUCT_DISPLAY_MODE" => "Y",
                    "PRODUCT_ID_VARIABLE" => "id",
                    "PRODUCT_PROPERTIES" => "",
                    "PRODUCT_PROPS_VARIABLE" => "prop",
                    "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                    "QUANTITY_FLOAT" => "N",
                    "REVIEW_AJAX_POST" => "Y",
                    "REVIEW_IBLOCK_ID" => "12",
                    "REVIEW_IBLOCK_TYPE" => "service",
                    "SALE_IBLOCK_ID" => "6",
                    "SALE_IBLOCK_TYPE" => "info",
                    "SECTIONS_SHOW_PARENT_NAME" => "N",
                    "SECTIONS_VIEW_MODE" => "TEXT",
                    "SECTION_ADD_TO_BASKET_ACTION" => "ADD",
                    "SECTION_BACKGROUND_IMAGE" => "-",
                    "SECTION_COUNT_ELEMENTS" => "Y",
                    "SECTION_ID_VARIABLE" => "SECTION_ID",
                    "SECTION_TOP_DEPTH" => "4",
                    "SEF_FOLDER" => "/catalog/",
                    "SEF_MODE" => "Y",
                    "SERVICES_IBLOCK_ID" => "11",
                    "SERVICES_IBLOCK_TYPE" => "info",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_STATUS_404" => "Y",
                    "SET_TITLE" => "Y",
                    "SHOW_404" => "Y",
                    "SHOW_ADVANTAGES_IN_DETAIL" => "Y",
                    "SHOW_AVAILABLE_TAB" => "Y",
                    "SHOW_DEACTIVATED" => "N",
                    "SHOW_DISCOUNT_PERCENT" => "Y",
                    "SHOW_EMPTY_STORE" => "Y",
                    "SHOW_GENERAL_STORE_INFORMATION" => "N",
                    "SHOW_LINK_TO_FORUM" => "N",
                    "SHOW_MIDDLE_SLIDER" => "N",
                    "SHOW_OLD_PRICE" => "Y",
                    "SHOW_PRICE_COUNT" => "1",
                    "SHOW_SECTION_BANNER" => "Y",
                    "SHOW_SERVICES" => "Y",
                    "SHOW_TOP_ELEMENTS" => "N",
                    "STORES" => array(
                        0 => "1",
                    ),
                    "STORE_PATH" => "/store/#store_id#",
                    "SUBSCRIBE_RUBRIC_ID" => "1",
                    "TEMPLATE_THEME" => "site",
                    "TOP_ADD_TO_BASKET_ACTION" => "ADD",
                    "URL_TEMPLATES_READ" => "",
                    "USER_CONSENT" => "N",
                    "USER_CONSENT_ID" => "0",
                    "USER_CONSENT_IS_CHECKED" => "Y",
                    "USER_CONSENT_IS_LOADED" => "N",
                    "USER_FIELDS" => array(
                        0 => "",
                        1 => "",
                    ),
                    "USE_ALSO_BUY" => "N",
                    "USE_BIG_DATA" => "Y",
                    "USE_CAPTCHA" => "Y",
                    "USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
                    "USE_COMPARE" => "N",
                    "USE_ELEMENT_COUNTER" => "Y",
                    "USE_FILTER" => "Y",
                    "USE_GIFTS_DETAIL" => "Y",
                    "USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
                    "USE_GIFTS_SECTION" => "Y",
                    "USE_MAIN_ELEMENT_SECTION" => "Y",
                    "USE_MIN_AMOUNT" => "N",
                    "USE_PRICE_COUNT" => "N",
                    "USE_PRODUCT_QUANTITY" => "Y",
                    "USE_REVIEW" => "Y",
                    "USE_SALE_BESTSELLERS" => "Y",
                    "USE_STORE" => "N",
                    "USE_STORE_PHONE" => "Y",
                    "USE_STORE_SCHEDULE" => "Y",
                    "COMPONENT_TEMPLATE" => ".default",
                    "SEF_URL_TEMPLATES" => array(
                        "sections" => "",
                        "section" => "#SECTION_CODE_PATH#/",
                        "element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
                        "compare" => "compare/",
                        "smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
                    )
                ),
                false
            );
            ?>


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
                );?>                <!-- /.card-grid -->
            </div>
        </div>
        <!-- /.myproduct__container container -->
    </div>
    <!-- /.myproduct -->


<?php endif; ?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>