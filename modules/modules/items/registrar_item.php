<?php include "../header.php"; ?>
<?php include "../../nav.php";

require "../../config/conexion.php";

$sql_item1 = "SELECT * FROM `tipo_item` WHERE tipo_item = 'item'";
$resultado_item1 = $conexion->query($sql_item1);

if ($resultado_item1->num_rows > 0) {
    // Obtener el primer resultado de la consulta
    $row = $resultado_item1->fetch_assoc();
    $valor_item = $row['id_item']; // Suponiendo que el valor que necesitas es 'id_item'

    // Puedes hacer algo con $valor_item aquí si es necesario
} else {
    $valor_item = "";
}
?>
 <?php

$sql_kit1 =  "SELECT * FROM `kit`";
$resultado_kit1 = $conexion->query($sql_kit1);

$sql_select0 =  "SELECT * FROM `marca`";
$resultado_select0 = $conexion->query($sql_select0);

$sql_select1 =  "SELECT * FROM `estado_item`";
$resultado_select1 = $conexion->query($sql_select1);

$sql_select2 =  "SELECT * FROM `status`";
$resultado_select2 = $conexion->query($sql_select2);
?>

<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Registro Nuevo Item</h4>
            </div>
            <div class="card-body">
              <form action="./agregar_item.php" method="POST" enctype="multipart/form-data" required>
                <div class="row">
                    <div class="col-4 mt-3">
                        <div class="form-group">
                            <label for="num_serie" class="form-label">Numero de Serie:</label>
                            <input type="text" class="form-control" name="num_serie" id="num_serie"required>
                        </div>
                    </div>
                    <div class="col-4 mt-3">
                        <div class="form-group">
                            <label for="num_serie" class="form-label">Tipo de Item:</label>
                            <input type="text" class="form-control" name="id_item" id="id_item" value="<?php echo $valor_item ?>" readonly>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-4 mt-3">
                        <div class="form-group">
                            <label for="modelo" class="form-label">Modelo:</label>
                            <input type="text" class="form-control" name="modelo" id="modelo" required>
                        </div>
                    </div>
                    <div class="col-4 mt-3">
                        <div class="form-group">
                            <label for="marca" class="form-label">Marca:</label>
                            <select name="marca" id="marca" class="form-select" required>
                            <option value="" selected disabled>Selecciona tu opción</option>
                                <?php 
                            while($row = $resultado_select0->fetch_assoc()){
                                    ?>
                         <option value="<?php echo $row['id_marca']; ?>"><?php echo $row['nombre_marca']; ?></option>
                            <?php } ?>
                        </select>
                        </div>
                    </div>   
                    <div class="col-4 mt-3">
                        <div class="form-group">
                            <label for="descripcion" class="form-label">Descripcion:</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" required>
                        </div>
                    </div>
                    </div>
                <div class="row">
                <div class="col-4 mt-3">
                        <div class="form-group">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>
                    </div>
                <div class="col-4 mt-3">
                        <div class="form-group">
                         <label for="estado_item" class="form-label">Estado del item</label>
                            <select class="form-select" name="estado_item" id="estado_item" required>
                             <option value="" selected disabled>Selecciona tu opción</option>
                             <?php 
                              while($row = $resultado_select1->fetch_assoc()){
                             ?>
                            <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado_item']; ?></option>
                            <?php } ?>
                            </select>            
                        </div>                  
                    </div>
                    <div class="col-4 mt-3">
                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="status" id="status" required>
                        <option value="" selected>Selecciona tu opción</option>
                        <?php 
                         while($row = $resultado_select2->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['id_status']; ?>"><?php echo $row['status']; ?></option>
                         <?php } ?>
                        </select>
                        <!--div class="col mt-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Status</button>
                        </div>                            
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                 <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                 </div>
                                </div>
                            </div-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="col text-center fom-group mt-4">
                        <a href="index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                        <button  type="submit" class="btn btn-primary">Enviar <i class="fa-solid fa-check fa-lg"></i></button>                        
                    </div>
                </div>
                </form>

            </div>
        </div>
                        
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>