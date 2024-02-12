<?php
require_once("modelo/funciones_genericas.php");
require_once("modelo/funciones_cliente.php");
require_once("modelo/funciones_dev.php");

require_once("index.php");

function index(){
    if(isset($_POST['enviar']) ){
        session_start();
       $_SESSION['city']=$_POST['city'];
       $_SESSION['price']=$_POST['price'];
       $_SESSION['lenguaje']=$_POST['lenguaje'];
       header("Location: busqueda.php");
    }
}
?>