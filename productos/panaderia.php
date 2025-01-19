<?php
session_start();
// Incluir la configuración de la base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/queseria/conexion.php';

// Consulta para obtener los productos de la tabla de quesos
$sql = "SELECT * FROM panaderia";
$stmt = $pdo->query($sql);
?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queseria el Veracruzano | Panaderia</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style-admin.css">
    <link rel="stylesheet" href="../assets/sweetalert2.min.css">
</head>

<body>
    <!-- Contenedor con la información global del sitio -->
    <div class="wrapper">
        <!-- Componente sidebar -->
        <?php include '../components/sidebar.php'; ?>
        <div class="main">
            <?php include '../components/navbar.php'; ?>
            <main class="content px-2 py-2">
                <div class="container-fluid mx-2">

                    <div>
                        <h4 class="fw-semibold py-2">Panaderia</h6>
                    </div>
                    <!-- Cargamos el modal y evitamos la redundancia -->
                    <?php include '../modal_agregar_producto.php'; ?>
                    <?php include '../editar_producto_modal.php'; ?>
                    <!-- Botón para agregar productos -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarProductoModal">
                        Agregar Producto
                    </button>
                    <!-- Tabla para mostrar los productos -->
                    <div class="py-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Panaderia</th>
                                    <th scope="col">Existencias</th>
                                    <th scope="col">Unidad</th>
                                    <th scope="col">Reposición</th>
                                    <th scope="col">Venta</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                $stmt = $pdo->query("SELECT * FROM panaderia"); // Ejecutar la consulta
                                if ($stmt->rowCount() > 0): // Usar rowCount() para contar las filas
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): // Obtener los resultados
                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['id']; ?></th>
                                            <td><?php echo $row['tipo_producto']; ?></td>
                                            <td><?php echo $row['existencia']; ?></td>
                                            <td><?php echo $row['unidad']; ?></td>
                                            <td><?php echo $row['reposicion']; ?></td>
                                            <td><?php echo $row['venta']; ?></td>
                                            <td><?php echo $row['descripcion']; ?></td>
                                            <td><?php echo $row['existencia'] > 0 ? 'Disponible' : 'Agotado'; ?></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-warning btn-sm" onclick="cargarDatosProducto(<?php echo $row['id']; ?>, 'panaderia');">Editar</button>
                                                <form onsubmit="event.preventDefault(); eliminarProducto(<?php echo $row['id']; ?>, 'panaderia');">
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    endwhile;
                                else:
                                    ?>
                                    <tr>
                                        <td colspan="8">No hay productos registrados.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
            </main>

            <!-- Footer -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-2">
                                <a href="#" class="text-muted">
                                    <p class="fw-bold text-size">©2025 QUESERIA - DERECHOS RESERVADOS</p>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/acciones.js"></script>
    <script src="../assets/sweetalert2.min.js"></script>
    <!-- Jquery -->
    <script src="../js/jquery-3.6.0.min.js"></script>

</body>

</html>