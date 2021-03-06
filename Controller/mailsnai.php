<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class MailSnai {
private $mail;
    public function __construct() {
        $this->mail = new PHPMailer(true);
    }

    public function sendMailSnai($toaddress,$to_address_asesor,$idTraslado) {
        try {
           
            //Server settings
            $this->mail->SMTPDebug = 0; /* 2 */
            $this->mail->isSMTP();
            /* $mail->Helo = "www.eldominioqueusas.com.mx"; */
            $this->mail->Host = 'mail.atencionintegral.gob.ec;';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'traslados.snai@atencionintegral.gob.ec';
            $this->mail->Password = 'Sistr@.2022';
            $this->mail->SMTPSecure = 'ssl'; /* tls */
            $this->mail->Port = 465; /* 587 */

            $this->mail->setFrom('traslados.snai@atencionintegral.gob.ec', 'Sistema Traslados');
            $this->mail->addAddress($toaddress, 'Recipient1');
            $this->mail->addReplyTo('odilo.ipiales@atencionintegral.gob.ec');
            
            /*$mail->addReplyTo('noreply@example.com', 'noreply');*/
            $this->mail->addCC($to_address_asesor);
            $this->mail->addBCC('edgar.villa@atencionintegral.gob.ec'); 

            //Attachments
            /* $mail->addAttachment('/backup/myfile.tar.gz'); */
            //Content
            $this->mail->isHTML(true);
            $this->mail->Subject = 'Tiene un Traslado!';
            $this->mail->Body = 'Estimad@ tiene el  Traslado Nro.'.$idTraslado.' por Atender  '
                    . '<b>'
                    . 'http://192.168.1.83/TraslationPPLSystem/index.php';
 
            $this->mail->send();
           
            return TRUE;
        } catch (Exception $e) {
             /*echo 'Message could not be sent.';
              echo 'Mailer Error: ' . $e; */
            return FALSE;
        }
    }

}

?>