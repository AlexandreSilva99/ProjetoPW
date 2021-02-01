<?php
  // include 'includes/config.php';
  $con = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");

  if(mysqli_connect_errno()){
    echo"Failed to connect : " . mysqli_connect_error(); 
}


// GET Marca (15)
function getbrands15(){
	global $con;

	$get_brands = "select * from marca order by nome ASC LIMIT 15";
	$run_brands = mysqli_query($con,$get_brands);

	while($row_brands=mysqli_fetch_array($run_brands)){
		$brand_title = $row_brands['nome'];
    $brand_id = $row_brands['idMarca'];
    echo "<li class='marca15left'><a href='marca.php?brand=$brand_id'>$brand_title</a></li>"; 
	}
}


function getbrands_15_1(){
	global $con;

	$get_brands = "select * from marca where idMarca >= 1 and idMarca <= 15 order by nome ASC";
	$run_brands = mysqli_query($con,$get_brands);
	while($row_brands=mysqli_fetch_array($run_brands)){
    $brand_id = $row_brands['idMarca'];
		$brand_title = $row_brands['nome'];
		$brand_img = $row_brands['Imagem'];
    echo "
        <div id='flex-container'>
          <div class='flex-item'>
          <img src='img/categorias/$brand_img'>
          </div>
          <div class='flex-item-center'>
            <div class='nome-marca'>" . $brand_title . "</div><br>
          </div>
          <div class='flex-item' id='marca-ver-produtos'>
            <a href='marca.php?brand=$brand_id'>$brand_title'><p class='marca-ver-produtos'>Ver produtos</p></a> 
          </div>
        </div>
      <hr class='hr-marca'>
    ";
	}
}

function getbrands_15_2(){
	global $con;

	$get_brands = "select * from marca where idMarca >= 16 and idMarca <= 30 order by nome ASC";
	$run_brands = mysqli_query($con,$get_brands);

	while($row_brands=mysqli_fetch_array($run_brands)){
    $brand_id = $row_brands['idMarca'];
		$brand_title = $row_brands['nome'];
		$brand_img = $row_brands['imagem'];
    echo "
        <div id='flex-container'>
        <div class='flex-item'>
              <img src=" . $brand_img . " class='img-marca'></img><br>
            </div>
            <div class='flex-item-center'>
              <div class='nome-marca'>" . $brand_title . "</div><br>
            </div>
            <div class='flex-item' id='marca-ver-produtos'>
              <a href='marca.php?brand=$brand_id'>$brand_title'><p class='marca-ver-produtos'>Ver produtos</p></a> 
            </div>
        </div>
      <hr class='hr-marca'>
    ";
	}
}

function getbrands_15_3(){
	global $con;

	$get_brands = "select * from marca where idMarca >= 31 and idMarca <= 45 order by nome ASC";
	$run_brands = mysqli_query($con,$get_brands);
// <img src=" . $brand_img . " class='img-marca'></img><br>
	while($row_brands=mysqli_fetch_array($run_brands)){
    $brand_id = $row_brands['idMarca'];
		$brand_title = $row_brands['nome'];
		$brand_img = $row_brands['imagem'];
    echo "
        <div id='flex-container'>
        <div class='flex-item'>
              
              <img src='img/categorias/$brand_img'>
            </div>
            <div class='flex-item-center'>
              <div class='nome-marca'>" . $brand_title . "</div><br>
            </div>
            <div class='flex-item' id='marca-ver-produtos'>
              <a href='marca.php?brand=$brand_id'>$brand_title'><p class='marca-ver-produtos'>Ver produtos</p></a> 
            </div>
        </div>
      <hr class='hr-marca'>
    ";
	}
}

