<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../assets/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .error-message {
            color: red;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center mb-4">Iniciar sesión</h2>
        <form id="loginForm" action="./login_process.php" method="POST">
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="error-message" id="emailError"></div>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="error-message" id="passwordError"></div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
        </form>
        <?php
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger mt-3" role="alert">Correo electrónico o contraseña incorrectos.</div>';
        }
        ?>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            var isValid = true;
            
            document.getElementById('emailError').textContent = '';
            document.getElementById('passwordError').textContent = '';
            
            var email = document.getElementById('email').value;
            if (!email) {
                document.getElementById('emailError').textContent = 'Por favor, ingrese su correo electrónico.';
                isValid = false;
            } else if (!validateEmail(email)) {
                document.getElementById('emailError').textContent = 'Por favor, ingrese un correo electrónico válido.';
                isValid = false;
            }

            var password = document.getElementById('password').value;
            if (!password) {
                document.getElementById('passwordError').textContent = 'Por favor, ingrese su contraseña.';
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        });

        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
