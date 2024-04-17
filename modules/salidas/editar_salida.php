<?php include "header.php"; ?>
<?php include "../../nav.php";

require "../../config/conexion.php";

$id_salida=$_GET['id_salida'];

$sql_select1 =  "SELECT * FROM `ubicacion`";
$resultado_select1 = $conexion->query($sql_select1);

$sql_select2=  "SELECT * FROM `compañia`";
$resultado_select2 = $conexion->query($sql_select2);

$sql = "SELECT * FROM  `salida` WHERE `id_salida` = '$id_salida'";
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
                <form action="./agregar_salida.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="id_entrada" class="form-label">Id Salida:</label>
                            <input type="number" class="form-control" placeholder="Numero de indeificacion" name="id_salida" id="id_salida" value="<?php echo $row['id_salida']?>">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="fecha_salida" class="form-label">Fecha Salida:</label>
                            <input type="datetime-local" class="form-control" name="fecha_salida" id="fecha_salida" value="<?php echo $row['fecha_salida']?>">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="comentarios" class="form-label">Comentarios:</label>
                            <input type="text" class="form-control" placeholder="Agrega un Comentario" name="comentarios" id="comentarios" value="<?php echo $row['comentarios']?>">
                        </div>   
                    </div>
                    <div class="row">
                    <div class="col-4 mt-3">
                            <label for="ubicacion" class="form-label">Ubicacion</label>
                             <select class="form-select" name="ubicacion" id="ubicacion" value="<?php echo $row['ubicacions']?>">
                                <option value="0" selected>Selecciona tu opción</option>
                                    <?php 
                                    while($row = $resultado_select1->fetch_assoc()){
                                     ?>
                                <option value="<?php echo $row['id_ubicacion']; ?>"><?php echo $row['ubicacion']; ?></option>
                                 <?php } ?>
                            </select>            
                        </div>
                         <div class="col-4 mt-3">
                            <label for="compañia" class="form-label">Compañia</label>
                             <select class="form-select" name="compañia" id="compañia" value="<?php echo $row['compañia']?>">
                                <option value="0" selected>Selecciona tu opción</option>
                                    <?php 
                                    while($row = $resultado_select2->fetch_assoc()){
                                     ?>
                                <option value="<?php echo $row['id_compañia']; ?>"><?php echo $row['nombre_compañia']; ?></option>
                                 <?php } ?>
                            </select>            
                        </div>

                        <div class="col-4 mt-3">
                            <label for="num_equipo" class="form-label">Numero de equipo:</label>
                            <input type="number" class="form-control" placeholder="Agrega el numero de equipo" name="num_equipo" id="num_equipo" value="<?php echo $row['num_equipo']?>">
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-5 mt-3">
                            <label for="documentos_firmados" class="form-label">Documentos firmados:</label>
                            <input type="file" class="form-control" name="documentos_firmados" id="documentos_firmados" value="<?php echo $row['documentos_firmados']?>">
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