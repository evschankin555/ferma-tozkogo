<?php

use \Bitrix\Main\EventManager;
use \Bitrix\Main\ModuleManager;
use \Bitrix\Main\Config\Option;

IncludeModuleLangFile(__FILE__);

Class midow_ferma extends CModule
{
	var $MODULE_ID = 'midow.ferma'; 
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $strError = '';

	function __construct()
	{
		$arModuleVersion = array();
		include(dirname(__FILE__)."/version.php");

		$this->MODULE_VERSION = $arModuleVersion['VERSION'];
		$this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];

		$this->MODULE_NAME = GetMessage('MIDOW_FERMA_MODULE_NAME');
		$this->MODULE_DESCRIPTION = GetMessage('MIDOW_FERMA_MODULE_DESCRIPTION');

		$this->PARTNER_NAME = GetMessage('MIDOW_FERMA_PARTNER_NAME');
		$this->PARTNER_URI = GetMessage('MIDOW_FERMA_PARTNER_URI');
	}

	function DoInstall()
	{
		global $APPLICATION;

		ModuleManager::registerModule($this->MODULE_ID);

		$eventManager = EventManager::getInstance();
		$eventManager->registerEventHandler(
			'main',
			'OnEpilog',
			$this->MODULE_ID,
			'Midow\Ferma\Handlers\Main',
			'OnEpilog'
		);
	}

	function DoUninstall()
	{
		global $APPLICATION;

		Option::delete($this->MODULE_ID);

		$eventManager = EventManager::getInstance();
		$eventManager->unRegisterEventHandler(
			'main',
			'OnEpilog',
			$this->MODULE_ID,
			'Midow\Ferma\Handlers\Main',
			'OnEpilog'
		);

		ModuleManager::unRegisterModule($this->MODULE_ID);
	}

}
