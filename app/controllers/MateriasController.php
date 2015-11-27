<?php

/**
 * Description of MateriaController
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

        if ($this->request->isPostRequest) {
            $cadastrarMateria = new Materia;
            $materia-> titulo = $this->request->getPost('titulo');
            $materia-> usuario_id = $this-> user-> id;
            $materia-> dt_criacao = date('Y-m-d');
            if ($cadastrarMateria-> save()){
                $this->user->setFlash('success', 'Esta materia foi criada com sucesso.');
                $this->redirect(['mateira/novaMateria']);
            } else{
                $this->user->setFlash('error', 'Error ao cadastrar esta materia, verifique se está tudo correto!');
            }
        }
    }
}