function getbrands_15_4(){
	global $con;

	$get_brands = "select * from marca where idMarca >= 46 and idMarca <= 60 order by nome ASC";
	$run_brands = mysqli_query($con,$get_brands);

	while($row_brands=mysqli_fetch_array($run_brands)){
    $brand_id = $row_brands['idMarca'];
		$brand_title = $row_brands['nome'];
		$brand_img = $row_brands['imagem'];
    echo "
        <div id='flex-container'>
        <div class='flex-item'>
              <img src=" . $brand_img . " class='img-marca'></img><br>
            </div>
            <div class='flex-item-center'>
              <div class='nome-marca'>" . $brand_title . "</div><br>
            </div>
            <div class='flex-item' id='marca-ver-produtos'>
              <a href='marca.php?brand=$brand_id'>$brand_title'><p class='marca-ver-produtos'>Ver produtos</p></a> 
            </div>
        </div>
      <hr class='hr-marca'>
    ";
	}
}

function getbrands_15_5(){
	global $con;

	$get_brands = "select * from marca where idMarca >= 61 and idMarca <= 75 order by nome ASC";
	$run_brands = mysqli_query($con,$get_brands);

	while($row_brands=mysqli_fetch_array($run_brands)){
    $brand_id = $row_brands['idMarca'];
		$brand_title = $row_brands['nome'];
		$brand_img = $row_brands['imagem'];
    echo "
        <div id='flex-container'>
        <div class='flex-item'>
              <img src=" . $brand_img . " class='img-marca'></img><br>
            </div>
            <div class='flex-item-center'>
              <div class='nome-marca'>" . $brand_title . "</div><br>
            </div>
            <div class='flex-item' id='marca-ver-produtos'>
              <a href='marca.php?brand=$brand_id'>$brand_title'><p class='marca-ver-produtos'>Ver produtos</p></a> 
            </div>
        </div>
      <hr class='hr-marca'>
    ";
	}
}

function getbrands_15_6(){
	global $con;

	$get_brands = "select * from marca where idMarca >= 76 and idMarca <= 90 order by nome ASC";
	$run_brands = mysqli_query($con,$get_brands);

	while($row_brands=mysqli_fetch_array($run_brands)){
    $brand_id = $row_brands['idMarca'];
		$brand_title = $row_brands['nome'];
		$brand_img = $row_brands['imagem'];
    echo "
        <div id='flex-container'>
        <div class='flex-item'>
              <img src='img/categorias/$brand_img' class='img-marca'></img><br>
            </div>
            <div class='flex-item-center'>
              <div class='nome-marca'>" . $brand_title . "</div><br>
            </div>
            <div class='flex-item' id='marca-ver-produtos'>
              <a href='marca.php?brand=$brand_id'>$brand_title'><p class='marca-ver-produtos'>Ver produtos</p></a> 
            </div>
        </div>
      <hr class='hr-marca'>
    ";
	}
}


// GET Novidades (9)
function getpro(){
	if(!isset($_GET['AutoFinesse'])){
		if(!isset($_GET['brand'])){
      global $con;
      
      $get_pro = "select * from produto order by idProduto DESC LIMIT 9";
      $run_pro = mysqli_query($con,$get_pro);
    
      while($row_pro = mysqli_fetch_array($run_pro)){
        $product_id = $row_pro['idProduto'];
        $product_category = $row_pro['idCategoria'];
        $product_brand = $row_pro['idMarca'];
        $product_title = $row_pro['nome']; 
        $product_price = $row_pro['preco'];
        $product_image = $row_pro['imagem'];
        
        echo "
        <a href='details.php?pro_id=$product_id' class='prod-link'>
            <div class='prod_box'>
                <div class='center_prod_box'>
                <div class='product_img'>
                    <img src='img/categorias/$product_image'>
                </div>
                <div class='product_title'>
                    $product_title
                </div>
                <div class='prod_price'>
                    <span class='price'>$product_price €</span>
                </div>
                </div>
            </div>
        </a>
        ";
      }
    }
  }
}


