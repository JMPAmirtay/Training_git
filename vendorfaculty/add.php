<?php 
    require_once '../config/connect.php';
    $name = $_GET['name'];
    $id = $_GET['id'];
    if($name == ""){
        
        $host  = $_SERVER['HTTP_HOST'];
	    $extra = "faculty.php?id=$id";
	    header("Location: http://$host$uri/$extra");

    } else {
        $department = mysqli_query($connect, "INSERT INTO `department` (`id`, `name`, `fk_faculty`) VALUES (NULL, '$name', '$id')");

    }
    	/* Перенаправление браузера на другую страницу в той же директории, что и
	изначально запрошенная */

    $host  = $_SERVER['HTTP_HOST'];
	$extra = "faculty.php?id=$id";
	header("Location: http://$host$uri/$extra");

?>
