<?php

/**
 * Description of AgendaController
 *
 * @author Charles Souza <charlessouzasalesjr@gmail.com>
 */
class AgendaController {
    
        public function actionApagar($id) {

        Agenda::model()->deleteByPk($id);
    }
    
    public function actionEditar($id) {

        if ($this->request->isPostRequest) {

            $editarAgenda = Agenda::model()->findByPk($id);
            $editarAgenda-> agenda = $this->request->getPost('agenda');
            $editarAgenda-> save();
        } else {
            $this->render('formEditarAgenda');
        }
    }
    
    public function actionAbrir($id) {

        $abrirAgenda = Agenda::model()->findByPk($id);
        $this->render('formEditarAgenda', [
            'agenda' => $abrirAgenda
        ]);
    }
    
    public function actionCadastrar() {

        if ($this->request->isPostRequest) {
            $cadastrarAgenda = new Agenda;
            $cadastrarAgenda-> agenda = $this->request->getPost('agenda');
            $cadastrarAgenda->save();
        }
    }
}