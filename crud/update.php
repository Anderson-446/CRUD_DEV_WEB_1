<?php

$id = $_POST['id'];
$nome = $_POST['nome'];
$marca = $_POST['marca'];
$cor = $_POST['cor'];
$tamanho = $_POST['tamanho'];

$tempFile = tempnam('.', '');

$fpTemp = fopen($tempFile,'w');
$originFile = fopen('sneakers.csv','r');

while(($row = fgetcsv($originFile)) !== false) {
    if ($row[0] != $id) {//enquanto o id for diferente (escrever assim como no arquivo original)
        fputcsv($fpTemp, $row);
        continue;
    }
    fputcsv($fpTemp,[$id,$nome,$marca,$cor,$tamanho]);
    //quando o id for igual, escrever de acordo com os inputs
}
fclose($fpTemp);
fclose($originFile);

rename($tempFile,'sneakers.csv');

header('location:index.php');

?>