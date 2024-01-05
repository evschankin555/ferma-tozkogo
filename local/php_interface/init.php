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
