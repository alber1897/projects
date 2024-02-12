<?php
session_start();
include_once("modelo/funciones_genericas.php");
if(!isset($_SESSION['usuario'])){
    $menu=menuOut();
}else{
    
   $menu=checkUsuarioMenu($_SESSION['usuario']);
}
if(isset($_POST['enviar']) ){
    
   $_SESSION['city']=$_POST['city'];
   $_SESSION['price']=$_POST['price'];
   $_SESSION['lenguaje']=$_POST['lenguaje'];
   header("Location: busqueda.php");
}
?>

<html>
    <head>
        <link rel="stylesheet" href="css/style.css">  
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
                            <?php echo $menu; ?>
                        </nav>
                    </div>
        </header>
                <section id="info_index">
                    <div class="contenedor">
                        
                        
                            <section class="search-sec">
                                <div class="container">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                                        <input type="text" class="form-control search-slt" placeholder="Introduzca ciudad" name="city">
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                                        <input type="text" class="form-control search-slt" placeholder="Precio aproximado" name="price"> 
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                                        <select class="form-control search-slt" id="exampleFormControlSelect1" name="lenguaje">
                                                            <option>html</option>
                                                            <option>Java</option>
                                                            <option>Php</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                                        <input type="submit" class="btn btn-danger wrn-btn" name="enviar" value="Buscar">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <h3>Encuentra Freelance que puedan ayudarte</h3>
                            </section>
                            
                        </div>
                    

                </section>
                
                    
                    <section id="info">
                        <h3>CONOCE ALGUNO DE NUESTROS FREELANCE</h3>
                        <div class="contenedor">
                            
                              <?php echo busquedaRandomIndex();?>  
                            
                           
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