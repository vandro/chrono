<?php

/**
 * Description of MateriaController
 *
 * @author Charles Souza <charlessouzasalesjr@gmail.com>
 */
class MateriasController extends XController {
    
    public function actionListar() {
        $this->desligarLog();
        $materias = Materia::model()->findAll(['order' => 't.titulo']);
        $this->render('listarMateria', [
            'materias' => $materias
        ]);
    }

    public function actionApagar($id) {

        Materia::model()->deleteByPk($id);
    }
    
    public function actionEditar($id) {

        if ($this->request->isPostRequest) {

            $editarMateria = Materia::model()->findByPk($id);
            $editarMateria-> materia = $this->request->getPost('materia');
            $editarMateria-> save();
        } else {
            $this->render('formEditarMateria');
        }
    }
    
    public function actionAbrir($id) {

        $abrirMateria = Materia::model()->findByPk($id);
        $this->render('formEditarMateria', [
            'materia' => $abrirMateria
        ]);
    }
    
    public function actionCadastrar() {
        $urlRetorno = ['materias/listar'];
        if ($this->request->isPostRequest) {
            $materia = new Materia;
            $materia->titulo = $this->request->getPost('titulo');
            $materia->usuario_id = 1; //$this->user->id;
            $materia->dt_criacao = date('Y-m-d H:i:s');
            if ($materia->save()){
                $materia->refresh();
                $urlRetorno['#'] = "materia-{$materia->id}";
                $this->user->setFlash('success', 'Esta materia foi criada com sucesso.');
            } else {
                $urlRetorno['#'] = "erroMateriaMsg";
                $htmlErro = CHtml::errorSummary($materia, 'Erro ao cadastrar esta materia, verifique se está tudo correto!');
                $this->user->setFlash('erroMateria', $htmlErro);
            }
            $this->redirect($urlRetorno);
        }

    }
}
