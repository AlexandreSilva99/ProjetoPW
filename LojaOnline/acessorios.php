<?php
    //session_start();
    
    //$con = mysqli_connect("sql213.epizy.com","epiz_24003581","OnM36Uhzmk1mNRU","epiz_24003581_globalmusik");
    //include("functions/functions.php");
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
            <p class="location-bar"><a href="index.php">Pagina Inicial</a> > Acessorios</p>
                <br>
                <div id="flex-container">
                    <div class="flex-item" id="flex-left">
                        <div class="categorias-box">
                            <a href="iron-out.php" class="link-categoria">
                                <img src="img/categorias/Polidora.jpg" class="img-categoria">
                                <p class="titulo-categoria">Dual Action Polisher<br><br></p>
                            </a>
                        </div>
                        <br>
                        <div class="categorias-box">
                            <a href="imperial.php" class="link-categoria">
                                <img src="img/categorias/TSecagem.jpg" class="img-categoria">
                                <p class="titulo-categoria">Toalha de secagem<br><br></p>
                            </a>
                        </div>
                    </div>
                    <div class="flex-item" id="flex-left">
                        <div class="categorias-box">
                            <a href="avalanche.php" class="link-categoria">
                                <img src="img/categorias/microfibrasaplicator.jpg" class="img-categoria">
                                <p class="titulo-categoria">Aplicador microfibra<br><br></p>
                            </a>
                        </div>
                        <br>
                        <div class="categorias-box">
                            <a href="verso.php" class="link-categoria">
                                <img src="img/categorias/escovaestofos.jpg" class="img-categoria">
                                <p class="titulo-categoria">Escova de limpeza de estofos<br><br></p>
                            </a>
                        </div>
                    </div>
                    <div class="flex-item" id="flex-left">
                        <div class="categorias-box">
                            <a href="eradicate.php" class="link-categoria">
                                <img src="img/categorias/microfibrastrio.jpg" class="img-categoria">
                                <p class="titulo-categoria">Pano microfibra<br><br></p>
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