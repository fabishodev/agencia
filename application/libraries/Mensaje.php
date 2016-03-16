<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'libraries/swift_mailer/lib/swift_required.php';

class Mensaje {

  public function EnviarCorreoConfirmacionTransaccion($nombre, $email, $id_transaccion)
   {
    //echo "Enviando Correos";
    //ini_set('max_execution_time', 28800); //240 segundos = 4 minutos
     //Enviar correo electr�nico
          $url = base_url();
          $transport = Swift_SmtpTransport::newInstance()
                ->setHost('smtp.gmail.com')
                ->setPort(465)
                ->setEncryption('ssl')
                ->setUsername('fabishodev@gmail.com')
                ->setPassword('marf$841104');

                //Create the Mailer using your created Transport
                $mailer = Swift_Mailer::newInstance($transport);
                //$this->load->model("Solicitud_model", "solicitud");
                //$query = $this->solicitud->getAlumnosCorreo();

                //Pass it as a parameter when you create the message
                $message = Swift_Message::newInstance();
                //Give the message a subject
                //Or set it after like this

                $message->setSubject('Confirmacion Transaccion Agencia');
                //no_reply@ugto.mx
                $message->setFrom(array('fabishodev@gmail.com' => 'Agencia'));
                $message->addTo($email);
                //$message->addTo('mgsnikips@gmail.com');

                //$message->addBcc('fabishodev@gmail.com');

                //Add alternative parts with addPart()
                $failedRecipients = array();
                $message->addPart("<h2>Gracias por su preferencia, </h2>".$nombre."
                <br>
                <h3>Su transaccion ha sido realizada con éxito.</h3>
                <br>
                No. Transaccion: ".$id_transaccion."<br>
                ---<br>
                ", 'text/html');

                if (!$mailer->send($message)) {
                  return FALSE;
                }
                return TRUE;
    }


}
