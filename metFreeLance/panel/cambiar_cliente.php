<?php
session_start();
include_once("modelo/funciones.php");
include_once("modelo/funciones_cliente.php");

if(isset($_GET['user'])){
    $_SESSION['user']=$_GET['user'];
}

if(isset($_POST['changenombre'])){
    setNombreC($_SESSION['user'],$_POST['nombre']);
    
    echo'<script type="text/javascript">
    alert("Nombre cambiado con exito");
    </script>';
    header('Location: index.php');
}
if(isset($_POST['changepin'])){
    setPinC($_SESSION['user'],$_POST['pin']);
    echo'<script type="text/javascript">
    alert("Pin cambiado con exito");
    </script>';
    header('Location: index.php');
}
if(isset($_POST['changefecha'])){
    setFechaC($_SESSION['user'],$_POST['fecha']);
    echo'<script type="text/javascript">
    alert("Fecha cambiada con exito");
    </script>';
    header('Location: index.php');
}
if(isset($_POST['changedireccion'])){
    setDireccionC($_SESSION['user'],$_POST['direccion']);
    echo'<script type="text/javascript">
    alert("Direccion cambiada con exito");
    </script>';
    header('Location: index.php');
}
if(isset($_POST['changecorreo'])){
    setCorreoC($_SESSION['user'],$_POST['correo']);
    echo'<script type="text/javascript">
    alert("Correo cambiado con exito");
    </script>';
    header('Location: index.php');
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
        <title>Panel - Clientes</title>
    </head>
    <body>
        <header>
            <div class="contenedor">
                <h1><a href="../index.php" style="color:#fff; text-decoration:none">MetFreelance</a></h1>
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
              
        <section class="cambiar">
                    <h3>CAMBIAR DATOS PERSONALES</h3>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="input-groups">
                                <input type="text" name="nombre" placeholder="Nombre: <?php echo getNombre($_SESSION['user']);?>" >
                                <input type="submit" class="btn btn-danger wrn-btns" name="changenombre"  value=" Cambiar ">
                            </div>
                      </form>
                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="input-groups">
                            <input type="text" name="pin" placeholder="Pin: <?php echo getPin($_SESSION['user']);?>" > 
                            <input type="submit" class="btn btn-danger wrn-btns" name="changepin" value=" Cambiar ">
                        </div>
                      </form>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="input-groups">
                            <input type="date" name="fecha" placeholder="<?php echo getFecha($_SESSION['user']);?>" > 
                            <input type="submit" class="btn btn-danger wrn-btns" name="changefecha" value=" Cambiar ">
                        </div>
                        </form>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <div class="input-groups">
                                <input type="text" name="direccion" placeholder="Direccion: <?php echo getDireccion($_SESSION['user']);?>" > 
                                <input type="submit" class="btn btn-danger wrn-btns" name="changedireccion" value=" Cambiar ">
                            </div>
                        </form>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <div class="input-groups">
                                <input type="text" name="correo" placeholder="Correo: <?php echo getCorreo($_SESSION['user']);?>" > 
                                <input type="submit" class="btn btn-danger wrn-btns" name="changecorreo" value=" Cambiar ">
                            </div>
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