<?php 
require_once "sessao.php";

$usuario = $_SESSION['nome_usuario'];
$id_usuario_de = $_SESSION['id_usuario'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Chat</title>
	<?php require_once "menu.php"; ?>           
</head>
<body>

	<div class="container" id="container">
		<div><br><br></div>
		<h2 align="center">Interação - Envio de Mensagens</h2>
		<div><br></div>
		<div class="row">
			<div class="col">
				<form class="formCadChat">
					<input type="hidden" value="<?php echo $id_usuario_de; ?>" name="id_usuario_de">
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Para</label>
							<input type="hidden" value="<?php echo $id_usuario_de; ?>" name="id_usuario_de" required>
							<select class="form-control input" id="id_usuario_para"
							name="id_usuario_para">
							<option value="A">Selecionar para quem enviar</option>                               
							<?php require_once "../classes/conexao.php";
							global $pdo;
							try{
								$ftp = $GLOBALS["con"]->query("SELECT id_usuario, nome_usuario FROM usuario WHERE status_usuario = 1");
								while ($linha = $ftp->fetch(PDO::FETCH_ASSOC)) {
									echo '<option value="' . "{$linha['id_usuario']}" . '">' . "{$linha['nome_usuario']}" . '</option>';
								}
							}catch(PDOException $e){
								echo "Erro: " .$e->getMessage();
								exit;
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label>Sobre Qual Projeto?</label>
						<select class="form-control input" id="projeto_tcc_id_projeto"
							name="projeto_tcc_id_projeto" required>
							<option value="A">Selecionar o projeto</option>                               
							<?php require_once "../classes/conexao.php";
							global $pdo;
							try{
								$ftp = $GLOBALS["con"]->query("SELECT id_projeto, nome_projeto FROM projeto_tcc WHERE status_projeto = 1");
								while ($linha = $ftp->fetch(PDO::FETCH_ASSOC)) {
									echo '<option value="' . "{$linha['id_projeto']}" . '">' . "{$linha['nome_projeto']}" . '</option>';
								}
							}catch(PDOException $e){
								echo "Erro: " .$e->getMessage();
								exit;
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label>Assunto</label>
						<input type="text" class="form-control input-sm" name="assunto" id="assunto" required>
					</div>
				</div>				
				<div class="form-row">
					<div class="form-group col-md-12"> 
						<label>Mensagem</label>
						<textarea class="form-control" id="texto" name="texto" rows="3" rows="4" cols="50" style="max-width: 1150px; max-height: 200; min-height: 200px; min-width: 200px; resize: none;" required ></textarea>
					</div>							
				</div>				
			</div> 
			<div class="form-row">
			</div> 
		</div> 
		<!-- <input type="submit" class="btn btn-primary" value="Enviar"> -->
		<button type="submit" class="btn btn-primary btnEnviar">Enviar</button>
		<a href="listaChat.php" class="btn btn-warning" role="button" aria-pressed="true">Listar Mensagens Enviadas</a>
	</form>
</div>            
</div>
</div>
<script src="../procedimentos/cadastrar/script.js"></script>
<script> app.formCadChat();</script>
</body>
</html>