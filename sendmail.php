<?php
require 'vendor/autoload.php';

class SendEmail(
    
    public static function SendMail($to,$subject,$content) {
        $key = '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';

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("noreply@mcu-somssa.com.ng", "MCU-Somssa");
        $email->setSubject($subject);
        $email->addto($to);
        $email->addContent("text/plain", $content);
        
        $sendgrid = new sendgrid($key);

        try(
            $response = $sendgrid->send($email);

        )catch(Execption $e){
            echo 'Email.coagtht'[caught: '.$e->getMessage(). "\n";
            return false
        }
    }
)

?>