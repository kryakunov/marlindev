<?php

$pdo = new PDO('mysql:host=localhost;dbname=host1380688_marlindev', 'host1380688_marlindev', 'marlindev');

// Читаем базу
$pdo = new PDO('mysql:host=localhost;dbname=host1380688_marlindev', 'host1380688_marlindev', 'marlindev');
$sql = "SELECT * FROM images WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->execute($_GET);
$image = $statement->fetch(PDO::FETCH_ASSOC);


// Удаляем 
$sql = "DELETE FROM images WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->execute($_GET);

unlink("uploads/" . $image['image']);

header('Location: /task_15_1.php');