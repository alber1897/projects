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
       pedido($id_cliente,$_SESSION['id'],$_POST['fecha']);
        }
?>

<html>
<head>
<title>Pedidos</title>
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
               <center>Hacer pedido</center>
               
                </span>
            </h2>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    Fecha limite de entrega:<br>
                    <label><input type="date" name="fecha" value=""  class="form-control"></label>
                 <textarea name="message" rows="10" cols="40" placeholder="Añadir observaciones"></textarea>
                    <br><br>
                    <input type="submit" name="enviar" value="Hacer pedido" class="button-submit"><br><br>
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