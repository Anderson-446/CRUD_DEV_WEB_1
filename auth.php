<?php
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$fp = fopen('users.csv', 'r');
while(($row = fgetcsv($fp)) !== false) {
    if ($row[0] == $email && $row[2] == $senha) {
        $_SESSION['auth'] = true;
        header('location: /');
        exit();
    }
}

$_SESSION['auth'] = false;
//colocar uma mensagem//
header('location: /');
exit();

?>