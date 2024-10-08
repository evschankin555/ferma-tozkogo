<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?><div class='container basket-page'>
    <ul class="breadcrumbs">
        <li><a href="/">Главная страница</a></li>
        <li>Корзина</li>
    </ul>
    <h1 class="h1 basket-page__title">Корзина</h1>
    <?$APPLICATION->IncludeComponent("dresscode:sale.basket.basket", ".default", array(
		"HIDE_MEASURES" => "N",
		"BASKET_PICTURE_WIDTH" => "250",
		"BASKET_PICTURE_HEIGHT" => "186",
		"HIDE_NOT_AVAILABLE" => "N",
		"PRODUCT_PRICE_CODE" => array(
		),
		"GIFT_CONVERT_CURRENCY" => "N",
		"PATH_TO_PAYMENT" => "/personal/cart/payment/",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"COMPONENT_TEMPLATE" => ".default",
		"PATH_TO_PAYMENT" => "",
		"MIN_SUM_TO_PAYMENT" => "",
		"REGISTER_USER" => "Y",
		"PART_STORES_AVAILABLE" => "",
		"ALL_STORES_AVAILABLE" => "",
		"NO_STORES_AVAILABLE" => ""
	),
	false
);?><br />
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>