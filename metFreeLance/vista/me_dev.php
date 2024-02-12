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
               <h1><a href="../index.php" style="color:#fff; text-decoration:none">MetFreelance</a></h1>
                <input type="checkbox" id="menu-bar">
                <label class="fontawesome-align-justify" for="menu-bar"></label>
                        <nav class="menu">
                            <a href="../index.php">Inicio</a>
                            <a href="cambiar_dev.php">Cambiar datos</a>
                            <a href="me_pedidos.php">Mis Pedidos</a>
                            <a href="me_mensajes.php">Mis Mensajes</a>
                            <a href="contacto.php">Contacto</a>
                            <a href="logout.php">Salir</a>
                        </nav>
                    </div>
        </header>
              
                    
                    <section id="info">
                        <h3>TUS DATOS PERSONALES</h3>
                        <div class="contenedor">
                            <div class="info-pers">
                                <img src="../img-users/<?php echo getFotoDev($_SESSION['usuario']); ?>" alt="">
                                <h4>Bienvenido <?php echo $_SESSION['usuario']?></h4>
                            </div>
                           
                        </div>
                        <div class="button-login"> Ciudad: <?php echo getCiudad($_SESSION['usuario'])?></div>
                        <div class="button-login"> <?php echo getFecha($_SESSION['usuario'])?> </div>
                        <div class="button-login">Lenguaje/s: <?php echo getLenguaje($_SESSION['usuario'])?> </div>
                        <div class="button-login">  <?php echo getPrecio($_SESSION['usuario'])?> €/día</div>
                        
                        </div>
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