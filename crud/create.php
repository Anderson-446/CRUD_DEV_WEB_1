<?php

$id = $_POST['id'];
$nome = $_POST['nome'];
$marca = $_POST['marca'];
$cor = $_POST['cor'];
$tamanho = $_POST['tamanho'];

$fp = fopen('sneakers.csv','r');
while (($row = fgetcsv($fp)) !== false) {
    if ($row[0] == $id) {
        http_response_code(400); // bad request
        echo "ID já cadastrado";
        exit();
    }
}

$fp = fopen('sneakers.csv', 'a');
fputcsv($fp,[$id,$nome,$marca,$cor,$tamanho]);

http_response_code(302);
header('location:index.php');


?>