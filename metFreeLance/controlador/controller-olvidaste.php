<?php
require_once("../modelo/funciones_genericas.php");
require_once("../modelo/funciones_cliente.php");
require_once("../modelo/funciones_dev.php");

require_once("olvidaste.php");
$errores="";
function olvidaste(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  

	

	
        $var =checkPinC($_POST['usuario'], $_POST['pin']);
        $var2 =checkPinD($_POST['usuario'], $_POST['pin']);
            if($var==true){
                session_start();
                $_SESSION['usuario'] = $_POST['usuario'];
                $_SESSION['update'] = "cliente";
               
                    header("Location: /recupera.php");
                
            }
        else if($var2==true){
            session_start();
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['update'] = "dev";
               
                    header("Location: /recupera.php");
                
        }
        else { 
            $errores= "<div style='width:250px;font-size:15px;color:red; height:25px;  font-family:Calibri; border-radius:5px; float:left;text-align:center;'>
             <b>USUARIO O PIN ERRONEOS</b></div>";
        }
    
    }
}
?>