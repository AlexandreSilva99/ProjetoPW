<?php
    session_start();
    
    $con = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");
    $conn = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");

    if (!isset($_SESSION['email'])) {
        header('Location: login.php');
        exit();
    } else {
        
            $primeironome = $_POST['nome_edit'];
            $ultimonome = $_POST['apelido_edit'];
            $nif = $_POST['nif_edit'];
            $morada = $_POST['morada_edit'];
            $localidade = $_POST['localidade_edit'];
            $codpostal = $_POST['codpostal_edit'];
            // $avatar = $_FILES['avatar_edit'];

            $erro = false;
            $success = false;


            // Tem de preencher todos os campos
            if($primeironome=="" || $ultimonome=="") {
                echo '<div class="erro">Tem de preencher os campos obrigatórios!</div>';
                $erro = true;
            } else {
                $update = "update utilizador set primeironome=?, ultimonome=?, nif=?, morada=?, localidade=?, codPostal=? where email=?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $update)) {
                    echo 'Erro.';
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, 'ssissss', $primeironome, $ultimonome, $nif, $morada, $localidade, $codpostal, $_SESSION['email']);
                    mysqli_stmt_execute($stmt);
                    // move_uploaded_file($avatar['tmp_name'], "img/avatars/".$avatar['name']);
                    $success = true;
                }

            }
    
            //-------------------------------------------------------------------------------
            // Verificar se existiram erros
            if($erro == true)
            {
                header('Location: profile.php?error');
                exit;
            }

            if($success == true)
            {
                header('Location: profile.php?success=TRUE');
                exit;
            }
        
    }
?>