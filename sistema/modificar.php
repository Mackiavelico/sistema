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

// Verificar si se ha enviado un formulario para modificar un usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los datos requeridos están presentes en la solicitud POST
    if (isset($_POST["rut"]) && isset($_POST["nombres"]) && isset($_POST["apellido_p"]) && isset($_POST["apellido_m"]) && isset($_POST["direccion"]) && isset($_POST["telefono"])) {
        $rut = $_POST["rut"];
        $nombres = $_POST["nombres"];
        $apellido_p = $_POST["apellido_p"];
        $apellido_m = $_POST["apellido_m"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];

        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();
        $conexion->Conecta();

        // Realizar la consulta de actualización
        $query = "UPDATE usuario SET nombres = '$nombres', apellido_p = '$apellido_p', apellido_m = '$apellido_m', direccion = '$direccion', telefono = '$telefono' WHERE rut = '$rut'";
        $resultado = $conexion->Ejecuta($query);

        if ($resultado) {
            echo "El usuario ha sido modificado correctamente.";
        } else {
            echo "Error al modificar el usuario.";
        }
    } else {
        echo "Faltan datos requeridos para modificar el usuario.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Verificar si se ha enviado el parámetro de rut en la URL
    if (isset($_GET["rut"])) {
        $rut = $_GET["rut"];

        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();
        $conexion->Conecta();

        // Realizar la consulta para obtener los datos del usuario
        $query = "SELECT * FROM usuario WHERE rut = '$rut'";
        $resultado = $conexion->Ejecuta($query);

        if ($resultado->num_rows == 1) {
            // Obtener los datos del usuario
            $row = $resultado->fetch_assoc();
            $nombres = $row['nombres'];
            $apellido_p = $row['apellido_p'];
            $apellido_m = $row['apellido_m'];
            $direccion = $row['direccion'];
            $telefono = $row['telefono'];
        } else {
            // No se encontró el usuario
            echo "No se encontró el usuario.";
            exit();
        }
    } else {
        echo "Falta el parámetro de rut en la URL.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
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
    <h1>Modificar Usuario</h1>
    <form action="modificar.php" method="post">
        <label for="rut">Rut:</label>
        <input type="text" name="rut" value="<?php echo $rut; ?>" readonly>
        <br>
        <label for="nombres">Nombres:</label>
        <input type="text" name="nombres" value="<?php echo $nombres; ?>">
        <br>
        <label for="apellido_p">Apellido Paterno:</label>
        <input type="text" name="apellido_p" value="<?php echo $apellido_p; ?>">
        <br>
        <label for="apellido_m">Apellido Materno:</label>
        <input type="text" name="apellido_m" value="<?php echo $apellido_m; ?>">
        <br>
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="<?php echo $direccion; ?>">
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" value="<?php echo $telefono; ?>">
        <br>
        <input type="submit" value="Guardar cambios">
    </form>
    <br>
    <p>¿Qué desea realizar?</p>
    <ul>
        <li><a href="leer.php">Leer</a></li>
        <li><a href="agregar.php">Agregar</a></li>
        <li><a href="modificar.php?rut=<?php echo urlencode($rut); ?>">Modificar</a></li>
        <li><a href="eliminar.php">Eliminar</a></li>
    </ul>

    <li>
        <ul><a href='/sistema/logout.php'>Salir de todo</a></ul>
        <ul><a href='/sistema/index.php'>Volver al index</a></ul>
    </li>
    <br>
    <footer class="fixed-bottom bg-light text-center">
        <p> &copy; José Montecinos 07/2023</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</div>
</body>

</html>