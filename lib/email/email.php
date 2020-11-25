<?php

function email($para_assunto, $para_corpo, $siteEmailToDestino, $titulo, $titulo2)
{ 
    $para_assunto = trim($para_assunto);
    $para_corpo = trim($para_corpo);
    $siteEmailToDestino ;   
    $msg = false;

    // Inclui o arquivo class.phpmailer.php localizado na pasta class
    require_once "PHPMailerAutoload.php";

    // Inicia a classe PHPMailer
    $mail = new PHPMailer(true);

    // Define os dados do servidor e tipo de conexão
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->IsSMTP(); // Define que a mensagem será SMTP

    try {
        $mail->CharSet = "utf-8";
        $mail->Host = 'smtp.gmail.com'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
        $mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465; //  Usar 587 porta SMTP
        $mail->Username = 'tccfacil.contato@gmail.com'; // Usuário do servidor SMTP (endereço de email)
        $mail->Password = '204060Jolo@'; // Senha do servidor SMTP (senha do email usado)

        //Define o remetente
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->SetFrom('tccfacil.contato@gmail.com', $titulo); //Seu e-mail
        $mail->AddReplyTo('tccfacil.contato@gmail.com', $titulo); //Seu e-mail
        $mail->Subject = $para_assunto; //Assunto do e-mail

        //Define os destinatário(s)
        //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->AddAddress($siteEmailToDestino, '');

        //Campos abaixo são opcionais
        //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
       // $mail->AddCC('tccfacil.contato@gmail.com', $titulo2); // Copia
        //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
        //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo

        //Define o corpo do email
        $mail->MsgHTML($para_corpo);

        ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
        //$mail->MsgHTML(file_get_contents('arquivo.html'));

        $mail->Send();
        //echo "Mensagem enviada com sucesso</p>\n";
        $msg = true;

        //caso apresente algum erro é apresentado abaixo com essa exceção.
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
    }

    return $msg;
}
