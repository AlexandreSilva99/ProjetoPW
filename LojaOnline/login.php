<?php
    session_start();
    if(isset($_SESSION['email']))
    {
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Área de Cliente - Pro Detail</title>
</head>
<body>

        <div id="body">
            <br><br><br><br>
            <div class="login-box" id="divLogin">
                <a href="index.php">Pro Detail</a>
                <br>
                <h1>Iniciar sessão</h1>
                <br><br>
                <form class="form_login" method="post" action="login_verificacao.php">
                    <label>Endereço de email:</label>
                    <input type="text" name="user_email" maxlength=50>
                    <label>Password:</label>
                    <input type="password" name="user_password" maxlength=25>
                    <br><br>

                    <input type="submit" name="login" value="Entrar">
                    
                    <!-- <a href="#">Perdeu a sua password?</a><br> -->
                    <a href="signup.php">Ainda não tem conta? Registe-se!</a><br><br>
                </form>
            </div>
        </div>
    
</body>
</html>