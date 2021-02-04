<?php
    session_start();
    
    $con = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");
    $conn = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");
    include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Pro Detail</title>
</head>
<body>
    <div id="interface">
        <?php include 'includes/header.php'; ?>
        <br><br><br>
        
        <div id="flex-container">
            <div class="flex-item" id="flex-left">
                <?php
                    $email = $_SESSION['email'];
                    $select_user = "SELECT * FROM utilizador WHERE email = '$email'";
                    $selectr_user = mysqli_query($conn, $select_user);
                    while($dados_user = mysqli_fetch_assoc($selectr_user)){
                        echo '
                            <div class="img-profile">
                                <img src="img/header/cliente_hover.png">
                            </div>
                        ';
                    }
                ?>
            </div>

            <div class="flex-item-center">
                <p class="location-bar">Perfil</p>
                <br>
                <?php
                    $email = $_SESSION['email'];
                    $select_user = "SELECT * FROM utilizador WHERE email = '$email'";
                    $selectr_user = mysqli_query($conn, $select_user);
                    while($dados_user = mysqli_fetch_assoc($selectr_user)){
                        // NIF
                        if ($dados_user['nif'] == '0') {
                            $nif_user = "";
                        } else {
                            $nif_user = $dados_user['nif'];
                        }


                        echo '
                            <form action="profile_edit_verify.php" method="POST" enctype="multipart/form-data">
                                <table class="dados_user">
                                    <tr>
                                        <td>
                                            <b>Nome</b><br>
                                                <input type="text" name="nome_edit" value="' . $dados_user['primeironome'] . '" minlength=3 maxlength=15></input>
                                            <br><br>
                                            <b>Apelido</b><br>
                                                <input type="text" name="apelido_edit" value="' . $dados_user['ultimonome'] . '" minlength=3 maxlength=15></input>
                                            <br><br>
                                            <b>Email</b><br>
                                                ' . $dados_user['email'] . '
                                            <br><br>
                                            <b>NIF</b><br>
                                                <input type="text" name="nif_edit" value="' . $nif_user . '" maxlength=9></input>
                                        </td>
                                        <td>
                                            <b>Localidade</b><br>
                                                <input type="text" name="localidade_edit" value="' . $dados_user['localidade'] . '" maxlength=35></input>
                                            <br><br>
                                            <b>Morada</b><br>
                                                <input type="text" name="morada_edit" value="' . $dados_user['morada'] . '" maxlength=80></input>
                                            <br><br>
                                            <b>Código Postal</b><br>
                                                <input type="text" name="codpostal_edit" value="' . $dados_user['codPostal'] . '" maxlength=8></input>
                                            <br><br>
                                            
                                        </td>
                                    </tr>
                                </table>
                                <br><br>
                                <button class="editar-user">Confirmar dados</button>
                                <br>
                            </form>
                        ';
                    }
                ?>
                <!-- <b>Avatar</b>
                                                <input type="file" name="avatar_edit" accept="image/*"> -->
            </div>

            <div class="flex-item" id="flex-right">
                <?php 
                    if(isset($_SESSION['email'])) {
                        if($_SESSION['email'] != 'Admin') {
                            include 'includes/carrinho-right.php';
                        } else {
                            include 'includes/carrinho-right-admin.php';
                        }
                    } else {
                        include 'includes/carrinho-right.php';
                    }
                ?>
                <br><br>
                <?php
                    if(isset($_SESSION['email'])) {
                        if($_SESSION['email'] != "Admin"){
                            echo '
                                <a href="encomendas.php" class="ver-encomendas-link">
                                    <div class="ver-encomendas">
                                        Ver Encomendas
                                    </div>
                                </a>
                            ';
                        }
                    }
                ?>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>
</body>
</html>