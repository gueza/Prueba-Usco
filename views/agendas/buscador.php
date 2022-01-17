<div class="card">
    
    <div class="card-body">
    <?php 
        if(!empty($rta)){ ?>
            <div class="alert alert-danger alert-dismissible fade show mt-3 col-md-6" role="alert">
                <?php echo $rta ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php } ?>

    <?php
        $fechaActual = strtotime(date('Y-m-d H:i:s'));
        //$fecha_de_hoy = new DateTime($fechaActual);
    ?>
    <form action="" method="post">
    <div class="mb-3 row">
            <div class="col-md-6">
                <label for="" class="form-label"></label>
                <input type="text" class="form-control" name="salon" id="" placeholder="Busca por salón">
            </div>
        
            <div class="col-md-6 mt-4">
                <input type="submit" value="Buscar" class="btn btn-primary">
                <a href="?controlador=agendas&accion=inicio" class="btn btn-warning">Cancelar</a>
            </div>
        
        </div>
    </form>

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
