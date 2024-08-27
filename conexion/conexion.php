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

?>
