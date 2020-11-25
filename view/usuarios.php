<?php require_once "sessao.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Usuários</title>
  <?php require_once "menu.php"; ?>
</head>
<body>
  <div class="container" id="container">
    <div><br><br></div>
    <h2 align="center">Cadastrar Usuário</h2>
    <div><br></div>
    <div class="row">
      <div class="col">
        <form class="formCadUsuario">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Nome</label>
              <input type="text" class="form-control input-sm" name="nome_usuario" id="nome_usuario" size="50" onkeyup="maiuscula(this)" required >
            </div>
            <div class="form-group col-md-6">
              <label>E-mail</label>
              <input type="email" class="form-control input-sm" name="email_usuario" id="email_usuario" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Usuário</label>
              <input type="text" class="form-control input-sm" name="login_usuario" id="login_usuario">
            </div>
            <div class="form-group col-md-6">
              <label>Senha</label>
              <input type="password" class="form-control input-sm" name="senha_usuario" id="senha_usuario" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6"> 
              <label>Curso</label>
              <select class="form-control input" id="curso_id"
              name="curso_id">
              <option value="A">Selecionar o Curso</option>                               
              <?php require_once "../classes/conexao.php";
              global $pdo;
              try{
                $ftp = $GLOBALS["con"]->query("SELECT id_curso, nome_curso FROM curso WHERE status_curso = 1");
                while ($linha = $ftp->fetch(PDO::FETCH_ASSOC)) {
                 echo '<option value="' . "{$linha['id_curso']}" . '">' . "{$linha['nome_curso']}" . '</option>';
               }
             }catch(PDOException $e){
              echo "Erro: " .$e->getMessage();
              exit;
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-6">                                
          <label>Unidade</label>
          <select class="form-control input" id="unidade_id"
          name="unidade_id" required>
          <option value="A">Selecionar a Unidade</option>
          <?php require_once "../classes/conexao.php";
          global $pdo;
          try{
            $ftp = $GLOBALS["con"]->query("SELECT id_unidade, nome_unidade FROM unidade WHERE status_unidade = 1");
            while ($linha = $ftp->fetch(PDO::FETCH_ASSOC)) {
             echo '<option value="' . "{$linha['id_unidade']}" . '">' . "{$linha['nome_unidade']}" . '</option>';
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
    <div class="form-group col-md-3">
      <label>Início do Curso</label>
      <input type="text" class="form-control input" name="data_inicio" id="data_inicio">                
    </div>
    <div class="form-group col-md-3">
      <label>Fim do Curso</label>
      <input type="text" class="form-control input" name="data_fim" id="data_fim">
    </div>
    <div class="form-group col-md-3">
     <label>Perfil</label>
     <select class="form-control input" id="id_perfil"
     name="id_perfil" required>
     <option value="A">Selecionar Perfil</option>
     <?php require_once "../classes/conexao.php";
     global $pdo;
     try{
      $ftp = $GLOBALS["con"]->query("SELECT id_perfil, nome_perfil FROM perfil WHERE status_perfil = 1");
      while ($linha = $ftp->fetch(PDO::FETCH_ASSOC)) {
       echo '<option value="' . "{$linha['id_perfil']}" . '">' . "{$linha['nome_perfil']}" . '</option>';
     }
   }catch(PDOException $e){
    echo "Erro: " .$e->getMessage();
    exit;
  }
  ?>
</select> 
</div>
<div class="form-group col-md-3">
  <label for="inputState">Administrador?</label>
  <select class="form-control input" id="admin_usuario" name="admin_usuario" required>
    <option value="A">Selecionar Sim(S) ou Não(N)</option>
    <option>S</option>
    <option>N</option>
  </select>
</div>
</div> 
<div class="form-row">
</div>  
<p></p>
<button type="submit" class="btn btn-primary">Salvar</button>
<a href="listarUsuario.php" class="btn btn-warning" role="button" aria-pressed="true">Listar Usuário</a>
</form>
</div>            
</div>
</div>
<script type="text/javascript">
// INICIO FUNÇÃO DE MASCARA MAIUSCULA
function maiuscula(z){
  v = z.value.toUpperCase();
  z.value = v;
}
//FIM DA FUNÇÃO MASCARA MAIUSCULA
</script>
<script src="../lib/js/formatacao.js"></script> 
<script src="../procedimentos/cadastrar/script.js"></script>
<script> app.formCadUsuario();</script>
</body>
</html>
