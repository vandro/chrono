<?php

/**
 * Um objeto agenda representa um tópico agendado para estudo por um usuário.
 * Cada vez que um usuário agenda um tópico para estudar, ele está crianda uma
 * tarefa no cronograma.
 * 
 * @property int $id
 * @property int $usuario_id
 * @property int $topico_id
 * @property string $dt_agendada Data em que a tarefa deve aparecer no calendário
 * @property string $dt_encerrada Data em que a tarefa foi marcada como encerrada
 * @property Topico $topico O tópico relacionado a esta tarefa
 * @property Usuario $usuario O usuário ao qual esta tarefa pertence
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class Agenda extends XModel {

    public $tableName = 'agendas';

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
            'topicos' => [self::HAS_ONE, 'Topico', 'topico_id'],
            'usuario' => [self::BELONGS_TO, 'Usuario', 'usuario_id'],
        ];
    }

}
