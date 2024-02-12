<?php
session_start();
include_once("modelo/funciones.php");

if(isset($_GET['msg'])){
    $_SESSION['id_mensaje']=$_GET['msg'];
}
borrarMensaje( $_SESSION['id_mensaje']);
$_SESSION['eliminado']="¡Mensaje  borrado con exito!";
header('Location: mensajes.php');
?>