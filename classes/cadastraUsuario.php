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
    (strlen($nome_usuario) > 60) || (strlen($nome_usuario) < 1)
    || (strlen($email_usuario) > 60) || (strlen($email_usuario) < 1)
    || (strlen($login_usuario) > 60) || (strlen($login_usuario) < 1)
    || (strlen($senha_usuario) > 60) || (strlen($senha_usuario) < 1)
    || (strlen($admin_usuario) > 60) || (strlen($admin_usuario) < 1)
    // || (strlen($status_usuario) > 60) || (strlen($status_usuario) < 1)
    // || (strlen($data_captura) > 60) || (strlen($data_captura) < 1)
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
    $prepara = $GLOBALS['con']->prepare("INSERT INTO `usuario`
        (
        `nome_usuario`,
        `email_usuario`,
        `login_usuario`,
        `senha_usuario`,        
        `status_usuario`,
        `admin_usuario`,
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
            $nome_usuario,
            $email_usuario,
            $login_usuario,
            md5($senha_usuario),
            "1",
            $admin_usuario,            
            date('Y-m-d H:i:s'),
        )
    );
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}

if ($verifica) {

    $id = $GLOBALS["con"]->lastInsertId();

    // inseret 2
    try {
        $prepara = $GLOBALS['con']->prepare("INSERT INTO `usuario_unidade_curso`
            (
            `usuario_id_usuario`,
            `unidade_id`,
            `curso_id`,
            `id_perfil`,        
            `data_inicio`,
            `data_fim`           
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
                $id,
                $unidade_id,
                $curso_id,
                $id_perfil,
                implode("-", array_reverse(explode("/", $data_inicio))),
                implode("-", array_reverse(explode("/", $data_fim))),               
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
        echo "Erro ao cadastrar Vínvulo!";
        exit();
    }
} else {
    echo "Erro ao cadastrar Úsuario";
    exit();
}