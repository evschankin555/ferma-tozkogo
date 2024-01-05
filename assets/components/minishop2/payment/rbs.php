<?php

define('MODX_API_MODE', true);

require dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/index.php';

$modx->getService('error', 'error.modError');
$modx->setLogLevel(modX::LOG_LEVEL_ERROR);
$modx->setLogTarget('FILE');

$miniShop2 = $modx->getService('minishop2');
$miniShop2->loadCustomClasses('payment');

if (!class_exists('RBS')) {
    exit('Error: could not load payment class "RBS".');
}
$context = '';
$params = array();

$handler = new RBS($modx->newObject('msOrder'));
if (isset($_GET['orderId'])) {
    $result = $handler->receiver($_GET['orderId']);
} else {
    $handler->returnMain();
}
die;