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
    $prepara = $GLOBALS['con']->prepare("UPDATE `unidade` SET
        
        `instituicao_id_instituicao`= ?,
        `nome_unidade`= ?,
        `sigla_unidade`= ?,
        `cnpj_unidade`= ?,        
        `ie_unidade`= ?,
        `telefone_unidade`= ?
        WHERE id_unidade = ?");

    $verifica = $prepara->execute(
        array(
            $instituicao_id_instituicao,
            $nome_unidade,
            $sigla_unidade,
            $cnpj_unidade,
            $ie_unidade,
            $telefone_unidade,
            $id_unidade,           
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