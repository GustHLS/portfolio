<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'Gustavo';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'gustavo.santinho2@hotmail.com';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : 'Teste';

$mail = new PHPMailer(true);

try {
    // Configurações do servidor
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Servidor SMTP do Gmail
    $mail->SMTPAuth   = true; // Habilitar autenticação SMTP
    $mail->Username   = 'gustavohls.dev@gmail.com';
    $mail->Password   = 'senha';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilitar criptografia TLS
    $mail->Port       = 587; // Porta para TLS

    // Remetente e destinatário
    $mail->setFrom($email, $name);
    $mail->addAddress('gustavohls.dev@gmail.com', 'Gustavo Santinho');

    // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->Subject = "Nova mensagem de contato de $name";
    $mail->Body    = "Nome: $name<br>Email: $email<br><br>Mensagem:<br>$message";

    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo "Falha ao enviar mensagem. Erro: {$mail->ErrorInfo}";
}
?>
