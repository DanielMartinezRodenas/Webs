<?php
    $name = $_POST["nombre"];
    $to = $_POST["email"];
    $fromAddr = 'danipein19@gmail.com';
    $header = "From: $name <$fromAddr>";
    $subject = '¡Gracias por adquirir una copia de JoJos Bizarre Adventure: Eyes of Heaven!';
    $message = '¡Gracias por reservar una copia de JoJos Bizarre Adventure: Eyes of Heaven. El día de salida del juego le enviaremos el código para que descargue el DLC de reserva!';
    $result = mail ($to, $subject, $message, $header);
    exit(($result) ? '<b>¡El mensaje ha sido enviado!</b>' : '<b>¡Error fatal! No se ha enviado... F en el chat</b>');
?>