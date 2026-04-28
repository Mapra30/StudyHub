<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conexion = new mysqli("localhost", "root", "", "studyhub");

if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

$nombre   = $_POST['nombre'] ?? null;
$nickname = $_POST['nickname'] ?? null;
$email    = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$date     = $_POST['date'] ?? null;

if (!$nombre || !$nickname || !$email || !$password || !$date) {
    die("⚠️ Faltan datos en el formulario.");
}

$hash = password_hash($password, PASSWORD_DEFAULT);

// 🚀 Insertar SIN fecha_registro (MySQL lo pone solo)
$sql = "INSERT INTO usuarios (nombre, nickname, correo, clave, fecha_nacimiento) 
        VALUES ('$nombre', '$nickname', '$email', '$hash', '$date')";

if ($conexion->query($sql) === TRUE) {
    echo "✅ Registro guardado correctamente en la base de datos.";
    // Cuando confirmes que funciona, puedes redirigir:
    // header("Location: registroexito.html");
    // exit();
} else {
    echo "❌ Error al guardar: " . $conexion->error;
    echo "<br>SQL: " . $sql;
}

$conexion->close();
?>
