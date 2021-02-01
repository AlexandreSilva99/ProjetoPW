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
                <?php include 'includes/marcas-left.php'; ?>
            </div>

            <div class="flex-item-center">
                <p class="location-bar">Pesquisar</p>
                <br>
                <?php
                    if($_POST['pesquisar_text'] == "Pesquisar")
                    {
                         //apresentar dados da base de dados 
                         $pesquisar=$_POST['pesquisa'];
                         
                include 'includes/config.php';
                $ligacao = new PDO("mysql:dbname=$dbName; host = $dbServername", $dbUsername, $dbPassword);
                
                
                //Dados dos perfis
                $sql="select * from produto where nome Like '%" . $pesquisar . "%'";
                $motor = $ligacao -> prepare($sql); 
                $motor -> execute(); 
                
                $query= "select * from produto where nome Like '%" . $pesquisar . "%'";
                            $result=mysqli_query($conn, $query);
                            $resultrows=mysqli_num_rows($result);
                    
                    if($resultrows>0){
                        for($i=1;$i<=$resultrows;$i++){
                            $data=mysqli_fetch_assoc($result);
                            $prodid=$data['idProduto'];
                            $prodnome=$data["nome"];
                            $prodpreco=$data["preco"];
                            $prodimg=$data["imagem"];
                            ?>
                            
                            <a href='details.php?pro_id=<?php echo $prodid; ?>' class='prod-link'>
                                <div class='prod_box'>
                                    <div class='center_prod_box'>
                                        <div class='product_img'>
                                            <img src='img/categorias/<?php echo $prodimg; ?>'>
                                        </div>
                                        <div class='product_title'>
                                            <?php echo $prodnome; ?>
                                        </div>
                                        <div class='prod_price'>
                                            <span class='price'><?php echo $prodpreco; ?> €</span>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <?php
                                }		
                            }
                            else
                            {
                                echo "<div class='erro-pesquisa'>Não foram encontrados produtos com o nome pesquisado</div>!";
                            }
                }
                else
                {   
                    $pesquisar=$_POST['pesquisa'];
                    $query= "select * from produto where nome Like '%" . $pesquisar . "%'";
                    $result=mysqli_query($conn, $query);
                    $resultrows=mysqli_num_rows($result);
                        if($resultrows>0){
                            for($i=1;$i<=$resultrows;$i++){
                            $data=mysqli_fetch_assoc($result);
                            $prodid=$data['idProduto'];
                            $prodnome=$data["nome"];
                            $prodpreco=$data["preco"];
                            $prodimg=$data["imagem"];
                        ?>
            
                        <a href='details.php?pro_id=<?php echo $prodid; ?>' class='prod-link'>
                            <div class='prod_box'>
                                <div class='center_prod_box'>
                                    <div class='product_img'>
                                        <img src='img/categorias/<?php echo $prodimg; ?>'>
                                    </div>
                                    <div class='product_title'>
                                        <?php echo $prodnome; ?>
                                    </div>
                                    <div class='prod_price'>
                                        <span class='price'><?php echo $prodpreco; ?> €</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php
                            }
                        }else{
                            echo "<div class='erro-pesquisa'>Não foram encontrados produtos com o nome pesquisado.</div>";
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