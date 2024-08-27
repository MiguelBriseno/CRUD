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

try {
    $stmt = $pdo->query("SELECT id, name, lastname, nickname, email, phone FROM users");
    $users = $stmt->fetchAll();
} catch (PDOException $e) {
    echo 'Error al obtener usuarios: ' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Usuarios</title>
    <link rel="icon" href="../assets/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .table-responsive {
            width: 100%;
        }
        table {
            width: 100%;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Nickname</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['id']) ?></td>
                                        <td><?= htmlspecialchars($user['name']) ?></td>
                                        <td><?= htmlspecialchars($user['lastname']) ?></td>
                                        <td><?= htmlspecialchars($user['nickname']) ?></td>
                                        <td><?= htmlspecialchars($user['email']) ?></td>
                                        <td><?= htmlspecialchars($user['phone']) ?></td>
                                        <td>
                                            <a href="./users/update_user.php?id=<?= htmlspecialchars($user['id']) ?>" class="btn btn-warning btn-md">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="./users/delete_user.php?id=<?= htmlspecialchars($user['id']) ?>" class="btn btn-danger btn-md" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script>
</body>
</html>
