<!DOCTYPE html>
<html lang="pt">
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header -->
    <div id="shadow">
    <div id="header">
                <div id="headerLeft">
                    <a href="index.php"><img src="img/logo.png" alt=""></a>
                </div>
                
                <div id="search">
                    <?php
                    echo '
                    <form method="POST" action="prod_search.php">
                        <input type="text" name="pesquisa" placeholder="Pesquisar...">
                        <input name="pesquisar_text" class="button button-2" type="submit">
                    </form>				
		
				<br><br>
				</form>
                    ';
?>
                </div>
                

                <div id="headerRight">
                    <div class="topRight"></div>
                    <div class="topRight"></div>
                    <div class="topRight">
                        <?php
                            if(!isset($_SESSION['email'])){
                                echo '<a href="login.php"><img src="img/header/cliente.png" id="header_user" onmouseover="user_over()" onmouseout="user_out()" alt=""></a>';
                            } 
                            
                            elseif($_SESSION['email'] == "Admin"){
                                echo '
                                    <div class="dropdown">
                                        <div id="topRight"><img onclick="dropuser()" class="dropuserbtt" src="img/header/admin.png" id="header_user" onmouseover="admin_over()" onmouseout="admin_out()"></div>  
                                        <div id="dropdownuser" class="dropdown-content">
                                            <br>
                                            <a href="functions/adicionar">Adicionar prod.</a>
                                            <a href="encomendas.php">Ver encomendas</a>
                                            <a href="logout.php">Terminar Sessão</a>
                                        </div>
                                    </div>
                                ';
                            } 
                            
                            elseif(isset($_SESSION['email'])){
                                echo '
                                    <div class="dropdown">
                                        <div id="topRight"><img onclick="dropuser()" class="dropuserbtt" src="img/header/cliente_hover.png" id="user_header_img" onmouseover="user_over()" onmouseout="user_out()" alt=""></div>  
                                        <div id="dropdownuser" class="dropdown-content">
                                            <br>
                                            <a href="profile.php">Perfil</a>
                                            <a href="cart.php">Carrinho</a>
                                            <a href="logout.php">Terminar Sessão</a>
                                        </div>
                                    </div>
                                ';
                            };
                        ?>
                    </div>
                </div>
            </div>
            <!-- /Header -->

            <!-- Navbar -->
            <nav id="navbar">
                <h1>Menu Principal</h1>
                <ul>
                    <a class="nav-link" href="index.php"><li>Home</li></a>
                    <a class="nav-link" href="lavar.php"><li>Lavar</li></a>
                    <a class="nav-link" href="polir.php"><li>Polir</li></a>
                    <a class="nav-link" href="proteger.php"><li>Proteger</li></a>
                    <a class="nav-link" href="acabamento.php"><li>Acabamento</li></a>
                    <a class="nav-link" href="interior.php"><li>Interior</li></a>
                    <a class="nav-link" href="acessorios.php"><li>Acessorios</li></a>
                    <a class="nav-link" href="kits.php"><li>Kits</li></a>
                </ul>
            </nav>
    </div>
    
    <!-- /Navbar -->
    <script src="scripts/script.js"></script>
</html>