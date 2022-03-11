<?php

session_start();

if (isset($_SESSION['amount'])) 
    $_SESSION['amount']++;
else
    $_SESSION['amount'] = 1;

    
header('Location: /task_13.php');
exit;

?>