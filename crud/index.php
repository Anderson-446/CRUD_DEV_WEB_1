<?php
session_start();

if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== true ) {
    //header('location: /');
    http_response_code(403);
    exit();
}
$id = uniqid();

$fp = fopen('carros.csv','r');
while(($row = fgetcsv($fp)) !== false) {
}

$fp = fopen('carros.csv','r');
?>
<?php require("header.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garagem</title>
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
    table, tr, th, td {
        border: 1px solid gray;
        border-collapse: collapse;
    }
    td,th {
        padding: .5em;
    }
    table {
        margin-bottom: 1em;
        margin-left:auto;
        margin-right:auto;
    }
    div {
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
    input {
        padding:5px;
        border: none;
        outline: none;
    }
    button{
        background-color: #111;
        border:none;
        padding:15px;
        width: 100%;
        border-radius:10px;
        color:white;
        font-size:15px;
        cursor:pointer;
        font-size: 22px;
    }
    button:hover{
        box-shadow:inset -4px 4px 0 #222;
    }
    .salvar {
        width: 70%;
    }

</style>
<body>
    <div>
    <h1>Garagem:</h1>
    <table class="table">
        <tr>
            <th>Placa</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Cor</th>
            <th>Ano de Fabricação</th>
            <th>Sair</th>
            <th>Modificar</th>
        </tr>
        <?php $fp = fopen('carros.csv', 'r') ?>
        <?php while (($row = fgetcsv($fp)) !== false): ?>
            <tr>
                <td><?= $row[0] ?></td>
                <td><?= $row[1] ?></td>
                <td><?= $row[2] ?></td>
                <td><?= $row[3] ?></td>
                <td><?= $row[4] ?></td>
                <td>
                    <form action="delete.php" method=GET onsubmit="return confirm('Você está certo disso?')">
                        <input type="hidden" name="id" value ="<?= $row[0]?>">
                        <button class='btn btn-success'>Sair</button>
                    </form>
                </td>
               <td>
                <a href="edit.php?id=<?= $row[0] ?>"> <button>Modificar</button></a>
               </td>
            </tr>
            <?php endwhile ?>
    </table>
    <form action="adicionarCarro.php" method="POST">
        <input type="hidden" name="id" value="<?= $id;?>">
        <input type="text" name= "modelo" placeholder="modelo" required>
        <input type="text" name="marca" placeholder="Marca" required>
        <input type="text" name = "cor" placeholder="Cor" required>
        <input type="number" name = "ano" placeholder ="Ano de Fabricação" required min="1000" max="2024" maxlength="4">
        <br><br>
        <button class="salvar">Entrar</button>

    </form>
    </div>
</body>
</html>