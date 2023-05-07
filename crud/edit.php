<?php
session_start();

if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== true ) {
    //header('location: /');
    http_response_code(403);
    exit();
}

    $id = $_GET['id'];
    $fp = fopen('sneakers.csv','r');
    $data = [];

    while(($row = fgetcsv($fp)) !== false) {
        if($row[0] == $id) {
            $data = $row;
            break;
        }
    }

    if (sizeof($data) == 0) {
        header('location:index.php');
        exit();
    }
?>
<?php require("header.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        height:100%;
        margin:0%;
        padding:0%;
        background-color: #111;
        color: white;
        text-align: center;
        font-size:22px;
    }
    div {
        display: flex;
        background-color: rgba(0,0,0,0.8);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        padding:80px;
        border-radius:15px;
        color: white;
        align-items: center;
        justify-content:center;
    }
    input{
        padding:15px;
        border: none;
        outline: none;
    }
    .separa {
        padding: 20px; 
    }
    button{
        background-color: #111;
        border:none;
        padding:15px;
        width: 100%;
        border-radius:10px;
        color:white;
        font-size:22px;
        cursor:pointer;
    }
    button:hover{
            box-shadow:inset -4px 4px 0 #222;
    }
</style>
<body>
    <div>
        <h1 class="separa">Sneaker ID: <?=$id?></h1>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?=$data[0]?>">

            <input type="text" name="nome" placeholder="Nome" value="<?=$data[1]?>">
            <br><br>
            <input type="text" name="marca" placeholder="Marca" value="<?=$data[2]?>">
            <br><br>
            <input type="text" name="cor" placeholder="Cor" value="<?=$data[3]?>">
            <br><br>
            <input type="number" name="tamanho" placeholder="Tamanho" value="<?=$data[4]?>">
            <br><br>
            <button>Editar</button>
            <br><br>
        </form>
    </div>
</body> 
</html>