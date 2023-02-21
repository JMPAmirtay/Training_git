<?php
  $user="root";
  $password="";
  $host="localhost";
  $db="KazNARU";
  $connect = mysqli_connect($host, $user, $password, $db);

  if (!$connect) {
    die('Error connect to database!');
  }