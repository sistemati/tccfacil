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
    $prepara = $GLOBALS['con']->prepare("UPDATE `projeto_tcc` SET
        
        `nome_projeto`= ?,
        `linha_pesquisa_id_linha_pesquisa`= ?,
        `data_inicio`= ?,
        `data_fim`= ?,        
        `descricao_projeto`= ?
        
        WHERE id_projeto = ?");

    $verifica = $prepara->execute(
        array(
            $nome_projeto,
            $linha_pesquisa_id_linha_pesquisa,
            implode("-", array_reverse(explode("/", $data_inicio))),
            implode("-", array_reverse(explode("/", $data_fim))),
            $descricao_projeto,            
            $id_projeto,           
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
    echo "Erro ao editar!";
    exit();
}