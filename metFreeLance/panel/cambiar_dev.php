<?php
session_start();
include_once("modelo/funciones.php");
include_once("modelo/funciones_dev.php");

if(isset($_GET['user'])){
    $_SESSION['user']=$_GET['user'];
}

if(isset($_POST['changenombre'])){
    setNombreD($_SESSION['user'],$_POST['nombre']);
    
    echo'<script type="text/javascript">
    alert("Nombre cambiado con exito");
    </script>';
    header('Location: devs.php');
}
if(isset($_POST['changepin'])){
    setPinD($_SESSION['user'],$_POST['pin']);
    echo'<script type="text/javascript">
    alert("Pin cambiado con exito");
    </script>';
    header('Location: devs.php');
}
if(isset($_POST['changefecha'])){
    setFechaD($_SESSION['user'],$_POST['fecha']);
    echo'<script type="text/javascript">
    alert("Fecha cambiada con exito");
    </script>';
    header('Location: devs.php');
}
if(isset($_POST['changeciudad'])){
    setCiudadD($_SESSION['user'],$_POST['ciudad']);
    echo'<script type="text/javascript">
    alert("Ciudad cambiada con exito");
    </script>';
    header('Location: devs.php');
}
if(isset($_POST['changecorreo'])){
    setCorreoD($_SESSION['user'],$_POST['correo']);
    echo'<script type="text/javascript">
    alert("Correo cambiado con exito");
    </script>';
    header('Location: devs.php');
}
if(isset($_POST['changeprecio'])){
    setPrecioD($_SESSION['user'],$_POST['precio']);
    echo'<script type="text/javascript">
    alert("Precio cambiado con exito");
    </script>';
    header('Location: devs.php');
}
if(isset($_POST['changelenguaje'])){
    setLenguajeD($_SESSION['user'],$_POST['correo']);
    echo'<script type="text/javascript">
    alert("Lenguaje cambiado con exito");
    </script>';
    header('Location: devs.php');
}
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">  
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Panel - Devs</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                            <input type="date" name="fecha" placeholder=" Cambio de Fecha" >
                            <input type="submit" class="btn btn-danger wrn-btns" name="changefecha" value=" Cambiar ">
                        </div>
                      </form>

                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="input-groups">
                            <input type="text" name="correo" placeholder="Correo: <?php echo getCorreo($_SESSION['user']);?>" >
                            <input type="submit" class="btn btn-danger wrn-btns" name="changecorreo" value=" Cambiar ">
                        </div>
                      </form>
                       
                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="input-groups">
                            <input type="text" name="ciudad" placeholder="Ciudad: <?php echo getCiudad($_SESSION['user']);?>" >
                            
                            <input type="submit" class="btn btn-danger wrn-btns" name="changeciudad" value=" Cambiar ">
                        </div>
                      </form>

                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="input-groups">
                            <input type="text" name="precio" placeholder="Precio: <?php echo getPrecio($_SESSION['user']);?>" >
                            <input type="submit" class="btn btn-danger wrn-btns" name="changeprecio" value=" Cambiar ">
                        </div>
                      </form>

                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="input-groups">
                            <input type="text" name="lenguaje" placeholder="Lenguaje: <?php echo getLenguaje($_SESSION['user']);?>" >
                            <input type="submit" class="btn btn-danger wrn-btns" name="changelenguaje" value=" Cambiar ">
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