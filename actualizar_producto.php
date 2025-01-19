<?php
// Incluir configuración de la base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/queseria/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $tipo_producto = $_POST['tipo_producto'];
    $existencia = $_POST['existencia'];
    $unidad = $_POST['unidad'];
    $reposicion = $_POST['reposicion'];
    $venta = $_POST['venta'];
    $descripcion = $_POST['descripcion'];
    $tabla = $_POST['tabla']; // Recibir la tabla dinámica

    if (!empty($tabla) && !empty($id) && !empty($tipo_producto) && is_numeric($existencia) && is_numeric($reposicion) && is_numeric($venta)) {
        // Preparar la consulta dinámica para la tabla seleccionada
        $sql = "UPDATE $tabla SET 
                    tipo_producto = :tipo_producto, 
                    existencia = :existencia, 
                    unidad = :unidad, 
                    reposicion = :reposicion, 
                    venta = :venta, 
                    descripcion = :descripcion 
                WHERE id = :id";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':tipo_producto' => $tipo_producto,
                ':existencia' => $existencia,
                ':unidad' => $unidad,
                ':reposicion' => $reposicion,
                ':venta' => $venta,
                ':descripcion' => $descripcion,
                ':id' => $id,
            ]);

            echo json_encode(['success' => true]);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Datos incompletos o inválidos']);
    }
}

?>
