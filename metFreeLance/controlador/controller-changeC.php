<?php
require_once("../modelo/funciones_genericas.php");
require_once("../modelo/funciones_cliente.php");
require_once("../modelo/funciones_dev.php");

require_once("vista/cambiar_cliente.php");
$errores="";

function cambiar(){
    
if(isset($_POST['changenombre'])){
    setNombreC($_SESSION['usuario'],$_POST['nombre']);
    $_SESSION['usuario']=$_POST['nombre'];
    echo'<script type="text/javascript">
    alert("Nombre cambiado con exito");
    </script>';
}
if(isset($_POST['changepin'])){
    setPinC($_SESSION['usuario'],$_POST['pin']);
    echo'<script type="text/javascript">
    alert("Pin cambiado con exito");
    </script>';
}
if(isset($_POST['changefecha'])){
    setFechaC($_SESSION['usuario'],$_POST['fecha']);
    echo'<script type="text/javascript">
    alert("Fecha cambiada con exito");
    </script>';
}
if(isset($_POST['changedireccion'])){
    setDireccionC($_SESSION['usuario'],$_POST['direccion']);
    echo'<script type="text/javascript">
    alert("Direccion cambiada con exito");
    </script>';
}
if(isset($_POST['changecorreo'])){
    setCorreoC($_SESSION['usuario'],$_POST['correo']);
    echo'<script type="text/javascript">
    alert("Correo cambiado con exito");
    </script>';
}
}
?>