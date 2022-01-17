<div class="card">
    <div class="card-header">
        Editar cursos
    </div>
    <?php 
        if(!empty($rta)){ ?>
            <div class="alert alert-danger alert-dismissible fade show mt-3 col-md-6" role="alert">
                <?php echo $rta ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
    <div class="card-body">
        <form action="" method="post">

            <div class="mb-3">
              <label for="id" class="form-label">ID:</label>
              <input type="text"
                readonly class="form-control" value="<?php echo $cursos['id']; ?>" name="" id="" aria-describedby="helpId" placeholder="ID">
            </div>

            <div class="mb-3">
              <label for="codigo" class="form-label">Codigo:</label>
              <input type="text"
                class="form-control" value="<?php echo $cursos['codigo']; ?>" name="codigo" id="codigo" aria-describedby="helpId" placeholder="Codigo">
            </div>

            <div class="mb-3">
                <label for="asignatura" class="form-label">Asignatura</label>
                <input type="text" required value="<?php echo $cursos['asignatura']; ?>" class="form-control" name="asignatura" id="asignatura" aria-describedby="helpId" placeholder="Asignatura">
            </div>


            <input name="" id="" class="btn btn-success" type="submit" value="Editar curso">
            <a href="?controlador=cursos&accion=inicio" class="btn btn-warning">Cancelar</a>
        </form>
    </div>
</div>