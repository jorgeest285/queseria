<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario | Queseria el Veracruzano</title>
    <link rel="shortcut icon" href="img/logos/logo.png" type="image/x-icon">
    <!-- Incluir SweetAlert -->
    <link rel="stylesheet" href="assets/sweetalert2.min.css">
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>
    <div class="container-register">
    <div class="form">
        <form id="registerForm" action="RegistrarUsuariosController.php" method="POST">
            <div class="cont-registro">
                <div class="input-registro">
                    <label for="nombre">Nombre</label> 
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="input-registro">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" required>
                </div>
                <div class="input-registro">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-registro">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-registro">
                    <label for="confirm_password">Confirmar Contraseña</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <div class="input-registro">
                    <label for="genero">Género</label>
                    <select id="genero" name="genero" required>
                        <option value="hombre">Hombre</option>
                        <option value="mujer">Mujer</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div class="container-button">
                    <button class="btnregistro" type="submit" name="register">REGISTRARSE</button>
                </div>
                <div>
                                    <a href="index.php">
                                        Inicio
                                    </a>
                                </div>
            </div>
        </form>
    </div>
    </div>


    
    <script src="assets/sweetalert2.min.js"></script>

    <script>
  document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);
    console.log("Enviando datos:", formData); // Log para ver los datos enviados

    fetch('RegistrarUsuariosController.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Ver la respuesta del servidor
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: data.message,
                showConfirmButton: true
            }).then(() => {
                window.location.href = 'index.php'; // Redirigir al inicio después del éxito
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message,
                showConfirmButton: true
            });
        }
    })
    .catch(error => {
        console.error('Error al registrar el usuario:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un problema al intentar registrar el usuario.',
            showConfirmButton: true
        });
    });
});
    </script>
</body>
</html>
