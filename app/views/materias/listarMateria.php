<?php /* @var $materias Materia[] */ ?>
<h1 class="sr-only">Conteúdo Programático</h1>

<?php foreach ($materias as $materia) : ?>
    <div class="studyplan">
        <h2 class="studyplan-heading" id="materia-<?= $materia->id ?>"><?= $materia->titulo ?></h2>
        <table class="table table-hover studyplan-table">
            <tbody>
                <?php if (count($materia->topicos)) : ?>
                    <?php foreach ($materia->topicos as $topico) : ?>
                        <tr id="topico-<?= $topico->id ?>">
                            <td class="collapsing"><i class="fa fa-fw fa-square-o"></i></td>
                            <td class="col-sm-10">
                                <?= $topico->titulo ?>
                            </td>
                            <td class="text-center studyplan-btns">
                                <div class="btn-group btn-group-xs">
                                    <a href="#" class="btn btn-link"><i class="fa fa-fw fa-arrows"></i></a>
                                    <a href="#" class="btn btn-link"><i class="fa fa-fw fa-calendar-check-o"></i></a>
                                    <a href="#" class="btn btn-link"><i class="fa fa-fw fa-times"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" class="text-muted">
                            Não há tópico cadastrado nesta matéria.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <?php if ($this->user->hasFlash("erroTopico{$materia->id}")) : ?>
                            <div class="alert alert-danger" id="erroTopicoMsg">
                                <?= $this->user->getFlash("erroTopico{$materia->id}") ?>
                            </div>
                        <?php endif; ?>
                        <?= CHtml::beginForm(['topico/cadastrar'], 'post') ?>
                        <?= CHtml::hiddenField('materia_id', $materia->id) ?>
                        <div class="col-sm-11">
                            <div class="form-group">
                                <label for="titulo_topico" class="sr-only">Cadastrar tópico nesta matéria:</label>
                                <input type="text" name="titulo_topico" id="titulo_topico" class="form-control"
                                       placeholder="Cadastrar tópico em <?= $materia->titulo ?>">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <input type="submit" value="+" class="btn btn-primary btn-block">
                        </div>
                        <?= CHtml::endForm() ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
<?php endforeach; ?>

<?= CHtml::beginForm(['materias/cadastrar'], 'post', ['class' => 'form-horizontal']) ?>
<div class="container-fluid">
    <div class="row">
        <?php if ($this->user->hasFlash('erroMateria')) : ?>
            <div class="alert alert-danger" id="erroMateriaMsg">
                <?= $this->user->getFlash('erroMateria') ?>
            </div>
        <?php endif; ?>
        <div class="col-sm-11">
            <div class="form-group">
                <label for="titulo" class="sr-only">Título da matéria</label>
                <input type="text" name="titulo" id="pnome" class="form-control" placeholder="Nova matéria">
            </div>
        </div>
        <div class="col-sm-1">
            <input type="submit" value="+" class="btn btn-primary btn-block">
        </div>
    </div>
</div>
<?= CHtml::endForm() ?>
