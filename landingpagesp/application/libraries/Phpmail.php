<?php

class Phpmail {

    function sendEmail($config=null, $mensagem, $assunto, $destinatarios, $destinatariosCO = null) {

        require_once('./application/libraries/phpmailer/class.phpmailer.php');
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SetLanguage("br", "assets/phpmailer/language/");
        $mail->SMTPAuth = true;
        $mail->CharSet = 'UTF-8';
        $mail->Port = '587';
        
        $mail->Host = "smtp.kinghost.net";
        $mail->Username = "lavateriahome@lavateria.com.br";
        $mail->Password = "Marketinglav2020";
        $mail->SetFrom('lavateriahome@lavateria.com.br', APP_NAME);
        //
        if (count($destinatarios) > 0) {
            foreach ($destinatarios as $destinatario) {
                $mail->AddAddress($destinatario["email"], $destinatario["nome"]);
            }
            if (count($destinatariosCO) > 0) {
                foreach ($destinatariosCO as $destinatarioCO) {
                    $mail->AddBCC($destinatarioCO["email"], $destinatarioCO["nome"]);
                }
            }
        }
        $mail->Subject = $assunto;
        $mail->MsgHTML(nl2br($mensagem));
        return $mail->Send();
    }

}
