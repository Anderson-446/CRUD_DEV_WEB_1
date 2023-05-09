<?php

$id = $_POST['id'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$cor = $_POST['cor'];
$ano = $_POST['ano'];

$fp = fopen('carros.csv','r');
while (($row = fgetcsv($fp)) !== false) {
    if ($row[0] == $id) {
        http_response_code(400); // bad request
        echo "ID já cadastrado";
        exit();
    }
}

$fp = fopen('carros.csv', 'a');
fputcsv($fp,[$id,$modelo,$marca,$cor,$ano]);

http_response_code(302);
header('location:index.php');


?>