<?php

/**
 *
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class TopicoTest extends CDbTestCase {

    private $usuario;
    private $materia;

    protected function setUp() {
        parent::setUp();

        Topico::model()->deleteAll();

        $this->usuario = new Usuario;
        $this->usuario->setAttributes([
            'pnome' => 'Fulano',
            'snome' => 'De Tal',
            'email' => 'fulanodetal@email.com',
            'senha' => '123456',
            'senha_confirma' => '123456',
            'dt_criacao' => date('Y-m-d H:i:s'),
            'situacao' => Usuario::SIT_ATIVO,
        ], false);
        $this->usuario->save(false);

        $this->materia = new Materia;
        $this->materia->setAttributes([
            'usuario_id' => $this->usuario->id,
            'titulo' => 'Matéria de Teste para Cadastrar Tópico',
            'dt_criacao' => date('Y-m-d H:i:s'),
        ], false);
        $this->materia->save(false);
    }

    public function testTopicoNaoPodeTerTituloVazioOuEmBranco() {
        $topico1 = new Topico;
        $topico1->setAttributes([
            'usuario_id' => $this->usuario->id,
            'materia_id' => $this->materia->id,
            'titulo' => '',
            'dt_criacao' => date('Y-m-d H:i:s'),
        ], false);
        $this->assertFalse($topico1->save());

        $topico2 = new Topico;
        $topico2->setAttributes([
            'usuario_id' => $this->usuario->id,
            'materia_id' => $this->materia->id,
            'titulo' => '            ',
            'dt_criacao' => date('Y-m-d H:i:s'),
        ], false);
        $this->assertFalse($topico2->save());
    }

    protected function tearDown() {
        $this->usuario->delete();
        $this->materia->delete();
        Topico::model()->deleteAll();
    }

}
