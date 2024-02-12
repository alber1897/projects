<?php
require_once("../modelo/funciones_genericas.php");
require_once("../modelo/funciones_cliente.php");
require_once("../modelo/funciones_dev.php");

require_once("../vista/recupera.php");
$errores="";
function recupera(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  


	    if($_POST['password']==$_POST['password1']){
                    if($_SESSION['update']=="cliente"){
                        $cambiar =UpdatePasswordC($_SESSION['usuario'],$_POST['password']);
                        if($cambiar==true){          
                            header("Location: login.php");
                            $_SESSION['cambiada']="Contraseña cambiada con exito";
                        }
                    }
                    else if($_SESSION['update']=="dev"){
                        $cambiar =UpdatePasswordD($_SESSION['usuario'],$_POST['password']);
                        if($cambiar==true){
                            header("Location: login.php");
                            $_SESSION['cambiada']="Contraseña cambiada con exito";
                        }
                    }
                    else{
                        $errores= "<div style='width:250px;font-size:15px;color:red; height:25px;  font-family:Calibri; border-radius:5px; float:left;text-align:center;'>
                        <b>ERROR DE USUARIO</b></div>";
                    }
                  
        }else { 
                $errores= "<div style='width:250px;font-size:15px;color:red; height:25px;  font-family:Calibri; border-radius:5px; float:left;text-align:center;'>
                <b>LAS CONTRASEÑAS NO COINCIDEN</b></div>";
         }
    }
}
?>