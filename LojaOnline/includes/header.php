<!DOCTYPE html>
<html lang="pt">
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header -->
    <div id="shadow">
    <div id="header">
        <div id="headerleft">
            <a href="index.php">Pro Detail</a>
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

        <div id="headerrigth">
            <div class="topRigth"></div>
            <div class="topRigth"></div>
            <div class="topRigth"></div>
        </div>
    <!-- Fim do Header -->
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
    
    <!-- Fim da Navbar -->
    <script src="scripts/script.js"></script>
</body>