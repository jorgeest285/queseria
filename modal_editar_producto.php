<!-- Modal de Edición de Producto -->
<div class="modal fade" id="editarProductoModal" tabindex="-1" aria-labelledby="editarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarProductoModalLabel">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                // Verificar si estamos editando un producto
                if (isset($_GET['editar'])) {
                    $id = $_GET['editar']; // Obtener el ID del producto a editar
                    $tabla = $_GET['tabla']; // Obtener el nombre de la tabla
                    $stmt = $pdo->prepare("SELECT * FROM $tabla WHERE id = ?");
                    $stmt->execute([$id]);
                    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                ?>
                <!-- Formulario de edición de producto -->
                <form action="/queseria/actualizar_producto.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $producto['id'] ?? ''; ?>">
                    <input type="hidden" name="tabla" value="<?php echo $tabla ?? 'quesos'; ?>">

                    <div class="mb-3">
                        <label for="tipo_producto" class="form-label">Tipo de Producto</label>
                        <input type="text" class="form-control" id="tipo_producto" name="tipo_producto" value="<?php echo $producto['tipo_producto'] ?? ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="existencia" class="form-label">Existencia</label>
                        <input type="number" class="form-control" id="existencia" name="existencia" value="<?php echo $producto['existencia'] ?? ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="unidad" class="form-label">Unidad</label>
                        <select class="form-select" id="unidad" name="unidad" required>
                            <option value="pz" <?php echo ($producto['unidad'] == 'pz') ? 'selected' : ''; ?>>Pieza</option>
                            <option value="kg" <?php echo ($producto['unidad'] == 'kg') ? 'selected' : ''; ?>>Kilogramo</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="reposicion" class="form-label">Reposición</label>
                        <input type="number" class="form-control" id="reposicion" name="reposicion" value="<?php echo $producto['reposicion'] ?? ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="venta" class="form-label">Venta</label>
                        <input type="number" class="form-control" id="venta" name="venta" value="<?php echo $producto['venta'] ?? ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo $producto['descripcion'] ?? ''; ?></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
