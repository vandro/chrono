<?php

/**
 * Description of TopicoController
 *
 * @author Charles Souza <charlessouzasalesjr@gmail.com>
 */
class TopicoController extends XController {

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
        $urlRetorno = ['materias/listar'];
        if ($this->request->isPostRequest) {
            $topico = new Topico;
            $topico->materia_id = $this->request->getPost('materia_id');
            $topico->titulo = $this->request->getPost('titulo_topico');
            $topico->dif_esperada = 'F'; //$this->request->getPost('dif_esperada');
            $topico->dif_encontrada = null; //$this->request->getPost('dif_encontrada');
            $topico->dt_criacao = date('Y-m-d H:i:s');
            if ($topico->save()) {
                $topico->refresh();
                $urlRetorno['#'] = "topico-{$topico->id}";
                $this->user->setFlash('success', 'Este tópico foi criado com sucesso.');
            } else {
                $urlRetorno['#'] = 'erroTopicoMsg';
                $htmlErro = CHtml::errorSummary($topico, 'Error ao cadastrar este topico, verifique se está tudo correto!');
                $this->user->setFlash("erroTopico{$topico->materia_id}", $htmlErro);
            }
            $this->redirect($urlRetorno);
        }
    }

}
