<?php

/**
 *
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class XModel extends CActiveRecord {

    public function tableName() {
        return isset($this->tableName) ? $this->tableName : parent::tableName();
    }

}
