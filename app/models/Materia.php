<?php

/**
 * Um objeto matéria é uma coleção de tópicos. Sua finalidade principal
 * é organizar a visualização da lista de tópicos, agrupando os tópicos de
 * acordo com a matéria/disciplina ao qual fazem parte.
 *
 * @property int $id
 * @property int $usuario_id
 * @property string $titulo
 * @property string $dt_criacao
 * @property Topico[] $topicos Os tópicos cadastrados nesta matéria/disciplina
 * @property Usuario $usuario O usuário que criou a matéria/disciplina
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class Materia extends XModel {

    public $tableName = 'materias';

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
            'topicos' => [self::HAS_MANY, 'Topico', 'materia_id'],
            'usuario' => [self::BELONGS_TO, 'Usuario', 'usuario_id'],
        ];
    }

    public function rules() {
        return [
            ['titulo', 'required'],
            ['titulo', 'filter', 'filter' => 'trim'],
            ['titulo', 'unique', 'criteria' => [
                'condition' => 'usuario_id = :uid',
                'params' => [':uid' => 1],
            ], 'message' => 'Você já criou uma matéria com este nome.'],
            ['dt_criacao', 'default', 'value' => new CDbExpression('NOW()'), 'setOnEmpty' => true],
            ['usuario_id', 'default', 'value' => 1, 'setOnEmpty' => true], // Temporário até a criação dos usuários
        ];
    }

}
