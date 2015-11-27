<?php

/**
 * Description of TopicoController
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

        if ($this->request->isPostRequest) {

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

        if ($this->request->isPostRequest) {
            $cadastrarTopico = new Topico;
            $cadastrarTopico-> materia_id = $this->request->getPost('');
            $cadastrarTopico-> titulo = $this->request->getPost('titulo');
            $cadastrarTopico-> dif_esperada = $this->request->getPost('dif_esperada');
            $cadastrarTopico-> dif_encontrada = $this->request->getPost('dif_encontrada');
            $cadastrarTopico-> dt_criacao = date('Y-m-d');
            if ($cadastrarTopico->save()) {
                $this->user->setFlash('success', 'Este topico foi criado com sucesso.');
                $this->redirect(['topico/novoTopico']);
            } else { 
                $this->user->setFlash('error', 'Error ao cadastrar este topico, verifique se está tudo correto!');
            }
        }
    }

}
