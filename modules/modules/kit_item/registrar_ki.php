<?php include "header.php"; ?>
<?php include "../../nav.php";

require('../../config/conexion.php');

$sql_select1 =  "SELECT * FROM `antena`";
$resultado_select1 = $conexion->query($sql_select1);
?>

<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Agregar kit item</h4>
            </div>
            <div class="card-body">
                <form action="agregar_ki.php" method="POST" enctype="multipart/form-data" required>
                    <div class="row">
                        <div class="col-4 mt-2">
                            <label for="id_kit" class="form-label">Id kit:</label>
                            <input type="number" class="form-control" name="id_kit" id="id_kit" required>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="id_item" class="form-label">Id Item:</label>
                            <input type="number" class="form-control" name="id_item" id="id_item" required>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="tipo_item" class="form-label">Tipo Item:</label>
                            <input type="text" class="form-control" name="tipo_item" id="tipo_item" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                            <div class="col text-center form-group mt-5">
                            <a href="index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                        <button  type="submit" class="btn btn-primary">Enviar <i class="fa-solid fa-check fa-lg"></i></button> 
                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>
</div>