<?php

/**
 *
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class DefaultController extends XController {

    public function accessRules() {
        $parentRules = parent::accessRules();
        $newRules = ['allow', 'actions' => ['index', 'error'], 'users' => ['*']];
        array_unshift($parentRules, $newRules);
        return $parentRules;
    }

    public function actionIndex() {
        $this->layout = 'off';
        $this->desligarLog();
        $this->renderText('<div class="appname">Chr<span class="oi" data-glyph="clock"></span>no</div>');
    }

    public function actionError() {
        $this->layout = 'off';
        $this->desligarLog();
        $this->render('error');
    }
}
