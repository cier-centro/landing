<?php
error_reporting(E_ALL);

echo 'paso 1';

include_once('PHPMailer/_lib/class.phpmailer.php');
include_once('PHPMailer/_lib/class.smtp.php');

echo 'paso 2';

if (isset($_POST['email'])) {
    
    echo 'paso 3';
    
    if (!isset($_POST['name']) || !isset($_POST['country']) || !isset($_POST['email'])) {
        echo'<script type="text/javascript">
                alert("Favor diligencie todos los datos.");
                window.history.back();
             </script>';
        return false;
    }
    
    echo 'paso 4';
    
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->Username ='castsabproyectos@gmail.com';
    $mail->Password = 'castsab04072012'; 
    
    echo 'paso 5';
    
    $message = "";
    $to = "dcastellanos@ciercentro.edu.co";
    $subject = 'Comentario - Virtual Educa 2017.';
    
    $message = "Detalles del formulario de contacto:\n\n";
    $message .= "Nombre: " . $_POST['name'] . "\n";
    $message .= "Pais: " . $_POST['country'] . "\n";
    $message .= "E-mail: " . $_POST['email'] . "\n";
    $message .= "Sugerencias: " . $_POST['messageSuggestion'] . "\n";
    $message .= "Opción para el Virtual Educa 2017: " . $_POST['messageOption'] . "\n\n";
    
    echo 'paso 6';
    
    //Agregar destinatario
    $mail->AddAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;
    //Para adjuntar archivo
    //$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
    $mail->MsgHTML($message);
    
    echo 'paso 7';

    if($mail->Send()){
        
        echo 'ErrorInfo -> '.$mail->ErrorInfo();
        
        echo '<script type="text/javascript">
                alert("Enviado Correctamente");
                window.history.back();
             </script>';
    }else{
        
        echo 'ErrorInfo -> '.$mail->ErrorInfo();
        
        echo '<script type="text/javascript">
                alert("NO ENVIADO, intentar de nuevo");
                window.history.back();
             </script>';
    }
    
    echo 'paso 9';
}
?>
