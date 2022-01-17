<div class="card">
    <div class="card-header">
        Salones
        <a name="" id="" class="btn btn-success" href="?controlador=salones&accion=crear" role="button">Agregar salón</a>
    </div>
    <div class="card-body">
    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salones as $salon){ ?>
                <tr>
                    <td><?php echo $salon['id']; ?></td>
                    <td><?php echo strtoupper($salon['nombre']); ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            <a href="?controlador=salones&accion=editar&id=<?php echo $salon['id']; ?>" class="btn btn-info">Editar</a>
                            <a href="?controlador=salones&accion=borrar&id=<?php echo $salon['id']; ?>" class="btn btn-danger">Borrar</a>
                        </div>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>

    </div>
</div>
