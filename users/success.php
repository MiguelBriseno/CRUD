<?php
// success.php
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
} else {
    $message = 'Operación exitosa.';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éxito</title>
    <script>
        window.onload = function() {
            alert("<?php echo $message; ?>");
            window.location.href = '../index.php';
        };
    </script>
</head>
<body>
</body>
</html>
