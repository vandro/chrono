<?php

/**
 *
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class MateriaTest extends CDbTestCase {

    private $usuario1;
    private $usuario2;

    protected function setUp() {
        parent::setUp();
        Materia::model()->deleteAll();
        $this->usuario1 = new Usuario;
        $this->usuario1->setAttributes([
            'pnome' => 'Fulano',
            'snome' => 'De Tal',
            'email' => 'fulanodetal@email.com',
            'senha' => '123456',
            'senha_confirma' => '123456',
            'dt_criacao' => date('Y-m-d H:i:s'),
            'situacao' => Usuario::SIT_ATIVO,
        ], false);
        $this->usuario1->save(false);

        $this->usuario2 = new Usuario;
        $this->usuario2->setAttributes([
            'pnome' => 'Ciclano',
            'snome' => 'De Tal',
            'email' => 'ciclanodetal@email.com',
            'senha' => '123456',
            'senha_confirma' => '123456',
            'dt_criacao' => date('Y-m-d H:i:s'),
            'situacao' => Usuario::SIT_ATIVO,
        ], false);
        $this->usuario2->save(false);
    }

    public function testMateriaNaoPodeSerDuplicadaParaOMesmoUsuario() {
        $titulo = 'Materia de Teste';

        $materia1 = new Materia;
        $materia1->setAttributes([
            'usuario_id' => $this->usuario1->id,
            'titulo' => $titulo,
        ], false);
        $this->assertTrue($materia1->save());

        $materia2 = new Materia;
        $materia2->setAttributes([
            'usuario_id' => $this->usuario1->id,
            'titulo' => $titulo,
        ], false);
        $this->assertFalse($materia2->save());
    }

    public function testMateriaPodeDuplicarParaUsuarioDiferente() {
        $titulo = 'Materia de Teste com Usuários Diferentes';

        $materia1 = new Materia;
        $materia1->setAttributes([
            'usuario_id' => $this->usuario1->id,
            'titulo' => $titulo,
        ], false);
        $this->assertTrue($materia1->save());

        $materia2 = new Materia;
        $materia2->setAttributes([
            'usuario_id' => $this->usuario2->id,
            'titulo' => $titulo,
        ], false);
        $this->assertTrue($materia2->save());
    }

    protected function tearDown() {
        $this->usuario1->delete();
        $this->usuario2->delete();
        Materia::model()->deleteAll();
    }

}
