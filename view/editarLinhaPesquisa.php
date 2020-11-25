<?php 
require_once "sessao.php";

if (!isset($_GET["id"]) && empty($_GET["id"])) {
    header('Location: listarLinhaPesquisa.php');
    exit();
} else {
    $id = $_GET["id"];
    try {
        $stm = $GLOBALS["con"]->prepare("SELECT lin.id_linha_pesquisa, lin.nome_pesquisa, lin.descricao_pesquisa, cur.nome_curso, cur.id_curso, lin.curso_id_curso FROM linha_pesquisa lin 
                               JOIN curso cur ON curso_id_curso = cur.id_curso 
                                   WHERE id_linha_pesquisa = ?");
        $stm->bindValue(1, $id);
        $stm->execute();
        $linhas = $stm->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        exit();
    }

    foreach ($linhas as $chave => $valor) {$$chave = trim($valor);}
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Linha Pesquisa</title>
    <?php require_once "menu.php"; ?>           
</head>
<body>
    <div class="container" id="container">
        <div><br><br><br></div>
        <h2 align="center">Editar Linha de Pesquisa</h2>
        <div><br></div>
        <div class="row">
            <div class="col">
                <form class="frmEditarLinhaPesquisa">
                  <input type="hidden" value="<?php echo $id_linha_pesquisa; ?>" name="id_linha_pesquisa">
                    <div class="form-row">                      
                        <div class="form-group col-md-6">
                            <label>Nome da Pesquisa</label>
                            <input type="text" class="form-control input" name="nome_pesquisa" id="nome_pesquisa" value="<?php echo $nome_pesquisa; ?>" size="50" onkeyup="maiuscula(this)">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Curso a vincular</label>                                 
                            <select class="form-control input" id="curso_id_curso"
                            name="curso_id_curso" >
                            <option value="A">Selecionar o Curso</option>                               
                            <?php require_once "../classes/conexao.php";
                            global $pdo;
                            try{
                                $ftp = $GLOBALS["con"]->query("SELECT id_curso, nome_curso FROM curso WHERE status_curso = 1");
                                while ($linha = $ftp->fetch(PDO::FETCH_ASSOC)) {
                                 echo '<option ';
                                 if ($linha['id_curso'] == $id_curso) {echo " selected ";}
                                 echo 'value="' . "{$linha['id_curso']}" . '">' . "{$linha['nome_curso']}" . '</option>';
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
            <div class="form-group col">
             <label>Descrição</label>
             <input type="text" class="form-control input" name="descricao_pesquisa" id="descricao_pesquisa" value="<?php echo $descricao_pesquisa; ?>">
         </div>                                      
     </div>
     <div class="form-row">
     </div>  
     <p></p>
     <button type="submit" class="btn btn-primary">Salvar</button>
     <a href="listarLinhaPesquisa.php" class="btn btn-warning" role="button" aria-pressed="true">Listar Linha Pesquisa</a>
 </div>                
</form>
</div>        
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
<script src="../procedimentos/cadastrar/script.js"></script>
<script> app.frmEditarLinhaPesquisa();</script>
</body>
</html>
