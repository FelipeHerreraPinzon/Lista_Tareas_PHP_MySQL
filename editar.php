<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("select * from tareas where id = ?;");
    $sentencia->execute([$id]);
    $tarea = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    
                    <div class="mb-3">
                        <label class="form-label">Tarea: </label>
                        <input type="text" class="form-control" name="tarea" autofocus required
                        value="<?php echo $tarea->tarea; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción: </label>
                        <input type="text" class="form-control" name="descripcion" autofocus required
                        value="<?php echo $tarea->descripcion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado: </label>
                        
                    
                    <select name="estado" id="" required>

                           <option selected><?php echo $tarea->estado; ?></option>
                           <option value="ASIGNADA">ASIGNADA</option>
                           <option value="EN CURSO">EN CURSO</option>
                           <option value="TERMINADA">TERMINADA</option>

                    </select>

                        </div>    
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $tarea->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>