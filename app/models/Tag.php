<?php

/**
 * Um objeto tag representa um rótulo de cor e texto que permite ao usuário
 * categorizar todos os seus tópicos de estudo. A ideia desse rótulo é permitir
 * que o usuário que esteja estudando para mais de um concurso ou exame possa
 * marcar tópicos em comum entre os concursos sendo estudados.
 * 
 * Isto é, digamos que um usuário esteja estudando atualmente para dois
 * concursos como o Banco do Brasil e Caixa, por exemplo. Neste caso, o usuário
 * pode criar um rótulo com a cor amarela para o Banco do Brasil e outro com a
 * cor azul para a Caixa. Desta forma, ele poderá marcar tópicos de estudo,
 * como Desconto Composto, por exemplo, com ambas as tags e ao estudar
 * saberá que o tópico já serve para os dois concursos.
 *
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class Tag extends XModel {

    public $tableName = 'tags';

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
            'topico' => [self::MANY_MANY, 'Topico', 'tags_topicos(tag_id, topico_id)'],
        ];
    }

    public function rules() {
        return [
            ['cor', 'required'],
        ];
    }

}
