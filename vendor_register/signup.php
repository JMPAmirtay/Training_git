<?php
// Подключение к базе данных
session_start();
require_once '../config/connect.php';

$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `username` = '$login'");
$check_login = mysqli_num_rows($check_login);

$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
$check_email = mysqli_num_rows($check_email);

if (!($login or $email or $password or $password_confirm)) {
    $_SESSION['message'] = 'Вы ввели не все данные';
    header('Location: ../page_register.php');
} elseif ($check_login) {
    $_SESSION['message'] = 'Пользователь с таким логином уже существует';
    header('Location: ../page_register.php');
} elseif ($check_email) {
    $_SESSION['message'] = 'Пользователь с такой почтой уже существует';
    header('Location: ../page_register.php');
} elseif ($password === $password_confirm) {
    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Ошибка при загрузке сообщения';
        header('Location: ../page_register.php');
    }

    $password = md5($password);

    mysqli_query($connect, "INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `avatar`) VALUES (NULL, '$login', '$password', '$email', NULL, NULL, '$path')");

    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('Location: /');
} else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../page_register.php');
}
