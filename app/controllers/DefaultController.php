<?php

/**
 *
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class DefaultController extends XController {

    public function actionIndex() {
        $this->desligarLog();
        $this->layout = 'off';
        $this->renderText('<div class="appname">Chr<span class="oi" data-glyph="clock"></span>no</div>');
    }

    public function actionError() {
        foreach (Yii::app()->log->routes as $log) {
            $log->enabled = false;
        }
        $this->layout = 'off';
        $this->render('error');
    }
}
