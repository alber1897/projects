<?php
session_start();
include_once("../modelo/funciones_genericas.php");
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
     <title>Mensajes</title>
    </head>
    <body>
        <header>
            <div class="contenedor">
               <h1><a href="../index.php" style="color:#fff; text-decoration:none">MetFreelance</a></h1>
                <input type="checkbox" id="menu-bar">
                <label class="fontawesome-align-justify" for="menu-bar"></label>
                        <nav class="menu">
                             <a href="../index.php">Inicio</a>
                             <a href="me_cliente.php">Mi perfil</a>
                             <a href="me_pedidosc.php">Mis Pedidos</a>
                            <a href="cambiar_cliente.php">Cambiar datos</a>
                            <a href="contacto.php">Contacto</a>
                            <a href="logout.php">Salir</a>
                        </nav>
                    </div>
        </header>
        <section id="info">
                        
                        <h3>TUS MENSAJES PRIVADOS:</h3>
                        <div class="contenedor">
                        <?php
                            echo getMensaje($_SESSION['usuario']);
                        ?>  
                        
                        </div>
                    </section>
                
                    
                    <section id="info">
                        <h3>CONOCE ALGUNO DE NUESTROS FREELANCE</h3>
                        <div class="contenedor">
                            
                              <?php echo busquedaRandom();?>  

                        </div>
                    </section>
                    
                             <section id="info">
                        <h3>BUSCA A  LOS FREELANCE QUE SE ENCUENTRAN CERCA DE TI</h3>
                        
                        <div class="contenedor">
                            <div class="info-pers">
                                
                                <a href="../busqueda.php?ciudad=Valencia">
                                    <img src="/img-users/valencia.jpg" alt="">
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