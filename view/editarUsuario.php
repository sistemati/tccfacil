<?php
require_once "sessao.php";

if (!isset($_GET["id"]) && empty($_GET["id"])) {
    header('Location: listarUsuario.php');
    exit();
} else {
    $id = $_GET["id"];
    try {
        $stm = $GLOBALS["con"]->prepare(" SELECT
            `a`.`id_usuario`,
            `a`.`nome_usuario`,
            `a`.`email_usuario`,
            `a`.`login_usuario`,            
            `b`.`nome_perfil`,
            `c`.`curso_id`,
            `c`.`unidade_id`,
            `b`.`id_perfil`,
            `a`.`admin_usuario`,
            DATE_FORMAT(`c`.`data_inicio`, '%d/%m/%Y') AS data_inicio,
            DATE_FORMAT( `c`.`data_fim`, '%d/%m/%Y') AS data_fim
            FROM
            `usuario` a
            JOIN `usuario_unidade_curso` c ON `a`.`id_usuario` = `c`.`usuario_id_usuario`
            JOIN `perfil` b ON `b`.`id_perfil` = `c`.`id_perfil`
            WHERE
            `a`.`status_usuario` = 1 AND `a`.`id_usuario` = ?");
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
    <title>Editar Usuários</title>
    <?php require_once "menu.php";?>
</head>

<body>
    <div class="container" id="container">
        <div><br><br></div>
        <h2 align="center">Editar Usuário</h2>
        <div><br></div>
        <div class="row">
            <div class="col">
                <form class="formAtualizarUsuario">
                    <input type="hidden" value="<?php echo $id_usuario; ?>" name="id">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nome</label>
                            <input type="text" class="form-control input-sm" name="nome_usuario" id="nome_usuario"
                            size="50" onkeyup="maiuscula(this)" value="<?php echo $nome_usuario; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>E-mail</label>
                            <input type="email" class="form-control input-sm" name="email_usuario" id="email_usuario"
                            value="<?php echo $email_usuario; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Usuário</label>
                            <input type="text" class="form-control input-sm" name="login_usuario" id="login_usuario"
                            value="<?php echo $login_usuario; ?>">
                        </div>                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Curso</label>
                            <select class="form-control input" id="curso_id" name="curso_id">
                                <option value="A">Selecionar o Curso</option>
                                <?php require_once "../classes/conexao.php";
                                global $pdo;
                                try {
                                    $ftp = $GLOBALS["con"]->query("SELECT id_curso, nome_curso FROM curso WHERE status_curso = 1");
                                    while ($linha = $ftp->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<option ';
                                        if ($linha['id_curso'] == $curso_id) {echo " selected ";}
                                        echo 'value="' . "{$linha['id_curso']}" . '">' . "{$linha['nome_curso']}" . '</option>';
                                    }
                                } catch (PDOException $e) {
                                    echo "Erro: " . $e->getMessage();
                                    exit;
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Unidade</label>
                            <select class="form-control input" id="unidade_id" name="unidade_id" required>
                                <option value="A">Selecionar a Unidade</option>
                                <?php require_once "../classes/conexao.php";
                                global $pdo;
                                try {
                                    $ftp = $GLOBALS["con"]->query("SELECT id_unidade, nome_unidade FROM unidade WHERE status_unidade = 1");
                                    while ($linha = $ftp->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<option '; 
                                        if ($linha['id_unidade'] == $unidade_id) {echo " selected ";}
                                      echo  'value="' . "{$linha['id_unidade']}" . '">' . "{$linha['nome_unidade']}" . '</option>';
                                    }
                                } catch (PDOException $e) {
                                    echo "Erro: " . $e->getMessage();
                                    exit;
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Início do Curso</label>
                            <input type="text" class="form-control input" name="data_inicio" id="data_inicio"
                            value="<?php echo $data_inicio; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Fim do Curso</label>
                            <input type="text" class="form-control input" name="data_fim" id="data_fim"
                            value="<?php echo $data_fim; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Perfil</label>
                            <select class="form-control input" id="id_perfil" name="id_perfil" required>
                                <option value="A">Selecionar Perfil</option>
                                <?php require_once "../classes/conexao.php";
                                global $pdo;
                                try {
                                    $ftp = $GLOBALS["con"]->query("SELECT id_perfil, nome_perfil FROM perfil WHERE status_perfil = 1");
                                    while ($linha = $ftp->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<option ';
                                        if ($linha['id_perfil'] == $id_perfil) {echo " selected ";}
                                        echo 'value="' . "{$linha['id_perfil']}" . '">' . "{$linha['nome_perfil']}" . '</option>';
                                    }
                                } catch (PDOException $e) {
                                    echo "Erro: " . $e->getMessage();
                                    exit;
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputState">Administrador?</label>
                            <select class="form-control input" id="admin_usuario" name="admin_usuario" required>
                                <option value="A">Selecionar Sim(S) ou Não(N)</option>                               
                                <option  <?php if($admin_usuario == "S") {echo "selected ";}?> value = "S">S</option>
                                <option <?php if($admin_usuario == "N") {echo "selected ";}?> value = "N">N</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                    </div>
                    <p></p>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="listarUsuario.php" class="btn btn-warning" role="button" aria-pressed="true">Listar
                    Usuário</a>
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
<script src="../lib/js/formatacao.js"></script>
<script src="../procedimentos/cadastrar/script.js"></script>
<script>
    app.formAtualizarUsuario();
</script>
</body>

</html>