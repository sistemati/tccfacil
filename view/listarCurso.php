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
            <a href="../view/curso.php" class="btn btn-success" role="button" aria-pressed="true">Novo Curso</a>
        </div>
        <?php
        $consulta = "SELECT cu.id_curso,
                            cu.nome_curso,
                            DATE_FORMAT(cu.inicio_curso, '%d/%m/%Y') AS inicio_curso,
                            DATE_FORMAT(cu.fim_curso, '%d/%m/%Y') AS fim_curso,       
                            cu.quantidade_semestre,
                            un.id_unidade,
                            un.nome_unidade	
                              FROM curso cu
                               JOIN unidade un ON cu.unidade_id_unidade = un.id_unidade
                                 WHERE status_curso = 1";
        $resultado = $GLOBALS["con"]->prepare($consulta);
        $resultado->execute();

        ?>
        <h2 align="center">Listagem de Cursos</h2>
        <div class="col">
            <table id="tables" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Curso</th>
                        <th scope="col">Início do Curso</th>
                        <th scope="col">Fim do Curso</th>
                        <th scope="col">Semestres</th>
                        <th scope="col">Unidade</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row_resultado = $resultado->fetch(PDO::FETCH_ASSOC)):?>
                    <tr>
                        <td><?php echo $row_resultado['nome_curso']; ?></td>
                        <td><?php echo $row_resultado['inicio_curso']; ?></td>
                        <td><?php echo $row_resultado['fim_curso']; ?></td>
                        <td><?php echo $row_resultado['quantidade_semestre']; ?></td>
                        <td><?php echo $row_resultado['nome_unidade']; ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm"
                                href="editarCurso.php?id=<?php echo $row_resultado['id_curso']; ?>">Editar</a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm"
                                data-id="<?php echo $row_resultado['id_curso']; ?>" data-toggle="modal"
                                data-target="#excluirCurso"> Excluir
                            </button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    
    <div class="modal fade bd-example-modal-lg" id="excluirCurso" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form class="forDeletarCurso" method="post">
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
    $('#excluirCurso').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[name="id"]').val(id);
    });
    app.forDeletarCurso();
    </script>
</body>
</html>