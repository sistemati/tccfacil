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

// update 1
try {
    $prepara = $GLOBALS['con']->prepare("UPDATE `usuario` SET        
        `nome_usuario` = ?,
        `email_usuario` = ?,
        `login_usuario`  = ?,             
        `admin_usuario` = ?       
        WHERE id_usuario = ?");

    $verificaUsuario = $prepara->execute(
        array(
            $nome_usuario,
            $email_usuario,
            $login_usuario,                
            $admin_usuario,           
            $id
        )
    );
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}

if ($verificaUsuario) {

    // update 2
    try {
        $prepara = $GLOBALS['con']->prepare("UPDATE `usuario_unidade_curso` SET
            
            `unidade_id`= ?,
            `curso_id`= ?,
            `id_perfil`= ?,        
            `data_inicio`= ?,
            `data_fim`= ?
            WHERE `usuario_id_usuario`= ?");

        $verificaVinculo = $prepara->execute(
            array(                
                $unidade_id,
                $curso_id,
                $id_perfil,
                implode("-", array_reverse(explode("/", $data_inicio))),
                implode("-", array_reverse(explode("/", $data_fim))),   
                $id            
            )
        );
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        exit();
    }

    if ($verificaVinculo) {
        echo "OK";
        exit();
    } else {
        echo "Erro ao editar Vinvulo";
        exit();
    }
} else {
    echo "Erro ao editar Usuário";
    exit();
}