<?php

class conexao {

//host	
private $host = 'localhost';	

//usuario
private $usuario = 'root';

//senha
private $senha = '';

//banco de dados
private $database = 'bd_chamada';

public function conecta_mysql(){

	//cria a conexão
	$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);	

	mysqli_set_charset($con, 'utf8');

	if(mysqli_connect_errno()){
		echo 'Erro ao tentar se conectar com o BD MySQL:'.mysqli_connect_error();
	}

		return $con;

	}

}


?>