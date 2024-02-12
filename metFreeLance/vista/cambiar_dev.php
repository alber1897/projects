<?php
session_start();
include_once("../modelo/funciones_genericas.php");
include_once("../modelo/funciones_dev.php");

if(!isset($_SESSION['usuario'])){
    echo'<script type="text/javascript">
    alert("Debes estar logueado para acceder aquí");
    </script>';
    header('Location: login.php');
}
if(isset($_POST['changenombre'])){
    setNombreD($_SESSION['usuario'],$_POST['nombre']);
    $_SESSION['usuario']=$_POST['nombre'];
    echo'<script type="text/javascript">
    alert("Nombre cambiado con exito");
    </script>';
}
if(isset($_POST['changepin'])){
    setPinD($_SESSION['usuario'],$_POST['pin']);
    echo'<script type="text/javascript">
    alert("Pin cambiado con exito");
    </script>';
}
if(isset($_POST['changefecha'])){
    setFechaD($_SESSION['usuario'],$_POST['fecha']);
    echo'<script type="text/javascript">
    alert("Fecha cambiada con exito");
    </script>';
}
if(isset($_POST['changeciudad'])){
    setCiudadD($_SESSION['usuario'],$_POST['ciudad']);
    echo'<script type="text/javascript">
    alert("Ciudad cambiada con exito");
    </script>';
}
if(isset($_POST['changecorreo'])){
    setCorreoD($_SESSION['usuario'],$_POST['correo']);
    echo'<script type="text/javascript">
    alert("Correo cambiado con exito");
    </script>';
}
if(isset($_POST['changeprecio'])){
    setPrecioD($_SESSION['usuario'],$_POST['precio']);
    echo'<script type="text/javascript">
    alert("Precio cambiado con exito");
    </script>';
}
if(isset($_POST['changelenguaje'])){
    setLenguajeD($_SESSION['usuario'],$_POST['correo']);
    echo'<script type="text/javascript">
    alert("Lenguaje cambiado con exito");
    </script>';
}
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">  
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Devs</title>
    </head>
    <body>
        <header>
            <div class="contenedor">
                <h1>MetFreelance</h1>
                <input type="checkbox" id="menu-bar">
                <label class="fontawesome-align-justify" for="menu-bar"></label>
                        <nav class="menu">
                            <a href="../index.php">Inicio</a>
                            <a href="me_dev.php">Mis datos</a>
                            <a href="me_mensajes.php">Mis mensajes</a>
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
                            <input type="text" name="correo" placeholder=" Cambio de Correo" >
                            <input type="submit" class="btn btn-danger wrn-btns" name="changecorreo" value=" Cambiar ">
                        </div>
                      </form>
                       
                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="input-groups">
                            <input type="text" name="ciudad" placeholder=" Cambiar Ciudad" >
                            
                            <input type="submit" class="btn btn-danger wrn-btns" name="changeciudad" value=" Cambiar ">
                        </div>
                      </form>

                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="input-groups">
                            <input type="text" name="precio" placeholder=" Cambio de Precio" >
                            <input type="submit" class="btn btn-danger wrn-btns" name="changeprecio" value=" Cambiar ">
                        </div>
                      </form>

                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="input-groups">
                            <input type="text" name="lenguaje" placeholder=" Cambio de Lenguaje" >
                            <input type="submit" class="btn btn-danger wrn-btns" name="changelenguaje" value=" Cambiar ">
                        </div>
                      </form>
                      
                       
                    </section>
        
                    <section id="info">
                        <h3>BUSCA A  LOS FREELANCE QUE SE ENCUENTRAN CERCA DE TI</h3>
                        
                        <div class="contenedor">
                            <div class="info-pers">
                                
                                <a href="busqueda.php?ciudad=Valencia">
                                    <img src="..//img-users/valencia.jpg" alt="">
                                    <h4>Valencia</h4>
                                </a>   
                            </div>
                            <div class="info-pers">
                                <a href="../busqueda.php?ciudad=Madrid">
                                    <img src="/img-users/madrid.jpg" alt="">
                                    <h4>Madrid</h4>
                                </a>
                            </div>
                            <div class="info-pers">
                                <a href="../busqueda.php?ciudad=Sevilla">
                                    <img src="/img-users/sevilla.jpg" alt="">
                                    <h4>Sevilla</h4>
                                </a>
                            </div>
                            <div class="info-pers">
                                <a href="../busqueda.php?ciudad=Barcelona">
                                    <img src="/img-users/barcelona.jpg" alt="">
                                    <h4>Barcelona</h4>
                                </a>
                            </div>
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