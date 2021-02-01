<?php
    session_start();

    include '../includes/config.php';
    $conn = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");

    if (!isset($_SESSION['email'])) {
        # se nao houver sessao iniciada
        header('Location: ../login.php?login=no');
        exit();
    } else {
        $prod = $_GET['idcart'];

        $user = $_SESSION['email'];
        $select = "select * from utilizador where email = '$user'";
        $selectresult = mysqli_query($conn, $select);
        $dados = mysqli_fetch_assoc($selectresult);
        $ID_User = $dados['idUtilizador'];

        $quantupdated = $_POST['input-qtd'];
    
        $sql = "select * from carrinho where idCarrinho='$prod' and idUtilizador='$ID_User'";
        $sqlresult = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($sqlresult) > 0) {
            $sqlupdate = "update carrinho set quantidade=? where idCarrinho=? and idUtilizador=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sqlupdate)) {
                header('Location: ../cart.php?update=error');
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, 'iii', $quantupdated, $prod, $ID_User);
                mysqli_stmt_execute($stmt);

                header('Location: ../cart.php?update=ok');
            }
        }
    }
?>