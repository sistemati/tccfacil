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
    $prepara = $GLOBALS['con']->prepare("INSERT INTO `linha_pesquisa`
        (
        `nome_pesquisa`,
        `curso_id_curso`,
        `descricao_pesquisa`,        
        `status_linha_pesquisa`,
        `data_captura`
        )
        VALUES
        (
        ?,
        ?,
        ?,
        ?,        
        ?
    )");

    $verifica = $prepara->execute(
        array(
            $nome_pesquisa,
            $curso_id_curso,
            $descricao_pesquisa,           
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