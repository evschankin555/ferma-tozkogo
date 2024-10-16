<?php
use Bitrix\Sale\Order;
use Bitrix\Main\Mail\Event;

AddEventHandler("iblock", "OnAfterIBlockElementAdd", "OnAfterIBlockElementAddHandler");
AddEventHandler("sale", "OnOrderNewSendEmail", "ModifyOrderEmail");

function ModifyOrderEmail($orderId, $eventName, &$arFields)
{
    // Логируем событие для проверки
    file_put_contents($_SERVER["DOCUMENT_ROOT"] . "/email_log.txt", "Обработка события OnOrderNewSendEmail для заказа ID: $orderId\n", FILE_APPEND);

    // Получаем город клиента (например, из сессии)
    $city = $_SESSION['USER_GEO_POSITION']['city'] ?? 'Неизвестный';

    // По умолчанию email будет клиентский
    $emailTo = $arFields['EMAIL'];

    // Если город Москва, изменяем email на нужный
    if ($city == 'Москва') {
        $emailTo =  'tockogoferma@gmail.ru';
    } else {
        // Для всех остальных случаев
        $emailTo = 'lubaevag@bk.ru';
    }

    $emailTo = 'FasrWebPro@yandex.ru';
    // Изменяем email в данных события
    $arFields['EMAIL'] = $emailTo;
    // Добавляем город в тему письма
    $arFields['SUBJECT'] .= " - $city";

    // Логируем результат
    file_put_contents($_SERVER["DOCUMENT_ROOT"] . "/email_log.txt", "Email изменен на: $emailTo для заказа ID: $orderId\n", FILE_APPEND);
}



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
