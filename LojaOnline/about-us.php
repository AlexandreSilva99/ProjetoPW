<?php
    session_start();
    include("functions/functions.php");
    $con = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");
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
    <title>About us - Pro Detail</title>
</head>
<body>
    <div id="interface">
        <?php include 'includes/header.php'; ?>
        <br><br><br>
        
        <div id="flex-container">
            <div class="flex-item" id="flex-left">
                <?php include 'includes/marcas-left.php'; ?>
            </div>

            <div class="flex-item-center">
                <p class="location-bar">Sobre Nós</p>
                <br>
                A Pro Detail é uma loja online para detailing automovel.
                <br><br>
                Se gostas de detailing automovel, então a Pro Detail é a loja perfeita para ti!
                <br><br>
                Começa já a navegar pelo nosso site <a href="index.php" class="contact-email">aqui</a>.
            </div>

            <div class="flex-item" id="flex-right">
                <?php 
                    //if(isset($_SESSION['email'])) {
                    //    if($_SESSION['email'] != 'Admin') {
                            include 'includes/carrinho-right.php';
                    //    } else {
                    //        include 'includes/carrinho-right-admin.php';
                    //    }
                    //} else {
                    //    include 'includes/carrinho-right.php';
                    //}
                ?>
                <br><br>
                <?php
                    //if(isset($_SESSION['email'])) {
                    //    if($_SESSION['email'] != "Admin"){
                    //        echo '
                    //            <a href="encomendas.php" class="ver-encomendas-link">
                    //                <div class="ver-encomendas">
                    //                    Ver Encomendas
                    //                </div>
                    //            </a>
                    //        ';
                    //    }
                    //}
                ?>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>
</body>
</html>