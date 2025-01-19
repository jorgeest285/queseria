<nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown d-flex align-items-center">
                            <div class="me-2">
                                <?php
                                    $saludo = ($_SESSION['user_genero'] === 'hombre') ? 'Bienvenido' : 'Bienvenida';
                                    echo '<p class="fw-semibold mb-0 text-center">' . $saludo . ', ' . $_SESSION['user_nombre'] . ' ' . $_SESSION['user_apellido'] . '</p>';
                                ?>
                            </div>
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <div class="rounded-circle avatar-initials" style="background-color: <?php echo $_SESSION['user_bg_color']; ?>; color: <?php echo $_SESSION['user_text_color']; ?>;">
                                    <?php echo $_SESSION['user_initials']; ?>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Perfil</a>
                                <a href="#" class="dropdown-item">Configuración</a>
                                <a href="#" class="dropdown-item" id="logout-link">Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>


                <!-- Script para manejar la confirmacióin de cierre de sesión -->
    <script>
        document.getElementById('logout-link').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, cerrar sesión',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/queseria/CerrarSesionController.php';
                }
            });
        });
    </script>