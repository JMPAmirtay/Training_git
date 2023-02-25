<?php 
    require_once '../config/connect.php';
    $name = $_POST['name'];
    $id = $_POST['id'];
    $bd = $_POST['bd'];
    if($name == ""){
        
        $host  = $_SERVER['HTTP_HOST'];
	    $extra = "faculty.php?id=$id";
	    header("Location: http://$host$uri/$extra");

    } else {
        $department = mysqli_query($connect, "INSERT INTO `$bd` (`id`, `name`, `fk_faculty`) VALUES (NULL, '$name', '$id')");

    }
    	/* Перенаправление браузера на другую страницу в той же директории, что и
	изначально запрошенная */

    $host  = $_SERVER['HTTP_HOST'];
	$extra = "faculty.php?id=$id";
	header("Location: http://$host$uri/$extra");

?>
