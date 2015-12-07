<?php


return CMap::mergeArray(
        require_once(dirname(__FILE__) . '/mainConfig.php'),
        [
            'components' => [
                'fixture' => [
                    'class' => 'system.test.CDbFixtureManager',
                ],
                'db' => require_once(dirname(__FILE__) . '/databaseTest.php'),
            ],
        ]);

