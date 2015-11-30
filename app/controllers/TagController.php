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

        if ($this->request->isPostRequest) {

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

        if ($this->request->isPostRequest) {
            $tag = new Tag;
            $tag->texto = $this->request->getPost('texto');
            $tag->cor = $this->request->getPost('cor');
            $tag->usuario_id = $this->user->id;
            if ($tag->save()){
                $this->user->setFlash('success', 'Esta tag foi criada com sucesso.');
                $this->redirect(['tag/novaTag']);
            } else{
                $this->user->setFlash('error', 'Error ao cadastrar esta tag, verifique se está tudo correto!');
            }
        }
    }
}
