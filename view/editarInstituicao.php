<?php
require_once "sessao.php";

if (!isset($_GET["id"]) && empty($_GET["id"])) {
    header('Location: listarInstituicao.php');
    exit();
} else {
    $id = $_GET["id"];
    try {
        $stm = $GLOBALS["con"]->prepare("SELECT id_instituicao, nome_instituicao, sigla_instituicao, cnpj_instituicao, ie_instituicao, telefone_instituicao, email_instituicao 
											FROM instituicao WHERE id_instituicao = ?");         
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
    <title>Cadastrar Instituição</title>
    <?php require_once "menu.php"; ?>
</head>
<body>
    <div class="container" id="container">
        <div><br><br><br></div>
        <h2 align="center">Editar Instituição</h2>
        <div><br></div>
        <div class="row">
            <div class="col">
                <form class="formAtualizarInstituicao">
                <input type="hidden" value="<?php echo $id_instituicao; ?>" name="id_instituicao">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nome da Instituição</label>
                            <input type="text" class="form-control input" name="nome_instituicao" id="nome_instituicao"
                                value="<?php echo $nome_instituicao; ?>" size="50" onkeyup="maiuscula(this)">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Sigla</label>
                            <input type="text" class="form-control input" name="sigla_instituicao"
                                id="sigla_instituicao" value="<?php echo $sigla_instituicao; ?>" size="50"
                                onkeyup="maiuscula(this)">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>CNPJ</label>
                            <input type="text" class="form-control input" name="cnpj_instituicao" id="cnpj_instituicao"
                                value="<?php echo $cnpj_instituicao; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Inscrição Estadual</label>
                            <input type="text" class="form-control input" name="ie_instituicao" id="ie_instituicao"
                                value="<?php echo $ie_instituicao; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Telefone:</label>
                            <input type="text" class="form-control input" name="telefone_instituicao"
                                id="telefone_instituicao" value="<?php echo $telefone_instituicao; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>E-mail:</label>
                            <input type="email" class="form-control input" name="email_instituicao"
                                id="email_instituicao" value="<?php echo $email_instituicao; ?>">
                        </div>
                    </div>
                    <p></p>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="listarInstituicao.php" class="btn btn-warning" role="button" aria-pressed="true">Listar
                        Instituíção</a>
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
    <script>
    function inputHandler(masks, max, event) {
        var c = event.target;
        var v = c.value.replace(/\D/g, '');
        var m = c.value.length > max ? 1 : 0;
        VMasker(c).unMask();
        VMasker(c).maskPattern(masks[m]);
        c.value = VMasker.toPattern(v, masks[m]);
    }

    var ie_instituicaoMask = ['999.999.999.999', '999.999.999.999'];
    var ie_instituicao = document.querySelector('#ie_instituicao');
    VMasker(ie_instituicao).maskPattern(ie_instituicaoMask[0]);
    ie_instituicao.addEventListener('input', inputHandler.bind(undefined, ie_instituicaoMask, 15), false);

    var telefone_instituicaoMask = ['(99) 9999-99999', '(99) 99999-9999'];
    var telefone_instituicao = document.querySelector('#telefone_instituicao');
    VMasker(telefone_instituicao).maskPattern(telefone_instituicaoMask[0]);
    telefone_instituicao.addEventListener('input', inputHandler.bind(undefined, telefone_instituicaoMask, 14), false);

    var cnpj_instituicaoMask = ['99.999.999/9999-99'];
    var cnpj_instituicao = document.querySelector('#cnpj_instituicao');
    VMasker(cnpj_instituicao).maskPattern(cnpj_instituicaoMask[0]);
    cnpj.addEventListener('input', inputHandler.bind(undefined, cnpj_instituicaoMask, 18), false);
    </script>
    <script src="../procedimentos/cadastrar/script.js"></script>
    <script>
    app.formAtualizarInstituicao();
    </script>
</body>
</html>