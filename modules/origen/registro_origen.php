<?php include "header.php"; ?>
<?php include "../../nav.php";

require "../../config/conexion.php";

$sql_item2 =  "SELECT * FROM `estado_item`";
$resultado_item2 = $conexion->query($sql_item2);

$sql_salida1 =  "SELECT * FROM `salida`";
$resultado_salida1 = $conexion->query($sql_salida1);

// Obtener los salidas de los items ya seleccionados
$sql_salida_seleccionados = "SELECT id_salida FROM origen";
$resultado_salida_seleccionados = $conexion->query($sql_salida_seleccionados);
$salida_seleccionados = array();
// agrega para no aparesca las opcones de la tabla relacion_kit_item
if ($resultado_salida_seleccionados->num_rows > 0) {
    while ($row_salida = $resultado_salida_seleccionados->fetch_assoc()) {
        $salida_seleccionados[] = $row_salida['id_salida'];
    }
}

$sql_item1 =  "SELECT DISTINCT si.id_tipo_item as 'id_tipo_item', si.id_item as 'id_item', rit.id_item 'id_item_rit', rit.id_tipo_item as 'tipo_item', rit.num_serie as 'num_serie', rit.descripcion 'descripcion' FROM salida_item si LEFT JOIN relacion_item_tipo_item rit ON si.id_item = rit.id_item WHERE si.id_item > '0'";
$resultado_item1 = $conexion->query($sql_item1);

// Obtener los IDs de los items ya seleccionados
$sql_origen_seleccionados = "SELECT id_item FROM origen";
$resultado_origen_seleccionados = $conexion->query($sql_origen_seleccionados);
$origen_seleccionados = array();
// agrega para no aparesca las opcones de la tabla relacion_kit_item
if ($resultado_origen_seleccionados->num_rows > 0) {
    while ($row_origen = $resultado_origen_seleccionados->fetch_assoc()) {
        $origen_seleccionados[] = $row_origen['id_item'];
    }
}
?>

<div class="container mt-3">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-boder">Registro de Origen</h4>
            </div>
            <div class="card-body">
                <form action="./agregar_origen.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-3 mt-3">
                            <label for="id_salida" class="form-label">Numero de salida:</label>
                            <section>
                                <select name="id_salida" id="id_salida" class="form-select" required>
                                     <option value="" selected disabled>Selecciona numero salida</option>
                                         <?php 
                                    while($row = $resultado_salida1->fetch_assoc()){ 
                                    // Verificar si el id_salid está seleccionado
                                         $disabled = in_array($row['id_salida'], $salida_seleccionados) ? 'disabled' : ''; 
                                             ?>
                                     <option value="<?php echo $row['id_salida']; ?>" <?php echo $disabled; ?>><?php echo $row['id_salida']; ?></option>
                                 <?php } ?>
                            </select>
                        </section>
                        </div>
                        <!--div class="col-2 mt-4">
                            <label for="submit" class="form-label"></label>
                            <button type="submit" id="submitBtn" class="btn btn-success mt-3">Agregar <i class="fa-solid fa-plus fa-sm"></i></button>
                        </div-->

                        <div class="row">
                        <div class="col-4 mt-3">
                            <label for="id_item" class="form-label">Numero de Serie:</label>
                            <section>
                                <select name="id_item" id="id_item" class="form-select" required>
                                     <option value="" selected disabled>Selecciona los ítems</option>
                                         <?php 
                                    while($row = $resultado_item1->fetch_assoc()){ 
                                    // Verificar si el ítem está seleccionado
                                         $disabled = in_array($row['id_item'], $origen_seleccionados) ? 'disabled' : ''; 
                                             ?>
                                     <option value="<?php echo $row['id_item']; ?>" <?php echo $disabled; ?>><?php echo $row['num_serie']; ?></option>
                                 <?php } ?>
                            </select>
                        </section>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="estado_item" class="form-label">Estado Item:</label>
                            <select class="form-select" name="estado_item" id="estado_item"  required>
                                <option value="" selected disabled>Selecciona tu opción</option>
                                <?php 
                                while($row = $resultado_item2->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado_item']; ?></option>
                                 <?php } ?>
                            </select> 
                        </div>
                    </div>  
                    </div>
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="fecha_entrada" class="form-label">Fecha entrada:</label>
                            <input type="datetime-local" class="form-control" name="fecha_entrada" id="fecha_entrada" required>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="descripcion_origen" class="form-label">Descripcion:</label>
                            <input type="text" class="form-control" placeholder="Descripcion de la entrada" name="descripcion_origen" id="descripcion_origen" required>
                        </div>
                    </div>
                    <div class="col text-center fom-group mt-4">
                        <a href="../salidas/" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                        <button  type="submit" class="btn btn-success">Agregar <i class="fa-solid fa-check fa-lg"></i></button>   
                    </div>
                </form>
                <?php 
                    $sql = "SELECT o.id_origen as 'id_origen',o.id_salida as 'id_salida', o.id_item as 'id_item_origen', o.estado_item as 'estado_item', o.fecha_entrada as 'fecha', o.descripcion_origen 'descripcion', rit.id_item as 'id_item_tipo', rit.id_tipo_item as 'id_tipo_item', rit.num_serie as 'num_serie', si.id_item as 'id_item_si', si.id_tipo_item as 'id_tipo_item_si', est.id_estado as 'id_estado', est.estado_item 'estado_item' FROM origen o LEFT JOIN relacion_item_tipo_item rit ON o.id_item = rit.id_item LEFT JOIN salida_item si ON o.id_item = si.id_item LEFT JOIN estado_item est ON o.estado_item = est.id_estado";
                    $resultado = $conexion->query($sql);
                ?>
                <div class="d-flex justify-content-center">
                    <div class="col-8 mt-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar Numero de KIT o Item">
                        <div class="table-responsive mt-3">
                        <table class="table table-sm table-hover table-hover">
                            <thead class="table-light">
                                 <th class="">Numero de Entrada</th>
                                 <th class="">Numero de Serie</th>
                                 <th class="">Estado_item</th>
                                 <th class="">Fecha y Hora</th>
                                 <th class="">Descripcion</th>
                                 <th class="">Borrar item</th>
                            </thead>
                                <tbody id="tableBody">
                                    <?php
                                while ($row = $resultado->fetch_assoc()) {
                                    ?>
                                <tr class="col-">
                                    <!--corregir el nombre de las propiedades-->
                                    <td class=""><?php echo $row['id_salida']; ?></td>
                                    <td class=""><?php echo $row['num_serie']; ?></td>
                                    <td class=""><?php echo $row['estado_item']; ?></td>
                                    <td class=""><?php echo $row['fecha']; ?></td>
                                    <td class=""><?php echo $row['descripcion']; ?></td>

                                     <td class="col-text-center">
                                        <!--borrar del kit-->
                                        <a href="./eliminar_origen.php?id_origen=<?php echo $row['id_origen']; ?>" class="btn btn-warning"><i class="fa-solid fa-delete-left"></i></a>
                                     </td>
                                 </tr>
                                <?php } ?>
                            </tbody>
                         </table>
                        <?php  ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#id_salida').select2();
        $('#id_item').select2();
    });
</script>