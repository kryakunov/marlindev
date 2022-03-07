<?php

if (!$_POST) die();

$pdo = new PDO('mysql:host=localhost;dbname=host1380688_marlindev', 'host1380688_marlindev', 'marlindev');



// Читаем базу
$sql = "SELECT * FROM php_9 WHERE text=:data";
$statement = $pdo->prepare($sql);
$statement->execute($_POST);
$result = $statement->fetch(PDO::FETCH_ASSOC);

// Если запись найдена, переадресовываем обратно и передаем ошибку через GET-запрос
if ($result) 
{
    header('Location: /task_10.php?error=true');

} else {

// Записываем в базу
$sql = "INSERT INTO php_9 (text) VALUES (:data)";
$statement = $pdo->prepare($sql);
$statement->execute($_POST);

header('Location: /task_10.php');

} 

?>