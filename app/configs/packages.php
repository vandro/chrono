<?php

return [
    'normalize' => [
        'baseUrl' => '/assets/normalize-css',
        'css' => ['normalize.css'],
    ],
    'open-iconic' => [
        'baseUrl' => '/assets/open-iconic/font/css',
        'css' => [YII_DEBUG ? 'open-iconic.css' : 'open-iconic.min.css'],
    ],
];
