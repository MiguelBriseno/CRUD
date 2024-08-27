<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
    <link rel="icon" href="../assets/logo.svg" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function validateForm() {
            var name = document.getElementById('name').value.trim();
            var lastname = document.getElementById('lastname').value.trim();
            var nickname = document.getElementById('nickname').value.trim();
            var email = document.getElementById('email').value.trim();
            var phone = document.getElementById('phone').value.trim();
            var password = document.getElementById('password').value.trim();

            if (name === '' || lastname === '' || nickname === '' || email === '' || phone === '' || password === '') {
                alert('Todos los campos son obligatorios.');
                return false;
            }

            // Validación de formato de correo electrónico
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Por favor, ingresa un correo electrónico válido.');
                return false;
            }

            // Validación de formato de teléfono (opcional, aquí se usa un patrón básico)
            var phonePattern = /^\d{10}$/;
            if (!phonePattern.test(phone)) {
                alert('El teléfono debe tener 10 dígitos.');
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <form action="./users/procesar_registro.php" method="POST" onsubmit="return validateForm();">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="lastname">Apellido:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="nickname">Apodo:</label>
                <input type="text" class="form-control" id="nickname" name="nickname" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Teléfono:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
