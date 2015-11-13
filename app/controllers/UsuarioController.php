<?php

/**
 * Description of UsuarioController
 *
 * @author Charles Souza <charlessouzasalesjr@gmail.com>
 */
class UsuarioController extends XController {

    public function actionListar() {

        $listarUsuario = Usuario::model()->findAll();
        $this->render('listarUsuario', [
            'usuario' => $listarUsuario
        ]);
    }

    public function actionEditar($id) {

        if ($this->request->isPost) {

            $editarUsuario = Usuario::model()->findByPk($id);
            $editarUsuario->pnome = $this->request->getPost('pnome');
            $editarUsuario->snome = $this->request->getPost('snome');
            $editarUsuario->email = $this->request->getPost('email');
            $editarUsuario->senha = $this->request->getPost('senha');
            $editarUsuario->save();
        } else {
            $this->render('formEditar');
        }
    }

    public function actionApagar($id) {

        Usuario::model()->deleteByPk($id);
    }

    public function actionAbrir($id) {

        $abrirUsuario = Usuario::model()->findByPk($id);
        $this->render('formEditar', [
            'usuario' => $abrirUsuario
        ]);
    }

    public function actionCadastrar() {

        if ($this->request->isPost) {
            $cadastrarUsuario = new Usuario;
            $cadastrarUsuario->pnome = $this->request->getPost('pnome');
            $cadastrarUsuario->snome = $this->request->getPost('snome');
            $cadastrarUsuario->email = $this->request->getPost('email');
            $cadastrarUsuario->senha = $this->request->getPost('senha');
            $cadastrarUsuario->dt_criacao = date('Y-m-d');
            $cadastrarUsuario->save();
        } else {
            $this->render('formEditar');
        }
    }

}
