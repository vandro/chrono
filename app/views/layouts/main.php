<?php
/* @var $this XController */
$this->clientScript
        ->registerPackage('normalize')
        ->registerCssFile('https://fonts.googleapis.com/css?family=Comfortaa:300,700|Maven+Pro:400,500')
        ->registerCssFile('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')
        ->registerCssFile('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css')
        ->registerCssFile(Yii::app()->baseUrl . '/build/css/chrono.css')
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
                <a href="/usuario/login">Login</a>
                <a href="/usuario/cadastrar">Cadastro de usuário</a>
                <a href="/materias/listar">Conteúdo programático</a>
<!--                <a href="pages/table.html" data-page="table">Tabela</a>
                <a href="pages/typo.html" data-page="typo">Tipografia</a>
                <a href="pages/elements.html" data-page="elements">Outros Elementos</a>-->
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

            <?= $content ?>

        </main>

        <!-- Analytics -->
        <?= $this->renderPartial('/layouts/incl/piwik', null, true) ?>
    </body>
</html>
