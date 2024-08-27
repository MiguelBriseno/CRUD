<?php
include '../conexion/conexion.php'; 

$name = $_POST['name'];
$lastname = $_POST['lastname'];
$nickname = $_POST['nickname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

try {
    $sql = "INSERT INTO users (name, lastname, nickname, email, phone, password) VALUES (:name, :lastname, :nickname, :email, :phone, :password)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':nickname', $nickname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':password', $hashed_password);
    
    $stmt->execute();

    // Redirigir a una página de éxito con un parámetro en la URL
    header('Location: ./success.php?message=Registro%20exitoso');
    exit; 

} catch (PDOException $e) {
    error_log($e->getMessage(), 3, '/var/log/my_app_error.log');
    echo "Error al registrar el usuario: " . $e->getMessage();
}

$pdo = null;
?>
