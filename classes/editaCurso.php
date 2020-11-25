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

// insert 1
try {
    $prepara = $GLOBALS['con']->prepare("UPDATE `curso` SET
        
        `unidade_id_unidade`= ?,
        `nome_curso`= ?,
        `inicio_curso`= ?,
        `fim_curso`= ?,        
        `quantidade_semestre`= ? 
        WHERE id_curso = ?");

    $verifica = $prepara->execute(
        array(
            $unidade_id_unidade,
            $nome_curso,
            implode("-", array_reverse(explode("/", $inicio_curso))),
            implode("-", array_reverse(explode("/", $fim_curso))),           
            $quantidade_semestre,          
            $id_curso,           
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