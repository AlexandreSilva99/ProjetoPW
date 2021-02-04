<?php
    session_start();
    include("functions/functions.php");
    include("includes/config.php");
    $con = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");
?>


<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Marcas - Pro Detail</title>
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
                <p class="location-bar"><a href="index.php">Página Inicial</a> > Todas as Marcas</p>
                <br>
                <?php
                    if(isset($_GET['pagina'])){    
                        $pagina = $_GET['pagina'];
                        if($pagina == "1"){
                            getbrands_15_1();

                            echo '
                                <br><br>
                                <div class="num-pagina">
                                    <a href="marcas.php?pagina=1" class="marcas-page-number">1</a>
                                    <a href="marcas.php?pagina=2">2</a>
                                    <a href="marcas.php?pagina=3">3</a>
                                    <a href="marcas.php?pagina=4">4</a>
                                    <a href="marcas.php?pagina=5">5</a>
                                    <a href="marcas.php?pagina=6">6</a>
                                </div>
                                <br>
                            ';
                        } else
                        if($pagina == "2"){
                            getbrands_15_2();
                            
                            echo '
                                <br><br>
                                <div class="num-pagina">
                                    <a href="marcas.php?pagina=1">1</a>
                                    <a href="marcas.php?pagina=2" class="marcas-page-number">2</a>
                                    <a href="marcas.php?pagina=3">3</a>
                                    <a href="marcas.php?pagina=4">4</a>
                                    <a href="marcas.php?pagina=5">5</a>
                                    <a href="marcas.php?pagina=6">6</a>
                                </div>
                                <br>
                            ';
                        } else
                        if($pagina == "3"){
                            getbrands_15_3();
                            
                            echo '
                                <br><br>
                                <div class="num-pagina">
                                    <a href="marcas.php?pagina=1">1</a>
                                    <a href="marcas.php?pagina=2">2</a>
                                    <a href="marcas.php?pagina=3" class="marcas-page-number">3</a>
                                    <a href="marcas.php?pagina=4">4</a>
                                    <a href="marcas.php?pagina=5">5</a>
                                    <a href="marcas.php?pagina=6">6</a>
                                </div>
                                <br>
                            ';
                        } else
                        if($pagina == "4"){
                            getbrands_15_4();
                            
                            echo '
                                <br><br>
                                <div class="num-pagina">
                                    <a href="marcas.php?pagina=1">1</a>
                                    <a href="marcas.php?pagina=2">2</a>
                                    <a href="marcas.php?pagina=3">3</a>
                                    <a href="marcas.php?pagina=4" class="marcas-page-number">4</a>
                                    <a href="marcas.php?pagina=5">5</a>
                                    <a href="marcas.php?pagina=6">6</a>
                                </div>
                                <br>
                            ';
                        } else
                        if($pagina == "5"){
                            getbrands_15_5();
                            
                            echo '
                                <br><br>
                                <div class="num-pagina">
                                    <a href="marcas.php?pagina=1">1</a>
                                    <a href="marcas.php?pagina=2">2</a>
                                    <a href="marcas.php?pagina=3">3</a>
                                    <a href="marcas.php?pagina=4">4</a>
                                    <a href="marcas.php?pagina=5" class="marcas-page-number">5</a>
                                    <a href="marcas.php?pagina=6">6</a>
                                </div>
                                <br>
                            ';
                        } else
                        if($pagina == "6"){
                            getbrands_15_6();
                            
                            echo '
                                <br><br>
                                <div class="num-pagina">
                                    <a href="marcas.php?pagina=1">1</a>
                                    <a href="marcas.php?pagina=2">2</a>
                                    <a href="marcas.php?pagina=3">3</a>
                                    <a href="marcas.php?pagina=4">4</a>
                                    <a href="marcas.php?pagina=5">5</a>
                                    <a href="marcas.php?pagina=6" class="marcas-page-number">6</a>
                                </div>
                                <br>
                            ';
                        }
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