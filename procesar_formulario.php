<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $telefono = htmlspecialchars(trim($_POST['telefono']));
    $correo = htmlspecialchars(trim($_POST['correo']));
    $infoEspecifica = htmlspecialchars(trim($_POST['infoEspecifica']));

    // Configurar los parámetros del correo
    $to = 'destinatario@example.com'; // Cambia esto a la dirección donde deseas recibir el correo
    $subject = 'Consulta de Información';
    $message = "<h3>Información de Contacto</h3>
                <p><strong>Nombre:</strong> $nombre</p>
                <p><strong>Teléfono:</strong> $telefono</p>
                <p><strong>Correo:</strong> $correo</p>
                <p><strong>Información Específica:</strong><br>$infoEspecifica</p>";

    // Cabeceras del correo
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$correo>" . "\r\n"; // Correo del remitente

    // Enviar el correo
    if (mail($to, $subject, $message, $headers)) {
        echo 'Mensaje enviado';
    } else {
        echo 'Error al enviar el mensaje.';
    }
} else {
    echo 'Método de solicitud no válido.';
}
?>


