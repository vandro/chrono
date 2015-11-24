<?php

/**
 * Description of TagController
 *
 * @author Charles Souza <charlessouzasalesjr@gmail.com>
 */
class TagController {
    
    public function actionListar() {

        $listarTag = Tag::model()->findAll();
        $this->render('listarTag', [
            'tag' => $listarTag
        ]);
    }

    public function actionApagar($id) {

        Tag::model()->deleteByPk($id);
    }
    
    public function actionEditar($id) {

        if ($this->request->isPost) {

            $editarTag = Tag::model()->findByPk($id);
            $editarTag-> tag = $this->request->getPost('tag');
            $editarTag-> save();
        } else {
            $this->render('editarTag');
        }
    }
    
    public function actionAbrir($id) {

        $abrirTag = Tag::model()->findByPk($id);
        $this->render('editarTag', [
            'tag' => $abrirTag
        ]);
    }
    
    public function actionCadastrar() {

        if ($this->request->isPost) {
            $cadastrarTag = new Tag;
            $cadastrarTag-> tag = $this->request->getPost('tag');
            $cadastrarTag-> save();
        }
    }
}
