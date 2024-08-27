<?php
$host = 'localhost'; 
$database = 'crud'; 
$user = 'admin'; 
$pass = 'SMMJ150695abb..p'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log($e->getMessage(), 3, '/var/log/my_app_error.log');
    echo "Error de conexión: " . $e->getMessage();
    exit();
}

if (isset($_GET['id'])) {
    $user_id = (int)$_GET['id'];
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch();
    } catch (PDOException $e) {
        echo 'Error al obtener usuario: ' . $e->getMessage();
        exit();
    }
} else {
    echo 'ID de usuario no proporcionado.';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    try {
        $stmt = $pdo->prepare("UPDATE users SET name = ?, lastname = ?, nickname = ?, email = ?, phone = ? WHERE id = ?");
        $stmt->execute([$name, $lastname, $nickname, $email, $phone, $user_id]);
        header('Location: ./success.php?message=Usuario%20actualizado%20exitosamente');
        exit; 
    } catch (PDOException $e) {
        echo 'Error al actualizar usuario: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link rel="icon" href="../assets/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Actualizar Usuario</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
            </div>
            <div class="form-group">
                <label for="lastname">Apellido</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?= htmlspecialchars($user['lastname']) ?>" required>
            </div>
            <div class="form-group">
                <label for="nickname">Nickname</label>
                <input type="text" class="form-control" id="nickname" name="nickname" value="<?= htmlspecialchars($user['nickname']) ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
