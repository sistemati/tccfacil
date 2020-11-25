<?php require_once "sessao.php";?>
<!DOCTYPE html>
<html>

<head>
    <title>Vínculo Projetos</title>
    <?php require_once "menu.php"; ?>
</head>

<body>
    <div class="container" id="tabela">
        <div><br><br><br><br></div>
        <div>
            <a href="../view/vincularProjeto.php" class="btn btn-success" role="button" aria-pressed="true">Novo Vínculo</a>
        </div>
        <?php
        $consulta = "SELECT usu.nome_usuario, pro.nome_projeto, pe.nome_perfil 
                             FROM equipe eq
                                 JOIN usuario usu ON eq.usuario_id_usuario = usu.id_usuario 
                                 JOIN projeto_tcc pro ON eq.projeto_tcc_id_projeto = pro.id_projeto
                                 JOIN usuario_unidade_curso uuc ON usu.id_usuario = uuc.usuario_id_usuario
                                 JOIN perfil pe ON uuc.id_perfil = pe.id_perfil
                                      WHERE pro.status_projeto = 1";
        $resultado = $GLOBALS["con"]->prepare($consulta);
        $resultado->execute();
        
        ?>
        <h2 align="center">Listagem de Vínculos de Usuários com Projetos</h2>
        <div class="col">
            <table id="tables" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Usuário</th>
                        <th scope="col">Projeto</th>
                        <th scope="col">Nível</th>                                                
                    </tr>
                </thead>
                <tbody>
                    <?php while($row_resultado = $resultado->fetch(PDO::FETCH_ASSOC)):?>
                    <tr>
                        <td><?php echo $row_resultado['nome_usuario']; ?></td>
                        <td><?php echo $row_resultado['nome_projeto']; ?></td>
                        <td><?php echo $row_resultado['nome_perfil']; ?></td>                                            
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- Mensagem se quer realmente excluir o usuário -->
    <div class="modal fade bd-example-modal-lg" id="excluirInstituicao" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Realmente Deseja excluir esta Instituição?</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="javascript:void(0);">Excluir</a>
                </div>
            </div>
        </div>
    </div>
</body>