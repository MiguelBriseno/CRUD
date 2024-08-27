<?php
include '../conexion/conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];

    try {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
        
        $stmt->execute();

        header('Location: ./success.php?message=Usuario%20eliminado%20con%20éxito');
        exit; 

    } catch (PDOException $e) {
        error_log($e->getMessage(), 3, '/var/log/my_app_error.log');
        echo "Error al eliminar el usuario: " . $e->getMessage();
    }

    $pdo = null;
}
?>
