<?php
    session_start();
    $con = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");
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
                <?php include 'includes/marcas-left.php'; ?>
            </div>

            <div class="flex-item-center">
            <p class="location-bar"><a href="index.php">Pagina Inicial</a> > Proteger</p>
                <br>
                <div id="flex-container">
                    <div class="flex-item" id="flex-left">
                        <div class="categorias-box">
                            <a href="iron-out.php" class="link-categoria">
                                <img src="img/categorias/aquacoat.jpg" class="img-categoria">
                                <p class="titulo-categoria">Lavagem hidrofóbica<br><br></p>
                            </a>
                        </div>
                        <br>
                        <div class="categorias-box">
                            <a href="imperial.php" class="link-categoria">
                                <img src="img/categorias/ceramicsglass.jpg" class="img-categoria">
                                <p class="titulo-categoria">Ceramics Glass Cleaner<br><br></p>
                            </a>
                        </div>
                    </div>
                    <div class="flex-item" id="flex-left">
                        <div class="categorias-box">
                            <a href="avalanche.php" class="link-categoria">
                                <img src="img/categorias/ceramicsenhancer.jpg" class="img-categoria">
                                <p class="titulo-categoria">Ceramics Gloss Enhancer<br><br></p>
                            </a>
                        </div>
                        <br>
                        <div class="categorias-box">
                            <a href="verso.php" class="link-categoria">
                                <img src="img/categorias/mintrims.jpg" class="img-categoria">
                                <p class="titulo-categoria">Cera para jantes<br><br></p>
                            </a>
                        </div>
                    </div>
                    <div class="flex-item" id="flex-left">
                        <div class="categorias-box">
                            <a href="eradicate.php" class="link-categoria">
                                <img src="img/categorias/ceramicfoam.jpg" class="img-categoria">
                                <p class="titulo-categoria">Ceramic Foam<br><br></p>
                            </a>
                        </div>
                    </div>
                </div>
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