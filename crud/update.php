<?php

$id = $_POST['id'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$cor = $_POST['cor'];
$ano = $_POST['ano'];

$tempFile = tempnam('.', '');

$fpTemp = fopen($tempFile,'w');
$originFile = fopen('carros.csv','r');

while(($row = fgetcsv($originFile)) !== false) {
    if ($row[0] != $id) {//enquanto o id for diferente (escrever assim como no arquivo original)
        fputcsv($fpTemp, $row);
        continue;
    }
    fputcsv($fpTemp,[$id,$modelo,$marca,$cor,$ano]);
    //quando o id for igual, escrever de acordo com os inputs
}
fclose($fpTemp);
fclose($originFile);

rename($tempFile,'carros.csv');

header('location:index.php');

?>