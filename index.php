<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión | Queseria el Veracruzano</title>
    <link rel="shortcut icon" href="img/logos/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/format-login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="content-global">
        <div class="contenedor">
            <div class="global-contenedor">

                <div class="login-image">
                    <img src="img/logo.png" alt="">
                </div>
                <div class="login">
                    <?php if (isset($_SESSION['error'])) : ?>
                        <script>
                            // Mostrar alerta de SweetAlert
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: '<?php echo htmlspecialchars($_SESSION['error']); ?>'
                            });
                        </script>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>
                    <div class="form-content">

                        <form action="IniciarSesionController.php" method="POST">
                            <div class="content-login">
                                <div class="input-login">
                                    <label>Correo Electrónico</label>
                                    <input class="input-email" type="email" name="txtusuario" required>
                                </div>
                                <div class="input-login">
                                    <label>Contraseña</label>
                                    <input class="input-password" type="password" name="txtpassword" required>
                                </div>
                                <div>
                                <div class="checkbox-wrapper-46">
                                    <input class="inp-cbx" id="cbx-46" type="checkbox" />
                                    <label class="cbx" for="cbx-46"><span>
                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                        </svg></span><span>Recordar datos</span>
                                    </label>
                                    </div>
                                </div>
                                <div class="contenedor-button">
                                    <button class="btniniciar" type="submit" name="btningresar">INICIAR SESIÓN</button>
                                </div>
                                <div>
                                    <a href="registro.php">
                                        Registro
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_GET['logout']) && $_GET['logout'] === 'success'): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sesión cerrada',
            text: 'Has cerrado sesión exitosamente.',
            showConfirmButton: true
        });
    </script>
<?php endif; ?>

</body>

</html>