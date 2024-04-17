<?php include "header.php"; ?>
<?php include "../../nav.php"; 

require "../../config/conexion.php";

?>

<div class="container mt-2">
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/">Kit <i class="fa-solid fa-box-open fa-sm"></i></a> 
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/items">Item <i class="fa-solid fa-tv fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/antena">Antena <i class="fa-solid fa-satellite-dish fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/ip/">IP <i class="fa-solid fa-ethernet fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link active" aria-current="true" href="http://localhost/inventario_tec/modules/compañia">Compañia <i class="fa-solid fa-industry fa-sm"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h3 class="fw-bolder">Registro de Compañia</h3>
                    <a href="./registro_compañia.php" class="btn btn-primary">
                    Agregar nuevo registro <i class="fa-solid fa-circle-plus"></i>
                    </a>
                    <hr>
                <div class="col- table-responsive">
                <table class="table table-sm table-hover table-bordered">
                     <thead class="col-">
                        <th class="col-">Compañia</th>
                        <th class="col-">RFC</th>
                        <th class="col-">Contacto</th>
                        <th class="col-">Telefono</th>
                        <th class="col-">Correo de la compañia</th>
                        <th class="col-">URL imagen</th>

                        <th class="col-">Editar</th>
                        <th class="col-">Eliminar</th>
                    </thead>
                    <tbody>
                     <?php 
                       require "../../config/conexion.php";

                       $sql = "SELECT * FROM `compañia`";
                       $resultado = $conexion->query($sql);

                       while($row = $resultado->fetch_assoc()) { ?>
                        <tr class="col-">
                            <!--corregir el nombre de las propiedades-->          
                            <td class="col-"><?php echo $row['nombre_compañia'];?></td>
                            <td class="col-"><?php echo $row['rfc'];?></td>
                            <td class="col-"><?php echo $row['contacto'];?></td>
                            <td class="col-"><?php echo $row['telefono'];?></td>
                            <td><a href="<?php echo $row['correo_compañia']; ?>" class="link-success"><?php echo $row ['correo_compañia']?></a></td>
                            <!--td class="col-"><!-?php echo $row['correo_compañia'];?></td-->
                            <td><a href="<?php echo $row['url_img']; ?>" class="link-primary" target="_blank"><?php echo $row ['url_img']?></a></td>
                            <!--td class="col-"><!-?php echo $row['url_img'];?></td-->

                             <td class="col- text-center">
                                <a href="./editar_compañia.php?id_compañia=<?php echo $row['id_compañia'];?>" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></a>
                             </td>
                             <td class="col-text-center">
                                <a href="./eliminar_compañia.php?id_compañia=<?php echo $row['id_compañia'];?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
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