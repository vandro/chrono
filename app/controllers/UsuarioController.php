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
            if ($editarUsuario->save()){
                $this->user->setFlash('success', 'Sua atualização foi realizada com sucesso.');
            }
        }
        $this->render('formEditar');
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
            $usuario = new Usuario;
            $usuario->pnome = $this->request->getPost('pnome');
            $usuario->snome = $this->request->getPost('snome');
            $usuario->email = $this->request->getPost('email');
            $usuario->senha = $this->request->getPost('senha');
            $usuario->dt_criacao = date('Y-m-d');
            if ($usuario->save()) {
                $this->user->setFlash('success', 'Seu cadastro foi realizado com sucesso.');
                $this->redirect(['usuario/login']);
            } else {
                $this->user->setFlash('error', 'Seu cadastro não foi realizado com sucesso, verifique se está tudo correto!');
            }
        }
        $this->render('formEditar');
    }

}
