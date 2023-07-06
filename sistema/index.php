<!--* * Modificado: 04/07/2023 - Jose Montecinos -->

<?php
// * * Modificado: 04/07/2023 - Jose Montecinos
// Iniciamos la sesión
session_start();

// Verificar si hay un mensaje en la sesión
if (isset($_SESSION['mensaje'])) {
    echo "<p>" . $_SESSION['mensaje'] . "</p>";
    unset($_SESSION['mensaje']); // Eliminar el mensaje de la sesión
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

<>

    <div class="container">

        <form action="Login.php" method="post">
            <label for="Rut">Rut:</label>
            <input type="text" name="rut">
            <br>
            <br>
            <label for="Rut">Clave:</label>
            <input type="password" name="clave">
            <br>
            <br>
            <input type="submit" value="Ingresar">
        </form>
        <br>
        <a href='/sistema/logout.php'>Salir de todo</a>

    </div>

    <footer class="fixed-bottom bg-light text-center">
        <p> &copy; José Montecinos 07/2023</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>


</html>