
<?php
/*
SET @ultimo_id_salida = (SELECT id_salida FROM salida ORDER BY id_salida DESC LIMIT 1);
UPDATE salida SET id_salida = @ultimo_id_salida + 1 WHERE id_salida = @ultimo_id_salida; */

// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$database = "tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el último id_salida
$sql_select = "SELECT id_salida FROM salida ORDER BY id_salida DESC LIMIT 1";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ultimo_id_salida = $row["id_salida"];
    
    // Incrementar el último id_salida
    $nuevo_id_salida = $ultimo_id_salida + 1;
    
    // Actualizar el registro con el nuevo id_salida
    $sql_update = "UPDATE salida SET id_salida = $nuevo_id_salida WHERE id_salida = $ultimo_id_salida";
    
    if ($conn->query($sql_update) === TRUE) {
        echo "ID de salida incrementado exitosamente";
    } else {
        echo "Error al incrementar el ID de salida: " . $conn->error;
    }
} else {
    echo "No se encontraron registros en la tabla 'salida'";
}

// Cerrar la conexión
$conn->close();
?>