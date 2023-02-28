<?php
require_once '../config/connect.php';
$name = $_POST['name'];
$facultyinfo_id = $_POST['facultyinfo_id'];
$faculty_page = $_POST['faculty_page'];
$bd = $_POST['bd'];
if ($name == "") {
    $host  = $_SERVER['HTTP_HOST'];
    $extra = "faculty.php?id=$facultyinfo_id";
    header("Location: http://$host$uri/$extra");
} else {
    $department = mysqli_query($connect, "UPDATE `$bd` SET `name` = '$name' WHERE `$bd`.`id` = '$faculty_page'");
}
/* Перенаправление браузера на другую страницу в той же директории, что и
	изначально запрошенная */

$host  = $_SERVER['HTTP_HOST'];
$extra = "faculty.php?id=$facultyinfo_id";
header("Location: http://$host$uri/$extra");
