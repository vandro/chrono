<?php /* @var $this XController */ ?>
<?php /* @var $materias Materia[] */ ?>
<?php $icoApagar = '<i class="fa fa-fw fa-times fa-2x text-danger"></i>'; ?>

<h1 class="sr-only">Conteúdo Programático</h1>

<?php foreach ($materias as $materia) : ?>
    <div class="studyplan">
        <div class="studyplan-heading" id="materia-<?= $materia->id ?>">
            <?= CHtml::beginForm(['materias/editar', 'id' => $materia->id], 'post') ?>
            <div class="inline-edition">
                <input type="text" name="titulo" value="<?= $materia->titulo ?>"
                       class="form-control" maxlength="70" autocomplete="off"
                       placeholder="Digite o nome da matéria&hellip;" tabindex="-1" required>
                <input type="submit" value="Salvar" class="btn btn-default">
            </div>
            <?= CHtml::endForm() ?>
            <div class="inline-controls">
                <?= CHtml::link($icoApagar, ['materias/apagar', 'id' => $materia->id],
                        ['class' => 'btn btn-link', 'data-confirm' => "Você quer mesmo apagar a matéria {$materia->titulo}?"]) ?>
            </div>
        </div>

        <?php if ($this->user->hasFlash("erroTopico{$materia->id}")) : ?>
            <div class="alert alert-danger" id="erroTopicoMsg">
                <?= $this->user->getFlash("erroTopico{$materia->id}") ?>
            </div>
        <?php endif; ?>

        <?php ob_start(); ?>
        <?= CHtml::beginForm(['topico/cadastrar'], 'post', ['id' => '']) ?>
        <div class="inline-edition">
            <input type="hidden" name="materia_id" value="<?= $materia->id ?>">
            <input type="text" name="titulo" value="" class="form-control"
                   maxlength="140" autocomplete="off" tabindex="-1"
                   placeholder="Clique e digite para adicionar um tópico em <?= $materia->titulo ?>&hellip;"
                   required>
            <input type="submit" value="Salvar" class="btn btn-default">
        </div>
        <?= CHtml::endForm() ?>
        <?php $formNovoTopico = ob_get_clean(); ?>

        <?php if (count($materia->topicos)) : ?>
            <table class="table table-hover table-condensed studyplan-table">
                <tbody>
                    <?php foreach ($materia->topicos as $topico) : ?>
                    <tr id="topico-<?= $topico->id ?>"
                        class="<?= isset($topico->dt_conclusao) ? 'finished' : '' ?>">
                            <td class="collapsing">
                                <?php $icoLinha = isset($topico->dt_conclusao) ? 'fa-check-square-o' : 'fa-square-o'; ?>
                                <i class="fa fa-fw <?= $icoLinha ?>"></i>
                            </td>
                            <td class="col-sm-10">
                                <?= CHtml::beginForm(['topico/editar', 'id' => $topico->id], 'post', ['id' => '']) ?>
                                <div class="inline-edition">
                                    <input type="hidden" name="materia_id" value="<?= $materia->id ?>">
                                    <input type="text" name="titulo" value="<?= $topico->titulo ?>" class="form-control"
                                           maxlength="140" autocomplete="off" tabindex="-1"
                                           placeholder="Digite o título do tópico&hellip;"
                                           required>
                                    <input type="submit" value="Salvar" class="btn btn-default">
                                </div>
                                <?= CHtml::endForm() ?>
                            </td>
                            <td class="text-center studyplan-btns collapsing">
                                <div class="btn-group btn-group-xs">
                                    <?= CHtml::link($icoApagar, ['topico/apagar', 'id' => $topico->id],
                                            ['class' => 'btn btn-link', 'data-confirm' => "Você quer mesmo apagar o tópico {$topico->titulo}?"]) ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            <?= $formNovoTopico ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        <?php else : ?>
            <div class="studyplan-body">
                <?php if (count($materias) === 1) : ?>
                    <div class="container-fluid">
                        <div class="col-sm-10 col-sm-offset-1">
                            <p class="lead text-muted text-center">
                                <i class="fa fa-graduation-cap fa-5x fa-fw"></i>
                            </p>
                            <p class="lead text-muted text-justify">
                                A matéria <?= $materia->titulo ?> não possui conteúdo para estudo.
                                Pegue já o programa de conteúdo do concurso ou prova que você
                                está estudando e comece a cadastrá-lo aqui.
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="clearfix">
                    <?= $formNovoTopico ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<div class="studyplan">
    <div class="studyplan-heading" id="materia-nova">
        <?= CHtml::beginForm(['materias/cadastrar'], 'post', ['id' => '']) ?>
        <div class="inline-edition">
            <input type="text" name="titulo" value="" class="form-control"
                   maxlength="70" autocomplete="off" placeholder="Clique e digite para adicionar uma matéria&hellip;"
                   tabindex="-1" required>
            <input type="submit" value="Salvar" class="btn btn-default">
        </div>
        <?= CHtml::endForm() ?>
    </div>

    <?php
    $bMostraDica = (count($materias) === 0);
    $bTemFlash = ($this->user->hasFlash('erroMateria'));

    if ($bMostraDica || $bTemFlash) :
        ?>
        <div class="studyplan-body">
            <?php if ($bTemFlash) : ?>
                <div class="alert alert-danger" id="erroMateriaMsg">
                    <?= $this->user->getFlash('erroMateria') ?>
                </div>
            <?php endif; ?>

            <?php if ($bMostraDica) : ?>
                <p class="lead text-center text-muted">
                    <i class="fa fa-hand-peace-o fa-5x fa-fw"></i>
                    <br><br>
                    Olá! Vejo que o seu plano de estudos está bem vazio no momento.
                    <br>
                    Que tal começar adicionando uma nova matéria ao seu plano?
                </p>
            <?php endif; ?>
        </div>
        <?php
    endif;
    ?>
</div>