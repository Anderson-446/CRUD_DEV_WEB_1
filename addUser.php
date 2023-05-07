<?php

$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];

###Verificando integridade###

$fp = fopen('users.csv', 'r');
while(($row = fgetcsv($fp)) !== false) {
    if($row[0] == $email) {
        http_response_code(400);
        echo "E-mail já cadastrado";
        exit();
    }
}

###Salvando###

$fp = fopen('users.csv', 'a');
fputcsv($fp, [$email,$name,$password]);

###Redirecionamento###
http_response_code(302);
header('location:index.php');

?>