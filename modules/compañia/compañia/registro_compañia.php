<?php include "../header.php"; ?>
<?php include "../../nav.php";

require "../../config/conexion.php";

?>

<div class="container mt-3">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Registro de Compañia</h4>
            </div>
            <div class="card-body">
                <form action="./agregar_compañia.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-3 mt-2">
                            <label for="id_compañia" class="form-label">id compañia</label>
                            <input type="text" class="form-control" name="id_compañia" id="id_compañia">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="nombre_compañia" class="form-label">Nombre de compañia:</label>
                            <input type="text" class="form-control" name="nombre_compañia" id="nombre_compañia">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="rfc" class="form-label">RFC:</label>
                            <input type="text" class="form-control" name="rfc" id="rfc">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="contacto" class="form-label">Contacto:</label>
                            <input type="text" class="form-control" name="contacto" id="contacto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="telefono" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="correo_compañia" class="form-label">Correo:</label>
                            <input type="email" class="form-control" name="correo_compañia" id="correo_compañia">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="url_img" class="form-label">url_imagen:</label>
                            <input type="url_img" class="form-control" name="url_img" id="url_img">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col text-center form-group mt-5">
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