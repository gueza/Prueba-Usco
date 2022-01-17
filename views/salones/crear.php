<div class="card">
    <div class="card-header">
        Agregar salón
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
                <label for="nombre" class="form-label">Nombre</label>
                <input required type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="">
            </div>

            <input class="btn btn-success" type="submit" value="Agregar salón">
            <a href="?controlador=salones&accion=inicio" class="btn btn-warning">Cancelar</a>


        </form>
    </div>
</div>