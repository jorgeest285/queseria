<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/queseria/config.php';

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['user_id'])) {
    // Destruir todas las variables de sesión
    session_unset();
    // Destruir la sesión
    session_destroy();
    // Redirigir al usuario a la página de inicio de sesión
    header('Location: /queseria/index.php');
    exit();
} else {
    // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header('Location: /queseria/index.php');
    exit();
}
?>
