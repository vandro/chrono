<?php

/**
 *
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class XIdentity extends CUserIdentity {

    private $_id;

    public function authenticate() {
        $usuario = Usuario::model()->findByAttributes(['email' => $this->username]);
        if ($usuario === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
            $this->errorMessage = 'Nenhum usuário cadastrado com o e-mail informado.';
        } elseif (CPasswordHelper::verifyPassword($this->password, $usuario->senha) === false) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
            $this->errorMessage = 'A senha digitada não confere parece correta.';
        } elseif ($usuario->situacao === Usuario::SIT_INATIVO) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
            $this->errorMessage = 'Desculpe! Essa conta não pode ser acessada no momento.';
        } else {
            $this->_id = $usuario->id;
            $this->setState('name', implode(' ', [$usuario->pnome, $usuario->snome]));
            $this->errorCode = self::ERROR_NONE;
            $this->errorMessage = 'Identidade confirmada!';
        }
        return ($this->errorCode === self::ERROR_NONE);
    }

    public function getId() {
        return $this->_id;
    }

}
