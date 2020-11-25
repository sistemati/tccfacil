<?php
session_start();

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){	

	include '../../classes/conexao.php';
	include '../../classes/loginClass.php';

	$usu = new Usuario();

	$email = $_POST['email'];
	$senha = $_POST['senha'];

	if($usu->login($email, $senha) == true){
		if(isset($_SESSION['id_usuario'])){
			echo 'OK';
			exit;		
		}else{
			echo 'Usuário ou Senha Invalida!';
			exit;			
		}		
	}else{
		echo 'Usuário ou Senha Invalida!';
			exit;		
	}
}else{
	echo 'Parâmetros inválidos!';
			exit;	
}
?>