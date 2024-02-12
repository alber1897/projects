<?php
include_once("../modelo/funciones_genericas.php");
include_once("../modelo/funciones_cliente.php");
include_once("../modelo/funciones_dev.php");

$errores="";
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
        $errores= "USUARIO O PIN ERRONEOS";
    }

}
?>

<html>
<head>
<title>Panel - el="stylesheet" href="../css/style-login.css">  
</head>
<body>
    <div class="container">
        <div id="logo">
        <a href="/"><img src="/img/MetLancer.png" ></a>

        </div>
        <div id="principal">
            <div class="form-ajustar"> 
            <h2>
                <span class="ingresar">
            Olvidaste
                </span>
            </h2>
            <?php echo $errores ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    
                    <label><input type="text" name="usuario" value="" placeholder="Nombre de usuario" class="form-control"></label>
                    <label><input type="password" name="pin" value="" placeholder="Pin de seguridad" class="form-control"></label>
                     <br><br>
                    <input type="submit" name="enviar" value="Cambiar Contraseña" class="button-submit"><br><br>
                <label>
                        <span class="last">
                            ¿Aun no tienes cuenta?
                            <a href="pre-registro.php"><pv>¡Registrate!</pv></a>
                        </span>
                 </label>
                </form>
            </div> 
        <div>
    </div>
</body>
</html>