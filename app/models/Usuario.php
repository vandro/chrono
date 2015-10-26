<?php

/**
 * O objeto usuário representa um usuário do sistema.
 *
 * @property int $id
 * @property string $pnome
 * @property string $snome
 * @property string $email
 * @property string $senha
 * @property int $situacao
 * @property string $dt_criacao
 * @property Materia[] $materias
 * @property Tag[] $tags
 * @property Agenda[] $agendas
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class Usuario extends XModel {

    public $tableName = 'usuarios';

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
            'materias' => [self::HAS_MANY, 'Materia', 'usuario_id'],
            'tags' => [self::HAS_MANY, 'Tag', 'usuario_id'],
            'agendas' => [self::HAS_MANY, 'Agenda', 'usuario_id'],
        ];
    }

    public function rules() {
        return [
            ['email', 'email'],
        ];
    }

}