function getnewproducts(){
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
      global $con;
      
      $get_pro = "select * from produto order by idProduto DESC LIMIT 18";
      $run_pro = mysqli_query($con,$get_pro);
    
      while($row_pro = mysqli_fetch_array($run_pro)){
        $product_id = $row_pro['idProduto'];
        $product_category = $row_pro['idCategoria'];
        $product_brand = $row_pro['idMarca'];
        $product_title = $row_pro['nome']; 
        $product_price = $row_pro['preco'];
        $product_image = $row_pro['imagem'];
        
        echo "
        <a href='details.php?pro_id=$product_id' class='prod-link'>
            <div class='prod_box'>
                <div class='center_prod_box'>
                <div class='product_img'>
                    <img src='img/categorias/$product_image'>
                </div>
                <div class='product_title'>
                    $product_title
                </div>
                <div class='prod_price'>
                    <span class='price'>$product_price €</span>
                </div>
                </div>
            </div>
        </a>
        ";
      }
    }
  }
}


// GET detalhes idMarca
function get_pro_brand(){
	if(isset($_GET['brand'])){
		$brand_id = $_GET['brand'];
	  global $con;

    $get_pro = "select * from produto where idMarca = '$brand_id'";
    $run_pro = mysqli_query($con,$get_pro);
    
    while($row_pro = mysqli_fetch_array($run_pro)){
      $product_id = $row_pro['idProduto'];
      $product_category = $row_pro['idCategoria'];
      $product_brand = $row_pro['idMarca'];
      $product_title = $row_pro['nome']; 
      $product_price = $row_pro['preco'];
      $product_image = $row_pro['imagem'];

      echo "
      <a href='details.php?pro_id=$product_id' class='prod-link'>
        <div class='prod_box'>
          <div class='center_prod_box'>
            <div class='product_img'>
              <img src='img/categorias/$product_image'>
            </div>
            <div class='product_title'>
              $product_title
            </div>
            <div class='prod_price'>
              <span class='price'>$product_price €</span>
            </div>
          </div>
        </div>
      </a>
      "; 
    }
  }
}


function preco_final() {
  include 'includes/config.php';
  $conn = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");

  if (isset($_SESSION['email'])) {
    $email_user = $_SESSION['email'];
    $selectuser = "select * from utilizador where email = '$email_user'";
    $selectresultuser = mysqli_query($conn, $selectuser);
    $dados = mysqli_fetch_assoc($selectresultuser);
    $ID_User = $dados['idUtilizador'];

    $selectcart = "select * from carrinho where idUtilizador = '$ID_User'";
    $selectresultcart = mysqli_query($conn, $selectcart);
    $total = 0;
    if (mysqli_num_rows($selectresultcart) > 0) {
      while ($carrinho = mysqli_fetch_assoc($selectresultcart)) {
        $idProduto = $carrinho['idProduto'];
        $selectproduto = "select * from produto where idProduto = '$idProduto'";
        $selectresultproduto = mysqli_query($conn, $selectproduto);
        if (mysqli_num_rows($selectresultproduto) > 0) {
          $produto = mysqli_fetch_assoc($selectresultproduto);
          
          $total = $total + ($carrinho['quantidade'] * $produto['preco']);

        }
      }
    }

    echo sprintf("%.2f", $total) . ' €';
  }
  else {
    $total = 0;
    echo sprintf("%.2f", $total) . ' €';
  }

}

function total_itens_cart(){
  include 'includes/config.php';
  $conn = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");

  if (isset($_SESSION['email'])) {
    $email_user = $_SESSION['email'];
    $selectuser = "select * from utilizador where email = '$email_user'";
    $selectresultuser = mysqli_query($conn, $selectuser);
    $dados = mysqli_fetch_assoc($selectresultuser);
    $ID_User = $dados['idUtilizador'];

    $selectcart = "select * from carrinho where idUtilizador = '$ID_User'";
    $selectresultcart = mysqli_query($conn, $selectcart);
    $total = 0;
    if (mysqli_num_rows($selectresultcart) > 0) {


      while ($carrinho = mysqli_fetch_assoc($selectresultcart)) {
        $idProduto = $carrinho['idProduto'];
        $selectproduto = "select * from produto where idProduto = '$idProduto'";
        $selectresultproduto = mysqli_query($conn, $selectproduto);
        if (mysqli_num_rows($selectresultproduto) > 0) {
          $produto = mysqli_fetch_assoc($selectresultproduto);
          
          $total = $total + ($carrinho['quantidade'] * 1);

        }
      }
    }
    echo $total;
  }
  else {
    $total = 0;
    echo $total;
  }
}

