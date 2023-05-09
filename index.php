<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garagem</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #111;
            color:white;
        }
        .login {
            background-color: rgba(0,0,0,0.8);
            position: absolute;
            top: 50%;
            left:50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            text-align:center;

        }
        input {
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
            border-radius:10px;
        }
        button{
            background-color: #111;
            border:none;
            padding:15px;
            width: 70%;
            border-radius:10px;
            color:white;
            font-size:15px;
            cursor:pointer;
        }
        button:hover{
            box-shadow:inset -4px 4px 0 #222;
        }
        .botao {
            width:50%;
        }
    </style>

</head>
<body>
    <div class="login">
    <h1>Sua Garagem</h1>
    <?php if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true): ?>
        <!-- usuário não está logado(não existe SESSION['auth'] ou SESSION['auth'] não é true) -->
    <form action="auth.php" method="POST">
        <input type="text" name="email" placeholder="E-mail" required>
        <br><br>
        <input type="password" name="senha" placeholder="senha" required>
        <br><br>
        <button>Acessar</button>
        <br><br>
    </form>
    <a href="register.php"> <button class="botao">Cadastre-se</button></a>
    </div>
    <?php else: ?>
        <h2>Tá tudo liberado!</h2>
        <a href="crud/"><button>Acesse</button></a>
        <br><br>
        <a href="logout.php"> <button>Sair</button></a>
    <?php endif ?>        
</body>
</html>