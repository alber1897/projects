<?php
session_start();
include_once("../modelo/funciones_genericas.php");
include_once("../modelo/funciones_dev.php");
$errores="";
if(isset($_POST['enviar'])){
    if(checkUsuarioSolo($_POST['usuario'])==false){
        if(checkCorreo($_POST['correo'])==false){
            
             subirFotoD($_FILES['archivo']['name'],$_FILES['archivo']['type'],$_FILES['archivo']['size'],$_FILES['archivo']['tmp_name']);
        }else{$errores="Correo ya en uso, elija otro por favor.<br>";}
    }else{
        $errores= "Usuario ya en uso, elija otro por favor.";
      }
}
?>


<html>
<head>
<title> Registro</title>
<link rel="stylesheet" href="../css/style-registro.css">  
</head>
<body>
    <div class="container">
        <div id="logo">
        <a href="index.html"><img src="../img/logo.png" ></a>

        </div>
        <div id="principal">
            <div class="form-ajustar"> 
            <h2>
                <span class="ingresar">
                Registrarse
                </span>
            </h2>
            <button class="loginBtn loginBtn--google">
                Registrarse con Google
            </button><br><br>
           <div class="errores"> <?php echo $errores ?></div>
                <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    
                    <label><input type="text" name="usuario" value="" placeholder="Nombre de usuario" class="form-control" pattern="[A-Za-z0-9]+" title="Mayusculas, minusculas y numeros solamente" required></label>
                    <label><input type="password" name="clave" value="" placeholder="Contraseña" class="form-control" pattern="[A-Za-z0-9]+" title="Mayusculas, minusculas y numeros solamente" required></label>
                     <label><input type="number" name="pin" value="" placeholder="Pin de seguridad" class="form-control" pattern="[\+]\d{2,3}[\-]\d{9}"  title="Campo de entrada solo números" required></label>
                    <label><input type="text" name="ciudad" value="" placeholder="Ciudad" class="form-control" pattern="[a-zA-Z ]{2,254}" title="Mayusculas y minusculas  solamente" required></label>
                    <label><input type="email" name="correo" value="" placeholder="Correo" class="form-control" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required></label>
                    <label><input type="date" name="fecha" value="" placeholder="Fecha de nacimiento" class="form-control" required></label>
                    <label><select name="lenguaje" value="dº" class="form-control">
                        <option value="value1">HTML</option> 
                        <option value="value2" selected>JAVA</option>
                        <option value="value3">CSS</option>
                        <option value="value3">JS</option>
                
                    </label>
                    <label><input type="number" name="precio" value="" placeholder="Precio/dia" class="form-control" required></label>
                   
                    <div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                        <input name="archivo" id="archivo" type="file" class="input-file" required/>
                        
                        Subir foto
                    </div>
                    <br><br>
                    <input type="submit" name="enviar" value="Registrarse" class="button-submit"><br><br>
               
                </form>
            </div> 
        <div>
    </div>
</body>
</html>