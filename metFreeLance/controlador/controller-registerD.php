<?php
require_once("../modelo/funciones_genericas.php");
require_once("../modelo/funciones_cliente.php");
require_once("../modelo/funciones_dev.php");

require_once("../vista/registro_dev.php");
$errores="";

function registro(){
    if(isset($_POST['enviar'])){
        if(checkUsuarioSolo($_POST['usuario'])==false){
            if(checkCorreo($_POST['correo'])==false){
            subirFoto($_FILES['archivo']['name'],$_FILES['archivo']['type'],$_FILES['archivo']['size'],$_FILES['archivo']['tmp_name']);
            }else{$errores="Correo ya en uso, elija otro por favor.<br>";}
        }else{
            $errores= "Usuario ya en uso, elija otro por favor.";
          }
    }
}
?>