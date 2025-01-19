
                    <!-- Modal para agregar producto -->
                    <div class="modal fade" id="agregarProductoModal" tabindex="-1" aria-labelledby="agregarProductoModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="agregarProductoModalLabel">Agregar Nuevo Producto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulario para agregar un producto -->
                                    <form id="formAgregarProducto" method="POST">
                                        <div class="mb-3">
                                            <label for="tipo_producto" class="form-label">Tipo de Producto</label>
                                            <input type="text" class="form-control" id="tipo_producto" name="tipo_producto" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="existencia" class="form-label">Existencia</label>
                                            <input type="number" class="form-control" id="existencia" name="existencia" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="unidad" class="form-label">Unidad</label>
                                            <select class="form-select" id="unidad" name="unidad" required>
                                                <option value="pz">Pieza</option>
                                                <option value="kg">Kilogramo</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="reposicion" class="form-label">Precio de Reposición</label>
                                            <input type="number" class="form-control" id="reposicion" name="reposicion" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="venta" class="form-label">Precio de Venta</label>
                                            <input type="number" class="form-control" id="venta" name="venta" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="descripcion" class="form-label">Descripción</label>
                                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tabla" class="form-label">Seleccionar Producto</label>
                                            <select class="form-select" id="tabla" name="tabla" required>
                                                <option value="quesos">Quesos</option>
                                                <option value="avenas">Avenas</option>
                                                <option value="licores">Licores</option>
                                                <option value="chocolates">Chocolates</option>
                                                <option value="panaderia">Panadería</option>
                                                <option value="salsas">Salsas</option>
                                                <option value="carnes_frias">Carnes frias</option>
                                                <option value="horchatas">Horchatas</option>
                                                <!-- Otros productos -->
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Agregar Producto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    <script src="/queseria/js/jquery-3.6.0.min.js"></script>


<script>

$(document).ready(function () {
    $('#formAgregarProducto').on('submit', function (e) {
        e.preventDefault(); // Prevenir el comportamiento predeterminado de enviar el formulario

        const datos = $(this).serialize(); // Serializar los datos del formulario

        $.ajax({
            url: '/queseria/agregar_producto.php', // URL del archivo PHP
            type: 'POST',
            data: datos,
            success: function (respuesta) {
                console.log(respuesta); // Verifica qué está devolviendo el servidor

                // Verifica si la respuesta contiene un mensaje de éxito
                if (respuesta.includes("Producto agregado exitosamente")) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Producto Agregado',
                        text: 'El producto ha sido agregado exitosamente.',
                        showConfirmButton: true
                    }).then(() => {
                        location.reload(); // Recargar la página para reflejar los cambios
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: respuesta, // Mostrar el mensaje de error recibido
                        showConfirmButton: true
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('Error al agregar el producto:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error al agregar el producto',
                    text: 'Hubo un error al intentar agregar el producto.',
                    showConfirmButton: true
                });
            }
        });
    });
});

</script>