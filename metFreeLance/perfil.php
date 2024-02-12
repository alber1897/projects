<?php
session_start();
include_once("modelo/funciones_genericas.php");
$_SESSION['id']=$_GET['id'];

if(!isset($_SESSION['usuario'])){
    $menu=menuOut();
}else{
    
   $menu=checkUsuarioMenu($_SESSION['usuario']);
}
?>


<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">  
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        <header>
            <div class="contenedor">
                <h1><a href="index.php" style="color:#fff; text-decoration:none">MetFreelance</a></h1>
                <input type="checkbox" id="menu-bar">
                <label class="fontawesome-align-justify" for="menu-bar"></label>
                        <nav class="menu">
                        <?php echo $menu;?>
                        </nav>
                    </div>
        </header>
              
                    
                    <section id="info">
                        
                        <div class="contenedor">
                            <div class="info-pers">
                                <img src="../img-users/<?php echo getFotoId($_SESSION['id']); ?>" alt="">
                                <h4><?php echo getNombreId($_SESSION['id']); ?></h4>
                            </div>
                           
                        </div>
                        <div class="button-login">Ciudad: <?php echo getCiudadid($_SESSION['id'])?></div>
                        <div class="button-login"> <?php echo getFechaId($_SESSION['id'])?> </div>
                        <div class="button-login">Lenguaje/s: <?php echo getLenguajeId($_SESSION['id'])?> </div>
                        <div class="button-login">  <?php echo getPrecioId($_SESSION['id'])?> €/día</div>
                        <br><br>
                        <a href='vista/pedido.php?id=<?php echo $_SESSION['id']?> '><input type="button" name="pedido" value="Hacer pedido" class="button-submit1"></a>
                        <a href='vista/mensaje.php?id=<?php echo $_SESSION['id']?> '><input type="button" name="mensaje" value="Enviar Mensaje" class="button-submit1"></a>
                  
                    </section>
        
                    <section id="info">
                        <h3>OTROS FREELANCE QUE QUIZA TE INTERESEN</h3>
                        <div class="contenedor">
                            
                            <?php echo busquedaRandom2();?>  
                          
                         
                      </div>
                    </section>
     
                             <section id="info">
                        <h3>BUSCA A  LOS FREELANCE QUE SE ENCUENTRAN CERCA DE TI</h3>
                        
                        <div class="contenedor">
                            <div class="info-pers">
                                
                                <a href="busqueda.php?ciudad=Valencia">
                                    <img src="/img-users/valencia.jpg" alt="">
                                    <h4>Valencia</h4>
                                </a>   
                            </div>
                            <div class="info-pers">
                                <a href="busqueda.php?ciudad=Madrid">
                                    <img src="/img-users/madrid.jpg" alt="">
                                    <h4>Madrid</h4>
                                </a>
                            </div>
                            <div class="info-pers">
                                <a href="busqueda.php?ciudad=Sevilla">
                                    <img src="/img-users/sevilla.jpg" alt="">
                                    <h4>Sevilla</h4>
                                </a>
                            </div>
                            <div class="info-pers">
                                <a href="busqueda.php?ciudad=Barcelona">
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