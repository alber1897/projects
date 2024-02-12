<?php
session_start();
include_once("../modelo/funciones_genericas.php");
include_once("../modelo/funciones_cliente.php");
if(!isset($_SESSION['usuario'])){
    echo'<script type="text/javascript">
    alert("Debes estar logueado para acceder aquí");
    </script>';
    header('Location: login.php');
}

if(isset($_POST['changenombre'])){
    setNombreC($_SESSION['usuario'],$_POST['nombre']);
    $_SESSION['usuario']=$_POST['nombre'];
    echo'<script type="text/javascript">
    alert("Nombre cambiado con exito");
    </script>';
}
if(isset($_POST['changepin'])){
    setPinC($_SESSION['usuario'],$_POST['pin']);
    echo'<script type="text/javascript">
    alert("Pin cambiado con exito");
    </script>';
}
if(isset($_POST['changefecha'])){
    setFechaC($_SESSION['usuario'],$_POST['fecha']);
    echo'<script type="text/javascript">
    alert("Fecha cambiada con exito");
    </script>';
}
if(isset($_POST['changedireccion'])){
    setDireccionC($_SESSION['usuario'],$_POST['direccion']);
    echo'<script type="text/javascript">
    alert("Direccion cambiada con exito");
    </script>';
}
if(isset($_POST['changecorreo'])){
    setCorreoC($_SESSION['usuario'],$_POST['correo']);
    echo'<script type="text/javascript">
    alert("Correo cambiado con exito");
    </script>';
}
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">  
        <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Clientes</title>
    </head>
    <body>
        <header>
            <div class="contenedor">
                <h1><a href="../index.php" style="color:#fff; text-decoration:none">MetFreelance</a></h1>
                <input type="checkbox" id="menu-bar">
                <label class="fontawesome-align-justify" for="menu-bar"></label>
                        <nav class="menu">
                            <a href="../index.php">Inicio</a>
                            <a href="me_cliente.php">Mis datos</a>
                            <a href="me_mensajesc.php">Mis Mensajes</a>
                            <a href="contacto.php">Contacto</a>
                            <a href="logout.php">Salir</a>
                        </nav>
                    </div>
        </header>
              
        <section class="cambiar">
                    <h3>CAMBIAR DATOS PERSONALES</h3>
                  

                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="input-groups">
                                <input type="text" name="nombre" placeholder=" Cambio de Nombre" >
                                <input type="submit" class="btn btn-danger wrn-btns" name="changenombre"  value=" Cambiar ">
                            </div>
                      </form>
                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="input-groups">
                            <input type="text" name="pin" placeholder=" Cambio de Pin" > 
                            <input type="submit" class="btn btn-danger wrn-btns" name="changepin" value=" Cambiar ">
                        </div>
                      </form>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="input-groups">
                            <input type="date" name="fecha" placeholder=" Cambio de Fecha" > 
                            <input type="submit" class="btn btn-danger wrn-btns" name="changefecha" value=" Cambiar ">
                        </div>
                        </form>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <div class="input-groups">
                                <input type="text" name="direccion" placeholder=" Cambio Direccion" > 
                                <input type="submit" class="btn btn-danger wrn-btns" name="changedireccion" value=" Cambiar ">
                            </div>
                        </form>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <div class="input-groups">
                                <input type="text" name="correo" placeholder=" Cambio de Correo" > 
                                <input type="submit" class="btn btn-danger wrn-btns" name="changecorreo" value=" Cambiar ">
                            </div>
                        </form>

                    </section>
                    <section id="info">
                        <h3>OTROS FREELANCE QUE QUIZA TE INTERESEN</h3>
                        <div class="contenedor">
                            
                            <?php echo busquedaRandom();?>  
                          
                         
                      </div>
                    </section>
     
                <footer>
                    <div class="contenedor">
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