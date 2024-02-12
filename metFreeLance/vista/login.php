<?php
  include_once("../modelo/funciones_genericas.php");
  include_once("../modelo/funciones_cliente.php");
  include_once("../modelo/funciones_dev.php");
  $errores="";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {  

        

        
    $var =checkUsuarioDev($_POST['usuario'], $_POST['pass']);
    $var2 = checkUsuarioCliente($_POST['usuario'], $_POST['pass']);
        if($var==true){
            session_start();
            $_COOKIE['usuario']=$_POST['usuario'];
            $_SESSION['usuario'] = $_POST['usuario'];
            if(comprobar_rol($_SESSION['usuario'])==0){
            header("Location: me_dev.php");
            }else{
                header("Location: /panel/index.php");
            }
        }
        else if($var2==true){
            session_start();
            $_COOKIE['usuario']=$_POST['usuario'];
            $_SESSION['usuario'] = $_POST['usuario'];
            if(comprobar_rol($_SESSION['usuario'])==0){
            header("Location: me_cliente.php");
            }else{
                header("Location: /panel/index.php");
            }
        }
    else { 
        $errores= "Usuario o contraseña erroneos.";
    }
}

?>

<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="../css/style-login.css">  
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
                Ingresar
                </span>
            </h2>
            <button class="loginBtn loginBtn--google">
                Ingresar con Google
            </button><br><br>
            <div class="errores"> <?php echo $errores ?></div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    
                    <label><input type="text" name="usuario" value="" placeholder="Usuario" class="form-control"></label>
                    <label><input type="password" name="pass" value="" placeholder="Contraseña" class="form-control"></label>
                    <div>
                        <div class="recordar">
                            <label><input type="checkbox" /> Recordar contraseña</label>
                        </div>
                        <div class="olvidar">
                            <label><a href="olvidaste.php">¿Olvidaste tu contraseña?</a></label>
                        </div>
                    </div>   <br><br>
                    <input type="submit" name="enviar" value="Ingresa" class="button-submit"><br><br>
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