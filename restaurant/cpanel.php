<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300&family=Fuggles&family=Over+the+Rainbow&display=swap" rel="stylesheet">
    <link rel="preload" href="css/admin-panel.css" as="style">
    <link rel="stylesheet" href="css/admin-panel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
    <?php
session_start();
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirigir a la página de inicio de sesión si no ha iniciado sesión
    exit();
}

$usuario = $_SESSION['usuario'];
?>
</head>
<body>

    <section class="panel">
        <div class="menu">
            <h2>SECCIONES</h2>
            <div class="seccionesCajas">
                <div class="seccionEntrantes">
                    <h3> Entrantes</h3>
                     
                </div>
                <div class="seccionPatatas">
                    <h3> Patatas</h3>
                     
                </div>
                <div class="seccionAlitas">
                    <h3> Alitas</h3>
                     
                </div>

                <div class="seccionCompartir">
                    <h3> Para Compartir</h3>
                     
                </div>
                <div class="seccionEnsaladas">
                    <h3> Ensaladas</h3>
                     
                </div>
                <div class="seccionHamburguesas">
                    <h3> Hamburguesas</h3>
                     
                </div>
                <div class="seccionPostres">
                    <h3> Postres</h3>
                     
                </div>
            </div>
        </div>
        <div class="productos">


            <table>
              <thead>
                <tr>
                  <!-- <th>ID</th> -->
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Precio</th>
                  <th>Imagen</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody class="editarentrantes"></tbody>
              <tbody class="editarpatatas"></tbody>
              <tbody class="editaralitas"></tbody>
              <tbody class="editarcompartir"></tbody>
              <tbody class="editarensaladas"></tbody>
              <tbody class="editarhamburguesas"></tbody>
              <tbody class="editarpostres"></tbody>
              
            </table>
           
        </div>    
    </section>

    <script src="./js/panel.js" defer ></script>
</body>
</html>  