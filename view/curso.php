<?php require_once "sessao.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cursos</title>
    <?php require_once "menu.php"; ?>        
</head>
<body>
    <div class="container" id="container">
        <div><br><br><br></div>
        <h2 align="center">Cadastro de Curso</h2>
        <div><br></div>
        <div class="row">
            <div class="col">
             <form class="formCadCurso">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Unidade</label>
                        <select class="form-control input" id="unidade_id_unidade"
                        name='unidade_id_unidade' required>
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
            <div class="form-group col-md-6">
                <label>Nome Curso</label>
                <input type="text" class="form-control input" name="nome_curso" id="nome_curso" size="50" onkeyup="maiuscula(this)">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Início do Curso</label>
                <input type="text" class="form-control input" name="inicio_curso" id="inicio_curso">
            </div>
            <div class="form-group col-md-6">
                <label>Quantidade de Semestres</label>
                <input type="text" class="form-control input" name="quantidade_semestre"
                id="quantidade_semestre">
            </div>  
            <div class="form-row">
            </div>  
            <p></p>
            <p></p>
            <button type="submit" class="btn btn-primary">Salvar</button>&nbsp;
            <a href="listarCurso.php" class="btn btn-warning" role="button" aria-pressed="true">Listar Curso</a>
        </div>
    </div>                            
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
<script src="../lib/js/formatCur.js"></script> 
<script src="../procedimentos/cadastrar/script.js"></script>
<script> app.formCadCurso();</script>
</body>
</html>
