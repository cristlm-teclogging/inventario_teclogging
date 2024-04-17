<?php include "header.php"; ?>
<?php include "../../nav.php";

require "../../config/conexion.php";
?>

<div class="container mt-3">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Registro de Entrada</h4>
            </div>
            <div class="card-body">
                <form action="./agregar_entrada.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="id_entrada" class="form-label">id_entrada:</label>
                            <input type="number" class="form-control" name="id_entrada" id="id_entrada">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="fecha_entrada" class="form-label">Fecha entrada:</label>
                            <input type="date" class="form-control" name="fecha_entrada" id="fecha_entrada">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="dias_trabajados" class="form-label">Dias trabajados:</label>
                            <input type="number" class="form-control" name="dias_trabajados" id="dias_trabajados">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="documentos_firmados" class="form-label">Docuemntos firmados:</label>
                            <input type="file" class="form-control" name="documentos_firmados" id="docuemntos_firmados">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col-2 text-center form-group mt-5">
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