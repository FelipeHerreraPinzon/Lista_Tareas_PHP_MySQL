<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["tarea"]) || empty($_POST["descripcion"]) || empty($_POST["estado"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    
    $tarea = $_POST["tarea"];
    $descripcion = $_POST["descripcion"];
    $estado = $_POST["estado"];
    
    $sentencia = $bd->prepare("INSERT INTO tareas(tarea,descripcion,estado) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$tarea,$descripcion,$estado]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>