<?php

require_once 'conexao.php';

if (!isset($_POST) || empty($_POST)) {
    echo 'Nada a Salvar!';
    exit();
}

// criando as variaveis dinamicamente
foreach ($_POST as $chave => $valor) {
    $$chave = trim($valor);
}


try {
     $sth = $GLOBALS["con"]->prepare("SELECT pe.nome_perfil FROM equipe eq
                                            JOIN usuario usu ON eq.usuario_id_usuario = usu.id_usuario
                                            JOIN projeto_tcc pro ON eq.projeto_tcc_id_projeto = pro.id_projeto
                                            JOIN usuario_unidade_curso uuc ON usu.id_usuario = uuc.usuario_id_usuario
                                            JOIN perfil pe ON uuc.id_perfil = pe.id_perfil WHERE id_usuario = ?");
        $sth->bindValue(1, $usuario_id_usuario);
        $sth->execute();
        $nivel = $sth->fetchColumn();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        exit();
    }

try {
    $prepara = $GLOBALS['con']->prepare("INSERT INTO `equipe`
        (
        `usuario_id_usuario`,
        `projeto_tcc_id_projeto`,
        `nivel`      
        )
        VALUES
        (  
        ?,
        ?,
        ?
    )");

    $verifica = $prepara->execute(
        array(
            $usuario_id_usuario,
            $projeto_tcc_id_projeto,
            $nivel,             
        )
    );
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}

if ($verifica) {
    echo "OK";
    exit();
} else {
    echo "Erro ao Vincular Projeto!";
    exit();
}