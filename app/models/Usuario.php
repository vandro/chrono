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

    const SIT_ATIVO = 0x01;
    const SIT_INATIVO = 0x00;

    public $tableName = 'usuarios';
    public $senha_confirma;

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

    /**
     * Define as regras de validação para este objeto.
     * @return array
     */
    public function rules() {
        return [
            ['pnome,snome,email,senha', 'filter', 'filter' => 'trim'],
            ['pnome,snome', 'required'], // Sempre requerido
            ['email,senha', 'required', 'on' => 'insert'], // Requerido para novos usuários
            ['email', 'email', 'message' => 'Informe um e-mail válido.'],
            ['email', 'unique', 'message' => 'O e-mail informado já está cadastrado.'],
            ['senha', 'length', 'min' => 5, 'tooShort' => 'Informe uma senha com, no mínimo, 5 caracteres.', 'skipOnError' => true],
            ['senha', 'compare', 'compareAttribute' => 'senha_confirma', 'message' => 'A confirmação de senha não confere.', 'skipOnError' => true],
        ];
    }

    public function attributeLabels() {
        return [
            'pnome' => 'Primeiro nome',
            'snome' => 'Segundo nome',
            'email' => 'E-mail',
            'senha' => 'Senha',
            'senha_confirma' => 'Confirmação de senha',
        ];
    }

    protected function beforeSave() {
        if (isset($this->senha)) {
            $this->senha = CPasswordHelper::hashPassword($this->senha);
        }
        return parent::beforeSave();
    }

}
