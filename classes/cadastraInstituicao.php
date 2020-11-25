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

// VALIDAR -------------------------------------------------------------------------------------------------------

// OBS: validar os campos para nao estourar a quantidade de caracteres permitido na coluna dele no banco por exemplo

// verificar se ja existe alguem cadastrado com o mesmo email, nome de usuario etc
// esses campos sao os do fortm
if (
    (strlen($nome_instituicao) > 60) || (strlen($nome_instituicao) < 1)
    || (strlen($sigla_instituicao) > 8) || (strlen($sigla_instituicao) < 1)
    || (strlen($cnpj_instituicao) > 18) || (strlen($cnpj_instituicao) < 1)
    || (strlen($ie_instituicao) > 16) || (strlen($ie_instituicao) < 1)   
) {
    echo 'Existem campos em branco, preencha os campos obrigatórios!';
    exit();
}

// validando se as duas senhas digitadas sao iguais
/*if ($confirmaSenhaUsuario != $senhaUsuario) {
    echo "As senhas digitadas são diferentes!";
    exit();
}*/

// FIM VALIDAR ---------------------------------------------------------------------------------------------------

// insert 1
try {
    $prepara = $GLOBALS['con']->prepare("INSERT INTO `instituicao`
        (
        `nome_instituicao`,
        `sigla_instituicao`,
        `cnpj_instituicao`,
        `ie_instituicao`,        
        `telefone_instituicao`,
        `email_instituicao`,
        `status_instituicao`,
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
            $nome_instituicao,
            $sigla_instituicao,
            $cnpj_instituicao,
            $ie_instituicao,
            $telefone_instituicao,
            $email_instituicao,
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