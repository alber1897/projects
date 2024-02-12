<?php
session_start();
include_once("../modelo/funciones_genericas.php");


?>

<html>
<head>
<title>Contacto</title>
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
               <center> Contactanos</center>
                </span>
            </h2>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    
                    <label><input type="text" name="usuario" value="" placeholder="Nombre y Apellidos" class="form-control"></label>
                    <label><input type="text" name="asunto" value="" placeholder="Asunto" class="form-control"></label>
                    <textarea name="message" rows="10" cols="40">Escriba aqui su mensaje</textarea>
                    <br><br>
                    <input type="submit" name="enviar" value="Enviar" class="button-submit"><br><br>
                    <label>
                        <span class="last">
                            <a href="../index.php"><pv>¡Volver a la pagia principal!</pv></a>
                        </span>
                 </label>
                </form>
            </div> 
        <div>
    </div>
</body>
</html>