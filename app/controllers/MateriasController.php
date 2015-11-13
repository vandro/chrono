<?php

/**
 * Description of UsuarioController
 *
 * @author Charles Souza <charlessouzasalesjr@gmail.com>
 */
class MateriasController {
    
    public function actionListar() {

        $listarMateria = Materia::model()->findAll();
        $this->render('listarMateria', [
            'materia' => $listarMateria
        ]);
    }

    public function actionApagar($id) {

        Materia::model()->deleteByPk($id);
    }
    
    public function actionEditar($id) {

        if ($this->request->isPost) {

            $editarMateria = Topico::model()->findByPk($id);
            $editarMateria->topico = $this->request->getPost('topico');
            $editarMateria->save();
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

        if ($this->request->isPost) {
            $cadastrarMateria = new Materia;
            $cadastrarMateria->topico = $this->request->getPost('materia');
            $cadastrarMateria->save();
        }
    }
}
