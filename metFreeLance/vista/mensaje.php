<?php
session_start();
include_once("../modelo/funciones_genericas.php");
if(!isset($_SESSION['usuario'])){
    echo'<script type="text/javascript">
    alert("Debes estar logueado para acceder aquí");
    </script>';
    header('Location: login.php');
}
    if(isset($_POST['enviar'])){
        $id_cliente=getUsuarioId($_SESSION['usuario']);
        enviarMensaje($id_cliente,$_SESSION['id'],$_POST['asunto'],$_POST['mensaje']);
    }
      
?>

<html>
<head>
<title>Mensajes</title>
<link rel="stylesheet" href="../css/style-login.css">  
</head>
<body>
    <div class="container">
        <div id="logo">
        <a href="/"><img src="../img/logo.png" ></a>

        </div>
        <div id="principal">
            <div class="form-ajustar"> 
            <h2>
                <span class="ingresar">
               <center> Enviar Mensaje</center>
                </span>
            </h2>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    
                   <label><input type="text" name="asunto"  placeholder="Asunto" class="form-control"></label>
                    <textarea name="mensaje" rows="10" cols="40" placeholder="Escriba aqui su mensaje"></textarea>
                    <br><br>
                    <input type="submit" name="enviar" value="Enviar" class="button-submit"><br><br>
                    <label>
                        <span class="last">
                        <a href="perfil.php?id=<?php echo $_SESSION['id']?>"><pv>¡Volver al perfil!</pv></a>
                        </span>
                 </label>
                </form>
            </div> 
        <div>
    </div>
</body>
</html>