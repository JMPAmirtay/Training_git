<?php
require_once '../config/connect.php';

$title = $_POST['title'];
$description = $_POST['description'];
$text = $_POST['text'];
$pubdate = $_POST['pubdate'];
$author = $_POST['author'];
$tags = $_POST['tags'];
$status = $_POST['status'];


$path = 'img_archive/' . time() . $_FILES['news_image']['name'];
if (!move_uploaded_file($_FILES['news_image']['tmp_name'], '../' . $path)) {
	$_SESSION['message'] = 'Ошибка при загрузке изображения';
	header('Location: ../page_register.php');
}

mysqli_query($connect, "INSERT INTO `news` (`id`, `Title`, `Description`, `Text`, `Publication Date`, `Author`, `Image`, `Category`, `Tags`, `Views`, `Rating`, `Status`) VALUES (NULL, '$title', '$description', '$text', '$pubdate', '$author', '$path', '', '$tags', NULL, NULL, '$status')");

/* Перенаправление браузера на другую страницу в той же директории, что и
	изначально запрошенная */
$host  = $_SERVER['HTTP_HOST'];
$extra = 'index.php';
header("Location: http://$host$uri/$extra");
