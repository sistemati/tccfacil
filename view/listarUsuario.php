<?php require_once "sessao.php";?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista Unidade</title>
    <?php require_once "menu.php";?>
</head>

<body>
    <div class="container" id="tabela">
        <div><br><br><br></div>
        <div>
            <a href="../view/usuarios.php" class="btn btn-success" role="button" aria-pressed="true">Novo Usuário</a>
        </div>
        <?php
        $consulta = "SELECT a.id_usuario, a.nome_usuario, a.email_usuario, a.login_usuario, b.nome_perfil
        FROM usuario a
        JOIN usuario_unidade_curso c ON a.id_usuario = c.usuario_id_usuario
        JOIN perfil b ON b.id_perfil = c.id_perfil
        WHERE a.status_usuario = 1";

        $resultado = $GLOBALS["con"]->prepare($consulta);
        $resultado->execute();

        ?>
        <h2 align="center">Listagem de Usuário</h2>
        <div class="col">
            <table id="tables" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Perfil</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row_resultado = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $row_resultado['nome_usuario']; ?></td>
                        <td><?php echo $row_resultado['email_usuario']; ?></td>
                        <td><?php echo $row_resultado['login_usuario']; ?></td>
                        <td><?php echo $row_resultado['nome_perfil']; ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm"
                                href="editarUsuario.php?id=<?php echo $row_resultado['id_usuario'];?>">Editar</a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm"
                                data-id="<?php echo $row_resultado['id_usuario']; ?>" data-toggle="modal"
                                data-target="#excluirUsuario"> Excluir
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
    <div class="modal fade bd-example-modal-lg" id="excluirUsuario" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form class="forDeletarUsu" method="post">
                    <input type="hidden" name="id">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Realmente Deseja excluir este Usuário?</h6>
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
    $('#excluirUsuario').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[name="id"]').val(id);
    });
    app.forDeletarUsu();
    </script>
</body>
</html>