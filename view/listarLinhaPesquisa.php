<?php require_once "sessao.php";?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista Linha de Pesquisa</title>
    <?php require_once "menu.php"; ?>
</head>

<body>
    <div class="container" id="tabela">
        <div><br><br><br></div>
        <div>
            <a href="../view/linhaPesquisa.php" class="btn btn-success" role="button" aria-pressed="true">Nova Linha de
                Pesquisa</a>
        </div>
        <?php
        $consulta = "SELECT lin.id_linha_pesquisa, lin.nome_pesquisa, lin.descricao_pesquisa, cur.nome_curso
        FROM linha_pesquisa lin JOIN curso cur ON curso_id_curso = cur.id_curso WHERE status_linha_pesquisa = 1";

        $resultado = $GLOBALS["con"]->prepare($consulta);
        $resultado->execute();

        ?>
        <h2 align="center">Listagem de linha de Pesquisa</h2>
        <div class="col">
            <table id="tables" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row_resultado = $resultado->fetch(PDO::FETCH_ASSOC)):?>
                    <tr>
                        <td><?php echo $row_resultado['nome_pesquisa']; ?></td>
                        <td><?php echo $row_resultado['nome_curso']; ?></td>
                        <td><?php echo $row_resultado['descricao_pesquisa']; ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm"
                                href="editarLinhaPesquisa.php?id=<?php echo $row_resultado['id_linha_pesquisa']; ?>">Editar
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm"
                                data-id="<?php echo $row_resultado['id_linha_pesquisa']; ?>" data-toggle="modal"
                                data-target="#excluirLinhaPesquisa"> Excluir
                            </button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="excluirLinhaPesquisa" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form class="forDeletarLinhaPesquisa" method="post">
                    <input type="hidden" name="id">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Realmente Deseja excluir este Curso?</h6>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <input class="btn btn-danger" type="submit" value="Excluir"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../procedimentos/cadastrar/script.js"></script>
    <script>
    $('#excluirLinhaPesquisa').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[name="id"]').val(id);
    });
    app.forDeletarLinhaPesquisa();
    </script>
</body>
</html>