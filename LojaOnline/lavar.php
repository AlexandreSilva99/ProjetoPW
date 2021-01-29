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
            <p class="location-bar"><a href="index.php">Pagina Inicial</a> > Lavar</p>
                <br>
                    <?php
                    if(!isset($_GET['cat'])){
                        if(!isset($_GET['brand'])){
                            global $con;
                            
                            $get_pro = "select * from produto where idCategoria = 1 order by preco ASC";
                            $run_pro = mysqli_query($con,$get_pro);
                            
                            while($row_pro = mysqli_fetch_array($run_pro)){
                                $product_id = $row_pro['idProduto'];
                                $product_category = $row_pro['idCategoria'];
                                $product_brand = $row_pro['idMarca'];
                                $product_title = $row_pro['nome']; 
                                $product_price = $row_pro['preco'];
                                $product_image = $row_pro['imagem'];
                                
                                echo "
                                <a href='details.php?pro_id=$product_id' class='prod-link'>
                                    <div class='prod_box'>
                                        <div class='center_prod_box'>
                                        <div class='product_img'>
                                            <img src='img/categorias/$product_image'>
                                        </div>
                                        <div class='product_title'>
                                            $product_title
                                        </div>
                                        <div class='prod_price'>
                                            <span class='price'>$product_price €</span>
                                        </div>
                                        </div>
                                    </div>
                                </a>
                                ";
                            }
                        }
                    }
                ?>
            </div>

                <!-- <div id="flex-container">
                    <div class="flex-item" id="flex-left">
                        <div class="categorias-box">
                            <a href="iron-out.php" class="link-categoria">
                                <img src="img/categorias/iron-out.jpg" class="img-categoria">
                                <p class="titulo-categoria">Descontaminante<br><br></p>
                            </a>
                        </div>
                        <br>
                        <div class="categorias-box">
                            <a href="imperial.php" class="link-categoria">
                                <img src="img/categorias/imperial.jpg" class="img-categoria">
                                <p class="titulo-categoria">Limpeza de Jantes<br><br></p>
                            </a>
                        </div>
                    </div>
                    <div class="flex-item" id="flex-left">
                        <div class="categorias-box">
                            <a href="avalanche.php" class="link-categoria">
                                <img src="img/categorias/avalanche.jpg" class="img-categoria">
                                <p class="titulo-categoria">SnowFoam<br><br></p>
                            </a>
                        </div>
                        <br>
                        <div class="categorias-box">
                            <a href="verso.php" class="link-categoria">
                                <img src="img/categorias/verso.jpg" class="img-categoria">
                                <p class="titulo-categoria">Limpeza Multiusos<br><br></p>
                            </a>
                        </div>
                    </div>
                    <div class="flex-item" id="flex-left">
                        <div class="categorias-box">
                            <a href="eradicate.php" class="link-categoria">
                                <img src="img/categorias/eradicate.jpg" class="img-categoria">
                                <p class="titulo-categoria">Desengordurante de motor<br><br></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->

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