<h1>Registre-se</h1>

<?= CHtml::beginForm('', 'post') ?>
<div class="panel panel-default">
    <div class="panel-body">

        <?php if ($this->user->hasFlash('erroCadastro')) : ?>
            <?= $this->user->getFlash('erroCadastro') ?>
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
                        <input type="email" name="email" id="email" class="form-control"
                               placeholder="E-mail" value="<?= $usuario->email ?>">
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
        <a href="pages/login.html" data-page="login" class="btn btn-link">Já é cadastrado? Identifique-se.</a>
        <input type="submit" value="Cadastrar" class="btn btn-primary pull-right">
    </div>
</div>
<?= CHtml::endForm() ?>
