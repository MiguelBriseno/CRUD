<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user_id'])) {
    header('Location: ./login/login.php');
    exit();
}

$current_page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="icon" href="./assets/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="./index.php" class="nav-link">Inicio</a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://i.postimg.cc/VvdFcFzh/perfil.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="./index.php" class="d-block"><?= htmlspecialchars($_SESSION['user_name'].' '.$_SESSION['user_lastname']); ?></a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="./index.php?page=dashboard" class="nav-link <?= ($current_page == 'dashboard') ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="./index.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Usuarios
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?page=create_user" class="nav-link <?= ($current_page == 'create_user') ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agregar usuario</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=list_users" class="nav-link <?= ($current_page == 'list_users') ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ver usuarios</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="./login/logout.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Salir
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= ($current_page == 'dashboard') ? 'Dashboard' : ucfirst(str_replace('_', ' ', $current_page)); ?></h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <?php
                    $file_to_include = './users/' . $current_page . '.php';
                    if (file_exists($file_to_include)) {
                        include $file_to_include;
                    } else {
                        echo '<p>Contenido no encontrado.</p>';
                    }
                    ?>
                </div>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script>
</body>
</html>
