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
            $cadastrarNota-> descricao = $this->request->getPost('descricao');
            $cadastrarNota-> situacao = $this->resquest->getPost('situacao');
            $cadastrarNota-> topico_id = $this->resquet->getPost('topico_id');
            $cadastrarNota-> dt_criacao = date('Y-m-d');
            if ($cadastrarNota->save()) {
                $this->user->setFlash('success', 'Esta nota foi criad com sucesso.');
                $this->redirect(['nota/novaNota']);
            } else { 
                $this->user->setFlash('error', 'Error ao cadastrar esta nota, verifique se está tudo correto!');
            }
        }
    }
}
