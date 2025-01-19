<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/queseria/conexion.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $tabla = $_POST['tabla'];

    if (is_numeric($id) && !empty($tabla)) {
        try {
            $sql = "DELETE FROM $tabla WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);

            // Respuesta JSON indicando éxito
            echo json_encode(['success' => true, 'message' => 'Producto eliminado correctamente.']);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'No se pudo eliminar el producto.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'ID inválido o tabla no especificada.']);
    }
}
?>
