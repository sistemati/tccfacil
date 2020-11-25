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
    $prepara = $GLOBALS['con']->prepare("INSERT INTO `projeto_tcc`
        (
        `linha_pesquisa_id_linha_pesquisa`,
        `nome_projeto`,
        `descricao_projeto`,        
        `data_inicio`,
        `data_fim`,
        `status_projeto`,
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
        ?
    )");

    $verifica = $prepara->execute(
        array(
            $linha_pesquisa_id_linha_pesquisa,
            $nome_projeto,
            $descricao_projeto,
            implode("-", array_reverse(explode("/", $data_inicio))),
            implode("-", array_reverse(explode("/", $data_fim))),            
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