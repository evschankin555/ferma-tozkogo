<?php
// Подключаем модули
\Bitrix\Main\Loader::includeModule("dw.deluxe");
\Bitrix\Main\Loader::includeModule("iblock");

// Получаем настройки шаблона
$arTemplateSettings = DwSettings::getInstance()->getCurrentSettings();

// Определяем город из сессии
$city = $_SESSION['USER_GEO_POSITION']['city'] ?? '';

// Инициализация переменных
$arCityData = [];

// Если город Москва, получаем данные из инфоблока
if ($city === 'Москва') {
    $iblockId = 17; // ID инфоблока
    $elementName = 'Москва'; // Название элемента (название города)

    $res = CIBlockElement::GetList([], [
        'IBLOCK_ID' => $iblockId,
        'NAME' => $elementName
    ], false, false, [
        'ID',
        'NAME',
        'PROPERTY_TEMPLATE_TELEPHONE_1',
        'PROPERTY_TEMPLATE_TELEPHONE_2',
        'PROPERTY_TEMPLATE_EMAIL_1',
        'PROPERTY_TEMPLATE_EMAIL_2',
        'PROPERTY_TEMPLATE_FULL_ADDRESS',
        'PROPERTY_TEMPLATE_WORKING_TIME'
    ]);

    if ($element = $res->Fetch()) {
        $arCityData = [
            "TEMPLATE_TELEPHONE_1" => $element['PROPERTY_TEMPLATE_TELEPHONE_1_VALUE'],
            "TEMPLATE_TELEPHONE_2" => $element['PROPERTY_TEMPLATE_TELEPHONE_2_VALUE'],
            "TEMPLATE_EMAIL_1" => $element['PROPERTY_TEMPLATE_EMAIL_1_VALUE'],
            "TEMPLATE_EMAIL_2" => $element['PROPERTY_TEMPLATE_EMAIL_2_VALUE'],
            "TEMPLATE_FULL_ADDRESS" => $element['PROPERTY_TEMPLATE_FULL_ADDRESS_VALUE'],
            "TEMPLATE_WORKING_TIME" => $element['PROPERTY_TEMPLATE_WORKING_TIME_VALUE'],
        ];
    }
}

// Если данных для Москвы нет или город другой, используем настройки темы
if (empty($arCityData)) {
    $arCityData = [
        "TEMPLATE_TELEPHONE_1" => $arTemplateSettings["TEMPLATE_TELEPHONE_1"],
        "TEMPLATE_TELEPHONE_2" => $arTemplateSettings["TEMPLATE_TELEPHONE_2"],
        "TEMPLATE_EMAIL_1" => $arTemplateSettings["TEMPLATE_EMAIL_1"],
        "TEMPLATE_EMAIL_2" => $arTemplateSettings["TEMPLATE_EMAIL_2"],
        "TEMPLATE_FULL_ADDRESS" => $arTemplateSettings["TEMPLATE_FULL_ADDRESS"],
        "TEMPLATE_WORKING_TIME" => $arTemplateSettings["TEMPLATE_WORKING_TIME"],
    ];
}
?>

<div class="global-information-block-cn">
    <div class="global-information-block-hide-scroll">
        <div class="global-information-block-hide-scroll-cn">
            <div class="information-heading">Есть вопросы?</div>
            <div class="information-text">свяжитесь с нами удобным Вам способом</div>
            <div class="information-list">
                <?if(!empty($arCityData["TEMPLATE_TELEPHONE_1"]) || !empty($arCityData["TEMPLATE_TELEPHONE_2"])):?>
                    <div class="information-list-item">
                        <div class="tb">
                            <div class="information-item-icon tc">
                                <img src="<?=SITE_TEMPLATE_PATH?>/images/cont1.png">
                            </div>
                            <div class="tc">
                                <?if(!empty($arCityData["TEMPLATE_TELEPHONE_1"])):?><?=$arCityData["TEMPLATE_TELEPHONE_1"]?><br><?endif;?>
                                <?if(!empty($arCityData["TEMPLATE_TELEPHONE_2"])):?><?=$arCityData["TEMPLATE_TELEPHONE_2"]?><br><?endif;?>
                            </div>
                        </div>
                    </div>
                <?endif;?>
                <?if(!empty($arCityData["TEMPLATE_EMAIL_1"]) || !empty($arCityData["TEMPLATE_EMAIL_2"])):?>
                    <div class="information-list-item">
                        <div class="tb">
                            <div class="information-item-icon tc">
                                <img src="<?=SITE_TEMPLATE_PATH?>/images/cont2.png">
                            </div>
                            <div class="tc">
                                <?if(!empty($arCityData["TEMPLATE_EMAIL_1"])):?><a href="mailto:<?=$arCityData["TEMPLATE_EMAIL_1"]?>"><?=$arCityData["TEMPLATE_EMAIL_1"]?></a><br><?endif;?>
                                <?if(!empty($arCityData["TEMPLATE_EMAIL_2"])):?><a href="mailto:<?=$arCityData["TEMPLATE_EMAIL_2"]?>"><?=$arCityData["TEMPLATE_EMAIL_2"]?></a><br><?endif;?>
                            </div>
                        </div>
                    </div>
                <?endif;?>
                <?if(!empty($arCityData["TEMPLATE_FULL_ADDRESS"])):?>
                    <div class="information-list-item">
                        <div class="tb">
                            <div class="information-item-icon tc">
                                <img src="<?=SITE_TEMPLATE_PATH?>/images/cont3.png">
                            </div>
                            <div class="tc">
                                <?=$arCityData["TEMPLATE_FULL_ADDRESS"]?>
                            </div>
                        </div>
                    </div>
                <?endif;?>
                <?if(!empty($arCityData["TEMPLATE_WORKING_TIME"])):?>
                    <div class="information-list-item">
                        <div class="tb">
                            <div class="information-item-icon tc">
                                <img src="<?=SITE_TEMPLATE_PATH?>/images/cont4.png">
                            </div>
                            <div class="tc"><?=$arCityData["TEMPLATE_WORKING_TIME"]?></div>
                        </div>
                    </div>
                <?endif;?>
            </div>
            <div class="information-feedback-container">
                <a href="<?=SITE_DIR?>callback/" class="information-feedback">Обратная связь</a>
            </div>
        </div>
    </div>
</div>
