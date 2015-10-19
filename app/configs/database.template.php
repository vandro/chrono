<?php

return [
    'class' => 'CDbConnection',
    'driverName' => 'mysql',
    'connectionString' => 'mysql:host=localhost;port=3306;dbname=chrono',
    'username' => '',
    'password' => '',
    'charset' => 'utf8',
    'enableProfiling' => YII_DEBUG,
    'enableParamLogging' => YII_DEBUG,
    'schemaCachingDuration' => YII_DEBUG ? 0 : 3600 * 6, // imediato (dev), 6 horas (prod)
];
