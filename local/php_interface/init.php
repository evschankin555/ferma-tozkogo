<?php

AddEventHandler("iblock", "OnAfterIBlockElementAdd", "OnAfterIBlockElementAddHandler");


    // создаем обработчик события "OnAfterIBlockElementAdd"
    function OnAfterIBlockElementAddHandler(&$arFields)
    {
    	if ($arFields['IBLOCK_ID'] === 12) {
			Bitrix\Main\Mail\Event::send(array(
			    "EVENT_NAME" => "NEW_REVIEW",
			    "LID" => "s1",
			    "C_FIELDS" => array(
			        "NAME" => $arFields['NAME'],
			        "DETAIL_TEXT" => $arFields["DETAIL_TEXT"],
			        "RATING" => $arFields["PROPERTY_VALUES"]["RATING"],
			        "ID" => $arFields["ID"]
			    ),
			)); 
    	}
    }

AddEventHandler("sale", "OnBeforeBasketAdd", "OnBeforeBasketAddHandler");

function OnBeforeBasketAddHandler(&$arFields) {
    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/local/log.txt', "Handler triggered\n", FILE_APPEND);
    if ($_SESSION['USER_GEO_POSITION']['city'] == 'Москва') {
        $res = CIBlockElement::GetList(
            [],
            ['ID' => $arFields['PRODUCT_ID']],
            false,
            false,
            ['ID', 'IBLOCK_ID', 'PROPERTY_PRICE_MOSCOW']
        );

        if ($element = $res->GetNext()) {
            if (!empty($element['PROPERTY_PRICE_MOSCOW_VALUE'])) {
                file_put_contents($_SERVER['DOCUMENT_ROOT'].'/local/log.txt', "Price updated to ".$element['PROPERTY_PRICE_MOSCOW_VALUE']."\n", FILE_APPEND);
                $arFields['PRICE'] = $element['PROPERTY_PRICE_MOSCOW_VALUE'];
                $arFields['CUSTOM_PRICE'] = 'Y'; // Указываем, что цена кастомная
            }
        }
    }
}
?>

