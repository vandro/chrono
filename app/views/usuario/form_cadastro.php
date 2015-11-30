<?php /* @var $this XController */ ?>
<?php /* @var $usuario Usuario */ ?>
<div class="main-card">
    <h1>Registre-se</h1>

    <?= CHtml::beginForm('', 'post') ?>
    <div class="panel panel-default">
        <div class="panel-body">

            <?php if ($this->user->hasFlash('erroCadastro')) : ?>
                <div class="alert alert-danger">
                    <?= $this->user->getFlash('erroCadastro') ?>
                </div>
            <?php endif; ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pnome">Primeiro nome</label>
                            <input type="text" name="pnome" id="pnome" class="form-control"
                                   placeholder="Primeiro nome" value="<?= $usuario->pnome ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="snome">Último nome</label>
                            <input type="text" name="snome" id="snome" class="form-control"
                                   placeholder="Último nome" value="<?= $usuario->snome ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <?php if (isset($usuario) && !$usuario->isNewRecord) : ?>
                                <p class="form-control-static">
                                    <?= $usuario->email ?>
                                    <span class="small text-muted">(O e-mail não pode ser alterado no momento.)</span>
                                </p>
                            <?php else : ?>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="E-mail" value="<?= $usuario->email ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="senha_confirma">Confirme a senha</label>
                            <input type="password" name="senha_confirma" id="senha_confirma" class="form-control" placeholder="Confirme a senha">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <?php if (isset($usuario) && !$usuario->isNewRecord) : ?>
                <input type="submit" value="Salvar alterações" class="btn btn-primary pull-right">
            <?php else : ?>
                <?= CHtml::link('Já tem cadastro? Identifique-se.', ['usuario/login'], ['class' => 'btn btn-link']) ?>
                <input type="submit" value="Cadastrar" class="btn btn-primary pull-right">
            <?php endif; ?>
        </div>
    </div>
    <?= CHtml::endForm() ?>
</div>
