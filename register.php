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
        font-family: Arial, Helvetica, sans-serif;
        background-color: #111;
        color:white;
    }

    div {
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

    button {
        background-color: #111;
        border:none;
        padding:15px;
        width: 100%;
        border-radius:10px;
        color:white;
        font-size:15px;
        cursor:pointer;
    }

    button:hover{
        box-shadow:inset -4px 4px 0 #222;
    }
</style>
<body>
    <div>
        <form action="addUser.php" method="POST">
            <h1>Cadastro</h1>
            <input type="email" name="email" placeholder="E-mail" required>
            <br><br>
            <input type="text" name="name" placeholder="Nome" required>
            <br><br>
            <input type="password" name="password" placeholder="Senha" required>
            <br><br>
            <button>Cadastre-se</button>
        </form>
        <br>
        <p> Ou <a href="/index.php"> <br> <br> <button>Acesse</button></a></p>
    </div>    
</body>
</html>