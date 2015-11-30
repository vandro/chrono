<?php

/**
 * Description of UsuarioController
 *
 * @author Charles Souza <charlessouzasalesjr@gmail.com>
 */
class UsuarioController extends XController {

    public function accessRules() {
        $parentRules = parent::accessRules();
        $newRules = ['allow', 'actions' => ['login', 'logout', 'cadastrar'], 'users' => ['*']];
        array_unshift($parentRules, $newRules);
        return $parentRules;
    }

    public function actionListar() {
        $listarUsuario = Usuario::model()->findAll();
        $this->render('listarUsuario', [
            'usuario' => $listarUsuario
        ]);
    }

    public function actionEditar($id = null) {
        $uid = isset($id) ? $id : $this->user->id;
        $usuario = Usuario::model()->findByPk($uid, [
            'select' => ['t.id', 't.pnome', 't.snome', 't.email'],
        ]);

        if (!$usuario) {
            throw new CHttpException('Desculpe! O usuário selecionado não pôde ser carregado.');
        } elseif ($this->request->isPostRequest) {
            $usuario->pnome = $this->request->getPost('pnome');
            $usuario->snome = $this->request->getPost('snome');
            $usuario->senha = $this->request->getPost('senha');
            $usuario->senha_confirma = $this->request->getPost('senha_confirma');

            $saveAttrs = empty($usuario->senha) ? ['pnome', 'snome', 'email'] : ['pnome', 'snome', 'email', 'senha'];
            if ($usuario->save(true, $saveAttrs)){
                $this->user->setFlash('success', 'Sua atualização foi realizada com sucesso.');
            } else {
                $htmlError = CHtml::errorSummary($usuario, 'Algo deu errado ao '
                        . 'atualizar os dados. Tente novamente.');
                $this->user->setFlash('erroCadastro', $htmlError);
            }
        }

        $this->render('form_cadastro', ['usuario' => $usuario]);
    }

    public function actionApagar($id) {

        Usuario::model()->deleteByPk($id);
    }

    public function actionAbrir($id) {

        $abrirUsuario = Usuario::model()->findByPk($id);
        $this->render('formEditar', [
            'usuario' => $abrirUsuario
        ]);
    }

    public function actionCadastrar() {
        $usuario = new Usuario;

        if ($this->request->isPostRequest) {
            $usuario->pnome = $this->request->getPost('pnome');
            $usuario->snome = $this->request->getPost('snome');
            $usuario->email = $this->request->getPost('email');
            $usuario->senha = $senha_raw = $this->request->getPost('senha');
            $usuario->senha_confirma = $this->request->getPost('senha_confirma');
            $usuario->dt_criacao = date('Y-m-d H:i:s');
            if ($usuario->save()) {
                $this->user->setFlash('success', "{$usuario->pnome}, estamos "
                    . "muito felizes com sua chegada. Seu cadastro foi realizado "
                    . "com sucesso. Você já pode começar a aproveitar as funcionalidades do aplicativo.");
                $this->_autoLoginNovoUsuario($usuario->email, $senha_raw);
            } else {
                $htmlErro = CHtml::errorSummary($usuario, 'Seu cadastro não foi realizado com sucesso. Verifique se está tudo correto!');
                $this->user->setFlash('erroCadastro', $htmlErro);
            }
        }

        $this->render('form_cadastro', compact('usuario'));
    }

    /**
     * @author Jonathan Souza <jonathan.ralison@gmail.com>
     */
    public function actionLogin() {
        if (!$this->user->isGuest) {
            $this->redirect(['materias/listar']);
        } elseif ($this->request->isPostRequest) {
            $email = $this->request->getPost('email');
            $senha = $this->request->getPost('senha');
            $identity = new XIdentity($email, $senha);
            if (empty($email) xor empty($senha)) {
                $this->user->setFlash('error', 'Por favor, preencha seu e-mail e senha para continuar.');
            } elseif (empty($email) || empty($senha)) {
                $this->user->setFlash('error', 'Informe suas credenciais para entrar na aplicação.');
            } elseif ($identity->authenticate()) {
                $this->user->login($identity);
                $this->redirect(['materias/listar']);
            } else {
                $this->user->setFlash('error', $identity->errorMessage);
            }
        }

        $this->render('login', ['usuario' => $this->request->getPost('email', '')]);
    }

    /**
     * @author Jonathan Souza <jonathan.ralison@gmail.com>
     */
    public function actionLogout() {
        if (!$this->user->isGuest) {
            $this->user->logout();
        }
        $this->redirect(['usuario/login']);
    }

    private function _autoLoginNovoUsuario($email, $senha) {
        $identity = new XIdentity($email, $senha);
        if ($identity->authenticate() && $this->user->login($identity)) {
            $this->redirect(['materias/listar']);
        } else {
            $this->redirect(['usuario/login']);
        }
    }

}
