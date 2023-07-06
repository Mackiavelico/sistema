<?php
// * * Modificado: 04/07/2023 - Jose Montecinos
// Iniciamos la sesión
session_start();

require("Class/Conexion.php");

// Validar el inicio de sesión
if (!isset($_SESSION['rut'])) {
    // Redireccionar al formulario de inicio de sesión si no hay sesión activa
    header('Location: index.php');
    exit();
}

// Verificar si se ha enviado un formulario para eliminar un usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si el rut del usuario a eliminar está presente en la solicitud POST
    if (isset($_POST["rut"])) {
        $rut = $_POST["rut"];

        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();
        $conexion->Conecta();

        // Realizar la consulta de eliminación
        $query = "DELETE FROM usuario WHERE rut = '$rut'";
        $resultado = $conexion->Ejecuta($query);

        if ($resultado) {
            echo "El usuario ha sido eliminado correctamente.";
        } else {
            echo "Error al eliminar el usuario.";
        }
    } else {
        echo "Falta el rut del usuario a eliminar.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        body {
            background-image: url('IMG/FondoIndex.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Eliminar Usuario</h1>
        <form action="eliminar.php" method="post">
            <label for="rut">Rut:</label>
            <input type="text" name="rut">
            <input type="submit" value="Eliminar">
        </form>
        <br>
        <p>¿Qué desea realizar?</p>
        <ul>
            <li><a href="leer.php">Leer</a></li>
            <li><a href="agregar.php">Agregar</a></li>
            <li><a href="modificar.php?rut=<?php echo urlencode($rut); ?>">Modificar</a></li>
            <li><a href="eliminar.php">Eliminar</a></li>
        </ul>

        <br>
        <li>
            <ul><a href='/sistema/logout.php'>Salir de todo</a></ul>
            <ul><a href='/sistema/index.php'>Volver al index</a></ul>
        </li>
        <footer class="fixed-bottom bg-light text-center">
            <p> &copy; José Montecinos 07/2023</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </div>
</body>

</html>