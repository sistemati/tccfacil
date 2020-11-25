<?php
//include 'conexao.php';

class Usuario
{

    public function login($email, $senha)
    {
        try {
            $consulta = $GLOBALS["con"]->prepare("SELECT * FROM usuario WHERE email_usuario = ? AND senha_usuario = ?");
            $consulta->bindValue(1, $email);
            $consulta->bindValue(2, md5($senha));
            $consulta->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }

        if ($consulta->rowCount() > 0) {
            $dado = $consulta->fetch();

            $_SESSION['id_usuario'] = $dado['id_usuario'];
            $_SESSION['nome_usuario'] = $dado['nome_usuario'];
            $_SESSION['email_usuario'] = $email;
            $_SESSION['senha_usuario'] = $senha;
            $_SESSION['admin_usuario'] = $dado['admin_usuario'];

            return true;
        } else {
            return false;
        }
    }
}
