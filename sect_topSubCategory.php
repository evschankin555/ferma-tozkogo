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
		<?$APPLICATION->IncludeComponent(
			"bitrix:menu",
			"topSubMenu",
			array(
				"ROOT_MENU_TYPE" => "left",
				"MENU_CACHE_TYPE" => "Y",
				"MENU_CACHE_TIME" => "36000000",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"MENU_CACHE_GET_VARS" => array(
				),
				"MAX_LEVEL" => "4",
				"CHILD_MENU_TYPE" => "left",
				"USE_EXT" => "Y",
				"DELAY" => "N",
				"ALLOW_MULTI_SELECT" => "N",
				"COMPONENT_TEMPLATE" => "leftMenu",
				"IBLOCK_TYPE" => "catalog",
				"IBLOCK_ID" => $catalogIblockId,
				"PRODUCTS_LIMIT" => "24",
				"HIDE_MEASURES" => "N",
				"PRODUCT_PRICE_CODE" => array(
				),
				"CONVERT_CURRENCY" => "N"
			),
			false
		);?>