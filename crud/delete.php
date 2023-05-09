<?php

$id = $_GET['id'];

$tempFile = tempnam('.',''); //arquivo temporário
//recebe o conteúdo original(tirando a linha que iremos excluir)

$fpTemp = fopen($tempFile,'w');
$originFile = fopen('carros.csv','r');

while(($row = fgetcsv($originFile)) !== false) {
    if($row[0] != $id) {
        fputcsv($fpTemp,$row);
    }
}

fclose($fpTemp);
fclose($originFile);

rename($tempFile, 'carros.csv');

header('location: index.php');



?>