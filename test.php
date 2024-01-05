<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

die();

\Bitrix\Main\Loader::includeModule('iblock');

class importCsv
{
	public static $sections = [
		"Мясной цех" => 99,
		"Холодный цех" => 101,
		"Морская и прудовая рыба" => 97,
		"Бакалея" => 92,
		"Молочный цех" => 96,
		"Сыроварня" => 104,
		"Колбасный цех" => 94,
		"Овощной цех" => 100,
		"Горячий цех" => 98,
		"Рыбный цех" => 97,
		"Кондитерский цех" => 105,
		"Пекарня" => 106
	];

	public static $KG = 4;
	public static $SHT = 5;

	public $data = [];

	public function __construct(array $product)
	{
		$this->data['item'] = $product;

		\Bitrix\Main\Loader::includeModule('iblock');
        $this->data['element'] = new \CIBlockElement;
	}

	public function getAmount(string $text)
	{
		$replace = str_replace(['.=', '*', ' '], '', $text);
		$elems = explode('||', $replace);
		if ($elems[0] === '1шт==1шт' || $elems[0] === '1шт==1' || $elems[0] === '1шт=1') {
			return [self::$SHT, 1];
		}

		$minNum = 1.0;
		foreach ($elems as $elem) {
			list($num, $weight) = explode('==', $elem);
			if (floatval($weight) < $minNum) {
				$minNum = floatval($weight);
			}
		}
		
		return [self::$KG, $minNum];
	}

	public function getSection(string $section)
	{
		return self::$sections[$section];
	}

	public function getPicture(string $path)
	{
		if (strpos($path, 'http') === false) {
			return \CFile::MakeFileArray('http://xn----7sbkf1ajqbbmzs7a.xn--p1ai/'.$path);
		}

		return \CFile::MakeFileArray($path);
	}

	public function getCode(string $name)
	{
        return \Cutil::translit(mb_strtolower($name), "ru", ["replace_space"=>"-","replace_other"=>"-"]);
	}

	public function getIngridients(string $names)
	{
		$replace = str_replace(['.', '*', ' '], '', $names);

		return explode($replace);
	}

	public function build()
	{
		$this->data['save']['PREVIEW_PICTURE'] = $this->getPicture($this->data['item'][7]);
		$this->data['save']['DETAIL_PICTURE'] = $this->getPicture($this->data['item'][7]);
		$this->data['save']['NAME'] = $this->data['item'][1];
		$this->data['save']['IBLOCK_ID'] = 15;
		$this->data['save']['CODE'] = $this->getCode($this->data['item'][1]);
		$this->data['save']['IBLOCK_SECTION_ID'] = $this->getSection($this->data['item'][0]);
		$this->data['save']['DETAIL_TEXT'] = $this->data['item'][5];
		$this->data['save']['PROPERTY_VALUES']['CML2_ARTICLE'] = $this->data['item'][2];
		$this->data['save']['PROPERTY_VALUES']['INGRIDIENTS'] = $this->getIngridients($this->data['item'][6]);
	}

	public function save()
	{
		$this->id = $this->data['element']->Add($this->data['save']);
        return $this->id;
	}

	public function createProduct($id)
	{
		\Bitrix\Main\Loader::includeModule('catalog');

		if ($id > 0) {
			list($measure, $minWeight) = $this->getAmount($this->data['item'][3]);

			$product = [
				'ID' => $id,
				'AVAILABLE' => 'Y',
				'MEASURE' => $measure,
				'QUANTITY' => 99999,
				'CAN_BUY_ZERO' => 'Y'
			];

			if ($measure === self::$KG) {
				$product['WEIGHT'] = $minWeight*1000;
			}

	        //$result = \Bitrix\Catalog\Model\Product::update($id, $product);

	        $this->priceUpdate($id, [
	        	"PRODUCT_ID" => $id,
	        	"PRICE" => $this->data['item']['4'],
	        	"CURRENCY" => "RUB",
	        	"CATALOG_GROUP_ID" => 1,
	        	"QUANTITY_FROM" => false,
	        	"QUANTITY_TO" => false
	        ]);
	        //$this->measureUpdate($id, ["PRODUCT_ID" => $id, "RATIO" => $minWeight, 'IS_DEFAULT' => 'Y']);
	        //\Bitrix\Catalog\MeasureRatioTable::add();	
		}	
	}

	public function priceUpdate($id, $data)
	{
		$dbPrice = \Bitrix\Catalog\Model\Price::getList([
		    "filter" => [
		        "PRODUCT_ID" => $id
			]
		]);


		if ($arPrice = $dbPrice->fetch()) {
			\CPrice::Update($arPrice["ID"], $data);
		    //$result = \Bitrix\Catalog\Model\Price::update($arPrice["ID"], $data);                        
		    //if ($result->isSuccess())
		    //{
		   //echo "Обновили цену у товара у элемента каталога " . $arElement["ID"] . " Цена " . $price . PHP_EOL;
		    //} 
		    //else {
		      //  var_dump($result->getErrorMessages());
		    //}
		}else{
		    $result = \Bitrix\Catalog\Model\Price::add($data);
		    if ($result->isSuccess())
		    {
		        //echo "Добавили цену у товара у элемента каталога " . $arElement["ID"] . " Цена " . $price . PHP_EOL;
		    } 
		    else {
		        echo "Ошибка добавления цены у товара у элемента каталога " . $id . " Ошибка " . $result->getErrorMessages() . PHP_EOL;
		    }
		}
	}

	public function measureUpdate($id, $data)
	{
		$dbPrice = \Bitrix\Catalog\MeasureRatioTable::getList([
		    "filter" => [
		        "PRODUCT_ID" => $id
			]
		]);


		if ($arPrice = $dbPrice->fetch()) {
		    $result = \Bitrix\Catalog\MeasureRatioTable::update($arPrice["ID"], $data);                        
		    if ($result->isSuccess())
		    {
		   //echo "Обновили цену у товара у элемента каталога " . $arElement["ID"] . " Цена " . $price . PHP_EOL;
		    } 
		    else {
		        echo "Ошибка обновления цены у товара у элемента каталога " . $id . " Ошибка " . $result->getErrorMessages() . PHP_EOL;
		    }
		}else{
		    $result = \Bitrix\Catalog\MeasureRatioTable::add($data);
		    if ($result->isSuccess())
		    {
		        //echo "Добавили цену у товара у элемента каталога " . $arElement["ID"] . " Цена " . $price . PHP_EOL;
		    } 
		    else {
		        echo "Ошибка добавления цены у товара у элемента каталога " . $id . " Ошибка " . $result->getErrorMessages() . PHP_EOL;
		    }
		}
	}
}

//$csv = file_get_contents('items.csv');
$csv = array_map('str_getcsv', file('items.csv'));
$names = [];

$arSelect = Array("ID", "NAME");
$arFilter = Array("IBLOCK_ID"=>15, );
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>5000), $arSelect);
while($ob = $res->GetNextElement())
{
 $arFields = $ob->GetFields();
 $names[$arFields['NAME']] = $arFields['ID'];
}


$test = [];
foreach ($csv as $key=>$elem) {
	if ($key == 0)
		continue;

	$id = 0;
	$import = new importCsv($elem);
	if ($names[$elem[1]] < 1) {
		//$import->build();
		//$id = $import->save();
	} else {
		$id = $names[$elem[1]];
	}
	if ($id > 0) {
		$import->createProduct($id);
	}
}