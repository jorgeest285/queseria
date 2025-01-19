<?php
// Incluir la configuración de la base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/queseria/conexion.php';

// Verificamos si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $tipo_producto = $_POST['tipo_producto'];
    $existencia = $_POST['existencia'];
    $unidad = $_POST['unidad'];
    $reposicion = $_POST['reposicion'];
    $venta = $_POST['venta'];
    $descripcion = $_POST['descripcion'];
    $tabla = $_POST['tabla']; // En este caso, puede ser "quesos", "licores", etc.

    // Validar si los datos son correctos, exceptuando existencia
    if (!empty($tipo_producto) && !empty($reposicion) && !empty($venta) && !empty($descripcion)) {
        // Verificar que existencia, reposicion y venta sean valores numéricos
        if (is_numeric($existencia) && is_numeric($reposicion) && is_numeric($venta)) {
            // Preparar la consulta para insertar el producto en la tabla correspondiente
            $sql = "INSERT INTO $tabla (tipo_producto, existencia, unidad, reposicion, venta, descripcion, status) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            // Usar una declaración preparada para evitar inyecciones SQL
            try {
                // Ejecutar la consulta con PDO
                $stmt = $pdo->prepare($sql);
                $status = $existencia > 0 ? 1 : 0; // Si la existencia es mayor a 0, el producto está disponible
                $stmt->execute([$tipo_producto, $existencia, $unidad, $reposicion, $venta, $descripcion, $status]);

                // Responder con un mensaje JSON de éxito
                echo json_encode(['success' => true, 'message' => 'Producto agregado exitosamente.']);
            } catch (PDOException $e) {
                // Si ocurre un error al ejecutar la consulta
                echo json_encode(['success' => false, 'message' => 'Error al agregar el producto: ' . $e->getMessage()]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Por favor, asegúrese de que los valores de existencia, reposición y venta sean números válidos.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Por favor, completa todos los campos requeridos.']);
    }
}
?>
