<?php


namespace App\Classes;

class Mailer
{
    const HEADERS = [
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=iso-8859-1'
    ];



    private static function getStringHeaders(): string
{
    $headers = self::HEADERS;
    $headers[] ='From: '. MAIL_NO_REPLY;

    return implode("\r\n", $headers);
}




    public static function sendValidationMail($user)
    {
        ob_start();
        include MAIL_VIEWS.'validation.php';
        $mailContent = ob_get_contents();
        ob_clean();
        include_once MAIL_VIEWS.'template.php';
        $mail = ob_get_clean();
        mail(
            $user->getMail(),
            'Blog-OC Please confirm your email address',
            $mail,
            self::getStringHeaders());
    }
}
