<?php
session_start();
include_once("modelo/funciones.php");

if(isset($_GET['user'])){
    $_SESSION['user']=$_GET['user'];
}
borrarUserC( $_SESSION['user']);
$_SESSION['eliminado']="¡Usuario  borrado con exito!";
header('Location: index.php');
?>