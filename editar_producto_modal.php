<!-- Modal para editar producto -->
<div class="modal fade" id="editarProductoModal" tabindex="-1" aria-labelledby="editarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarProductoModalLabel">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarProducto" method="POST">
                    <input type="hidden" id="editar_id" name="id">
                    <input type="hidden" id="editar_tabla" name="tabla">
                    <div class="mb-3">
                        <label for="editar_tipo_producto" class="form-label">Tipo de Producto</label>
                        <input type="text" class="form-control" id="editar_tipo_producto" name="tipo_producto" required>
                    </div>
                    <div class="mb-3">
                        <label for="editar_existencia" class="form-label">Existencia</label>
                        <input type="number" class="form-control" id="editar_existencia" name="existencia" required>
                    </div>
                    <div class="mb-3">
                        <label for="editar_unidad" class="form-label">Unidad</label>
                        <select class="form-select" id="editar_unidad" name="unidad" required>
                            <option value="pz">Pieza</option>
                            <option value="kg">Kilogramo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editar_reposicion" class="form-label">Precio de Reposición</label>
                        <input type="number" class="form-control" id="editar_reposicion" name="reposicion" required>
                    </div>
                    <div class="mb-3">
                        <label for="editar_venta" class="form-label">Precio de Venta</label>
                        <input type="number" class="form-control" id="editar_venta" name="venta" required>
                    </div>
                    <div class="mb-3">
                        <label for="editar_descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="editar_descripcion" name="descripcion" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="/queseria/js/jquery-3.6.0.min.js"></script>

<script>
function cargarDatosProducto(id, tabla) {
    $.ajax({
        url: '/queseria/obtener_producto.php',
        type: 'GET',
        data: { id: id, tabla: tabla },
        success: function (data) {
            const producto = JSON.parse(data);
            $('#editar_id').val(producto.id);
            $('#editar_tipo_producto').val(producto.tipo_producto);
            $('#editar_existencia').val(producto.existencia);
            $('#editar_unidad').val(producto.unidad);
            $('#editar_reposicion').val(producto.reposicion);
            $('#editar_venta').val(producto.venta);
            $('#editar_descripcion').val(producto.descripcion);
            $('#editar_tabla').val(tabla); // Asignar el valor de la tabla al input oculto
            $('#editarProductoModal').modal('show');
        },
        error: function (error) {
            console.error('Error al cargar los datos:', error);
        }
    });
}

$(document).ready(function () {
    $('#formEditarProducto').on('submit', function (e) {
        e.preventDefault(); // Prevenir recarga de la página
        const datos = $(this).serialize(); // Serializar datos del formulario

        $.ajax({
    url: '/queseria/actualizar_producto.php', // URL del archivo PHP
    type: 'POST',
    data: datos,
    success: function (respuesta) {
        console.log(respuesta); // Verifica qué está devolviendo el servidor
        try {
            const data = JSON.parse(respuesta);
            if (data.success) {
                // Notificación de SweetAlert con un tiempo adecuado para verla
                Swal.fire({
                    icon: 'success',
                    title: 'Producto actualizado correctamente',
                    text: 'El producto ha sido actualizado exitosamente.',
                    showConfirmButton: true, // Hacer que se vea el botón de confirmación
                    timer: 3000 // Tiempo en milisegundos que la notificación permanecerá visible
                }).then(() => {
                    // Recargar la página solo después de que la notificación haya desaparecido
                    location.reload();
                });
            } else {
                // Notificación de SweetAlert en caso de error
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message,
                    showConfirmButton: true
                });
            }
        } catch (error) {
            console.error('Error al parsear la respuesta:', respuesta);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error al actualizar.',
                showConfirmButton: true
            });
        }
    },
    error: function (xhr, status, error) {
        console.error('Error al actualizar el producto:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error al actualizar el producto',
            text: error,
            showConfirmButton: true
        });
    }
});




    });
});
</script>
