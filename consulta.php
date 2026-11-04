<?php
// Datos de conexion a la base de datos
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "turismo_db";

// Creacion de la conexion usando MySQLi
$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificacion si hubo error de conexion
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// 2. Consulta SQL para obtener todos los registros incluyendo asunto y fecha
$sql = "SELECT id, nombre, correo, asunto, mensaje, fecha FROM contactos";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Mensajes - Turismo y Sabor Ecuatoriano</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header class="encabezado-principal">
        <div class="contenedor-header">
            <a href="index.html">
                <img src="img/logo.jpeg" alt="logo Turismo y Sabor Ecuador" class="logo">
            </a>
            <h1>Turismo y Sabor Ecuatoriano</h1>
        </div>
        
        <nav class="menu-navegacion">
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="destino.html">Destinos</a></li>
                <li><a href="recetas.html">Recetas</a></li>
                <li><a href="galeria.html">Galería</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main class="contenedor-principal">
        <section class="seccion-bienvenida">
            <h2>Mensajes Recibidos</h2>
            <p>Aquí puedes visualizar los mensajes enviados por los usuarios desde el formulario de contacto.</p>
        </section>

        <!-- Tabla visual para mostrar los datos de la base de datos -->
        <table class="tabla-datos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Asunto</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Verificar si hay registros en la tabla
                if ($resultado && $resultado->num_rows > 0) {
                    // Recorrer cada fila de resultados y mostrarlas en la tabla HTML de forma segura
                    while($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . htmlspecialchars($row["nombre"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["correo"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["asunto"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["mensaje"]) . "</td>";
                        echo "<td>" . $row["fecha"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay mensajes registrados todavía.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div style="margin-top: 2rem;">
            <a href="contacto.html" class="boton-enviar" style="text-decoration: none;">Volver al Formulario</a>
        </div>
    </main>

    <!-- Pie de pagina -->
    <footer class="pie-pagina">
        <p>Autor: Viviana Carchi | Contacto: <a href="mailto:jcarchif@est.ups.edu.ec">jcarchif@est.ups.edu.ec</a></p>
        <p>&copy; 2026 Turismo y Sabor Ecuatoriano. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

<?php
// Cierre de la conexion
if (isset($conexion)) {
    $conexion->close();
}
?>