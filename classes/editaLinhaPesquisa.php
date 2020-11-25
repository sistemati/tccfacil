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
    $prepara = $GLOBALS['con']->prepare("UPDATE `linha_pesquisa` SET
       
        `nome_pesquisa`= ?,
        `curso_id_curso`= ?,
        `descricao_pesquisa`= ?        
        WHERE id_linha_pesquisa = ?");

    $verifica = $prepara->execute(
        array(
            $nome_pesquisa,
            $curso_id_curso,
            $descricao_pesquisa, 
            $id_linha_pesquisa,                    
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