function cart(){
  include 'includes/config.php';
  $conn = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");

  if (isset($_SESSION['email'])) {
    $email_user = $_SESSION['email'];
    $selectuser = "select * from utilizador where email = '$email_user'";
    $selectresultuser = mysqli_query($conn, $selectuser);
    $dados = mysqli_fetch_assoc($selectresultuser);
    $ID_User = $dados['idUtilizador'];

    $selectcart = "select * from carrinho where idUtilizador = '$ID_User'";
    $selectresultcart = mysqli_query($conn, $selectcart);
    if (mysqli_num_rows($selectresultcart) > 0) {
      echo '
      <table class="cart-title-container">
        <tr>
          <td class="prodnr-cart-title">
              
          </td>
          <td class="prodname-cart-title">
              &nbsp;&nbsp;&nbsp;Produtos
          </td>
          <td class="prodquant-cart-title">
              Quant
          </td>
          <td class="prodprice-cart-title">
              Preço
          </td>
          <td class="prodremove-cart-title">
          </td>
        </tr>
      </table>
      <hr>
      ';

      $total = 0;

      while ($carrinho = mysqli_fetch_assoc($selectresultcart)) {
        $idProduto = $carrinho['idProduto'];
        $selectproduto = "select * from produto where idProduto = '$idProduto'";
        $selectresultproduto = mysqli_query($conn, $selectproduto);
        if (mysqli_num_rows($selectresultproduto) > 0) {
          $produto = mysqli_fetch_assoc($selectresultproduto);
          
          $total = $total + ($carrinho['quantidade'] * $produto['preco']);
          
          echo '
            <div class="cart-container">
                <table class="cart-title-container">
                    <tr>
                        <td class="prodnr-cart-title">
                          #' . $produto['idProduto'] . '
                        </td>
                        <td class="prodimg-cart-title">
                          <a href="details.php?pro_id=' . $produto['idProduto'] . '">
                            <img src="img/categorias/' . $produto['imagem'] . '" width=50px>
                          </a>
                        </td>
                        <td class="productname-cart-title">
                          ' . $produto['nome'] . '
                        </td>

                        <form action="functions/cart_update.php?idcart=' . $carrinho['idCarrinho'] . '" method="POST">
                          <td class="prodquant-cart-title">
                            <input type="number" min="1" max="10" name="input-qtd" id="quantidade" value="' . $carrinho['quantidade'] . '">
                          </td>
                          <td class="prodprice-cart-title">
                            ' . $produto['preco'] . '&nbsp;€
                          </td>
                          <td class="produpdate-cart-title">
                            <button name="alter_qtd"><img src="img/refresh-cart.png"></button>
                          </td>      
                        </form>

                        <td class="prodremove-cart-title">
                          <form action="functions/cart_remover.php?idcart=' . $carrinho['idCarrinho'] . '" method="POST">
                            <button><img src="img/remove-cart.png"></button>
                          </form>
                        </td>
                    </tr>
                </table>
                
              <br>
            </div>
            
          ';
        }
      }
      echo '
      <hr>
      <table class="cart-total">
        <tr>
          <td class="cart-total-left">Total</td>
            <td class="cart-total-right">' . sprintf("%.2f", $total) . '&nbsp;€</td>
        </tr>
      </table>
      <br>
      <a class="encomenda-cart" href="encomenda.php">
        Encomendar
      </a>
      ';
    }
    else {
      echo '
      <div class="cart-empty">
        <hr>
          <br>
            <p>O seu carrinho está vazio!</p>
          <br>
        <hr>
      </div>
      ';
    }
  }
  else {
    header('Location: login.php');
  }
}

?>