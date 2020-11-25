<?php 
require_once "sessao.php";

if (!isset($_GET["id"]) && empty($_GET["id"])) {
    header('Location: listarCurso.php');
    exit();
} else {
    $id = $_GET["id"];
    try {
        $stm = $GLOBALS["con"]->prepare("SELECT cu.id_curso,
                                                cu.nome_curso,
                                                DATE_FORMAT(cu.inicio_curso, '%d/%m/%Y') AS inicio_curso,
                                                DATE_FORMAT(cu.fim_curso, '%d/%m/%Y') AS fim_curso,       
                                                cu.quantidade_semestre,
                                                un.id_unidade,
                                                un.nome_unidade	
                                                    FROM curso cu
                                                    JOIN unidade un ON cu.unidade_id_unidade = un.id_unidade
                                                         WHERE id_curso = ?");         
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
    <title>Cadastrar Cursos</title>
    <?php require_once "menu.php"; ?>
</head>

<body>
    <div class="container" id="container">
        <div><br><br><br></div>
        <h2 align="center">Editar Curso</h2>
        <div><br></div>
        <div class="row">
            <div class="col">
                <form class="formEditarCurso">
                    <input type="hidden" value="<?php echo $id_curso; ?>" name="id_curso">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Unidade</label>
                            <select class="form-control input" id="unidade_id_unidade" name='unidade_id_unidade'
                                required>
                                <option value="A">Selecionar a Unidade</option>
                                <?php require_once "../classes/conexao.php";
                        global $pdo;
                        try{
                            $ftp = $GLOBALS["con"]->query("SELECT id_unidade, nome_unidade FROM unidade WHERE status_unidade = 1");
                            while ($linha = $ftp->fetch(PDO::FETCH_ASSOC)) {
                             echo '<option ';
                             if ($linha['id_unidade'] == $id_unidade) {echo " selected ";}
                             echo ' value="' . "{$linha['id_unidade']}" . '">' . "{$linha['nome_unidade']}" . '</option>';
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
                            <input type="text" class="form-control input" name="nome_curso" id="nome_curso"
                                value="<?php echo $nome_curso; ?>" size="50" onkeyup="maiuscula(this)" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Início do Curso</label>
                            <input type="text" class="form-control input" name="inicio_curso" id="inicio_curso"
                                value="<?php echo $inicio_curso; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Fim do Curso</label>
                            <input type="text" class="form-control input" name="fim_curso" id="fim_curso"
                                value="<?php echo $fim_curso; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Quantidade de Semestres</label>
                            <input type="text" class="form-control input" name="quantidade_semestre"
                                id="quantidade_semestre" value="<?php echo $quantidade_semestre; ?>" required>
                        </div>
                        <div class="form-row">
                        </div>
                        <p></p>
                        <p></p>
                        <button type="submit" class="btn btn-primary">Salvar</button>&nbsp;
                        <a href="listarCurso.php" class="btn btn-warning" role="button" aria-pressed="true">Listar
                            Curso</a>
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
    function maiuscula(z) {
        v = z.value.toUpperCase();
        z.value = v;
    } //FIM DA FUNÇÃO MASCARA MAIUSCULA

    function inputHandler(masks, max, event) {
        var c = event.target;
        var v = c.value.replace(/\D/g, '');
        var m = c.value.length > max ? 1 : 0;
        VMasker(c).unMask();
        VMasker(c).maskPattern(masks[m]);
        c.value = VMasker.toPattern(v, masks[m]);
    }

    var inicio_cursoMask = ['99/99/9999', '99/99/9999'];
    var inicio_curso = document.querySelector('#inicio_curso');
    VMasker(inicio_curso).maskPattern(inicio_cursoMask[0]);
    inicio_curso.addEventListener('input', inputHandler.bind(undefined, inicio_cursoMask, 15), false);

    var fim_cursoMask = ['99/99/9999', '99/99/9999'];
    var fim_curso = document.querySelector('#fim_curso');
    VMasker(inicio_curso).maskPattern(fim_cursoMask[0]);
    fim_curso.addEventListener('input', inputHandler.bind(undefined, fim_cursoMask, 15), false);
    </script>


    <script src="../procedimentos/cadastrar/script.js"></script>
    <script>
    app.formEditarCurso();
    </script>
</body>

</html>