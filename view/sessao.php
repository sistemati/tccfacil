<?php
session_start();
include '../classes/conexao.php';
include '../classes/loginClass.php';
if(!isset($_SESSION['id_usuario']) || !isset($_SESSION['email_usuario']) ||!isset($_SESSION['senha_usuario']) ||!isset($_SESSION['nome_usuario'])){
	
	header("location:/index.php");	
}else{
	$usu = new Usuario();
	if(!$usu->login($_SESSION['email_usuario'], $_SESSION['senha_usuario'])){
		//header("Location:../index.php");	
	}
}
?>


