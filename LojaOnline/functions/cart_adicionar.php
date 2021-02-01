<?php

    session_start();

    include '../includes/config.php';
    $conn = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");

    if (!isset($_SESSION['email'])) {
        # se nao houver sessao iniciada
        header('Location: ../login.php');
        exit();
    } else {
        if (!isset($_GET['pro_id']) || !is_numeric($_GET['pro_id'])) {
            # se nao houver pro_id no URLBar
            header('Location: ../index.php?error=0');
            exit();
        } else {
            if (isset($_SESSION['email']) && isset($_GET['pro_id'])) {
                # passar $_GET['pro_id'] para uma variavel
                $ID_Prod = $_GET['pro_id'];
                $email_user = $_SESSION['email'];
                $select = "select * from utilizador where email = '$email_user'";
                $selectresult = mysqli_query($conn, $select);
                $dados = mysqli_fetch_assoc($selectresult);
                $ID_User = $dados['idUtilizador'];

                # Procurar na bd pelo produdo com esse ID
                $SELECT_prod = "SELECT * FROM produto WHERE idProduto='$ID_Prod'";
                $SELECT_prod_result = mysqli_query($conn, $SELECT_prod);
                $SELECT_prod_check = mysqli_num_rows($SELECT_prod_result);
                    if ($SELECT_prod_check > 0) {
                        # Introzir na bd - tabela carrinho
                        # Dar a idCarrinho um valor
                        $ligacao = new PDO ("mysql:dbname=$base_dados;host=$host", $user, $password);
                        $motor = $ligacao->prepare("select MAX(idCarrinho) as MaxID from carrinho");
                        $motor->execute();
                        $ID_Cart = $motor->fetch(PDO::FETCH_ASSOC)['MaxID'];
                        if($ID_Cart == null) { $ID_Cart = 1; } else { $ID_Cart++; }
                        $INSERT_cart = "INSERT INTO carrinho (idCarrinho, idProduto, idUtilizador, quantidade)
                                                    VALUES (?, ?, ?, ?);";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $INSERT_cart)) {
                            echo "SQL Prepared Statement FALIED";
                            exit();
                        } else {
                            $quantidade = 1;
                            mysqli_stmt_bind_param($stmt, "iiii", $ID_Cart, $ID_Prod, $ID_User, $quantidade);
                            mysqli_stmt_execute($stmt);
                            header('Location: ../details.php?pro_id='. $ID_Prod .'&sc=OK');
                            // echo $ID_Cart .  $ID_Prod . $ID_User . $quantidade;
                            exit();
                    }
                }
            }
        }
    }