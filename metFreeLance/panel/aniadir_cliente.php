<?php
session_start();
include_once("modelo/funciones.php");
include_once("modelo/funciones_cliente.php");

if(isset($_POST['enviar'])){
    if(checkUsuarioSolo($_POST['usuario'])==false){
        if(checkCorreo($_POST['correo'])==false){
        subirFoto($_FILES['archivo']['name'],$_FILES['archivo']['type'],$_FILES['archivo']['size'],$_FILES['archivo']['tmp_name']);
        }else{$errores="Correo ya en uso, elija otro por favor.<br>";}
    }else{
        $errores= "Usuario ya en uso, elija otro por favor.";
      }
}
?>

<html>
    <head>
    <link rel="stylesheet" href="css/style-registro.css"> 
        <link rel="stylesheet" href="css/style.css">  
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Panel - Clientes</title>
    </head>
    <body>
        <header>
            <div class="contenedor">
                <h1>MetFreelance</h1>
                <input type="checkbox" id="menu-bar">
                <label class="fontawesome-align-justify" for="menu-bar"></label>
                        <nav class="menu">
                        <a href='index.php'>Clientes</a>
                        <a href='devs.php'>Devs</a>
                        <a href='mensajes.php'>Mensajes</a>
                        <a href='pedidos.php'>Pedidos</a>
                        </nav>
                    </div>
        </header>
              
                
                    
                    <section id="info">
                        <h3>NUEVO USUARIO</h3><br>
                       
            <div class="form-ajustar"> 
           
            
                <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    
                    <label><input type="text" name="usuario" value="" placeholder="Nombre de usuario" class="form-control" pattern="[A-Za-z0-9]+" title="Mayusculas, minusculas y numeros solamente" required></label>
                    <label><input type="password" name="pass" value="" placeholder="Contraseña" class="form-control" pattern="[A-Za-z0-9]+" title="Mayusculas, minusculas y numeros solamente" required></label>
                    <label><input type="number" name="pin" value="" placeholder="Pin de seguridad" class="form-control" pattern="[\+]\d{2,3}[\-]\d{9}"  title="Campo de entrada solo números" required></label>
                    <label><input type="text" name="direccion" value="" placeholder="Direccion" class="form-control" pattern="[a-zA-Z ]{2,254}" required></label>
                    <label><input type="email" name="correo" value="" placeholder="Correo" class="form-control" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required></label>
                    <label><input type="date" name="fecha" value="" placeholder="Fecha de nacimiento" class="form-control" required></label>
                    
                   <center> <div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                        <input name="archivo" id="archivo" type="file" class="input-file" required/>
                        
                        Subir foto
                    </div></center>
                    <br><br>
                    <input type="submit" name="enviar" value="Crear nuevo usuario" class="button-submit"><br><br>
               
                </form>
           
                    </section>
                    
                   
                
                
                <footer>
                    <div class="contenedorf">
                        <p class="copy">MetFrelance &copy; 2020</p>
                        <div class="sociales">
                            <a class="fontawesome-facebook-sign" href="#"></a>
                            <a class="fontawesome-twitter" href="#"></a>
                            <a class="fontawesome-camera-retro" href="#"></a>
                            <a class="fontawesome-google-plus-sign" href="#"></a>
                        </div>
                    </div>
                </footer>
    </body>
</html>