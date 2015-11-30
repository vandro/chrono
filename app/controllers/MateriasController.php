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
        /* @var $materia Materia */
        if (!($materia = Materia::model()->findByPk($id))) {
            $this->user->setFlash('error', '<i class="fa fa-fw fa-lg fa-frown-o"></i> '
                    . 'Desculpe! A matéria selecionada não foi encontrada!');
        } elseif ($materia->delete()) {
            $this->user->setFlash('success', "A matéria {$materia->titulo} e todo o seu conteúdo foi excluída.");
        } else {
            $this->user->setFlash('error', 'Não foi possível excluir a matéria selecionada. Tente de novo!');
        }
        $this->redirect(['materias/listar']);
    }
    
    public function actionEditar($id) {
        if ($this->request->isPostRequest) {
            $materia = Materia::model()->findByPk($id);
            $materia->titulo = $this->request->getPost('titulo');
            $materia->save();
            $this->redirect(['materias/listar', '#' => "materia-{$materia->id}"]);
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
                $this->user->setFlash('success', 'Ótimo! Uma nova matéria foi adicionada ao seu plano de estudos.');
            } else {
                $urlRetorno['#'] = "erroMateriaMsg";
                $htmlErro = CHtml::errorSummary($materia, 'Erro ao cadastrar esta materia, verifique se está tudo correto!');
                $this->user->setFlash('erroMateria', $htmlErro);
            }
            $this->redirect($urlRetorno);
        }

    }
}
