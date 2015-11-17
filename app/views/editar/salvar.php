<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of salvar
 *
 * @author Emanuel
 */
class salvar {
    
}
/*verifico se os dados estao vindo do formulario, porque se uma pessoa acessar essa pagina diretamente 
poderia dar erro, entao eu testo antes*/
if($_SERVER["REQUEST_METHOD"] == "POST") {
$nome         = $_POST["nome"];
$email        = $_POST["email"];
$data         = "{$_POST["ano"]}-{$_POST["mes"]}-{$_POST["dia"]}";
$sexo         = $_POST["sexo"];
//if e else simplificado, verifico se foi escolhido alguma preferencia e crio um array
$login        = $_POST["login"];
$senha        = $_POST["senha"];

//ele verifica se o arquivo existe
if(file_exists("init.php")) {
	require "init.php";		
} else {
	echo "Arquivo init.php nao foi encontrado";
	exit;
}
// verifica se a função que eu vou usar existe
if(!function_exists("Abre_Conexao")) {
	echo "Erro o arquivo init.php foi auterado, nao existe a função Abre_Conexao";
	exit;
}

Abre_Conexao();
if(@mysql_query("INSERT INTO usuarios VALUES (	NULL , '$pnome', '$email', '$data' , '$login', MD5( '$senha' ) )")) {
               //verifiquei acima se deu certo o comando e aqui verifico se foi mesmo gravado o dado no banco
	if(mysql_affected_rows() == 1){
		echo "Registro efetuado com sucesso<br />";
	}	

} else {
                //verifico se nao estao tentando gravar um dado que ja existe, pois usei UNIQUE na tabela 
	if(mysql_errno() == 1062) {
		echo $erros[mysql_errno()];
		exit;
	} else {	
		echo "Erro nao foi possivel efetuar o cadastro";
		exit;
	}	
	@mysql_close();
}

}
?>
<a href="index.html">Voltar</a>