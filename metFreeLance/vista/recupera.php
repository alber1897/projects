<?php
session_start();
include_once("../modelo/funciones_genericas.php");
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
?>

<html>
<head>
<title> Recupera</title>
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
            Recuperar
                </span>
            </h2>
            <?php echo $errores ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    
                    <label><input type="password" name="password" value="" placeholder="Nueva contraseña" class="form-control"></label>
                    <label><input type="password" name="password1" value="" placeholder="Repita contraseña nueva" class="form-control"></label>
                     <br><br>
                    <input type="submit" name="enviar" value="Cambiar Contraseña" class="button-submit"><br><br>
               
                </form>
            </div> 
        <div>
    </div>
</body>
</html>