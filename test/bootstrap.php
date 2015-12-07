<?php

/**
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */

define('YII_DEBUG', 'test');
define('WEB_ROOT', dirname(dirname(__FILE__)) . '/web');
define('APP_ROOT', dirname(dirname(__FILE__)) . '/app');

$yiit = 'Yii-1.1.16/yiit.php';
$config = dirname(dirname(__FILE__)) . '/app/configs/testConfig.php';
require_once($yiit);

Yii::$enableIncludePath = false;
Yii::createWebApplication($config);
