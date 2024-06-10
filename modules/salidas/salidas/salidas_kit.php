<?php include "header.php"; ?>
<?php include "../../nav.php";

require('../../config/conexion.php');

$id_kit= $_GET['id_kit']; 
$sql_kit = "SELECT * FROM `relacion_kit_item` WHERE id_kit = '$id_kit'";
$resultado_kit = $conexion->query($sql_kit);
?>
<?php
//$sql_kit1 =  "SELECT * FROM `relacion_kit_item";
$sql_kit1 = "SELECT DISTINCT id_kit FROM relacion_kit_item WHERE 1 ORDER BY `relacion_kit_item`.`id_kit` ASC";
$resultado_kit1 = $conexion->query($sql_kit1);
//select del modal
$sql_kit2 =  "SELECT * FROM `relacion_item_tipo_item`";
$resultado_kit2 = $conexion->query($sql_kit2);

// Obtener los IDs de los items ya seleccionados
$sql_items_seleccionados = "SELECT id_item FROM `relacion_kit_item`";
$resultado_items_seleccionados = $conexion->query($sql_items_seleccionados);
$items_seleccionados = array();

if ($resultado_items_seleccionados->num_rows > 0) {
    while ($row_item = $resultado_items_seleccionados->fetch_assoc()) {
        $items_seleccionados[] = $row_item['id_item'];
    }
}

// Obtener los kits disponibles
$sql_kit_disponibles = "SELECT id_kit FROM salida";
$resultado_kit_disponibles = $conexion->query($sql_kit_disponibles);

 // Obtener los kits seleccionados
$sql_kits_seleccionados = "SELECT DISTINCT id_kit FROM salida";
$resultado_kits_seleccionados = $conexion->query($sql_kits_seleccionados);
$kits_seleccionados = array();
while ($row = $resultado_kits_seleccionados->fetch_assoc()) {
    $kits_seleccionados[] = $row['id_kit'];
}
// Obtener los kits disponibles
$sql_kit_disponibles = "SELECT DISTINCT id_kit FROM relacion_kit_item WHERE id_kit > 0 ORDER BY `relacion_kit_item`.`id_kit` ASC";
$resultado_kit_disponibles = $conexion->query($sql_kit_disponibles);

