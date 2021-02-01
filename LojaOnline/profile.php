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
    <title>GlobalMusik</title>
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
                                <img src="img/header/cliente.png">
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
                        if (isset($_GET['success']) && $_GET['success'] == "TRUE"){
                            $_SESSION['avatar'] = $dados_user['avatar'];
                            echo '
                                <head>
                                    <meta http-equiv="refresh" content="0.00001;url=profile.php">
                                </head>
                            ';
                        }

                        // NIF
                        // if ($dados_user['nif'] == '0') {
                        //     $nif_user = "Não definido";
                        // } else {
                        //     $nif_user = $dados_user['nif'];
                        // }

                        // Morada
                        // if ($dados_user['morada'] == '') {
                        //     $morada_user = "Não definido";
                        // } else {
                        //     $morada_user = $dados_user['morada'];
                        // }

                        // Localidade
                        // if ($dados_user['localidade'] == '') {
                        //     $localidade_user = "Não definido";
                        // } else {
                        //     $localidade_user = $dados_user['localidade'];
                        // }

                        // CodPostal
                        // if ($dados_user['codPostal'] == '') {
                        //     $codpostal_user = "Não definido";
                        // } else {
                        //     $codpostal_user = $dados_user['codPostal'];
                        // }


                        // echo '
                        //     <table class="dados_user">
                        //         <tr>
                        //             <td>
                        //                 <b>Nome</b><br> ' . $dados_user['nome'] . ' ' . $dados_user['apelido'] . '
                        //                 <br><br>
                        //                 <b>Email</b><br> ' . $dados_user['email'] . '
                        //                 <br><br>
                        //                 <b>NIF</b><br> ' . $nif_user . '
                        //             </td>
                        //             <td>
                        //                 <b>Localidade</b><br> ' . $localidade_user . '
                        //                 <br><br>
                        //                 <b>Morada</b><br> ' . $morada_user . '
                        //                 <br><br>
                        //                 <b>Código Postal</b><br> ' . $codpostal_user . '
                        //             </td>
                        //         </tr>
                        //     </table>
                        //     <br><br>
                        //     <a href="profile_edit.php" class="edit-profile-link"><button class="editar-user">Editar dados</button></a>
                        //     <br>
                        // ';
                    }
                ?>
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