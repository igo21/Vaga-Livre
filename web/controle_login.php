<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
require_once "Usuario.php";
if(isset($_POST["email"]) && isset($_POST["senha"])) {
    $temp = Usuario::login($_POST["email"], $_POST["senha"]);
    if ($temp == null) {
        header("Location:index.php?view=login&ins2");
    } else {
        //TODO - session_start();
        //$_SESSION["idUsuario"]=$temp[0];
        header("Location:index.php?view=cadvaga");
    }
}else{
    header("Location:index.php?view=login&ins2");
}
?>
</body>
</html>