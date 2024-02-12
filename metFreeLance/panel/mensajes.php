<?php
session_start();
include_once("modelo/funciones.php");

$eliminado="";
if(isset($_SESSION['eliminado'])){
    $eliminado=$_SESSION['eliminado'];
}
?>

<html>
    <head>
        <link rel="stylesheet" href="css/style.css">  
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Panel - Mensajes</title>
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
                        <h3>MENSAJES DE USUARIOS</h3><br>
                        <h7> <?php echo $eliminado;
                            session_destroy();
                       ?></h7><br>
                        <div class="contenedor">
                            <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th>Id</th>
                                <th>Remitente</th>
                                <th>Destinatario</th>
                                <th>Asunto</th>
                                <th>Contenido</th>
                                <th>Borrar</th>
                                </tr>
                            </thead>
                               <?php getMensajes(); ?>
                            </table> 
                        </div>
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