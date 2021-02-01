<?php
    session_start();

    include '../includes/config.php';
    $conn = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");

    if (!isset($_SESSION['email'])) {
        # se nao houver sessao iniciada
        header('Location: ../login.php?login=no');
        exit();
    } else {
        if(!isset($_GET['idcart'])){
            header('Location: ../index.php');
            exit();
        } else {
            $prod = $_GET['idcart'];
            
            $user = $_SESSION['email'];
            $select = "select * from utilizador where email = '$user'";
            $selectresult = mysqli_query($conn, $select);
            $dados = mysqli_fetch_assoc($selectresult);
            $ID_User = $dados['idUtilizador'];
            

            # procurar 
            $SELECT_carrinho = "SELECT * FROM carrinho WHERE idCarrinho='$prod' AND idUtilizador='$ID_User'";
            $SELECT_carrinho_result = mysqli_query($conn, $SELECT_carrinho);
            $SELECT_carrinho_result_check = mysqli_num_rows($SELECT_carrinho_result);
            if ($SELECT_carrinho_result_check < 1) {
                # caso haja algum erro
                header('Location: ../cart.php?delete=error');
                exit();
            } else {
                # remover o produto no carrinho
                $DELETE_carrinho = "DELETE FROM carrinho WHERE idCarrinho='$prod' AND idUtilizador='$ID_User'";
                $DELETE_carrinho_result = mysqli_query($conn, $DELETE_carrinho);
                
                # 
                header('Location: ../cart.php?delete=ok');
                exit();
            }
        }
    }