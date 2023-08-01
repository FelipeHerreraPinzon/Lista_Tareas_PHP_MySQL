<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id = $_POST['id'];
    $tarea = $_POST['tarea'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];

    $sentencia = $bd->prepare("UPDATE tareas SET tarea = ?, descripcion = ?, estado = ? where id = ?;");
    $resultado = $sentencia->execute([$tarea, $descripcion, $estado, $id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>