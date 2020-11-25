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

if (
    (strlen($nome_curso) > 60) || (strlen($nome_curso) < 1)  
) {
    echo 'Existem campos em branco, preencha os campos obrigatórios!';
    exit();
}

try {
    $prepara = $GLOBALS['con']->prepare("INSERT INTO `curso`
        (
        `unidade_id_unidade`,
        `nome_curso`,
        `inicio_curso`,             
        `quantidade_semestre`,        
        `status_curso`,
        `data_captura`
        )
        VALUES
        (
        ?,
        ?,
        ?,
        ?,
        ?,               
        ?
    )");

    $verifica = $prepara->execute(
        array(
            $unidade_id_unidade,
            $nome_curso,
            implode("-", array_reverse(explode("/", $inicio_curso))),           
            $quantidade_semestre,           
            "1",                     
            date('Y-m-d'),
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

print_r($verifica);

   // echo "Erro ao cadastrar!";
    exit();
}