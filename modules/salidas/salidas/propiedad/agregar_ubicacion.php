<?php 
error_reporting(1);

require '../../../config/conexion.php';

//$id_item = $_POST['id_ubicacion']; autoincrementable
$ubicacion = $_POST['ubicacion'];

// Verificar si la ubicación ya existe antes de insertarla
$sql_check = "SELECT COUNT(*) as count FROM ubicacion WHERE ubicacion = '$ubicacion'";
$result_check = $conexion->query($sql_check);
$row = $result_check->fetch_assoc();
$count = $row['count'];

if($count > 0) {
    echo "La ubicación ya existe en la base de datos";
} else {
    // Insertar datos en la base de datos
    $sql = "INSERT INTO ubicacion (ubicacion) VALUES ('$ubicacion')";

    if ($conexion->query($sql) === TRUE) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
?>