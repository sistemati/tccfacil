<?php

date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

// coneção com o banco

function conectar()
{
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'tccfacil';

	try {
		$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
		$con = new PDO("mysql:host=$hostname; dbname=$database;", $username, $password, $opcoes);
		return $con;
	} catch (Exception $e) {
		echo 'Erro: ' . $e->getMessage();
		return null;
	}
}

$GLOBALS['con'] = $conexao_pdo = conectar();

?>