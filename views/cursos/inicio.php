<div class="card">
    <div class="card-header">
        Cursos
        <a name="" id="" class="btn btn-success" href="?controlador=cursos&accion=crear" role="button">Agregar salón</a>
    </div>
    <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Codigo</th>
                <th>Asignatura</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cursos as $curso){ ?>
                <tr>
                    <td><?php echo strtoupper($curso['id']); ?></td>
                    <td><?php echo strtoupper($curso['codigo']); ?></td>
                    <td><?php echo strtoupper($curso['asignatura']); ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            <a href="?controlador=cursos&accion=editar&id=<?php echo $curso['id']; ?>" class="btn btn-info">Editar</a>
                            <a href="?controlador=cursos&accion=borrar&id=<?php echo $curso['id']; ?>" class="btn btn-danger">Borrar</a>
                        </div>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>

    </div>
</div>
