<?php
error_reporting(E_ALL);


include_once('PHPMailer/class.phpmailer.php');
include_once('PHPMailer/class.smtp.php');

if (isset($_POST['email'])) {
    
    if (!isset($_POST['name']) || !isset($_POST['country']) || !isset($_POST['email'])) {
        echo'<script type="text/javascript">
                alert("Favor diligencie todos los datos.");
                window.history.back();
             </script>';
        return false;
    }
    
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->Username ='castsabproyectos@gmail.com';
    $mail->Password = 'castsab04072012'; 
    
    $message = "";
    $to = "dcastellanos@ciercentro.edu.co";
    $subject = 'Sugerencias - Virtual Educa 2017.';
    
    $message = "Detalles del formulario de contacto: <br>";
    $message .= "Nombre: " . $_POST['name'] . "<br>";
    $message .= "Pais: " . $_POST['country'] . "<br>";
    $message .= "E-mail: " . $_POST['email'] . "<br>";
    $message .= "Sugerencias: " . $_POST['messageSuggestion'] . "<br>";
    $message .= "Opción para el Virtual Educa 2017: " . $_POST['messageOption'] . "<br>";
    
    $mail->AddAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->MsgHTML($message);
    
    if($mail->Send()){
        echo '<script type="text/javascript">
                alert("Enviado Correctamente");
                window.location = "index.html"
             </script>';
    }else{
        echo '<script type="text/javascript">
                alert("NO ENVIADO, intentar de nuevo");
             </script>';
    }
}
?>
