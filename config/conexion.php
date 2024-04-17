<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "almacen_tecloggin";

$conexion = new mysqli($host, $user, $password, $db);

if($conexion->connect_errno){
    echo"Fallo la conexion a la base de datos" . $conexion->connect_error;
}
?>