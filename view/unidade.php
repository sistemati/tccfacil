<?php require_once "sessao.php";?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Unidades</title>
    <?php require_once "menu.php"; ?>
</head>

<body>
    <div class="container" id="container">
        <div><br><br><br></div>
        <h2 align="center">Cadastro de Unidade</h2>
        <div><br></div>
        <div class="row">
            <div class="col">
                <form class="formCadUnidade">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Instituição</label>
                            <select class="form-control input" id="instituicao_id_instituicao"
                            name='instituicao_id_instituicao' required>
                            <option value="A">Selecionar a Instituição</option>
                            <?php require_once "../classes/conexao.php";
                            global $pdo;
                            try{
                                $ftp = $GLOBALS["con"]->query("SELECT id_instituicao, nome_instituicao FROM instituicao WHERE status_instituicao = 1");
                                while ($linha = $ftp->fetch(PDO::FETCH_ASSOC)) {
                                 echo '<option value="' . "{$linha['id_instituicao']}" . '">' . "{$linha['nome_instituicao']}" . '</option>';
                             }
                         }catch(PDOException $e){
                            echo "Erro: " .$e->getMessage();
                            exit;
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Nome/Razão Social</label>
                    <input type="text" class="form-control input" name="nome_unidade" id="nome_unidade" size="50" onkeyup="maiuscula(this)"
                    required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Sigla</label>
                    <input type="text" class="form-control input" name="sigla_unidade" id="sigla_unidade" size="50" onkeyup="maiuscula(this)">
                </div>
                <div class="form-group col-md-6">
                    <label>CNPJ</label>
                    <input type="text" class="form-control input" name="cnpj_unidade" id="cnpj_unidade">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Inscrição Estadual</label>
                    <input type="text" class="form-control input" name="ie_unidade" id="ie_unidade">
                </div>
                <div class="form-group col-md-6">
                    <label>Telefone</label>
                    <input type="text" class="form-control input" name="telefone_unidade" id="telefone_unidade">
                </div>
            </div>
            <div class="form-row">
            </div>
            <p></p>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="listarUnidade.php" class="btn btn-warning" role="button" aria-pressed="true">Listar
            Unidade</a>
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
<script src="../lib/js/formatUni.js"></script> 
<script src="../procedimentos/cadastrar/script.js"></script>
<script>app.formCadUnidade();</script>
</body>

</html>