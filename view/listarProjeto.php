<?php require_once "sessao.php";?>
<!DOCTYPE html>
<html>

<head>
    <title>Projeto</title>
    <?php require_once "menu.php"; ?>
</head>

<body>
    <div class="container" id="tabela">
        <div><br><br><br></div>
        <div>
            <a href="../view/projeto.php" class="btn btn-success" role="button" aria-pressed="true">Novo Projeto</a>
        </div>
        <?php
        $consulta = "SELECT pro.id_projeto, 
                            pro.nome_projeto,
                            pro.descricao_projeto,
                            pro.linha_pesquisa_id_linha_pesquisa,
                            date_format(pro.data_inicio , '%d/%m/%y') AS data_inicio, 
                            date_format(pro.data_fim , '%d/%m/%y') AS data_final, 
                            lin.nome_pesquisa 
                            FROM projeto_tcc pro
                                 JOIN linha_pesquisa lin ON linha_pesquisa_id_linha_pesquisa = lin.id_linha_pesquisa
                                     WHERE status_projeto = 1";
        $resultado = $GLOBALS["con"]->prepare($consulta);
        $resultado->execute();
        ?>
        <h2 align="center">Listagem de Projetos</h2>
        <div class="col">
            <table id="tables" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Projeto</td>
                        <th scope="col">Descrição</td>
                        <th scope="col">Linha de Pesquisa</td>
                        <th scope="col">Data do início</td>
                        <th scope="col">Editar</td>
                        <th scope="col">Excluir</td>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row_resultado = $resultado->fetch(PDO::FETCH_ASSOC)):?>

                    <tr>
                        <td><?php echo $row_resultado['nome_projeto']; ?></td>
                        <td><?php echo $row_resultado['descricao_projeto']; ?></td>
                        <td><?php echo $row_resultado['nome_pesquisa']; ?></td>
                        <td><?php echo $row_resultado['data_inicio']; ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm"
                                href="editarProjeto.php?id=<?php echo $row_resultado['id_projeto']; ?>">Editar
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm"
                                data-id="<?php echo $row_resultado['id_projeto']; ?>" data-toggle="modal"
                                data-target="#excluirprojeto"> Excluir
                            </button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="excluirprojeto" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form class="forDeletarProjeto" method="post">
                    <input type="hidden" name="id">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Realmente Deseja excluir este projeto?</h6>
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
    $('#excluirprojeto').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[name="id"]').val(id);
    });
    app.forDeletarProjeto();
    </script>
</body>

</html>