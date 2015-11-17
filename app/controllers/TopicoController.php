<?php

/**
 * Description of UsuarioController
 *
 * @author Charles Souza <charlessouzasalesjr@gmail.com>
 */
class TopicoController {

    public function actionListar() {

        $listarTopico = Topico::model()->findAll();
        $this->render('listarTopico', [
            'topico' => $listarTopico
        ]);
    }

    public function actionApagar($id) {

        Topico::model()->deleteByPk($id);
    }
    
    public function actionEditar($id) {

        if ($this->request->isPost) {

            $editarTopico = Topico::model()->findByPk($id);
            $editarTopico->topico = $this->request->getPost('topico');
            $editarTopico->save();
        } else {
            $this->render('formEditarTopico');
        }
    }
    
    public function actionAbrir($id) {

        $abrirTopico = Topico::model()->findByPk($id);
        $this->render('formEditarTopico', [
            'topico' => $abrirTopico
        ]);
    }
    
    public function actionCadastrar() {

        if ($this->request->isPost) {
            $cadastrarTopico = new Topico;
            $cadastrarTopico->topico = $this->request->getPost('topico');
            $cadastrarUsuario->save();
        }
    }

}