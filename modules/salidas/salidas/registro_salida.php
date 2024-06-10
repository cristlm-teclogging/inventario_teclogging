<?php include "header.php"; ?>
<?php include "../../nav.php";

require "../../config/conexion.php";

/*$id_item= $_GET['id_item']; 
$sql_item = "SELECT * FROM `relacion_kit_item` WHERE id_item = '$id_item'";
$resultado_item = $conexion->query($sql_item);*/
?>
<?php
$sql_item1 =  "SELECT DISTINCT id_info FROM salida ORDER BY `salida`.`id_info` ASC";
$resultado_item1 = $conexion->query($sql_item1);

$sql_select1 =  "SELECT * FROM `ubicacion`";
$resultado_select1 = $conexion->query($sql_select1);

$sql_select2=  "SELECT * FROM `compañia`";
$resultado_select2 = $conexion->query($sql_select2);

$sql_kit1 =  "SELECT DISTINCT * FROM `relacion_kit_item` WHERE id_kit >'0'";
$resultado_kit1 = $conexion->query($sql_kit1);

// Obtener los IDs de los items ya seleccionados tabla salida antes salida_item
$sql_origen_seleccionados = "SELECT id_kit FROM salida";
$resultado_origen_seleccionados = $conexion->query($sql_origen_seleccionados);
$origen_seleccionados = array();
// agrega para no aparesca las opcones de la tabla relacion_kit_item
if ($resultado_origen_seleccionados->num_rows > 0) {
    while ($row_origen = $resultado_origen_seleccionados->fetch_assoc()) {
        $origen_seleccionados[] = $row_origen['id_kit'];
    }
}

$sql_kit2 =  "SELECT DISTINCT rki.id_kit as 'id_kit_rki', rki.id_item as 'id_item_rki', rit.id_item as 'id_item', rit.id_tipo_item as 'id_item', rit.num_serie as 'num_serie' FROM relacion_kit_item rki LEFT JOIN relacion_item_tipo_item rit ON rki.id_item = rit.id_item WHERE rit.id_item > '0'";
$resultado_kit2 = $conexion->query($sql_kit2);

