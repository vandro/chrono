<?php
/* @var $this XController */
$this->clientScript
        ->registerPackage('normalize')
        ->registerCssFile('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=content-width">
        <title><?= Yii::app()->name ?></title>
    </head>
    <body>
        <?= $content ?>
        <?= $this->renderPartial('/layouts/incl/piwik', null, true) ?>
    </body>
</html>
