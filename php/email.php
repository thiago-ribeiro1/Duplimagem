<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Configurar os detalhes do e-mail
    $to = "duplimagem@gmail.com"; 
    $subject = "Nova mensagem do formulário de contato website";
    $headers = "From: $email";

    // Montar o corpo do e-mail
    $body = "Nome: $name\n";
    $body .= "E-mail: $email\n";
    $body .= "Telefone: $phone\n\n";
    $body .= "Mensagem:\n$message";

    // Enviar o e-mail
    $success = mail($to, $subject, $body, $headers);

    // Verificar se o e-mail foi enviado com sucesso
    if ($success) {
        echo "E-mail enviado com sucesso.";
    } else {
        echo "Ocorreu um erro ao enviar o e-mail.";
    }
} else {
    // Se não for uma solicitação POST, redirecione para a página de formulário
    header("Location: /caminho-para-seu-formulario");
}
?>
