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

        `status_projeto`= ?

        WHERE id_projeto = ?");

    $verifica = $prepara->execute(
        array(2, $id)
    );
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}

if ($verifica) {
    echo "OK";
    exit();
} else {
    echo "Erro ao Deletar!";
    exit();
}
