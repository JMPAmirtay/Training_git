<?php
session_start();
if ($_POST['key'] == $_SESSION['key']){
    $_SESSION['status'] = True;
    header('Location: ../change_new_password.php');
    unset($_SESSION['key']);
} else {
    $_SESSION['message'] = 'Неверный ключ';
    header('Location: ../key_check.php');
}
