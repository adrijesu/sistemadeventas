<?php 
include '../../config.php';

$id_carrito = $_POST['id_carrito'];


//echo $id_compra. " - " .$id_producto. " - " .$cantidad_compra;

    $sentencia = $pdo->prepare("DELETE FROM tb_carrito WHERE id_carrito=:id_carrito");

    $sentencia->bindParam('id_carrito',$id_carrito);
   
    if($sentencia->execute()){
        ?>
        <script>
            location.href = "<?php echo $URL; ?>/ventas/create.php";
        </script>
        <?php
    }else{
        ?>
        <script>
           location.href = "<?php echo $URL; ?>/ventas/create.php";
        </script>
        <?php

    }