<?php

$id = $_GET['id'];

$tempFile = tempnam('.',''); //arquivo temporário
//recebe o conteúdo original(tirando a linha que iremos excluir)

$fpTemp = fopen($tempFile,'w');
$originFile = fopen('sneakers.csv','r');

while(($row = fgetcsv($originFile)) !== false) {
    if($row[0] != $id) {
        fputcsv($fpTemp,$row);
    }
}

fclose($fpTemp);
fclose($originFile);

rename($tempFile, 'sneakers.csv');

header('location: index.php');



?>