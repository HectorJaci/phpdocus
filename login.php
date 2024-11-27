<?php
// Obtener los datos enviados desde la aplicación Android
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nombre_de_tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta para verificar si el usuario existe
$sql = "SELECT * FROM usuarios WHERE correo = '$usuario' AND contraseña = '$contraseña'";
$result = $conn->query($sql);

// Verificar si el usuario existe
if ($result->num_rows > 0) {
    // Usuario encontrado
    echo json_encode(array("status" => "success", "message" => "Login exitoso"));
} else {
    // Usuario no encontrado
    echo json_encode(array("status" => "error", "message" => "Usuario o contraseña incorrectos"));
}

$conn->close();
?>
