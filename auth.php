<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /queseria/404.php'); // Usa una ruta absoluta aquí
    exit();
}
?>