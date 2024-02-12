<?php
  include_once("../modelo/funciones_genericas.php");
  include_once("../modelo/funciones_cliente.php");
  include_once("../modelo/funciones_dev.php");
  $errores="";

     function login(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {  

        

        
            $var =checkUsuarioDev($_POST['usuario'], $_POST['pass']);
            $var2 = checkUsuarioCliente($_POST['usuario'], $_POST['pass']);
                if($var==true){
                    session_start();
                    $_COOKIE['galleta']=$_POST['usuario'];
                    $_SESSION['usuario'] = $_POST['usuario'];
                    if(comprobar_rol($_SESSION['usuario'])==0){
                    header("Location: me_dev.php");
                    }else{
                        header("Location: /panel/html/ltr/index.html");
                    }
                }
                else if($var2==true){
                    session_start();
                    $_COOKIE['galleta']=$_POST['usuario'];
                    $_SESSION['usuario'] = $_POST['usuario'];
                    if(comprobar_rol($_SESSION['usuario'])==0){
                    header("Location: me_cliente.php");
                    }else{
                        header("Location: /panel/html/ltr/index.html");
                    }
                }
            else { 
                $errores= "Usuario o contraseña erroneos.";
            }
        }
    
}
?>