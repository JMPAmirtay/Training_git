<?php
// Подключение к базе данных
session_start();
require_once '../config/connect.php';

$email = $_SESSION['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password === $password_confirm) {

    unset($_SESSION['status']);

    $password = md5($password);

    mysqli_query($connect, "UPDATE `users` SET `password` = '$password' WHERE `email` = '$email'");

    $_SESSION['message'] = 'Смена пароля прошла успешно!';
    header('Location: ../login_admin.php');
} else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../change_new_password.php');
}
