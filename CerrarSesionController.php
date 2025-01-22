<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['user_id'])) {
    // Destruir todas las variables de sesión
    $_SESSION = [];

    // Destruir la cookie de sesión en el cliente
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, 
            $params["path"], $params["domain"], 
            $params["secure"], $params["httponly"]
        );
    }

    // Destruir la sesión completamente
    session_destroy();

    // Redirigir al usuario a la página de inicio de sesión con un mensaje de éxito (opcional)
    header('Location: index.php?logout=success');
    exit();
} else {
    // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header('Location: index.php');
    exit();
}
?>
