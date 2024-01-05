<?php

namespace Midow\Ferma\Handlers;

use \Bitrix\Main\Loader;
use Bitrix\Main\Page\Asset;
use Bitrix\Main\Application;

class Main
{

    public static function OnEpilog()
    {
        if (defined('ADMIN_SECTION')) {
            return;
        }

        $asset = Asset::getInstance();
        $asset->addJs('/bitrix/js/midow.ferma/main.js');
        $asset->addCss('/bitrix/css/midow.ferma/main.css');
    }

}
