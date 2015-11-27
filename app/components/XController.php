<?php

/**
 * Esse componente estende as funcionalidades do controlador padrão do Yii.
 *
 * @property CClientScript $clientScript
 * @property CHttpSession $session
 * @property CHttpRequest $request
 * @property CWebUser $user
 * @property CAuthManager $authManager
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class XController extends CController {

    public $clientScript;
    public $session;
    public $request;
    public $user;
    public $authManager;

    public function init() {
        date_default_timezone_set(Yii::app()->timeZone);

        $this->clientScript =& Yii::app()->clientScript;
        $this->session =& Yii::app()->session;
        $this->request =& Yii::app()->request;
        $this->user =& Yii::app()->user;
        $this->authManager =& Yii::app()->authManager;

        return parent::init();
    }

    protected function desligarLog() {
        foreach (Yii::app()->log->routes as $log) {
            $log->enabled = false;
        }
    }

}
