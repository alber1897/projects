<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="css/admin-panel.css" as="style">
    <link rel="stylesheet" href="css/admin-panel.css">
    <title>Login</title>
    <?php
session_start();

// Simulación de credenciales (reemplazar con una base de datos en un entorno real)
$credenciales = array(
    'usuario' => 'admin',
    'contrasena' => '123'
);

// Verificar las credenciales del formulario de inicio de sesión
if (isset($_POST['username']) && isset($_POST['password'])) {
    $usuario_ingresado = $_POST['username'];
    $contrasena_ingresada = $_POST['password'];

    if ($usuario_ingresado === $credenciales['usuario'] && $contrasena_ingresada === $credenciales['contrasena']) {
        // Credenciales válidas, iniciar sesión
        $_SESSION['usuario'] = $usuario_ingresado;
        header("Location: cpanel.php"); // Redirigir a la página de inicio después de iniciar sesión
        exit();
    } else {
        // Credenciales inválidas
        echo "Credenciales inválidas. Inténtalo de nuevo.";
    }
}
?>
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="post">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>