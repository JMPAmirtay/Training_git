<?php
require_once '../config/connect.php';

$news_id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `news` WHERE `news`.`id` = '$news_id'");

/* Перенаправление браузера на другую страницу в той же директории, что и
	изначально запрошенная */
$host  = $_SERVER['HTTP_HOST'];
$extra = 'index.php';
header("Location: http://$host/$extra");
