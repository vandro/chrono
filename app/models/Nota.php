<?php

/**
 * Um objeto nota representa uma anotação feita por um usuário associada a um
 * tópico estudado.
 *
 * @property int $id
 * @property int $topico_id
 * @property string $descricao
 * @property int $situacao
 * @property string $dt_criacao
 * @property Topico $topico O tópico ao qual esta nota está associada
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class Nota extends XModel {

	const SIT_PARTICULAR = 0;
	const SIT_PUBLICO = 1;

    public $tableName = 'notas';

    /**
     * Retorna uma instância deste modelo.
     * 
     * @param string $className
     * @return static
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Define os relacionamentos deste modelo com os demais no banco de dados.
     * 
     * @return array
     */
    public function relations() {
        return [
            'topico' => [self::BELONGS_TO, 'Topico', 'topico_id'],
        ];
    }

}
