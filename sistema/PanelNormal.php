<?php
// * * Modificado: 04/07/2023 - Jose Montecinos
//Iniciamos la sesión
session_start();

require("Class/Conexion.php");

// Crear una instancia de la clase Conexion
$conexion = new Conexion();
$conexion->Conecta();

// Validar el inicio de sesión
if (!isset($_SESSION['rut'])) {
    // Redireccionar al formulario de inicio de sesión si no hay sesión activa
    header('Location: index.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
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
        <h1>Bienvenido, <?php echo $_SESSION['rut']; ?>!</h1>
        <p>Esta es una página protegida que solo puede ser accedida después de iniciar sesión.</p>

        <br>

        <p>A continuación se muestran los datos que hay en la base de datos</p>

        <br>
        <?php
        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();
        $conexion->Conecta();

        $consulta = "SELECT * FROM usuario";

        $resultado = $conexion->Ejecuta($consulta);

        // Verificar si hay registros en el resultado
        if ($resultado->num_rows > 0) {
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>RUT</th>
                        <th>Nombres</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Recorrer los registros con un bucle while
                    while ($row = $resultado->fetch_assoc()) {
                        // Acceder a los datos de cada registro
                        $rut = $row['rut'];
                        $nombres = $row['nombres'];
                        $apellido_p = $row['apellido_p'];
                        $apellido_m = $row['apellido_m'];
                        $direccion = $row['direccion'];
                        $telefono = $row['telefono'];

                        // Imprimir los datos en filas de la tabla
                        echo "<tr>";
                        echo "<td>" . $rut . "</td>";
                        echo "<td>" . $nombres . "</td>";
                        echo "<td>" . $apellido_p . "</td>";
                        echo "<td>" . $apellido_m . "</td>";
                        echo "<td>" . $direccion . "</td>";
                        echo "<td>" . $telefono . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
            // Si no hay registros, mostrar un mensaje
            echo "<p>No se encontraron registros en la base de datos.</p>";
        }
        ?>

        <p>NO puede.... (Agregar, Modificar ni Eliminar)</p>
        <p>Sólo se le permite visualizar</p>

        <br>

        <li>
            <ul><a href='/sistema/logout.php'>Salir de todo</a></ul>
            <ul><a href='/sistema/index.php'>Volver al index</a></ul>
        </li>
<br>
    </div>
    <footer class="fixed-bottom bg-light text-center">
        <p> &copy; José Montecinos 07/2023</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>