// Variable para controlar si el select debe estar deshabilitado
$select_disabled = (isset($id_kit) && $id_kit !=0) ? "disabled" : "";
?>
<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Salida de Kit's</h4>
            </div>
            <div class="card-body">
                <form action="agregar_kit.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-4 mt-3">
                        <div class="d-flex justify-content-end">
                            <a href="#itemModal?id_kit=<?php echo $id_kit; ?>" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#itemModal">Agregar Item al Kit <i class="fa-solid fa-box-open"></i></a>
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                    <input type="hidden" name="id_info" value="2">
                        <label for="id_kit" class="form-label">Número de KIT</label>
                            <select name="id_kit" id="id_kit" class="form-select" required <?php echo $select_disabled; ?>>
                                <option value="" selected disabled>Selecciona el número de KIT</option>
                                    <?php while ($row = $resultado_kit_disponibles->fetch_assoc()) { ?>
                                        <?php if (in_array($row['id_kit'], $kits_seleccionados)) { ?>
                                 <option value="<?php echo $row['id_kit']; ?>" disabled><?php echo $row['id_kit']; ?></option>
                                    <?php } else { ?>
                                <option value="<?php echo $row['id_kit']; ?>"><?php echo $row['id_kit']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-2 mt-3">
                            <label for="submit" class="form-label"></label>
                            <button type="submit" id="submitBtn" class="btn btn-success mt-3">Agregar <i class="fa-solid fa-plus fa-sm"></i></button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col text-center form-group mt-4">
                            <a href="./index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                            <a href="./reporte_salida.php" class="btn btn-primary">Generar reporte <i class="fa-solid fa-file-invoice"></i></a>
                        </div>
                    </div>
                </form>
                <?php
                //mostrar variables mientras este en 0 hasta mostrar un valor 
                $id_kit = isset($_GET['id_kit']) ? $_GET['id_kit'] : 0;
                if ($id_kit != 0) {
                        //$sql = "SELECT si.id_tipo_item as 'id_tipo_item', si.id_item as 'id_item', si.id_kit as 'id_kit', rki.id_kit as 'id_kit_rki', rki.id_item as 'id_item_rki', rit.id_item as 'id_item', rit.num_serie as 'num_serie', rit.descripcion as 'descripcion' FROM salida_item si LEFT JOIN relacion_kit_item rki ON rki.id_kit = si.id_kit LEFT JOIN relacion_item_tipo_item rit ON rki.id_item = rit.id_item WHERE si.id_kit = '$id_kit' ORDER BY `si`.`id_kit` ASC";
                        $sql = "SELECT sa.id_tipo_item as 'id_tipo_item', sa.id_item as 'id_item', sa.id_kit as 'id_kit', rki.id_kit as 'id_kit_rki', rki.id_item as 'id_item_rki', rit.id_item as 'id_item', rit.num_serie as 'num_serie', rit.descripcion as 'descripcion' FROM salida sa LEFT JOIN relacion_kit_item rki ON rki.id_kit = sa.id_kit LEFT JOIN relacion_item_tipo_item rit ON rki.id_item = rit.id_item WHERE sa.id_kit = '$id_kit' ORDER BY `sa`.`id_kit` ASC";
                        $resultado = $conexion->query($sql);
                ?>
                <div class="d-flex justify-content-center">
                    <div class="col-5 mt-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar Numero de KIT o Item">
                        <div class="table-responsive mt-3">
                        <table class="table table-sm table-hover table-hover">
                            <thead class="table-light">
                                 <th class="">Numero de KIT</th>
                                 <th class="">Numero de Serie</th>
                                 <th class="">Descripcion</th>
                                 <th class="">Borrar Item</th>
                                 <th class="">Eliminar</th>
                            </thead>
                                <tbody id="tableBody">
                                    <?php
                                while ($row = $resultado->fetch_assoc()) {
                                    ?>
                                <tr class="col-">
                                    <!--corregir el nombre de las propiedades-->
                                    <td class=""><?php echo $row['id_kit']; ?></td>
                                    <td class=""><?php echo $row['num_serie']; ?></td>
                                    <td class=""><?php echo $row['descripcion']; ?></td>

                                     <td class="col-text-center">
                                        <!--borrar del kit-->
                                        <a href="./borrar_item_kit.php?id_kit=<?php echo $_GET['id_kit']; ?>&id_item=<?php echo $row['id_item']; ?>" class="btn btn-warning"><i class="fa-solid fa-delete-left"></i></a>
                                     <td class="col-text-center">
                                    <a href="./eliminar_salida_kit.php?id_kit=<?php echo $row['id_kit']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                     </td>
                                 </tr>
                                <?php } ?>
                            </tbody>
                         </table>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!--modal de items-->
<div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">Agregar Item al Kit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addItemForm">
                    <div class="form-group">
                        <input type="hidden" name="id_kit" value="<?php echo $_GET['id_kit']; ?>">
                    </div>
                    <div class="mb-3">
                    <label for="id_item" class="form-label">Numero de Serie</label>
                        <select name="id_item" id="id_item" class="form-select" required>
                            <option value="" selected disabled>Selecciona tu opción</option>
                                <?php 
                             while($row_kit2 = $resultado_kit2->fetch_assoc()){
                             $disabled = in_array($row_kit2['id_item'], $items_seleccionados) ? 'disabled' : ''; // Verifica si el item está en la lista de seleccionados
                                 ?>
                              <option value="<?php echo $row_kit2['id_item']; ?>" <?php echo $disabled; ?>><?php echo $row_kit2['num_serie']; ?></option>
                         <?php } ?>
                        </select>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar al Kit <i class="fa-solid fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<!--script>
$(document).ready(function(){
    // Obtener el valor de id_kit de la URL
    let urlParams = new URLSearchParams(window.location.search);
    let id_kit = urlParams.get('id_kit');
    
    $("#addItemForm").submit(function(event){
        event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional
        
        // Obtener datos del formulario
        let formData = $(this).serialize();
        // Agregar el valor de id_kit al formData
        formData += '&id_kit=' + id_kit;
        
        // Enviar datos mediante AJAX
        $.ajax({
            type: "POST",
            url: "guardar_item.php",
            data: formData,
            success: function(response){
                // Manejar la respuesta del servidor
                console.log(response);
                // Cerrar el modal
                $('#itemModal').modal('hide');
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
</script-->
<script>
$(document).ready(function(){
    $("#addItemForm").submit(function(event){
        event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional
        
        // Obtener datos del formulario
        let formData = $(this).serialize();
        
        // Enviar datos mediante AJAX
        $.ajax({
            type: "POST",
            url: "guardar_item.php",
            data: formData,
            success: function(response){
                // Manejar la respuesta del servidor
                console.log(response);
                // Cerrar el modal
                $('#itemModal').modal('hide');
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
$(document).ready(function(){
    $("#addItemForm").submit(function(event){
        event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional
        
        // Obtener datos del formulario
        let formData = $(this).serialize();
        
        // Enviar datos mediante AJAX
        $.ajax({
            type: "POST",
            url: "guardar_item.php",
            data: formData,
            success: function(response){
                // Manejar la respuesta del servidor
                console.log(response);
                // Cerrar el modal
                $('#itemModal').modal('hide');
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
    $(document).ready(function() {
        $('#id_kit').select2();
    });
</script>
<script>
    function eliminarRegistroAnterior(idKitAnterior) {
        if (idKitAnterior !== "") {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "eliminar_registro.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("id_kit_anterior=" + idKitAnterior);
        }
    }

    function seleccionarNuevoRegistro() {
        let id_kit = document.getElementById("id_kit").value;
        if (id_kit !== "") {
            eliminarRegistroAnterior(id_kit);
        }
    }
</script>

    <script>
    // Obtener referencia al campo de entrada y a la tabla (buscar en la tabla)
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('tableBody');

    // Escuchar el evento de cambio en el campo de entrada
    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.toLowerCase(); 
        const rows = tableBody.getElementsByTagName('tr'); 

        // Iterar sobre las filas y mostrar u ocultar según el término de búsqueda
        Array.from(rows).forEach(row => {
            const cells = row.getElementsByTagName('td'); 
            let found = false;

            // Iterar sobre las celdas de la fila actual
            Array.from(cells).forEach(cell => {
                const cellText = cell.textContent.toLowerCase(); 
                if (cellText.includes(searchTerm)) { 
                    found = true; 
                }
            });

            // Mostrar u ocultar la fila según si se encontró el término de búsqueda
            row.style.display = found ? '' : 'none';
        });
    });
</script>