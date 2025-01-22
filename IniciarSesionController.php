<?php
session_start();
require 'conexion.php';

if (isset($_POST['btningresar'])) {
    // Sanitizar y validar entrada del usuario
    $email = filter_var($_POST['txtusuario'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['txtpassword'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            // Preparar y ejecutar consulta
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar si se encontró el usuario y la contraseña es correcta
            if ($user && password_verify($password, $user['password_hash'])) {
                // Regenerar el ID de sesión para evitar fijación de sesión
                session_regenerate_id(true);

                // Establecer variables de sesión
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_nombre'] = $user['nombre'];
                $_SESSION['user_apellido'] = $user['apellido'];
                $_SESSION['user_genero'] = $user['genero'];
                $_SESSION['user_initials'] = $user['initials'];
                $_SESSION['user_bg_color'] = $user['bg_color'];
                $_SESSION['user_text_color'] = $user['text_color'];

                // Redirigir al panel de administración
                header('Location: admin_controller.php');
                exit();
            } else {
                // Error de credenciales
                $_SESSION['error'] = "Correo o contraseña incorrectos.";
                header('Location: index.php');
                exit();
            }
        } catch (PDOException $e) {
            // Manejar errores de base de datos
            error_log("Error en la base de datos: " . $e->getMessage());
            $_SESSION['error'] = "Error al iniciar sesión. Por favor, inténtalo más tarde.";
            header('Location: index.php');
            exit();
        }
    } else {
        // Error de validación de email
        $_SESSION['error'] = "Correo electrónico no válido.";
        header('Location: index.php');
        exit();
    }
} else {
    // Acceso no autorizado al script
    header('Location: index.php');
    exit();
}
