<?php
require_once '../config/connect.php';

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$text = $_POST['text'];
$pubdate = $_POST['pubdate'];
$author = $_POST['author'];
$image = $_POST['image'];
$tags = $_POST['tags'];
$status = $_POST['status'];

if ($image == "") {
	mysqli_query($connect, "UPDATE `news` SET `Title` = '$title', `Description` = '$description', `Text` = '$text', `Publication Date` = '$pubdate', `Author` = '$author', `Status` = '$status', `Tags` = '$tags' WHERE `news`.`id` = '$id'");
} else {
	mysqli_query($connect, "UPDATE `news` SET `Title` = '$title', `Description` = '$description', `Text` = '$text', `Publication Date` = '$pubdate', `Author` = '$author', `Image` = '$image', `Status` = '$status', `Tags` = '$tags' WHERE `news`.`id` = '$id'");
}

/* Перенаправление браузера на другую страницу в той же директории, что и
	изначально запрошенная */
$host  = $_SERVER['HTTP_HOST'];
$extra = 'index.php';
header("Location: http://$host/$extra");
