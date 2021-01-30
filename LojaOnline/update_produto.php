<?php
session_start();
include("includes/config.php");
$conn = mysqli_connect("localhost","id16003446_root","!x)+\Z%D==03H8D1","id16003446_prodetailers");
    if($_SESSION['email'] == 'admin'){
      if(isset($_POST['submit'])){

        if(isset($_FILES['image']) && $_FILES['image']['error'] != 4){
          // dados imagem
          $ficheironometemp = $_FILES['image']['tmp_name'];
          $ficheironome = $_FILES['image']['name'];
          $extensao = explode('.',$ficheironome); //func explode devolve array com todos os dados a cada ponto
          $ficheiroextensao = strtolower(end($extensao)); // strtolower converte texto para minusculas e end retorna o ultimo valor de um array
          $imagemnome = uniqid().".".$ficheiroextensao; // uniqid -> cria id unico
          $imagem = $_SESSION['path']."img/categorias/".$imagemnome;

          unlink($_SESSION['path']."img/categorias/".$_POST['image2']);
          move_uploaded_file($ficheironometemp, $imagem);

        }else{
          $imagemnome = $_POST['image2'];
        }

          $prodid=$_POST['idprod'];
          $prodname=htmlspecialchars($_POST['nome']);
          $prodpreco=floatval(htmlspecialchars($_POST['preco']));
          $proddesc=htmlspecialchars($_POST['descricao']);
          $prodmarca=htmlspecialchars($_POST['idMarca']);
          $prodcategoria=htmlspecialchars($_POST['idCategoria']);

          $query = "UPDATE produto set nome='".$prodname."', preco='".$prodpreco."', descricao='".$proddesc."', imagem='".$imagemnome."', idMarca='".$prodmarca."', idCategoria='".$prodcategoria."', estado='ativo' where idProduto=$prodid";
          mysqli_query($conn, $query);

          header("refresh:0.1;url=index.php");
          echo"<script>alert('Produto editado com sucesso.')</script>";
          exit();

      }else{
        header("refresh:0.1;url=index.php");
        echo"<script>alert('Ocorreu um erro ao tentar editar o Produto.')</script>";
        exit();
      }
    }else{
      header("refresh:0.1;url=index.php");
      exit();
    }
?>