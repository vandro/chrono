<?php

/**
 * Um objeto tópico representa um conteúdo de disciplina que precisa ser
 * estudado por um usuário.
 *
 * @property int $id
 * @property int $materia_id
 * @property string $titulo
 * @property string $dt_criacao
 * @property char $dif_esperada
 * @property char $dif_encontrada
 * @property Materia $materia
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class Topico extends XModel {

    public $tableName = 'topicos';

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
            'tags' => [self::MANY_MANY, 'Tag', 'tags_topicos(tag_id, topico_id)'],
        ];
    }

    public function rules() {
        return [
            ['titulo,materia_id,dif_esperada', 'required'],
        ];
    }

}
