<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Área de Cliente - Pro Detail</title>
</head>
<body>

    <br><br>

    <?php
        //===============================================================================//
        $id_sessao = session_id();
        if(empty($id_sessao)) session_start();
        //===============================================================================//


        //===============================================================================//
        //===============================================================================//
        // Verificar se foram inseridos dados
        //-------------------------------------------------------------------------------//
        if(!isset($_POST['signup'])) {
            ApresentarFormulario();
        }
        else
        {
            RegistarUtilizador();
        }
        //===============================================================================//
        //===============================================================================//


        //===============================================================================//
        //===============================================================================//
        // Funções
        //-------------------------------------------------------------------------------//
        function ApresentarFormulario() {
        echo '
        <div id="body">        
            <div class="login-box" action="signup.php?a=signup" id="signup-box">
                
                <a href="index.php"><img id="signup" src="img/logo.png"></a><br>
                <h1>Criar a sua Conta</h1>
                <br><br>
                <form class="form_signup" method="post" action="signup.php?a=signup" enctype="multipart/form-data">                     
                    <div id="signup-content">
                        <label>Nome:</label>
                        <input type="text" name="nome" minlength=5 maxlength=15>
                        
                        <label>Apelido:</label>
                        <input type="text" name="apelido" minlength=5 maxlength=15>

                        <label>Email:</label>
                        <input type="email" name="email" maxlength=50>

                        <label>Password:</label>
                        <input type="password" name="password1" minlength=8 maxlength=25>

                        <label>Confirme a password:</label>
                        <input type="password" name="password2" minlength=8 maxlength=25>


                        <input type="submit" name="signup" value="Criar conta">
                        
                        <a href="login.php">Já tem conta? Faça login!</a>
                        <br><br>
                        <p>Não é possível alterar o endereço de email nem a password!</p>
                    </div>
                </form>
            </div>
            <br>
        </div>
        ';
        }

        function RegistarUtilizador() {
            // Regista um novo utilizador
            $nome = $_POST['nome'];
            $apelido = $_POST['apelido'];
            $email = $_POST['email'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            $nif = "";
            $morada = "";
            $localidade = "";
            $codpostal = "";
            $avatar_empty = '../header/cliente.png'; 
            $idTipoUtilizador = '2'; 
    
            $erro = false;
    
            //-------------------------------------------------------------------------------
            
            // Erros
    
            // Tem de preencher todos os campos
            if($nome=="" || $apelido=="" || $email=="" || $password1=="" || $password2=="") {
                echo '<div class="erro">Tem de preencher os campos obrigatórios!</div>';
                $erro = true;
            }
    
            // As passwords não coincidem
            elseif($password1 != $password2) {
                echo '<div class="erro">As passwords não coincidem!</div>';
                $erro = true;
            }

            // Avatar - Default
            $avatar['name'] = $avatar_empty;
    
            //-------------------------------------------------------------------------------
            // Verificar se existiram erros
            if($erro)
            {
                ApresentarFormulario();
                exit;
            }
            


            //-------------------------------------------------------------------------------
            // Processamento do registo de novo utilizador
            //-------------------------------------------------------------------------------
            include 'includes/config.php';
            $ligacao = new PDO ("mysql:dbname=$base_dados;host=$host", $user, $password);
    
            //-------------------------------------------------------------------------------


            // Verificar se já existe um utilizador com o mesmo email
            $motor = $ligacao->prepare("select email from utilizador where email = ?");
            $motor->bindparam(1, $email, PDO::PARAM_STR);
            $motor->execute();
            
            if($motor->rowCount() != 0)
            {
                // Erro - Utilizador já se encontra registado
                echo '<div class="erro">Já existe um utilizador com esse email.</div>';
                $ligacao = null;
                ApresentarFormulario();
                exit;
            }
            else {

            // Registo do novo utilizador
                $motor = $ligacao->prepare("select MAX(idUtilizador) as MaxID from utilizador");
                $motor->execute();
                $id_temp = $motor->fetch(PDO::FETCH_ASSOC)['MaxID'];
                if($id_temp == null)
                {
                    $id_temp = 0;
                }
                else {
                    $id_temp++;
                }
    
                // Encriptar a password
                $passwordEncriptada = md5($password1);
    
                $sql = "insert into utilizador values( :idUtilizador, :nome, :apelido, :email, :pw, :nif, :morada, :localidade, :codPostal, :avatar, :idTipoUtilizador)";
                $motor = $ligacao->prepare($sql);
                $motor->bindparam(":idUtilizador", $id_temp, PDO::PARAM_INT);
                $motor->bindparam(":nome", $nome, PDO::PARAM_STR);
                $motor->bindparam(":apelido", $apelido, PDO::PARAM_STR);
                $motor->bindparam(":email", $email, PDO::PARAM_STR);
                $motor->bindparam(":pw", $passwordEncriptada, PDO::PARAM_STR);
                $motor->bindparam(":nif", $nif, PDO::PARAM_INT);
                $motor->bindparam(":morada", $morada, PDO::PARAM_STR);
                $motor->bindparam(":localidade", $localidade, PDO::PARAM_STR);
                $motor->bindparam(":codPostal", $codpostal, PDO::PARAM_STR);
                $motor->bindparam(":avatar", $avatar['name'], PDO::PARAM_STR);
                $motor->bindparam(":idTipoUtilizador", $idTipoUtilizador, PDO::PARAM_INT);

                $motor->execute();
                $ligacao = null;
    
    
                // Mensagem de boas-vindas
                echo '
                <head>
                    <title>A carregar... - Pro Detail</title>
                    <meta http-equiv="refresh" content="3;url=login.php">
                </head>
                <body>';
                    include 'includes/header_signup.php';
                    echo '
                    <div id="loadinginterface">
                        <br>
                        <div id="left">
                            <div class="loader"></div>
                            </div>
                        <div id="container">
                            <div id="right">
                                <h2>A sua conta foi criada com sucesso.</h2><br>
                                Está a ser redirecionado para a página de inicio de sessão.
                                Por favor aguarde...<br><br>
                                Se não for redirecionado dentro de segundos, por favor <a id="redirect" href="login.php">clique aqui</a>.
                            </div>
                        </div>
                    </div>
            ';
            }
        }

    ?>
</body>
</html>