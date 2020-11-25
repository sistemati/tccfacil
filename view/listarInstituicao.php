<?php require_once "sessao.php";?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista Instituição</title>
    <?php require_once "menu.php";?>
</head>

<body>
    <div class="container" id="tabela">
        <div><br><br><br></div>
        <div>
            <a href="../view/instituicao.php" class="btn btn-success" role="button" aria-pressed="true">Nova
                Instituição</a>
        </div>
        <?php
$consulta = "SELECT id_instituicao, nome_instituicao, sigla_instituicao, email_instituicao from instituicao
                     WHERE status_instituicao = 1";

$resultado = $GLOBALS["con"]->prepare($consulta);
$resultado->execute();

?>
        <h2 align="center">Listagem de Instituição</h2>
        <div class="col">
            <table id="tables" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Instituição</th>
                        <th scope="col">Sigla</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row_resultado = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $row_resultado['nome_instituicao']; ?></td>
                        <td><?php echo $row_resultado['sigla_instituicao']; ?></td>
                        <td><?php echo $row_resultado['email_instituicao']; ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm"
                                href="editarInstituicao.php?id=<?php echo $row_resultado['id_instituicao']; ?>">Editar</a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm"
                                data-id="<?php echo $row_resultado['id_instituicao']; ?>" data-toggle="modal"
                                data-target="#excluirInstituicao"> Excluir
                            </button>
                        </td>
                    </tr>
                    <?php endwhile;?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- Mensagem se quer realmente excluir o usuário -->
    <div class="modal fade bd-example-modal-lg" id="excluirInstituicao" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form class="forDeletarInst" method="post">
                <input type="hidden" name="id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Realmente Deseja excluir esta Instituição?</h6>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <input class="btn btn-danger" type="submit" value="Excluir"></input>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="../procedimentos/cadastrar/script.js"></script>
    <script>
    $('#excluirInstituicao').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[name="id"]').val(id);
    });
    app.forDeletarInst();
    </script>
</body>