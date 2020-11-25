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

/*if (
    (strlen($nome_unidade) > 60) || (strlen($nome_unidade) < 1)
    || (strlen($sigla_instituicao) > 8) || (strlen($sigla_instituicao) < 1)
    || (strlen($cnpj_instituicao) > 18) || (strlen($cnpj_instituicao) < 1)
    || (strlen($ie_instituicao) > 16) || (strlen($ie_instituicao) < 1)   
) {
    echo 'Existem campos em branco, preencha os campos obrigatórios!';
    exit();
}*/

try {
    $prepara = $GLOBALS['con']->prepare("INSERT INTO `unidade`
        (
        `instituicao_id_instituicao`,
        `nome_unidade`,
        `sigla_unidade`,
        `cnpj_unidade`,        
        `ie_unidade`,
        `telefone_unidade`,
        `status_unidade`,
        `data_captura`
        )
        VALUES
        (
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?
    )");

    $verifica = $prepara->execute(
        array(
            $instituicao_id_instituicao,
            $nome_unidade,
            $sigla_unidade,
            $cnpj_unidade,
            $ie_unidade,
            $telefone_unidade,
            "1",                     
            date('Y-m-d H:i:s'),
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
    echo "Erro ao cadastrar!";
    exit();
}