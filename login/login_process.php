<?php
include('../conexion/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

    if (!empty($email) && !empty($password)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_lastname'] = $user['lastname'];
                $_SESSION['user_nickname'] = $user['nickname'];
                $_SESSION['user_phone'] = $user['phone'];
                header('Location: ../index.php');
                exit();
            } else {
                header('Location: login.php?error=1');
                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . htmlspecialchars($e->getMessage());
        }
    } else {
        header('Location: login.php?error=2');
        exit();
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
