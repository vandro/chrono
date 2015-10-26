<?php /* @var $this XController */ ?>
<?php /* @var $model Materia */ ?>
<?php /* @var $materias Materia[] */ ?>
<?php /* @var $form CActiveForm */ ?>
<p>&nbsp;</p>
<div class="container">
    <?php $form = $this->beginWidget('CActiveForm'); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">Nova Matéria</div>
        <div class="panel-body">
            <div class="form-group <?= $model->hasErrors('titulo') ? 'has-error' : '' ?>">
                <?= $form->label($model, 'titulo', ['class' => 'control-label']) ?>
                <?= $form->textField($model, 'titulo', [
                    'class' => 'form-control',
                    'placeholder' => $model->getAttributeLabel('titulo'),
                ]) ?>
                <?= $form->error($model, 'titulo', ['class' => 'help-block']) ?>
            </div>
        </div>
        <div class="panel-footer">
            <?= CHtml::submitButton('Salvar', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>
    
    <div class="divider"></div>
    
    <div class="panel panel-default">
        <div class="panel-heading">Matérias cadastradas</div>
        <div class="panel-body">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th class="col-sm-1">Id</th>
                        <th>Título</th>
                        <th class="col-sm-2">Data de Criação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($materias as $materia) : ?>
                    <tr>
                        <td><?= $materia->id ?></td>
                        <td><?= $materia->titulo ?></td>
                        <td><?= $materia->dt_criacao ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
