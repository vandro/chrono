<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
            <section class="panel panel-default" id="pnLogin">
                <div class="panel-heading">Entrar no sistema</div>
                <div class="panel-body">
                    <form class="form">
                        <div class="form-group">
                            <label class=" control-label" for="usuario">Usuário:</label>
                            <input type="text" id="usuario" placeholder="E-mail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="senha">Senha:</label>
                            <input type="password" id="senha" placeholder="Senha" class="form-control">
                        </div>
                        <a href="#" class="btn btn-link" id="lnkEsqueciSenha">Esqueceu a senha?</a>
                        <!--<input type="submit" value="Entrar agora" class="btn btn-primary pull-right">-->
                        <a href="/materias/listar" class="btn btn-primary pull-right">Entrar agora</a>
                    </form>
                </div>
                <div class="panel-footer text-center text-muted">
                    Ainda não tem cadastro?<br>
                    <a href="/usuario/cadastrar" class="btn btn-default">Cadastre-se agora</a>
                </div>
            </section>
        </div>
    </div>
</div>