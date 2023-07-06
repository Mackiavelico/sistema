<?php

// Cerrar la sesión
session_unset();
session_destroy();

// Mostrar mensaje de confirmación
$_SESSION['mensaje'] = 'Has cerrado sesión exitosamente';

// Redireccionar al formulario de inicio de sesión
header('Location: index.php');
exit();


?>