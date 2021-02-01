<?php
    session_start();
    $conn = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");
    include("functions/functions.php");
?>

<?php
    $emailuser = $_SESSION['email'];
    $sql = "select * from utilizador where email = '$emailuser' ";
    $sqlresult = mysqli_query($conn, $sql);
    if (mysqli_num_rows($sqlresult) > 0) {
        $dadosuser = mysqli_fetch_assoc($sqlresult);
        $iduser = $dadosuser['idUtilizador'];

        $sqlcart = "select * from carrinho where idUtilizador = '$iduser'";
        $sqlcartresult = mysqli_query($conn, $sqlcart);
        if (mysqli_num_rows($sqlcartresult) > 0) {
            while($dadosusercart = mysqli_fetch_assoc($sqlcartresult)) {
                $idproduto = $dadosusercart['idProduto'];
                $quant = $dadosusercart['quantidade'];
                $estado = "Pendente";

                $insertenc = "insert into encomenda (idUtilizador, idProduto, estado, quantidade) values (?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $insertenc)) {
                    echo 'Error.';
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, 'iisi', $iduser, $idproduto, $estado, $quant);
                    mysqli_stmt_execute($stmt);
                }

                # Remover do carrinho
                $delete = "delete from carrinho where idUtilizador = " . $iduser . "";
                $delete_result = mysqli_query($conn, $delete);
            }
            header('Location: index.php?success=true');
        }
    }
?>