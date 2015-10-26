<?php

/**
 *
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class MateriasController extends XController {

    public function actionIndex() {
        $model = new Materia;
        
        if ($this->request->isPostRequest) {
            $model->attributes = $this->request->getPost('Materia', []);
            if ($model->save()) {
                $this->redirect(['materias/index']);
            }
        }
        
        /**
         * Lista de matérias já cadastradas no banco de dados.
         */
        $materias = Materia::model()->findAll(['order' => 'titulo']);
        
        $this->render('index', compact('model', 'materias'));
    }

}
