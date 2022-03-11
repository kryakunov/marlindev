<?php

session_start();

$_SESSION['message'] = $_POST['message'];
header('Location: /task_12.php');

?>