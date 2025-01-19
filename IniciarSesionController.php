<?php
session_start();
require 'conexion.php';

if (isset($_POST['btningresar'])) {
    $email = filter_var($_POST['txtusuario'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['txtpassword'];

    // Validación del email y contraseña
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            // Credenciales correctas, iniciar sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_nombre'] = $user['nombre'];
            $_SESSION['user_apellido'] = $user['apellido'];
            $_SESSION['user_genero'] = $user['genero'];
            $_SESSION['user_initials'] = $user['initials'];
            $_SESSION['user_bg_color'] = $user['bg_color'];
            $_SESSION['user_text_color'] = $user['text_color'];
            header('Location: admin_controller.php');
            exit();
        } else {
// Credenciales incorrectas
    $_SESSION['error'] = "Correo o contraseña incorrectos";
        }
    } else {
        $_SESSION['error'] = "Correo electrónico no válido";
    }

    // Redirigir de vuelta al formulario de inicio de sesión con un mensaje de error
    header('Location: index.php');
    exit();
} else {
    // Si el script se accede directamente, redirigir al formulario de inicio de sesión
    header('Location: index.php');
    exit();
}
?>
