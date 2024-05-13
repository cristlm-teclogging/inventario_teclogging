<?php include "../header.php"; ?>
<?php include "../../nav.php";

require "../../config/conexion.php";
//inidcador
$id_item = $_GET['id_item'];

$sql_select0 =  "SELECT * FROM `marca`";
$resultado_select0 = $conexion->query($sql_select0);

$sql_select1 =  "SELECT * FROM `estado_item`";
$resultado_select1 = $conexion->query($sql_select1);

$sql_select2 =  "SELECT * FROM `status`";
$resultado_select2 = $conexion->query($sql_select2);

$sql = "SELECT * FROM `item` WHERE `id_item` = '$id_item'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
?>

<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Editar kit</h4>
            </div>
            <div class="card-body">
            <form action="./modificar_item.php" method="POST" enctype="multipart/form-data" class="">
                    <div class="row">
                        <input type="hidden" name="id_item" value="<?php echo $row['id_item']; ?>">
                        <div class="col-4 mt-3">
                                <label for="num_serie" class="form-label">Numero de Serie</label>
                                <input type="text" class="form-control" name="num_serie" id="num_serie" value="<?php echo $row['num_serie']?>">          
                            </div>
                            <div class="col-4 mt-3">
                                <label for="descripcion" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $row['descripcion']?>">          
                            </div>
                        <div class="col-4 mt-3">
                            <label for="marca" class="form-label">Marca</label>
                            <select class="form-select" name="marca" id="marca">
                                <option value="0" selected>Selecciona tu opción</option>
                                <?php 
                            while($row_select0 = $resultado_select0->fetch_assoc()){
                                 ?>
                                <option value="<?php echo $row_select0['id_marca']; ?>"><?php echo $row_select0['nombre_marca']; ?></option>
                                 <?php } ?>
                             </select>
                        </div>
                    </div>  
                        <div class="row">
                            <div class="col-4 mt-3">
                                <label for="desc" class="form-label">Modelo:</label>
                                <input type="text" class="form-control" name="modelo" id="modelo" value="<?php echo $row['modelo']?>">          
                            </div>
                        <div class="col-4 mt-3">
                         <label for="estado_item" class="form-label">Estado Item</label>
                        <select class="form-select" name="estado_item" id="estado_item" value="<?php echo $row['estado_item']?>">
                             <option value="" selected disabled>Selecciona tu opción</option>
                             <?php 
                             while($row = $resultado_select1->fetch_assoc()){
                             ?>
                             <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado_item']; ?></option>
                             <?php } ?>
                        </select>                                   
                        </div>

                        <div class="col-4 mt-3">
                         <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status" value="<?php echo $row['status']?>">
                             <option value="" selected disabled>Selecciona tu opción</option>
                             <?php 
                             while($row = $resultado_select2->fetch_assoc()){
                             ?>
                             <option value="<?php echo $row['id_status']; ?>"><?php echo $row['status']; ?></option>
                             <?php } ?>
                        </select>                                   
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="col text-center fom-group mt-4">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>