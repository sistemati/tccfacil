<?php 
require_once "sessao.php";

if (!isset($_GET["id"]) && empty($_GET["id"])) {
    header('Location: listarProjeto.php');
    exit();
} else {
    $id = $_GET["id"];
    try {
        $stm = $GLOBALS["con"]->prepare("SELECT pro.id_projeto,
                                                pro.nome_projeto,
                                                pro.descricao_projeto,
                                                pro.linha_pesquisa_id_linha_pesquisa,
                                                DATE_FORMAT(pro.data_inicio , '%d/%m/%y') AS data_inicio,
                                                DATE_FORMAT(pro.data_fim , '%d/%m/%y') AS data_fim, 
                                                lin.nome_pesquisa 
                                            FROM projeto_tcc pro
                                              JOIN linha_pesquisa lin 
                                                ON linha_pesquisa_id_linha_pesquisa = lin.id_linha_pesquisa
                                                   WHERE id_projeto = ?");
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
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Projetos</title>
    <?php require_once "menu.php"; ?>
</head>

<body>
    <div class="container" id="container">
        <div><br><br></div>
        <h2 align="center">Editar Projeto</h2>
        <div><br></div>
        <div class="row">
            <div class="col">
                <form class="frmEditarProjeto">
                <input type="hidden" value="<?php echo $id_projeto; ?>" name="id_projeto">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nome Projeto</label>
                            <input type="text" class="form-control input" name="nome_projeto" id="nome_projeto"
                                value="<?php echo $nome_projeto; ?>" size="50" onkeyup="maiuscula(this)">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Linha de Pesquisa</label>
                            <select class="form-control input" id="linha_pesquisa_id_linha_pesquisa"
                                name="linha_pesquisa_id_linha_pesquisa">
                                <option value="A">Selecionar Linha de Pesquisa</option>
                                <?php require_once "../classes/conexao.php";
                            global $pdo;
                            try{
                                $ftp = $GLOBALS["con"]->query("SELECT id_linha_pesquisa, nome_pesquisa FROM linha_pesquisa WHERE status_linha_pesquisa = 1");
                                while ($linha = $ftp->fetch(PDO::FETCH_ASSOC)) {
                                   echo '<option ';
                                   if ($linha['id_linha_pesquisa'] == $linha_pesquisa_id_linha_pesquisa) {echo " selected ";}
                                   echo 'value="' . "{$linha['id_linha_pesquisa']}" . '">' . "{$linha['nome_pesquisa']}" . '</option>';
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
                        <div class="form-group col-md-6">
                            <label>Data do início do projeto</label>
                            <input type="text" class="form-control input" name="data_inicio" id="data_inicio"
                                value="<?php echo $data_inicio; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Data do fim do projeto</label>
                            <input type="text" class="form-control input" name="data_fim" id="data_fim"
                                value="<?php echo $data_fim; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label>Descrição do Projeto</label>
                            <input type="text" class="form-control input-sm" name="descricao_projeto"
                                id="descricao_projeto" value="<?php echo $descricao_projeto; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                    </div>
                    <p></p>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="listarProjeto.php" class="btn btn-warning" role="button" aria-pressed="true">Listar
                        Projetos</a>
                </form>
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
    <script src="../lib/js/formatProj.js"></script>
    <script src="../procedimentos/cadastrar/script.js"></script>
    <script>
    app.frmEditarProjeto();
    </script>
</body>

</html>