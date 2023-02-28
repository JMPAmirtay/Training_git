<?php
require_once '../config/connect.php';
$facultyinfo_id = $_GET['facultyinfo_id'];
$faculty_id = $_GET['id'];
$bd = $_GET['bd'];
mysqli_query($connect, "DELETE FROM $bd WHERE `$bd`.`id` = '$faculty_id'");
/* Перенаправление браузера на другую страницу в той же директории, что и
	изначально запрошенная */
$host  = $_SERVER['HTTP_HOST'];
$extra = "faculty.php?id=$facultyinfo_id";
header("Location: http://$host$uri/$extra");
