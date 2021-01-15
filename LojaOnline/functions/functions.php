<?php
function getpro(){
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
      global $con;
      
      $get_pro = "select * from instrumento where estado='ativo' order by idInstrumento DESC LIMIT 9";
      $run_pro = mysqli_query($con,$get_pro);
    
      while($row_pro = mysqli_fetch_array($run_pro)){
        $product_id = $row_pro['idInstrumento'];
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
                    <img src='img/instrumentos/$product_image'>
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


function total_itens_cart(){
    include 'includes/config.php';
    //$conn = mysqli_connect("sql213.epizy.com","epiz_24003581","OnM36Uhzmk1mNRU","epiz_24003581_globalmusik");
  
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
          $idInstrumento = $carrinho['idInstrumento'];
          $selectinstrumento = "select * from instrumento where idInstrumento = '$idInstrumento'";
          $selectresultinstrumento = mysqli_query($conn, $selectinstrumento);
          if (mysqli_num_rows($selectresultinstrumento) > 0) {
            $instrumento = mysqli_fetch_assoc($selectresultinstrumento);
            
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


?>