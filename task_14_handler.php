<?php

session_start();

// Принимаем данные с формы
$email = $_POST['email'];
$password = $_POST['password'];

// Соединяемся с базой
$pdo = new PDO('mysql:host=localhost;dbname=host1380688_marlindev', 'host1380688_marlindev', 'marlindev');

// Читаем базу
$sql = "SELECT * FROM users WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email]);
$user = $statement->fetch(PDO::FETCH_ASSOC);


if (!empty($user)) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['success'] = 'Авторизация успешна';
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header('Location: /task_14.php');
        exit;
    } 
}

$_SESSION['danger'] = 'Неверный логин или пароль';
header('Location: /task_14.php');
exit;


?>