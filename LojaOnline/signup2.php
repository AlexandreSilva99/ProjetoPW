<?php
  $con = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");
  $conn = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");
?>

<html>
  <head>
    <title>Adicionar Produto - Pro Detail</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/index.css">
  </head>
  <body>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="add-prod-box">
        <b>ADICIONAR Produto</b>
        <br><br>
        
        Nome<br>
        <input name="primeironome" required>

        <br><br>

        Apelido<br>
        <input name="ultimonome" required>
        
        <br><br>

        Email<br>
        <input name="email" required>

        <br><br>

        Username<br>
        <input name="username" required>
    
        <br><br>

        Password<br>
        <input name="password1" required>

        <br><br><br>

        <input type="submit" name="add" value="Adicionar produto">
        <br><br>
        <a href="../../index.php"><input type="button" value="Voltar atrás"></a>
      </div>
    </form>    
  </body>
</html>


<?php
  if(isset($_POST['add'])){
    $primeironome = $_POST['primeironome'];
    $ultimonome = $_POST['ultimonome'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    //$password2 = $_POST['password2'];
    $nif = "";
    $morada = "";
    $localidade = "";
    $codpostal = "";
    $idTipoUtilizador = '2'; 
   
    $insert_product = "insert into utilizador (primeironome,ultimonome,username,email,pw,nif,morada,localidade,codPostal,idTipoUtilizador) values ('$primeironome','$ultimonome','$username','$email','$password1','$nif','$morada','$localidade','$codpostal','2')";
   
    $run_product = mysqli_query($con,$insert_product);
   
    if($run_product){
      echo "<script>alert('Produto inserido com sucesso.')</script>";
    }
  }
?>