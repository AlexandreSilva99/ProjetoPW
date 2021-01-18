<!DOCTYPE html>
<html lang="pt">
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        session_start();
        unset($_SESSION['email']);
        header('Location: index.php');
    ?>

</html>