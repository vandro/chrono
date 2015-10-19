<?php

return [
    'normalize' => [
        'baseUrl' => '/vendor/normalize-css',
        'css' => ['normalize.css'],
    ],
    'open-iconic' => [
        'baseUrl' => '/vendor/open-iconic/font/css',
        'css' => [YII_DEBUG ? 'open-iconic.css' : 'open-iconic.min.css'],
    ],
];
