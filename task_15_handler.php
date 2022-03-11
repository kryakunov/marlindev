<?php

$pdo = new PDO('mysql:host=localhost;dbname=host1380688_marlindev', 'host1380688_marlindev', 'marlindev');

for($i = 0; $i < count($_FILES['image']['name']); $i++)
{
    $result = pathinfo($_FILES['image']['name'][$i]);
    $filename = uniqid() . '.' . $result['extension'];

    move_uploaded_file($_FILES['image']['tmp_name'][$i], 'uploads/' . $filename);

    
    // Записываем в базу
    $sql = "INSERT INTO images (image) VALUES (:image)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['image' => $filename]);
}


header('Location: /task_15.php');