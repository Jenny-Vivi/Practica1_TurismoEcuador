<?php
// Recoger los datos enviados por el formulario mediante POST con trim()
$nombre  = isset($_POST['nombre'])  ? trim($_POST['nombre'])  : '';
$correo  = isset($_POST['correo'])  ? trim($_POST['correo'])  : '';
$asunto  = isset($_POST['asunto'])  ? trim($_POST['asunto'])  : '';
$mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

// VALIDACION EN EL SERVIDOR 

// Validar campos obligatorios vacios
if (empty($nombre) || empty($correo) || empty($asunto) || empty($mensaje)) {
    die("<h3 style='color: red;'>Error: Todos los campos son obligatorios y no pueden contener solo espacios.</h3><a href='contacto.html'>Volver al formulario</a>");
}

// Validar formato del email
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    die("<h3 style='color: red;'>Error: El formato del correo electrónico no es válido.</h3><a href='contacto.html'>Volver al formulario</a>");
}

// Validar longitudes maximas
if (mb_strlen($nombre) > 100) {
    die("<h3 style='color: red;'>Error: El nombre no puede superar los 100 caracteres.</h3><a href='contacto.html'>Volver al formulario</a>");
}

if (mb_strlen($correo) > 150) {
    die("<h3 style='color: red;'>Error: El correo no puede superar los 150 caracteres.</h3><a href='contacto.html'>Volver al formulario</a>");
}

if (mb_strlen($asunto) > 150) {
    die("<h3 style='color: red;'>Error: El asunto no puede superar los 150 caracteres.</h3><a href='contacto.html'>Volver al formulario</a>");
}

if (mb_strlen($mensaje) > 2000) {
    die("<h3 style='color: red;'>Error: El mensaje no puede superar los 2000 caracteres.</h3><a href='contacto.html'>Volver al formulario</a>");
}

// 3. Conexion a la base de datos
$servidor   = "localhost";
$usuario    = "root";
$password   = "";
$base_datos = "turismo_db";

$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Consulta Preparada con MySQLi
$sql = "INSERT INTO contactos (nombre, correo, asunto, mensaje, fecha) VALUES (?, ?, ?, ?, NOW())";
$stmt = $conexion->prepare($sql);

if ($stmt) {

    
    $stmt->bind_param("ssss", $nombre, $correo, $asunto, $mensaje);


    if ($stmt->execute()) {
        echo "<div style='font-family: sans-serif; max-width: 600px; margin: 2rem auto; padding: 2rem; border: 1px solid #e5e7eb; border-radius: 0.5rem;'>";
        echo "<h2 style='color: #059669;'>¡Mensaje guardado con éxito!</h2>";
        echo "<p>Tu mensaje ha sido registrado en la base de datos.</p>";
        echo "<a href='contacto.html' style='display: inline-block; margin-right: 1rem; color: #d97706;'>Enviar otro mensaje</a>";
        echo "<a href='consulta.php' style='display: inline-block; color: #d97706;'>Ver tabla de mensajes</a>";
        echo "</div>";
    } else {
        echo "<h3 style='color: red;'>Error al guardar el mensaje: " . $stmt->error . "</h3>";
    }

    $stmt->close();
} else {
    echo "<h3 style='color: red;'>Error en la preparación de la consulta SQL: " . $conexion->error . "</h3>";
}

$conexion->close();
?>