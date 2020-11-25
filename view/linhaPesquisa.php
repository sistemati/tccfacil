<?php require_once "sessao.php";?>
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
        <h2 align="center">Cadastro de Linha de Pesquisa</h2>
        <div><br></div>
        <div class="row">
            <div class="col">
                <form class="frmCadLinhaPesquisa">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nome da Pesquisa</label>
                            <input type="text" class="form-control input" name="nome_pesquisa" id="nome_pesquisa"
                                size="50" onkeyup="maiuscula(this)">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Curso a vincular</label>
                            <select class="form-control input" id="curso_id_curso" name="curso_id_curso">
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
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label>Descrição</label>
                            <textarea type="text" class="form-control input" name="descricao_pesquisa"
                                id="descricao_pesquisa" rows="3" rows="4" cols="50"
                                style="max-width: 1150px; max-height: 200; min-height: 130px; min-width: 200px; resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                    </div>
                    <p></p>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="listarLinhaPesquisa.php" class="btn btn-warning" role="button" aria-pressed="true">Listar
                        Linha Pesquisa</a>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <script type="text/javascript">
    // INICIO FUNÇÃO DE MASCARA MAIUSCULA
    function maiuscula(z) {
        v = z.value.toUpperCase();
        z.value = v;
    }
    //FIM DA FUNÇÃO MASCARA MAIUSCULA
    </script>
    <script src="../lib/js/formatUsu.js"></script>
    <script src="../procedimentos/cadastrar/script.js"></script>
    <script>
    app.frmCadLinhaPesquisa();
    </script>
</body>

</html>