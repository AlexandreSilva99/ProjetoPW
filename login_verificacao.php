<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<?php

    // Verifica os dados de login
    session_start();
    $sessao_user = null;

    if(isset($_SESSION['email'])){
        echo '<div class="mensagem">'. $_SESSION['email'] . ', já se encontra logado no site.<br><br><a href="index.php">Avançar</a></div>';
        exit;
    }


    //-------------------------------------------------------------------------------
    include 'includes/header_signup.php';

    $utilizador = "";
    $password_utilizador = "";

    if(isset($_POST['user_email']))
    {
        $utilizador = $_POST['user_email'];
        $password_utilizador = $_POST['user_password'];
    }
    

    // Verifica se os campos foram preenchidos
    if($utilizador == "" || $password_utilizador == "") {
        // ERRO - Campos não preenchidos
        echo '<div class="erro">
            Não foram preenchidos os campos necessários.<br><br>
            <a href="login.php">Tente novamente</a>
        </div>';
        exit;
    }
    

    // Veriicação dos dados de login

    //$passwordEncriptada = md5($password_utilizador);

    include 'includes/config.php';
    $ligacao = new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);
    $motor = $ligacao->prepare("select * from utilizador where email = ? and pw = ?");
    $motor->bindParam(1, $utilizador, PDO::PARAM_STR);
    if ($_POST['user_email'] == "Admin") {
        $motor->bindParam(2, $password_utilizador, PDO::PARAM_STR);
    } else {
        $motor->bindParam(2, $password_utilizador, PDO::PARAM_STR);
        //$motor->bindParam(2, $passwordEncriptada, PDO::PARAM_STR);
    }
    $motor->execute();
    $ligacao = null;


    // Verifica se os dados correspondem a valores da base de dados
    if($motor->rowCount() == 0)
    {
        // Erro - Dados inválidos
        echo '<div class="erro">
                Dados de login inválidos.<br><br>
                <a href="login.php">Tente novamente</a>
            </div>';
        exit;
    }
    else
    {
        // Definir os dados da sessão
        $_SESSION['email'] = $utilizador;
        //$_SESSION['avatar'] = $motor->fetch(PDO::FETCH_ASSOC)['avatar'];

        header('Location: index.php');
    }

    

?>