<?php include "../header.php"; ?>
<?php include "../../nav.php";

require "../../config/conexion.php";

$sql_select1 =  "SELECT * FROM `antena`";
$resultado_select1 = $conexion->query($sql_select1);
?>

<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Registro de IP</h4>
            </div>
            <div class="card-body">
                <form action="agregar_ip.php" method="POST" enctype="multipart/form-data" required>
                    <div class="row">
                        <div class="col-4 mt-3">
                        <label for="id_ip" class="form-label">ID del IP:</label>
                        <input type="number" class="form-control" name="id_ip" id="id_ip" required>
                        </div>

                    <div class="col-4 mt-3">
                        <label for="direccion_ip" class="form-label">Direccion IP:</label>
                        <input type="text" class="form-control" name="direccion_ip" id="direccion_ip" required>
                    </div>
                    <div class="col-4 mt-3">
                        <label for="num_kit" class="form-label">Numero de kit:</label>
                        <select class="form-select" name="num_kit" id="num_kit">
                                <option value="0" selected>Selecciona tu opción</option>
                                <?php 
                            while($row = $resultado_select1->fetch_assoc()){
                                 ?>
                                <option value="<?php echo $row['num_kit']; ?>"><?php echo $row['num_kit']; ?></option>
                                 <?php } ?>
                            </select>
                        <!--input type="text" class="form-control" name="num_kit" id="num_kit"-->
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