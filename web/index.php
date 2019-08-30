<?php
if(isset($_GET['view'])){
    require_once "header.php";
    require_once $_GET['view'].".php";
    require_once "footer.php";
}else{
    require_once "header.php";
    require_once "mapavl.php";
    require_once "footer.php";
}
?>