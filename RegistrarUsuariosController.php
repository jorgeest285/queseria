<?php
session_start();
require 'conexion.php';

function getInitials($name, $surname) {
    return strtoupper($name[0] . $surname[0]);
}

function getRandomColorAndText() {
    $r = rand(0, 255);
    $g = rand(0, 255);
    $b = rand(0, 255);

    // Calcular luminancia
    $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;

    // Determinar el color del texto según la luminancia
    $textColor = $luminance > 0.5 ? '#000000' : '#FFFFFF';

    return [
        'background' => sprintf("#%02x%02x%02x", $r, $g, $b),
        'text' => $textColor
    ];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si las variables POST necesarias existen
    if (isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password'], $_POST['confirm_password'], $_POST['genero'])) {
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $genero = $_POST['genero'];

        // Validar el email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['success' => false, 'message' => 'Correo electrónico no válido']);
            exit();
        }

        // Verificar que las contraseñas coincidan
        if ($password !== $confirm_password) {
            echo json_encode(['success' => false, 'message' => 'Las contraseñas no coinciden']);
            exit();
        }

        // Hashear la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Generar iniciales y colores
        $initials = getInitials($nombre, $apellido);
        $colors = getRandomColorAndText();
        $bgColor = $colors['background'];
        $textColor = $colors['text'];

        // Insertar el usuario en la base de datos
        try {
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, apellido, email, password_hash, genero, initials, bg_color, text_color) VALUES (:nombre, :apellido, :email, :password, :genero, :initials, :bg_color, :text_color)");
            $stmt->execute([
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'password' => $hashed_password,
                'genero' => $genero,
                'initials' => $initials,
                'bg_color' => $bgColor,
                'text_color' => $textColor
            ]);
            echo json_encode(['success' => true, 'message' => 'Usuario registrado exitosamente']);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Error al registrar el usuario: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Formulario no enviado, datos incompletos']);
    }
    exit();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit();
}
?>
