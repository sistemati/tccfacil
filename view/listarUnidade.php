<?php require_once "sessao.php";?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista Unidade</title>
    <?php require_once "menu.php"; ?>
</head>

<body>
    <div class="container" id="tabela">
        <div><br><br><br></div>
        <div>
            <a href="../view/unidade.php" class="btn btn-success" role="button" aria-pressed="true">Nova Unidade</a>
        </div>
        <?php
        $consulta = "SELECT uni.id_unidade, uni.instituicao_id_instituicao, uni.nome_unidade, uni.sigla_unidade, uni.cnpj_unidade, uni.ie_unidade, uni.telefone_unidade, ins.nome_instituicao
        FROM unidade uni JOIN instituicao ins ON  instituicao_id_instituicao = ins.id_instituicao WHERE status_unidade = 1";

        $resultado = $GLOBALS["con"]->prepare($consulta);
        $resultado->execute();
        
        ?>
        <h2 align="center">Listagem de Unidade</h2>
        <div class="col">
            <table id="tables" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Instituição</th>
                        <th scope="col">Nome da Unidade</th>
                        <th scope="col">Sigla</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row_resultado = $resultado->fetch(PDO::FETCH_ASSOC)):?>
                    <tr>
                        <td><?php echo $row_resultado['nome_instituicao']; ?></td>
                        <td><?php echo $row_resultado['nome_unidade']; ?></td>
                        <td><?php echo $row_resultado['sigla_unidade']; ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm"
                                href="editarUnidade.php?id=<?php echo $row_resultado['id_unidade']; ?>">Editar
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm"
                                data-id="<?php echo $row_resultado['id_unidade']; ?>" data-toggle="modal"
                                data-target="#excluirUnidade"> Excluir
                            </button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="excluirUnidade" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form class="forDeletarUnidade" method="post">
                    <input type="hidden" name="id">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Realmente Deseja excluir esta Unidade?</h6>
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
    $('#excluirUnidade').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[name="id"]').val(id);
    });
    app.forDeletarUnidade();
    </script>
</body>
</html>