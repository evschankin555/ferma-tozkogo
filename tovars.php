<?
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("catalog");
$el = new CIBlockElement; 
$arFields = Array(
    "CATALOG_QUANTITY" => 99999,      
    );
  
$arSort= Array("ID"=>"ASC");
$arSelect = Array("ID","NAME");
$arFilter = Array("IBLOCK_ID" => 15, "*CATALOG_QUANTITY"=>0,);
$res =  CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);
while($ob = $res->GetNext()){
    CCatalogProduct::Update($ob['ID'], Array("QUANTITY"=>"9999"));
}

?>