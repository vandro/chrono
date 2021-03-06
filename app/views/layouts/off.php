<?php
/* @var $this XController */
$this->clientScript
        ->registerPackage('normalize')
        ->registerPackage('open-iconic')
        ->registerCssFile('/build/css/off.css')
        ->registerCssFile('https://fonts.googleapis.com/css?family=Comfortaa:300');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=content-width">
        <title><?= Yii::app()->name ?></title>
        <style type="text/css">
            footer {
                position: fixed;
                top: auto;
                left: 0;
                right: 0;
                bottom: 0;
                width: auto;
                height: auto;
                text-align: right;
            }
            footer > nav {
                margin: 5px;
            }
            footer > nav > a {
                display: inline-block;
                text-decoration: none;
                font-family: Verdana, Arial, sans-serif;
                font-size: 10px;
                text-transform: uppercase;
                color: #fff;
                padding: 5px;
            }
            footer > nav > a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="centered">
            <?= $content ?>
        </div>
        <footer>
            <nav>
                <?= CHtml::link('Ir para a aplicação', ['materias/listar']) ?>
            </nav>
        </footer>
        <?= $this->renderPartial('/layouts/incl/piwik', null, true) ?>
    </body>
</html>
