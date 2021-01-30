<?php
    session_start();
    $conn = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");
    include("functions/functions.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
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
                <?php  
                    if (isset($_SESSION['email'])) {
                        if ($_SESSION['email'] != 'Admin') {
                            $email_user = $_SESSION['email'];
                            $selectuser = "select * from utilizador where email = '$email_user'";
                            $selectresultuser = mysqli_query($conn, $selectuser);
                            $dados = mysqli_fetch_assoc($selectresultuser);
                            $ID_User = $dados['idUtilizador'];
                        
                            $selectcart = "select * from encomenda where idUtilizador = '$ID_User'";
                            $selectresultcart = mysqli_query($conn, $selectcart);
                            if (mysqli_num_rows($selectresultcart) > 0) {
                            echo '
                            <table>
                                <tr>
                                    <td class="prodname-enc-title">
                                        Produtos
                                    </td>
                                    <td class="prodquant-enc-title">
                                        Quant
                                    </td>
                                    <td class="prodprice-enc-title">
                                        Preço
                                    </td>
                                    <td class="prodestado-enc-title">
                                        Estado
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            ';
                        
                            while ($encomenda = mysqli_fetch_assoc($selectresultcart)) {
                                $idProduto = $encomenda['idProduto'];
                                $selectProduto = "select * from produto where idProduto = '$idProduto'";
                                $selectresultproduto = mysqli_query($conn, $selectProduto);
                                if (mysqli_num_rows($selectresultproduto) > 0) {
                                $produto = mysqli_fetch_assoc($selectresultproduto);
                                
                                echo '
                                    <div class="cart-container">
                                        <br>
                                            <table class="cart-title-container">
                                                <tr>
                                                    <td class="prodimg-cart-title">
                                                    <a href="details.php?pro_id=' . $produto['idProduto'] . '">
                                                        <img src="img/categorias/' . $produto['imagem'] . '" width=50px>
                                                    </a>
                                                    </td>
                                                    <td class="productname-cart-title">
                                                    ' . $produto['nome'] . '
                                                    </td>
                                                    <td class="prodquant-enc-title2">
                                                        ' . $encomenda['quantidade'] . '
                                                    </td>
                                                    <td class="prodprice-enc-title2">
                                                        ' . $produto['preco'] . '&nbsp;€ 
                                                    </td>
                                                    <td class="prodestado-enc-title2">
                                                        ' . $encomenda['estado'] . '
                                                    </td>
                                                </tr>
                                            </table>
                                        <br>
                                    </div>
                                    <hr>
                                ';
                                }
                            }
                        }
                        else {
                        echo '
                        <div class="cart-empty">
                            <hr>
                            <br>
                                <p>Não existem encomendas!</p>
                            <br>
                            <hr>
                        </div>
                        ';
                        }
                        } else {
                            $sql = "select * from encomenda";
                            $sqlresult = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($sqlresult) > 0) {
                                while ($dadosenc = mysqli_fetch_assoc($sqlresult)) {
                                    $produtoid = $dadosenc['idproduto'];
                                    $utilizadorid = $dadosenc['idUtilizador'];

                                    // Dados utilizador
                                    $sql2 = "select * from utilizador where idUtilizador = '$utilizadorid'";
                                    $sqlresult2 = mysqli_query($conn, $sql2);
                                    if (mysqli_num_rows($sqlresult2) > 0) {
                                        $dadosutilizador = mysqli_fetch_assoc($sqlresult2);
                                    }         

                                    $sql1 = "select * from produto where idProduto = '$produtoid'";
                                    $sqlresult1 = mysqli_query($conn, $sql1);
                                    if (mysqli_num_rows($sqlresult1) > 0) {
                                        $dadosproduto = mysqli_fetch_assoc($sqlresult1);

                                        echo '
                                        <table class="pessoa-enc">
                                            <tr>
                                                <td class="pessoa-img">
                                                    <img src="img/avatars/' . $dadosutilizador['avatar'] . '">
                                                </td>
                                                <td class="pessoa-email">
                                                    ' . $dadosutilizador['nome'] . ' ' . $dadosutilizador['apelido'] . '&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp' . $dadosutilizador['email'] . '
                                                </td>
                                            </tr>
                                        </table>

                                        <br>

                                        <table class="cart-title-container">
                                            <tr>
                                                <td class="prodimg-cart-title">
                                                    <a href="details.php?pro_id=' .  $dadosenc['idProduto'] . '">
                                                        <img src="img/categorias/' . $dadosproduto['imagem'] . '" width=50px>
                                                    </a>
                                                </td>
                                                <td class="productname-cart-title">
                                                    ' . $dadosproduto['nome'] . ' 
                                                </td>
                                                <td class="prodquant-enc-title2">
                                                    ' . $dadosenc['quantidade'] . ' 
                                                </td>
                                                <td class="prodprice-enc-title2">
                                                    ' . $dadosproduto['preco'] . '&nbsp;€ 
                                                </td>
                                                <td class="prodestado-enc-title2">
                                                    ' . $dadosenc['estado'] . '
                                                </td>
                                            </tr>
                                        </table>
                                        <br><br><br>
                                        ';
                                    }
                                }
                            }
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