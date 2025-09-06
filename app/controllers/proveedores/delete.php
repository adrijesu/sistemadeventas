<?php
include '../../config.php';

$id_proveedor = $_GET['id_proveedor'];

    $sentencia = $pdo->prepare("DELETE FROM tb_proveedores WHERE id_proveedor=:id_proveedor");
    $sentencia->bindParam('id_proveedor',$id_proveedor);
    
    
   if($sentencia->execute()){
    
    session_start();
    $_SESSION['mensaje'] = "Se elimino al proveedor Correctamente";
    $_SESSION['icono']="success";
    //header('location: '.$URL.'/categorias');
        ?>
        <script>
            location.href = "<?php echo $URL; ?>/proveedores";
        </script>

        <?php

    }else{
        session_start();
        $_SESSION['mensaje'] = "no se pudo eliminar";
        $_SESSION['icono']="error";
        ?>
        <script>
           header('location: '.$URL.'/proveedores');
        </script>
        <?php

    }