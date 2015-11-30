<div class="main-card">
    <h1>Entrar no sistema</h1>
    <section class="panel panel-default" id="pnLogin">
        <div class="panel-body">
            <?= CHtml::beginForm() ?>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" placeholder="E-mail"
                           value="<?= $usuario ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha"
                           value="" placeholder="Senha" class="form-control">
                </div>
                <a href="#" class="btn btn-link" id="lnkEsqueciSenha">Esqueceu a senha?</a>
                <input type="submit" value="Entrar agora" class="btn btn-primary pull-right">
            <?= CHtml::endForm() ?>
        </div>
        <div class="panel-footer text-center text-muted">
            Ainda não tem cadastro?
            <br>
            <?= CHtml::link('Cadastre-se agora', ['usuario/cadastrar'], ['class' => 'btn btn-default']) ?>
        </div>
    </section>
</div>