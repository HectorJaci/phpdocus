<?php
// Obtener los datos enviados desde la aplicación Android
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
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

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(array("status" => "success", "message" => "Usuario registrado exitosamente"));
} else {
    echo json_encode(array("status" => "error", "message" => "Error al registrar el usuario: " . $conn->error));
}

$conn->close();
?>
