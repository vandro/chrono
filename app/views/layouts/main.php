<?php
/* @var $this XController */
$this->clientScript
        ->registerPackage('normalize')
        ->registerCssFile('https://fonts.googleapis.com/css?family=Comfortaa:300,700|Maven+Pro:400,500')
        ->registerCssFile(Yii::app()->baseUrl . '/assets/bootstrap/dist/css/bootstrap.min.css')
        ->registerCssFile(Yii::app()->baseUrl . '/assets/font-awesome/css/font-awesome.min.css')
        ->registerCssFile(Yii::app()->baseUrl . '/build/css/chrono.css')
        ->registerScriptFile(Yii::app()->baseUrl . '/build/js/chrono.js');
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=content-width,initial-scale=1.0">
        <title><?= Yii::app()->name ?></title>
    </head>
    <body>

        <aside class="sidebar">
            <header>
                Chrono
                <a href="#" class="btn btn-link" role="button"
                   aria-label="Menu"><i class="fa fa-bars"></i><span class="sr-only">Menu</span></a>
            </header>
            <nav role="navigation">
                <?php if ($this->user->isGuest) : ?>
                    <?= CHtml::link('Login', ['usuario/login']) ?>
                    <?= CHtml::link('Cadastrar-se', ['usuario/cadastrar']) ?>
                <?php else : ?>
                    <?= CHtml::link('Plano de Estudos', ['materias/listar']) ?>
                    <hr>
                    <?= CHtml::link('Seu cadastro', ['usuario/editar']) ?>
                    <?= CHtml::link('Sair', ['usuario/logout']) ?>
                <?php endif; ?>
            </nav>
        </aside>

        <main role="main">

            <?php if ($this->user->hasFlash('success')) : ?>
                <div class="alert alert-success">
                    <?= $this->user->getFlash('success') ?>
                </div>
            <?php endif; ?>

            <?php if ($this->user->hasFlash('error')) : ?>
                <div class="alert alert-danger">
                    <?= $this->user->getFlash('error') ?>
                </div>
            <?php endif; ?>

            <?php if ($this->user->hasFlash('info')) : ?>
                <div class="alert alert-info">
                    <?= $this->user->getFlash('info') ?>
                </div>
            <?php endif; ?>

            <?= $content ?>

        </main>

        <!-- Analytics -->
        <?= $this->renderPartial('/layouts/incl/piwik', null, true) ?>
    </body>
</html>
