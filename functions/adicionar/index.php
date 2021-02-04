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
        <input name="nome_produto" required>

        <br><br>

        Marca<br>
        <select name="marca_produto" required>
          <option></option>
          
          <?php
            $get_brands = "select * from marca";
            $run_brands = mysqli_query($con,$get_brands);

            while($row_brands=mysqli_fetch_array($run_brands)){
              $brand_tit = $row_brands['nome'];
              $brand_id = $row_brands['idMarca'];
              echo "<option value = $brand_id > $brand_tit </option>";    
            }
          ?>
        </select>
        
        <br><br>

        Categoria<br>
        <select name="categoria_produto">
          <option></option>
          <?php
            $result_cat = "SELECT * FROM categoria ORDER BY idCategoria";
            $resultado_cat = mysqli_query($conn, $result_cat);
            while($row_cat = mysqli_fetch_assoc($resultado_cat) ) {
              echo '<option value="'.$row_cat['idCategoria'].'">'.$row_cat['descricao'].'</option>';
            }
          ?>
        </select>
    
        <br><br>

        Imagem<br>
        <input type="file" name="imagem_produto">

        <br><br>
        
        Preço<br>
        <input name="preco_produto" required>€

        <br><br>
        
        Descrição<br>
        <textarea name="descricao_produto" cols="25" rows="5" required></textarea>

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
    $product_title = $_POST['nome_produto'];
    $product_cat = $_POST['categoria_produto'];
    $product_brand = $_POST['marca_produto'];
    $product_price = $_POST['preco_produto'];
    $product_desc = $_POST['descricao_produto'];
   
    $product_image = $_FILES['imagem_produto']['name'];
    $product_image_empty = '../../img/empty.png'; 
    $product_image_tmp = $_FILES['imagem_produto']['tmp_name'];
   
    if($product_image == "" ) {
      $product_image = $product_image_empty;
    }

    move_uploaded_file($product_image_tmp,"../../img/categorias/$product_image");
   
    $insert_product = "insert into produto (idCategoria,idMarca,nome,preco,descricao,imagem,estado) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','ativo')";
   
    $run_product = mysqli_query($con,$insert_product);
   
    if($run_product){
      echo "<script>alert('Produto inserido com sucesso.')</script>";
    }
  }
?>