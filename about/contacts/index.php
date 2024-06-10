<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Задайте вопрос");
?>
<div class='container contacts-page'>
    <h1>Контактная информация</h1>
 <?
	//include module
	\Bitrix\Main\Loader::includeModule("dw.deluxe");
	//get template settings
	$arTemplateSettings = DwSettings::getInstance()->getCurrentSettings();
?> <?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"personal",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "",
		"COMPONENT_TEMPLATE" => "personal",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => "",
		"MENU_CACHE_TIME" => "3600000",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "about",
		"USE_EXT" => "N"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'N'
)
);?>
<ul class="contactList">

<li>ИП Добровидова Елена Валерьевна<br>
ОГРНИП 311583625800028<br>
Юридический адрес:440011 г.Пенза,ул. Карпинского 3-19<br>
Почтовый адрес: 440071 г.Пенза, ул. Лядова, 2<br>
ИНН 583709113325</li>

<li>Банк:<br>
Филиал №6318 ВТБ  (ПАО),  г. Самара<br>
р/сч 40802810420180001459<br>
к/сч 30101810422023601968<br>
БИК 043601968</li>


<li>Тел./факс (8412) 955029, 955025 (бух.), 415925 (юрист)<br>
Торговый отдел<br>
ТЦ Космос Сити 40-72-18 , 41-04-00<br>
ТЦ Гидростроевский  93-28-99,  93-46-46,<br>
E-mail: dobrovidovaev@bk.ru</li>

<li>ОКПО-0180308262<br>
ОКАТО-56401368000<br>
ОКВЭД-52.11</li>
</ul>
<ul class="contactList">
	 <?if(!empty($arTemplateSettings["TEMPLATE_TELEPHONE_1"]) || !empty($arTemplateSettings["TEMPLATE_TELEPHONE_2"])):?>
	<li>
	<table>
	<tbody>
	<tr>
		<td>
 <img alt="cont1.png" src="/bitrix/templates/dresscode/images/cont1.png" title="cont1.png">
		</td>
		<td>
			 <?if(!empty($arTemplateSettings["TEMPLATE_TELEPHONE_1"])):?><?=$arTemplateSettings["TEMPLATE_TELEPHONE_1"]?><br>
			<?endif;?> <?if(!empty($arTemplateSettings["TEMPLATE_TELEPHONE_2"])):?><?=$arTemplateSettings["TEMPLATE_TELEPHONE_2"]?><br>
			<?endif;?>
		</td>
	</tr>
	</tbody>
	</table>
 </li>
	 <?endif;?> <?if(!empty($arTemplateSettings["TEMPLATE_EMAIL_1"]) || !empty($arTemplateSettings["TEMPLATE_EMAIL_2"])):?>
	<li>
	<table>
	<tbody>
	<tr>
		<td>
 <img alt="cont2.png" src="/bitrix/templates/dresscode/images/cont2.png" title="cont2.png">
		</td>
		<td>
			 <?if(!empty($arTemplateSettings["TEMPLATE_EMAIL_1"])):?><a href="mailto:<?=$arTemplateSettings['TEMPLATE_EMAIL_1']?>" title="<?=$arTemplateSettings['TEMPLATE_EMAIL_1']?>" class="bxhtmled-surrogate"><?=$arTemplateSettings['TEMPLATE_EMAIL_1']?></a><br>
			<?endif;?> <?if(!empty($arTemplateSettings["TEMPLATE_EMAIL_2"])):?><a href="mailto:<?=$arTemplateSettings['TEMPLATE_EMAIL_2']?>" title="<?=$arTemplateSettings["TEMPLATE_EMAIL_2"]?>;" class="bxhtmled-surrogate"><?=$arTemplateSettings["TEMPLATE_EMAIL_2"]?></a>
			<?endif;?>
		</td>
	</tr>
	</tbody>
	</table>
 </li>
	 <?endif;?> <?if(!empty($arTemplateSettings["TEMPLATE_FULL_ADDRESS"])):?>
	<li>
	<table>
	<tbody>
	<tr>
		<td>
 <img alt="cont3.png" src="/bitrix/templates/dresscode/images/cont3.png" title="cont3.png">
		</td>
		<td>
			<div class="contactAddress">
				<?=$arTemplateSettings["TEMPLATE_FULL_ADDRESS"]?>
			</div>
		</td>
	</tr>
	</tbody>
	</table>
 </li>
	 <?endif;?> <?if(!empty($arTemplateSettings["TEMPLATE_WORKING_TIME"])):?>
	<li>
	<table>
	<tbody>
	<tr>
		<td>
 <img alt="cont4.png" src="/bitrix/templates/dresscode/images/cont4.png" title="cont4.png">
		</td>
		<td>
			 <?=$arTemplateSettings["TEMPLATE_WORKING_TIME"]?>
		</td>
	</tr>
	</tbody>
	</table>
 </li>
	 <?endif;?>
</ul>
 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	".default",
	Array(
		"API_KEY" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"CONTROLS" => array(0=>"TYPECONTROL",1=>"SCALELINE",),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:53.222127948721074;s:10:\"yandex_lon\";d:44.893447699525034;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:44.893447699525034;s:3:\"LAT\";d:53.22212794872336;s:4:\"TEXT\";s:0:\"\";}}}",
		"MAP_HEIGHT" => "500",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(0=>"ENABLE_DBLCLICK_ZOOM",1=>"ENABLE_DRAGGING",)
	)
);?><br>
 <br>
<br>
    <div class="container-card-and-call">
        <div class="discount-card">
            <h3 class="h3 discount-card__title">Покупайте и экономьте вместе с дисконтной картой</h3>
            <div class="discount-card__text">
                Данная карта дает право на получение специальных условий при приобретении товаров в нашем магазине
            </div>
            <a href="" class="green-btn green-btn--16 discount-card__green-btn">Купить продукты<svg class="green-btn__icon"><use xlink:href="#arrow-right-short"></use></svg></a>
        </div>
        <?$APPLICATION->IncludeComponent(
            "bitrix:form.result.new",
            "twoColumns",
            Array(
                "CACHE_TIME" => "360000",
                "CACHE_TYPE" => "Y",
                "CHAIN_ITEM_LINK" => "",
                "CHAIN_ITEM_TEXT" => "",
                "COMPONENT_TEMPLATE" => ".default",
                "EDIT_URL" => "",
                "IGNORE_CUSTOM_TEMPLATE" => "N",
                "LIST_URL" => "",
                "SEF_MODE" => "N",
                "SUCCESS_URL" => "",
                "USE_EXTENDED_ERRORS" => "Y",
                "VARIABLE_ALIASES" => array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID",),
                "WEB_FORM_ID" => "2"
            )
        );?>
    </div>


</div>
<script>
    $(document).ready(function(){
        // Для каждого элемента с классом "webFormItem"
        $('.webFormItem').each(function(){
            // Найти input внутри текущего элемента
            var input = $(this).find('.webFormItemField input');
            // Получить текст лейбла
            var labelText = $(this).find('.webFormItemLabel').text();

            // Скрыть лейбл
            $(this).find('.webFormItemLabel').hide();

            // Добавить текст лейбла в плейсхолдер
            input.attr('placeholder', labelText);
        });
    });
</script>
    <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php")?>

