<?php

$packagesConfigFile = APP_ROOT . '/configs/packages.php';
$databaseConfigFile = APP_ROOT . '/configs/database.php';
$paramsConfigFile = APP_ROOT . '/configs/params.php';
$routesConfigFile = APP_ROOT . '/configs/routes.php';

return [
    'name' => 'Chrono',
    'basePath' => APP_ROOT,
    'timeZone' => 'America/Recife',
    'language' => 'pt_br',
    'defaultController' => 'materias',
    'import' => [
        'application.components.*',
        'application.models.*',
    ],
    'preload' => ['log'],
    'components' => [
        'log' => [
            'class' => 'CLogRouter',
            'routes' => [
                [
                    'class' => 'CFileLogRoute',
                    'enabled' => !YII_DEBUG,
                ],
                [
                    'class' => 'CProfileLogRoute',
                    'enabled' => YII_DEBUG,
                ],
                [
                    'class' => 'CWebLogRoute',
                    'enabled' => YII_DEBUG,
                ]
            ],
        ],
        'db' => require_once($databaseConfigFile),
        'clientScript' => [
            'coreScriptPosition' => CClientScript::POS_END,
            'defaultScriptFilePosition' => CClientScript::POS_END,
            'defaultScriptPosition' => CClientScript::POS_READY,
            'packages' => require_once($packagesConfigFile),
        ],
        'urlManager' => [
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => require_once($routesConfigFile),
        ],
        'request' => [
            'enableCsrfValidation' => false,
            'enableCookieValidation' => true,
        ],
        'cache' => [
            'class' => 'CFileCache',
            'cacheFileMode' => 0660,
            'cachePathMode' => 0770,
            'directoryLevel' => 1,
        ],
        'errorHandler' => [
            'adminInfo' => 'a equipe de desenvolvimento',
            'errorAction' => YII_DEBUG ? null : 'default/error',
        ],
        'user' => [
            'loginUrl' => ['usuario/login'],
        ],
    ],
];
