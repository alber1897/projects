<?php
session_start();
include_once("modelo/funciones.php");

if(isset($_GET['pd'])){
    $_SESSION['id_pedido']=$_GET['pd'];
}
borrarPedido( $_SESSION['id_pedido']);
$_SESSION['eliminado']="¡Pedido  borrado con exito!";
header('Location: pedidos.php');
?>