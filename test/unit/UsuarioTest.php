<?php

/**
 *
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class UsuarioTest extends CDbTestCase {

    public function testEmailDeveSerUnico() {
        Usuario::model()->deleteAllByAttributes(['email' => 'detal@email.com']);
        
        $usuario1 = new Usuario;
        $usuario1->setAttributes([
            'pnome' => 'Fulano',
            'snome' => 'de Tal',
            'email' => 'detal@email.com',
            'senha' => '123456',
            'situacao' => Usuario::SIT_ATIVO,
            'dt_criacao' => date('Y-m-d H:i:s'),
        ], false);
        $this->assertTrue($usuario1->save(false));
        
        $usuario2 = new Usuario;
        $usuario2->setAttributes([
            'pnome' => 'Ciclano',
            'snome' => 'de Tal',
            'email' => 'detal@email.com',
            'senha' => '123456',
            'senha_confirma' => '123456',
            'situacao' => Usuario::SIT_ATIVO,
            'dt_criacao' => date('Y-m-d H:i:s'),
        ], false);
        $this->assertFalse($usuario2->save());
    }

}
