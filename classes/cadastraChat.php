<?php

require_once 'conexao.php';
include "../lib/email/email.php";

if (!isset($_POST) || empty($_POST)) {
    echo 'Nada a Salvar!';
    exit();
}
// criando as variaveis dinamicamente
foreach ($_POST as $chave => $valor) {
    $$chave = trim($valor);
}

try {
    $prepara = $GLOBALS['con']->prepare("INSERT INTO `interacao`
        (
        `projeto_tcc_id_projeto`,
        `id_usuario_de`,
        `id_usuario_para`,
        `assunto`,
        `texto`,
        `data_hora_envio`,
        `status_interacao`
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
            $projeto_tcc_id_projeto,
            $id_usuario_de,
            $id_usuario_para,
            $assunto,
            $texto,
            date('Y-m-d H:i:s'),
            "1",             
        )
    );
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}

if ($verifica) {

    try {
        $sth = $GLOBALS["con"]->prepare("SELECT email_usuario, nome_usuario FROM usuario WHERE id_usuario = ? LIMIT 1");
        $sth->bindValue(1, $id_usuario_para);
        $sth->execute();
        // $email_destino = $sth->fetchColumn();
        $res = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        exit();
    }

    try {
        $sth = $GLOBALS["con"]->prepare("SELECT nome_usuario FROM usuario WHERE id_usuario = ?");
        $sth->bindValue(1, $id_usuario_de);
        $sth->execute();
        $nome_usuario = $sth->fetchColumn();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        exit();
    }

    //print_r($res['nome_usuario']);exit;
    if (email(
        $assunto,
        "<p>$texto</p>",
        $res['email_usuario'],
        "TCC FACIL - " .$nome_usuario,
        $res['nome_usuario'],

    )) {
        echo "OK";
        exit();
        } else {
        echo "Erro no email";
        exit();
    }
} else {
    echo "Erro ao cadastrar!";
    exit();
}
