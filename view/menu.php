<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Home</title>
    <?php require_once "css.php"?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="principal.php">TCC FÀCIL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">  
                <?php if($_SESSION['admin_usuario'] == "S"): ?>                           
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Usuário
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="usuarios.php">Cadastrar</a>
                            <a class="dropdown-item" href="listarUsuario.php">Listar</a>
                        </div>                      
                    </li>   
                <?php endif; ?>          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Instituição
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="instituicao.php">Cadastrar</a>
                        <a class="dropdown-item" href="listarInstituicao.php">Listar</a>
                    </div>                      
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Unidade
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="unidade.php">Cadastrar</a>
                        <a class="dropdown-item" href="listarUnidade.php">Listar</a>
                    </div>                      
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Curso
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="curso.php">Cadastrar</a>
                        <a class="dropdown-item" href="listarCurso.php">Listar</a>
                    </div>                      
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Linha de Pesquisa
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="linhaPesquisa.php">Cadastrar</a>
                        <a class="dropdown-item" href="listarLinhaPesquisa.php">Listar</a>
                    </div>                      
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Projeto
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="projeto.php">Cadastrar</a>
                        <a class="dropdown-item" href="listarProjeto.php">Listar</a>
                        <a class="dropdown-item" href="vincularProjeto.php">Vincular Projeto</a>
                    </div>                      
                </li>                 
                <li class="nav-item">
                    <a class="nav-link" href="chat.php">Chat</a>
                </li>
            </ul>            
            <ul class="navbar-nav ml-auto">
                <a class="nav-link" href="javascript:void(0);" data-toggle="modal"
                data-target="#logoutModal">
                <span class="glyphicon glyphicon-off">
                </span> Sair
            </a>
        </div>
    </nav>
    <!-- Modal de pergunta para sair -->
    <div class="modal fade bd-example-modal-lg" id="logoutModal" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deseja sair?</h5>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="../procedimentos/sair.php">Sair</a>
            </div>
        </div>
    </div>
</div>
</body>
<?php require_once "javascript.php"?>
</html>

