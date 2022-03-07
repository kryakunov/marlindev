<?php

if (!$_POST) die();

$pdo = new PDO('mysql:host=localhost;dbname=host1380688_marlindev', 'host1380688_marlindev', 'marlindev');

$sql = "INSERT INTO php_9 (text) VALUES (:data)";
$statement = $pdo->prepare($sql);
$statement->execute($_POST);

header('Location: /task_9.php');
?>