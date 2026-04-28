<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conexion = new mysqli("localhost", "root", "Majokao2610", "studyhub");

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

// Encriptar la contraseña
$hash = password_hash($password, PASSWORD_DEFAULT);

// Insertar incluyendo fecha_registro
$sql = "INSERT INTO usuarios (nombre, nickname, correo, clave, fecha_nacimiento, fecha_registro) 
        VALUES ('$nombre', '$nickname', '$email', '$hash', '$date', NOW())";

if ($conexion->query($sql) === TRUE) {
    // ✅ Si todo salió bien, redirige a la página de éxito
    header("Location: registroexito.html");
    exit();
} else {
    echo "❌ Error al guardar: " . $conexion->error;
}

$conexion->close();
?>
