<?php
    session_start();
    include("functions/functions.php");
    $con = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");
?>

<html>
  <head>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <div id="interface">  

          <?php  
            if(isset($_GET['pro_id'])){
              $prod_id = $_GET['pro_id'];
          
              $get_pro = "select * from produto where idProduto = '$prod_id'";
              $run_pro = mysqli_query($con,$get_pro);
          
              while($row_pro = mysqli_fetch_array($run_pro)){
                $product_id = $row_pro['idProduto'];
                $product_description = $row_pro['descricao'];
                $product_brand = $row_pro['idMarca'];
                $product_title = $row_pro['nome']; 
                $product_price = $row_pro['preco'];
                $product_image = $row_pro['imagem'];
              }
            }
          ?>

          <?php
            if(isset($_GET['acao'])){
              include("includes/config.php");
              $conn = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");

              $acao = $_GET['acao'];
              if($acao == "delete"){
                if (!isset($_SESSION['email'])) {
                  header('Location: index.php');
                  exit();
                } elseif ($_SESSION['email'] != 'Admin') {
                  header('Location: index.php');
                  exit();
                }

                $sql = "select imagem from produto where idProduto=".$product_id;
                $result = mysqli_query($conn, $sql);
                $resultdata = mysqli_fetch_array($result);
        
                $query="UPDATE produto set estado='inativo' where idProduto=".$product_id;
                mysqli_query($conn, $query);
                header("refresh:0.1;url=index.php");
                echo"<script>alert('Produto removido com sucesso.')</script>";
                exit();
              }
        
              if($acao == "edit"){

                if (!isset($_SESSION['email'])) {
                  header('Location: index.php');
                  exit();
                } elseif ($_SESSION['email'] != 'Admin') {
                  header('Location: index.php');
                  exit();
                }

                $query="select * from produto where idProduto=".$product_id;
                $result=mysqli_query($conn, $query);
                $resultrows=mysqli_num_rows($result);
        
                if($resultrows>0){
                  for($i=1;$i<=$resultrows;$i++){
                    $data=mysqli_fetch_assoc($result);
                    $prodid=$data['idProduto'];
                    $prodname=$data["nome"];
                    $prodpreco=$data["preco"];
                    $proddesc=$data["descricao"];
                    $prodimg=$data["imagem"];
                    $prodmarca=$data["idMarca"];
                  
          ?>
                  <div class="add-prod-box">
                    <a href="details.php?pro_id=<?php echo $prodid?>">
                      <img src="<?php echo "img/categorias/$prodimg"?>" alt="<?php echo "$prodname"?>" width="250">
                    </a>

                    <div class="desc">
                      <form method='POST' action='update_produto.php' enctype='multipart/form-data'>
                      <input type="hidden" name="idprod" value="<?php echo $prodid?>">

                      <br><br>

                        Nome<br>
                        <input type='text' name='nome' value="<?php echo $prodname?>" required>

                        <br><br>

                        Categoria<br>
                          <select name="idCategoria" required>
                          <option></option>
                              
                          <?php
                            $get_cats = "select * from categoria";
                            $run_cats = mysqli_query($con,$get_cats);

                            while($row_cats=mysqli_fetch_array($run_cats)){
                              $cat_tit = $row_cats['descricao'];
                              $cat_id = $row_cats['idCategoria'];
                              echo "<option value=$cat_id>$cat_tit</option>";
                            }
                          ?>
                        </select>
                        <br><br>
                        Marca<br>
                        <select name="idMarca" required>
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

                        Imagem<br>
                        <input type='file' name='image' accept='image/*'>
                        <input type="hidden"  name="image2" value="<?php echo $prodimg?>"></p>

                        <br><br>

                        Preço<br>
                        <input type='text' name='preco' value="<?php echo '' . $prodpreco . ''; ?>" required> €

                        <br><br>

                        Descrição<br>
                        <textarea name='descricao' cols="75" rows="7" required><?php echo $proddesc?></textarea>  
                            
                        <br><br><br>

                        <input type="submit" name="submit" value="Enviar">
                        </div>
                      </form>
                    <br>
          <?php
                  }
                }
              }
        
            }
            else {
              if(isset($_GET['pro_id'])){
                
                include("includes/config.php");
                $conn = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");
                $query="select * from produto where idProduto =".$product_id;
                $result=mysqli_query($conn, $query);
                $resultrows=mysqli_num_rows($result);
        
                if($resultrows>0){
                  for($i=1;$i<=$resultrows;$i++){
                    $data=mysqli_fetch_assoc($result);
                    $prodid=$data['idProduto'];
                    $prodname=$data["nome"];
                    $prodpreco=$data["preco"];
                    $proddesc=$data["descricao"];
                    $prodimg=$data["imagem"];
                    $prodmarca=$data["idMarca"];
                    $prodcategoria=$data["idCategoria"];

          ?>
                      
                    <div class="desc">
                    <?php include 'includes/header.php'; ?>
                    <br><br><br>
                      <div id="flex-container">
                        <div class="flex-item" id="flex-left">
                            <?php include 'includes/marcas-left.php'; ?>
                        </div>

                        <div class="flex-item-center">
                          <?php 
                            echo '
                              <div class="details-box">
                                <div class="details-nome">
                                  '.$prodname.'
                                </div>
                                <table class="details-prod">
                                  <tr>
                                    <td class="details-prod-img" rowspan="2">
                                      <div class="details-img">
                                        <img src="img/categorias/'.$prodimg.'">
                                      </div>
                                    </td>
                                    <td class="details-prod-preco">
                                      <div class="details-preco">
                                        '.$prodpreco.' €
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    
                            ';
                          ?>

                  <?php
                            if(isset($_SESSION['email'])){
                              if($_SESSION['email'] == 'Admin'){
                                echo "
                                      <td class='details-prod-buttons'>
                                        <a href='details.php?pro_id=$prodid&acao=edit'><button>Editar</button></a>
                                        <br><br>
                                        <a href='details.php?pro_id=$prodid&acao=delete'><button>Remover</button></a>
                                        </td>
                                    </tr>
                                  </table>
                                ";
                              }
                            }

                            if(isset($_SESSION['email'])){
                              if($_SESSION['email'] != 'Admin'){
                                $x = $_SESSION['email'];

                                $selectutilizador = "select * from utilizador where email = '$x'";
                                $selectresultutilizador = mysqli_query($conn, $selectutilizador);
                                $dados = mysqli_fetch_assoc($selectresultutilizador);
                                $idUser = $dados['idUtilizador'];
                                $idProduto = $_GET['pro_id'];

                                $selectcarrinho = "select * from carrinho where idUtilizador = '$idUser' and idProduto = '$idProduto'";
                                $selectresultcarrinho = mysqli_query($conn, $selectcarrinho);

                                if(mysqli_num_rows($selectresultcarrinho) < 1) {
                                    echo '
                                            </div>
                                            <td class="details-prod-buttons">
                                              <form action="functions/cart_adicionar.php?pro_id=' . $prodid . '" method="POST">
                                                <button name="btt">Adicionar ao carrinho</button>
                                              </form>
                                            </td>
                                          </tr>
                                        </table>
                                  ';
                                } elseif (mysqli_num_rows($selectresultcarrinho) > 0) {
                                  echo '
                                            
                                          </div>
                                          <td class="details-prod-buttons">
                                            <button>Produto já existente no carrinho</button>
                                          </td>
                                        </tr>
                                      </table>
                                  ';
                                }
                                
                              }
                            }
                            echo '
                                    </tr>
                                  </table>
                                  <br>
                                  <div class="details-desc">
                                  '.$proddesc.'
                                  </div>
                                </div>
                            ';
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
                    <br>
                            <?php include 'includes/footer.php'; ?>
                  
          <?php
                  }
                }
              }
            }
          ?>
        </div>
  </body>
</html>