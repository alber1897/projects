<?php
require_once("../modelo/funciones_genericas.php");
require_once("../modelo/funciones_cliente.php");
require_once("../modelo/funciones_dev.php");

require_once("../vista/cambiar_cliente.php");
$errores="";

function cambiar(){
    
    if(isset($_POST['changenombre'])){
        setNombreD($_SESSION['usuario'],$_POST['nombre']);
        $_SESSION['usuario']=$_POST['nombre'];
        echo'<script type="text/javascript">
        alert("Nombre cambiado con exito");
        </script>';
    }
    if(isset($_POST['changepin'])){
        setPinD($_SESSION['usuario'],$_POST['pin']);
        echo'<script type="text/javascript">
        alert("Pin cambiado con exito");
        </script>';
    }
    if(isset($_POST['changefecha'])){
        setFechaD($_SESSION['usuario'],$_POST['fecha']);
        echo'<script type="text/javascript">
        alert("Fecha cambiada con exito");
        </script>';
    }
    if(isset($_POST['changeciudad'])){
        setCiudadD($_SESSION['usuario'],$_POST['ciudad']);
        echo'<script type="text/javascript">
        alert("Ciudad cambiada con exito");
        </script>';
    }
    if(isset($_POST['changecorreo'])){
        setCorreoD($_SESSION['usuario'],$_POST['correo']);
        echo'<script type="text/javascript">
        alert("Correo cambiado con exito");
        </script>';
    }
    if(isset($_POST['changeprecio'])){
        setPrecioD($_SESSION['usuario'],$_POST['precio']);
        echo'<script type="text/javascript">
        alert("Precio cambiado con exito");
        </script>';
    }
    if(isset($_POST['changelenguaje'])){
        setLenguajeD($_SESSION['usuario'],$_POST['correo']);
        echo'<script type="text/javascript">
        alert("Lenguaje cambiado con exito");
        </script>';
    }
}
?>