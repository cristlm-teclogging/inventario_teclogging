<?php include "header.php"; ?>
<?php include "../../nav.php";

require('../../config/conexion.php');

$sql_item1 =  "SELECT * FROM `tipo_item`";
$resultado_item1 = $conexion->query($sql_item1);

$sql_item2 =  "SELECT * FROM `relacion_item_tipo_item`";
$resultado_item2 = $conexion->query($sql_item2);

// Obtener los IDs de los items ya seleccionados
$sql_items_seleccionados = "SELECT id_item FROM salida_item";
$resultado_items_seleccionados = $conexion->query($sql_items_seleccionados);
$items_seleccionados = array();

if ($resultado_items_seleccionados->num_rows > 0) {
    while ($row_item = $resultado_items_seleccionados->fetch_assoc()) {
        $items_seleccionados[] = $row_item['id_item'];
    }
}

?>
<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Salida de Kit antena</h4>
            </div>
            <div class="card-body">
                <form action="agregar_ki.php" method="POST" enctype="multipart/form-data" required>
                    <div class="row">
                    <div class="col-4 mt-2">
                            <label for="id_tipo_item" class="form-label">Tipo de Item</label>
                            <select name="id_tipo_item" id="id_tipo_item" class="form-select" required>
                                <option value="" selected disabled>Selecciona tu opción</option>
                                <?php while($row = $resultado_item1->fetch_assoc()){ ?>
                                    <option value="<?php echo $row['id_tipo_item']; ?>"><?php echo $row['tipo_item']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="id_item" class="form-label">Número de Serie</label>
                            <select name="id_item" id="id_item" class="form-select" required>
                                <option value="" selected disabled>Selecciona tu opción</option>
                                <?php while($row = $resultado_item2->fetch_assoc()){ ?>
                                    <option value="<?php echo $row['id_item']; ?>"><?php echo $row['num_serie']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-2 mt-2">
                        <label for="submit" class="form-label"></label>
                        <button  type="submit" class="btn btn-success mt-4">Agregar <i class="fa-solid fa-plus fa-sm"></i></button> 
                        </div>

                    </div>
                    <div class="d-flex justify-content-center">
                            <div class="col text-center form-group mt-5">
                            <a href="./index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                        <!--button  type="submit" class="btn btn-primary">Enviar <i class="fa-solid fa-check fa-lg"></i></button--> 
                            </div>
                        </div>
                </form>

                <div class="d-flex justify-content-center">
                    <div class="col-5 mt-3">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover  table-hover">
                                <thead class="table-light">
                                     <th class="">Tipo de item</th>
                                     <th class="">Numero de serie</th>
                                     <th class="">Descripcion</th>
                                     <th class="">Eliminar</th>
                                </thead>
                            <tbody>
                                 <?php 
                                 require "../../config/conexion.php";

                                     $sql = "SELECT si.id_tipo_item as 'id_tipo_item_si', si.id_item as 'id_item', rit.id_item as 'id_item_rit', rit.id_tipo_item as 'id_tipo_item', rit.num_serie as 'num_serie', rit.descripcion as 'descripcion', ti.id_tipo_item as 'id_tipo_item_ti', ti.tipo_item as 'tipo_item' FROM salida_item si LEFT JOIN relacion_item_tipo_item rit ON rit.id_item = si.id_item LEFT JOIN tipo_item ti ON si.id_tipo_item = ti.id_tipo_item WHERE si.id_item > 0";
                                    $resultado = $conexion->query($sql);

                                    while($row = $resultado->fetch_assoc()) { ?>
                                         <tr class="col-">
                                         <!--corregir el nombre de las propiedades-->          
                                            <td class=""><?php echo $row['tipo_item'];?></td>
                                             <td class=""><?php echo $row['num_serie'];?></td>
                                             <td class=""><?php echo $row['descripcion'];?></td>
                                              <td class="col-text-center">
                                                <a href="./eliminar_salida_ki.php?id_item=<?php echo $row['id_item'];?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                            </td>
                                         </tr>
                                        <?php  } ?>
                                     </tbody>
                                 </table>
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
    // Agregar controlador de eventos change al primer select
    $('#id_tipo_item').on('change', function() {
        let id_tipo_item = $(this).val();
        // Realizar llamada AJAX para obtener las opciones disponibles
        $.ajax({
            url: 'get_items.php',
            method: 'POST',
            data: { id_tipo_item: id_tipo_item },
            dataType: 'json',
            success: function(data) {
                // Limpiar el segundo select y habilitarlo
                $('#id_item').empty().prop('disabled', false);
                // Iterar sobre las opciones recibidas
                $.each(data, function(key, value) {
                    // Verificar si el ID del ítem ya está seleccionado
                    if ($.inArray(value.id_item, <?php echo json_encode($items_seleccionados); ?>) !== -1) {
                        // Si está seleccionado, deshabilitar la opción
                        $('#id_item').append('<option value="' + value.id_item + '" disabled>' + value.num_serie + '</option>');
                    } else {
                        // Si no está seleccionado, agregar la opción normalmente
                        $('#id_item').append('<option value="' + value.id_item + '">' + value.num_serie + '</option>');
                    }
                });
                // Actualizar el select2 después de cambiar las opciones
                $('#id_item').select2();
            }
        });
    });
});
</script>

<!--script>
$(document).ready(function() {
    // Paso 1: Agregar controlador de eventos change al primer select
    $('#id_tipo_item').on('change', function() {
        let id_tipo_item = $(this).val(); // Obtener el valor seleccionado del primer select
        // Paso 2: Realizar llamada AJAX al servidor
        $.ajax({
            url: 'get_items.php', // Ruta de tu script PHP que devuelve las opciones
            method: 'POST',
            data: { id_tipo_item: id_tipo_item }, // Enviar el valor seleccionado al servidor
            dataType: 'json',
            success: function(data) {
                // Paso 3: Actualizar el segundo select con las nuevas opciones
                $('#id_item').html('<option value="" selected disabled>Selecciona tu opción</option>');
                $.each(data, function(key, value) {
                    $('#id_item').append('<option value="' + value.id_item + '">' + value.num_serie + '</option>');
                });
                // Paso 4: Actualizar el select2 después de cambiar las opciones
                $('#id_item').select2();
            }
        });
    });
});
</script-->