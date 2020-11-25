<?php require_once "sessao.php";
$usuario = $_SESSION['nome_usuario'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista Mensagens</title>
    <?php require_once "menu.php"; ?>
</head>

<body>
    <div class="container" id="tabela">
        <div><br><br><br></div>
        <div>
            <a href="../view/chat.php" class="btn btn-success" role="button" aria-pressed="true">Enviar nova
                mensagem</a>
        </div>
        <?php
        $consulta = "SELECT 	
        a.id_interacao, 
         (SELECT 
           aa. nome_usuario 
         FROM
           usuario AS aa 
         WHERE aa.id_usuario = a.id_usuario_de) AS nome_de,
         (SELECT 
           aa.nome_usuario 
         FROM
           usuario AS aa 
         WHERE aa.id_usuario = a.id_usuario_para) AS nome_para, 
         a.assunto,
         a.texto,
         pro.nome_projeto,
         DATE_FORMAT(a.data_hora_envio,'%d/%m/%Y ás %H:%m:%s' ) AS data_hora_envio,
         a.status_interacao
       FROM
         interacao AS a   
         JOIN projeto_tcc pro 
           ON a.projeto_tcc_id_projeto = pro.id_projeto 
       WHERE status_interacao = 1";

        $resultado = $GLOBALS["con"]->prepare($consulta);
        $resultado->execute();       
        ?>
        <h2 align="center">Listagem de Mensagens Enviadas</h2>
        <div class="col">
            <table id="tables" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">DE</th>
                        <th scope="col">Para</th>
                        <th scope="col">Mensagem</th>
                        <th scope="col">Data de envio</th>
                        <th scope="col">Excluir</th>

                    </tr>
                </thead>
                <tbody>
                    <?php while($row_resultado = $resultado->fetch(PDO::FETCH_ASSOC)):?>
                    <tr>
                        <td><?php echo $row_resultado['nome_de']; ?></td>
                        <td><?php echo $row_resultado['nome_para']; ?></td>
                        <td><?php echo $row_resultado['texto']; ?></td>
                        <td><?php echo $row_resultado['data_hora_envio']; ?></td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm"
                                data-id="<?php echo $row_resultado['id_interacao']; ?>" data-toggle="modal"
                                data-target="#excluirInteracao"> Excluir
                            </button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="excluirInteracao" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form class="forDeletarInteracao" method="post">
                    <input type="hidden" name="id">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Realmente Deseja excluir esta mensagem?</h6>
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
    $('#excluirInteracao').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[name="id"]').val(id);
    });
    app.forDeletarInteracao();
    </script>
</body>