<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-success" href="?controlador=agendas&accion=crear" role="button">Agregar Agenda</a>
    </div>
    <div class="card-body">

    <?php
        $fechaActual = strtotime(date('Y-m-d H:i:s'));
        //$fecha_de_hoy = new DateTime($fechaActual);
    ?>
 
    <div class="col-md-6 mt-4">
        <a href="?controlador=agendas&accion=buscador" class="btn btn-primary">Buscar</a>
        </div>
    </div>

    <table class="table table-bordered" >
        <thead>
            <tr>
                <th>ID</th>
                <th>COD Curso</th>
                <th>Nombre Curso</th>
                <th>Profesor</th>
                <th>Salon</th>
                <th>Grupo</th>
                <th>HoraInicial</th>
                <th>HoraFin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agendas as $agenda){ ?>
                <?php   
                    $fecha_ven = $agenda['horaInicio'];
                    $fecha_vencimiento =  strtotime($fecha_ven);
                ?>
                    <tr  
                    <?php if ($fecha_vencimiento<$fechaActual){ ?> 
                        class="table-danger" title="Curso pasado"
                    <?php } else{ ?>
                        class="table-success" title="Curso próximo"
                    <?php } ?>    
                    data-bs-toggle="tooltip" ata-bs-placement="top">
                    
                        <td ><?php echo strtoupper($agenda['id']); ?></td>
                        <td><?php echo strtoupper($agenda['codigo']); ?></td>
                        <td><?php echo strtoupper($agenda['asignatura']); ?></td>
                        <td><?php echo strtoupper($agenda['nombres']);?> <?php echo strtoupper($agenda['apellido']);?></td>
                        <td><?php echo strtoupper($agenda['nombre']);  ?></td>
                        <td><?php echo strtoupper($agenda['grupo']); ?></td>
                        <td><?php echo strtoupper($agenda['horaInicio']); ?></td>
                        <td><?php echo strtoupper($agenda['horaFin']); ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                <a href="?controlador=agendas&accion=editar&id=<?php echo $agenda['id']; ?>" class="btn btn-info">Editar</a>
                                <a href="?controlador=agendas&accion=borrar&id=<?php echo $agenda['id']; ?>" class="btn btn-danger">Borrar</a>
                            </div>
                        </td>
                    </tr>
            <?php }?>
        </tbody>
    </table>

    </div>
</div>
