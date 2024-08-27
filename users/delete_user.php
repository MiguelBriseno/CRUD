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
    $id = $_GET['id'];
    
    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        // Redirigir a una página de éxito con un parámetro en la URL
        header('Location: ./success.php?message=Usuario%20eliminado%20correctamente');
        exit; 
    } catch (PDOException $e) {
        echo 'Error al eliminar el usuario: ' . $e->getMessage();
    }
} else {
    echo "ID no especificado.";
}

?>
