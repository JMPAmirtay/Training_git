<?php
require_once '../config/connect.php';
session_start();
$email = $_POST['email'];

$check_user = mysqli_query($connect, "SELECT `password` FROM `users` WHERE `email` = '$email'");
if (mysqli_num_rows($check_user)) {
    $key = bin2hex(random_bytes(5));
    $_SESSION['key'] = $key;
    $from = "kzamirtay@gmail.com";
    $to = trim($email);

    $subject = "Восстановление пароля";

    $message = htmlspecialchars("Код: " . $key);
    $message = trim($message);

    $headers = "From: $from" . "\r\n" .
        "Reply-To: $from" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        $_SESSION['email'] = $email;
        header('Location: ../key_check.php');
    } else {
        $_SESSION['message'] = 'Ошибка сервера';
        header('Location: ../page_forgot_password.php');
    };
} else {
    $_SESSION['message']  = 'Аккаунта с такой почтой нет';
    header('Location: ../page_forgot_password.php');
}
