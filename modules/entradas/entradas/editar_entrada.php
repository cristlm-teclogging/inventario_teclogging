<?php include "header.php"; ?>
<?php include "../../nav.php";

require "../../config/conexion.php";

$id_entrada=$_GET['id_entrada'];

$sql = "SELECT * FROM  `entrada` WHERE `id_entrada` = '$id_entrada'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
?>

<div class="container mt-3">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Registro de Salida</h4>
            </div>
            <div class="card-body">
                <form action="./modificar_entrada.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="id_entrada" class="form-label">Id Entrada:</label>
                            <input type="number" class="form-control" placeholder="Numero de indeificacion" name="id_entrada" id="id_entrada" value="<?php echo $row['id_entrada']?>" readonly>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="fecha_entrada" class="form-label">Fecha Entrada:</label>
                            <input type="date" class="form-control" name="fecha_entrada" id="fecha_entrada" value="<?php echo $row['fecha_entrada']?>">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="dias_trabajados" class="form-label">dias_trabajados:</label>
                            <input type="number" class="form-control" placeholder="Dias trabajados" name="dias_trabajados" id="dias_trabajados" value="<?php echo $row['dias_trabajados']?>">
                        </div>   
                    </div>
                    <div class="row">
                         <div class="col-5 mt-3">
                            <label for="documentos_firmados" class="form-label">Documentos firmados:</label>
                            <input type="file" class="form-control" name="documentos_firmados" id="documentos_firmados" value="<?php echo $row['documentos_firmados']?>">
                        </div>   
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col text-center form-group mt-4">
                            <a href="index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                            <button type="submit" class="btn btn-primary">Enviar <i class="fa-solid fa-check fa-lg"></i></button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>