<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Прямой эфир видео с фермы Тоцкого в Пензе. Все для диетического, натурального и здорового питания. Здоровое питание подойдет для сыроедов, диабетиков и людей с другими заболеваниями.");
$APPLICATION->SetPageProperty("keywords", "здоровое питание");
$APPLICATION->SetPageProperty("title", "Видео с фермы Тоцкого в Пензе");
$APPLICATION->SetTitle("Видео с фермы");
?><div class='container'>
    <h1>Видео с фермы</h1>
 <?$APPLICATION->IncludeComponent(
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
<div class="global-block-container">
	<div class="global-content-block">
		<div class="bx_page">
			<p>
                <iframe src="https://rtsp.me/embed/n9GaDQB3/" width="440" height="360" frameborder="0" allowfullscreen></iframe>

			</p>
		</div>
	</div>
	<div class="global-information-block">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "sect",
		"AREA_FILE_SUFFIX" => "information_block",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => ""
	)
);?>
	</div>
</div>
 <br>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>