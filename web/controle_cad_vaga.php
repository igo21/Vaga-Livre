<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
require_once "Vaga.php";

if(isset($_GET["nome"]) && isset($_GET["latitude"]) && isset($_GET["longitude"]) && !isset($_GET['idedit'])) {
    if (Vaga::confereVaga($_GET["nome"])==0) {

        $temp = new Vaga();
        $temp->setNome($_GET["nome"]);
        $temp->setLatitude($_GET["latitude"]);
        $temp->setLongitude($_GET["longitude"]);
        $temp->setDisponivel('s');
        $temp->inserir();
        //todo - unset($temp); olhar os outros

        header("Location:index.php?view=cadvaga&ins");#volta para a página de cadastro
    }else{
        header("Location:index.php?view=cadvaga&ins2");#volta para pag de cadast, mostrando mensagem de item ja cadastrado.
    }
}elseif (isset($_GET['exclui']) && isset($_GET['id'])){
    $temp = new Vaga();
    $temp->setId($_GET['id']);
    $temp->excluir();

    header("Location:index.php?view=listar_vaga&excluido");#volta para a página de listagem

}elseif(isset($_GET['idedit'])&& isset($_GET["nome"]) && isset($_GET["latitude"]) && isset($_GET["longitude"])) {
        $temp = new Vaga();
        $temp->setNome($_GET["nome"]);
        $temp->setLatitude($_GET["latitude"]);
        $temp->setLongitude($_GET["longitude"]);
        $temp->setDisponivel("s");
        $temp->setId($_GET['idedit']);
        $temp->atualizar();
        header("Location:index.php?view=listar_vaga&atualizado");#volta para a página de listagem
}
?>
</body>
</html>
