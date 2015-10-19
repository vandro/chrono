<?php
/* @var $this XController */
$this->clientScript
        ->registerPackage('normalize')
        ->registerPackage('open-iconic')
        ->registerCssFile('/build/css/style.css')
        ->registerCssFile('https://fonts.googleapis.com/css?family=Poiret+One');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=content-width">
        <title><?= Yii::app()->name ?></title>
    </head>
    <body>
        <div class="centered">
            <?= $content ?>
        </div>
        <?= $this->renderPartial('/layouts/incl/piwik', null, true) ?>
    </body>
</html>