// Obtener los IDs de los items ya seleccionados
$sql_origen2_seleccionados = "SELECT id_item FROM salida";
$resultado_origen2_seleccionados = $conexion->query($sql_origen2_seleccionados);
$origen2_seleccionados = array();
// agrega para no aparesca las opcones de la tabla relacion_kit_item
if ($resultado_origen2_seleccionados->num_rows > 0) {
    while ($row_origen2 = $resultado_origen2_seleccionados->fetch_assoc()) {
        $origen2_seleccionados[] = $row_origen2['id_item'];
    }
}
?>
<div class="container mt-3">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Registro de Destino</h4>
            </div>
            <div class="card-body">
                <form action="./agregar_salida.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="accordion" id="accordionSalida">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Seleccion de Kit & Items
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionSalida">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-2">
                                                <label for="id_info" class="form-label">Numero de Kit</label>
                                                <select name="id_info" id="id_info" class="form-select" required>
                                                        <option value="" selected disabled>Selecciona tu opción</option>
                                                            <?php while($row = $resultado_item1->fetch_assoc()){ ?>
                                                         <option value="<?php echo $row['id_info']; ?>"><?php echo $row['id_info']; ?></option>
                                                      <?php } ?>
                                                 </select>
                                                </div>
                                                <div class="col-4 mt-3">
                                                    <label for="id_kit" class="form-label">Numero de Kit</label>
                                                    <section>
                                                        <select name="id_kit" id="id_kit" class="form-select">
                                                             <option value="" selected disabled>Selecciona el kit</option>
                                                            <?php 
                                                             while($row = $resultado_kit1->fetch_assoc()){ 
                                                        // Verificar si el ítem está seleccionado
                                                            $disabled = in_array($row['id_kit'], $origen_seleccionados) ? 'disabled' : ''; 
                                                            ?>
                                                            <option value="<?php echo $row['id_kit']; ?>" <?php echo $disabled; ?>><?php echo $row['id_kit']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    </section>
                                                </div>
                                                <div class="col-4 mt-3">
                                                     <label for="id_item" class="form-label">Numero de Serie (item)</label>
                                                  <section>
                                                    <select name="id_item" id="id_item" class="form-select">
                                                        <option value="" selected disabled>Selecciona los ítems</option>
                                                            <?php 
                                                         while($row = $resultado_kit2->fetch_assoc()){ 
                                                         // Verificar si el ítem está seleccionado
                                                        $disabled = in_array($row['id_item'], $origen2_seleccionados) ? 'disabled' : ''; 
                                                              ?>
                                                        <option value="<?php echo $row['id_item']; ?>" <?php echo $disabled; ?>><?php echo $row['num_serie']; ?></option>
                                                     <?php } ?>
                                                    </select>
                                                </section>
                                             </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Formulario ubicacion
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionSalida">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <!--div class="col-4 mt-3">
                                                    <label for="fecha_salida" class="form-label">Fecha Entrada:</label>
                                                    <input type="datetime-local" class="form-control" name="fecha_salida" id="fecha_salida" required>
                                                </div-->
                                                <div class="col-3 mt-3">
                                                 <label for="ubicacion" class="form-label">Ubicacion</label>
                                                 <select class="form-select" name="ubicacion" id="ubicacion" required>
                                                    <option value="" selected disabled>Selecciona tu opción</option>
                                                        <?php 
                                                        while($row = $resultado_select1->fetch_assoc()){
                                                         ?>
                                                     <option value="<?php echo $row['id_ubicacion']; ?>"><?php echo $row['ubicacion']; ?></option>
                                                        <?php } ?>
                                                </select>            
                                             </div>
                                             <div class="col-1">
                                                <a href="#ubiModal" class="btn btn-primary mt-5 btn-sm" data-bs-toggle="modal" data-bs-target="#ubiModal"><i class="fa-solid fa-plus fa-xm"></i> <i class="fa-solid fa-location-dot fa-xm"></i></a>
                                            </div>
                                            <div class="col-3 mt-3">
                                                <label for="compañia" class="form-label">Compañia</label>
                                                    <select class="form-select" name="compañia" id="compañia" required>
                                                     <option value="" selected disabled>Selecciona tu opción</option>
                                                         <?php 
                                                    while($row = $resultado_select2->fetch_assoc()){
                                                         ?>
                                                     <option value="<?php echo $row['id_compañia']; ?>"><?php echo $row['nombre_compañia']; ?></option>
                                                 <?php } ?>
                                             </select> 
                                            </div>
                                            <div class="col-1">
                                                <a href="#compModal" class="btn btn-primary mt-5 btn-sm" data-bs-toggle="modal" data-bs-target="#compModal"><i class="fa-solid fa-plus fa-sm"></i> <i class="fa-solid fa-industry"></i></a>  
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 mt-3">
                                                    <label for="comentarios" class="form-label">Comentarios:</label>
                                                     <input type="text" class="form-control" placeholder="Agrega un Comentario" name="comentarios" id="comentarios" required>
                                                </div> 
                                                <!--div class="col-4 mt-3">
                                                    <label for="documentos_firmados" class="form-label">Documentos firmados:</label>
                                                    <input type="file" class="form-control" name="documentos_firmados" id="documentos_firmados">
                                                 </div-->   
                                            </div>
                                            <div class="row">

                                            </div>
                                                <div class="d-flex justify-content-center">
                                                    <div class="col text-center form-group mt-5">
                                                        <a href="index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                                                        <button type="submit" class="btn btn-success">Agregar <i class="fa-solid fa-check fa-lg"></i></button>
                                                    </div>
                                                </div>
                                             </div>
                                    </div>

                        </div>


                    </div>
                    </div>
                </form>
                <?php 
                    //$sql = "SELECT sa.id_salida as 'id_salida', sa.num_kit as 'num_kit', sa.id_item as 'id_item', sa.fecha_salida as 'fecha_salida', sa.ubicacion as 'ubicacion_sa', sa.compañia as 'compania_sa', sa.comentarios 'comentarios', sa.documentos_firmados 'documentos_firmados', rit.id_item as 'id_item_rit', rit.id_tipo_item as 'tipo_item', rit.num_serie as 'num_serie', rit.descripcion as 'descripcion_item', com.id_compañia as 'id_compania', com.nombre_compañia as 'compania', ub.id_ubicacion as 'id_ubicacion', ub.ubicacion as 'ubicacion', est.id_estado as 'id_estado_item', est.estado_item 'estado_item' FROM salida sa LEFT JOIN relacion_item_tipo_item rit ON sa.id_item = rit.id_item LEFT JOIN compañia com ON sa.compañia = com.id_compañia LEFT JOIN ubicacion ub ON sa.ubicacion = ub.id_ubicacion LEFT JOIN estado_item est ON rit.estado_item = est.id_estado";
                    $sql = "SELECT sa.id_salida as 'id_salida', sa.id_kit as 'id_kit', sa.id_item as 'id_item', sa.fecha_salida as 'fecha_salida', sa.ubicacion as 'ubicacion_sa', sa.compañia as 'compania_sa', sa.comentarios 'comentarios', sa.documentos_firmados 'documentos_firmados', rit.id_item as 'id_item_rit', rit.id_tipo_item as 'tipo_item', rit.num_serie as 'num_serie', rit.descripcion as 'descripcion_item', com.id_compañia as 'id_compania', com.nombre_compañia as 'compania', ub.id_ubicacion as 'id_ubicacion', ub.ubicacion as 'ubicacion', est.id_estado as 'id_estado_item', est.estado_item 'estado_item', rki.id_kit as 'id_kit_rit', rki.id_item as 'id_item_rki' FROM salida sa LEFT JOIN relacion_kit_item rki ON sa.id_kit = rki.id_kit LEFT JOIN relacion_item_tipo_item rit ON rki.id_item = rit.id_item LEFT JOIN compañia com ON sa.compañia = com.id_compañia LEFT JOIN ubicacion ub ON sa.ubicacion = ub.id_ubicacion LEFT JOIN estado_item est ON rit.estado_item = est.id_estado ORDER BY `sa`.`id_salida` ASC";
                    $resultado = $conexion->query($sql);
                ?>
                 <div class="d-flex justify-content-center">
                    <div class="col-8 mt-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar Numero de KIT o Item">
                        <div class="table-responsive mt-3">
                        <table class="table table-sm table-hover table-hover">
                            <thead class="table-light">
                                 <th class="">Numero Salida</th>
                                 <th class="">Numero de KIT</th>
                                 <th class="">Numero de Serie</th>
                                 <th class="">Ubicacion</th>
                                 <th class="">Fecha y Hora</th>
                                 <th class="">compania</th>
                                 <th class="">estado item</th>
                                 <th class="">Borrar item</th>
                            </thead>
                                <tbody id="tableBody">
                                    <?php
                                while ($row = $resultado->fetch_assoc()) {
                                    ?>
                                <tr class="col-">
                                    <!--corregir el nombre de las propiedades-->
                                    <td class=""><?php echo $row['id_salida']; ?></td>
                                    <td class=""><?php echo $row['id_kit']; ?></td>
                                    <td class=""><?php echo $row['num_serie']; ?></td>
                                    <td class=""><?php echo $row['ubicacion']; ?></td>
                                    <td class=""><?php echo $row['compania']; ?></td>
                                    <td class=""><?php echo $row['fecha_salida']; ?></td>
                                    <td class=""><?php echo $row['estado_item']; ?></td>

                                     <td class="col-text-center">
                                        <!--borrar del kit-->
                                        <a href="./borrar_item_destino.php?id_salida=<?php echo $row['id_salida']; ?>" class="btn btn-warning"><i class="fa-solid fa-delete-left"></i></a>
                                     </td>
                                 </tr>
                                <?php } ?>
                            </tbody>
                         </table>
                        <?php  ?>
                        </div>
                    </div>
                </div>
                <!--fin de la tabla-->

            </div>
        </div>
    </div>
</div>

<!--modal de ubicacion-->
<div class="modal fade" id="ubiModal" tabindex="-1" aria-labelledby="ubiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ubiModalLabel">Agregar Nueva Ubicacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="ubiForm">
                    <div class="mb-3">
                    <div class="form-group">
                        <label for="ubicacion" class="form-label">Agregar Ubicacion </label>
                        <input type="text" class="form-control" name="ubicacion" id="ubicacion" required>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Ubicacion <i class="fa-solid fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--modal de compañia-->
<div class="modal fade" id="compModal" tabindex="-1" aria-labelledby="compModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="compModalLabel">Agregar Nueva Compañia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="compForm">
                    <div class="mb-3">
                    <div class="form-group">
                        <label for="compañia" class="form-label">Agregar Compañia </label>
                        <input type="text" class="form-control" name="compañia" id="compañia" required>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Compañia <i class="fa-solid fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function(){
        $("#ubiForm").submit(function(event){
            event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional
            
            // Obtener datos del formulario
            let formData = $(this).serialize();
            
            // Enviar datos mediante AJAX
            $.ajax({
                type: "POST",
                url: "./propiedad/agregar_ubicacion.php",
                data: formData,
                success: function(response){
                    // Manejar la respuesta del servidor
                    console.log(response);
                    // Cerrar el modal
                    $('#ubiModal').modal('hide');
                    // Redirigir a la página original
                    window.location.href = window.location.href;
                    // Aquí puedes realizar alguna acción, como mostrar un mensaje de éxito o recargar la página
                },
                error: function(xhr, status, error){
                    // Manejar errores de AJAX
                    console.error(error);
                }
            });
        });
    });
</script>
<script>
        // Paso 4: Inicializar Select2
        window.onload=function(){
                $('#id_item').select2();
                $('#num_kit').select2();
                $('#ubicacion').select2();
            };
    </script>

