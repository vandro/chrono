<?php

/**
 * Description of NotaController
 *
 * @author Charles Souza <charlessouzasalesjr@gmail.com>
 */
class NotaController {
    
    public function actionListar() {

        $listarNota = Nota::model()->findAll();
        $this->render('listarNota', [
            'nota' => $listarNota
        ]);
    }

    public function actionApagar($id) {

        Nota::model()->deleteByPk($id);
    }
    
    public function actionEditar($id) {

        if ($this->request->isPostRequest) {

            $editarNota = Nota::model()->findByPk($id);
            $editarNota-> nota = $this->request->getPost('nota');
            $editarNota-> save();
        } else {
            $this->render('editarNota');
        }
    }
    
    public function actionAbrir($id) {

        $abrirNota = Nota::model()->findByPk($id);
        $this->render('editarNota', [
            'nota' => $abrirNota
        ]);
    }
    
    public function actionCadastrar() {

        if ($this->request->isPostRequest) {
            $cadastrarNota = new Nota;
            $cadastrarNota-> nota = $this->request->getPost('nota');
            $cadastrarNota->save();
        }
    }
}
