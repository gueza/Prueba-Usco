<div class="card">
    <div class="card-header">
        Realizar Agenda
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
                    <label for="codigo" class="form-label">Curso</label>
                    <select required class="form-select mt-2" aria-label="Default select example" name="curso">
                        <option selected>Curso</option>
                            <?php foreach($cursos as $curso){?>
                                <option  value="<?php echo $curso['id'] ?>"><?php echo strtoupper($curso['codigo'])." ".strtoupper($curso['asignatura']); ?></option>
                            <?php } ?> 
                    </select>
            </div>

            <div class="mb-3">
                    <label for="codigo" class="form-label">Profesor</label>
                    <select required class="form-select mt-2" aria-label="Default select example" name="profesor">
                        <option selected>Profesor</option>
                            <?php foreach($profesores as $profesor){?>
                                <option value="<?php echo $profesor['id'] ?>"><?php echo strtoupper($profesor['nombres'])." ". strtoupper($profesor['apellido']);?></option>
                            <?php } ?> 
                    </select>
            </div>

            <div class="mb-3">
                    <label for="codigo" class="form-label">Grupo</label>
                    <select required class="form-select mt-2" aria-label="Default select example" name="grupo">
                        <option selected>Grupo</option>
                            <?php foreach($grupos as $grupo){?>
                                <option value="<?php echo $grupo['id'] ?>"><?php echo strtoupper($grupo['grupo']); ?></option>
                            <?php } ?> 
                    </select>
            </div>

            <div class="mb-3">
                    <label for="codigo" class="form-label">Salón</label>
                    <select class="form-select mt-2" aria-label="Default select example" name="salon">
                        <option selected>Salón</option>
                            <?php foreach($salones as $salon){?>
                                <option required value="<?php echo $salon['id'] ?>"><?php echo strtoupper($salon['nombre']); ?></option>
                            <?php } ?> 
                    </select>
            </div>
            
            <div class="row">
                <div class="mb-3 col">
                    <label for="codigo" class="form-label">Fecha Inicial</label>
                    <input required type="datetime-local" max="22:30:00" class="form-control" name="inicial" id="inicial" aria-describedby="helpId" placeholder="Fecha">
                </div>
                <div class="mb-3 col">
                    <label for="codigo" class="form-label">Fecha Final</label>
                    <input required type="datetime-local" max="22:30:00" class="form-control" name="final" id="final" aria-describedby="helpId" placeholder="Fecha">
                </div>
            </div>
            
            

            <input name="" id="" class="btn btn-success" type="submit" value="Realizar agenda">
            <a href="?controlador=agendas&accion=inicio" class="btn btn-warning">Cancelar</a>
        </form>
    </div>
</div>