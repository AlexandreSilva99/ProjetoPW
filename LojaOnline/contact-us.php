<?php
    session_start();
    include("functions/functions.php");
    $con = mysqli_connect("sql213.epizy.com","epiz_24003581","OnM36Uhzmk1mNRU","epiz_24003581_globalmusik");
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
    <title>Contacto - GlobalMusik</title>
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
                <p class="location-bar">Contacto</p>
                <br>
                A Pro Detail dispõe de um email de contacto para clientes.
                <br><br>
                Para quaisquer dúvidas contacte <b><a href="mailto:prodetail@mail.com" class="contact-email">prodetail@mail.com</a></b>.
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