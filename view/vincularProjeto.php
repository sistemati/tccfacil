<?php require_once "sessao.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Vincular Projeto</title>
	<?php require_once "menu.php"; ?>           
</head>
<body>
	<div class="container" id="container">
		 <div><br><br><br><br><br><br><br></div>
		<h2 align="center">Vincular Usuário a Projeto(s)</h2>
		<div><br></div>
		<div class="row">
			<div class="col">
				<form class="formCadVinculo">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Usuário</label>
							<select class="form-control input" id="usuario_id_usuario"
							name='usuario_id_usuario' required>
							<option value="A">Selecionar o Usuário</option>
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
					<div class="form-group col-md-6">
						<label>Projeto</label>
						<select class="form-control input" id="projeto_tcc_id_projeto"
						name='projeto_tcc_id_projeto' required>
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
			</div>         
			<div class="form-row">
			</div>
			<p></p>
			<button type="submit" class="btn btn-primary">Salvar</button>
			<a href="listarVinculo.php" class="btn btn-warning" role="button" aria-pressed="true">Listar</a>
		</form>
	</div>
</div>

<script src="../procedimentos/cadastrar/script.js"></script>
<script> app.formCadVinculo();</script>		
</body>
</html>