<?php
include '../../config.php';


$nro_venta = $_GET['nro_venta'];
$id_cliente = $_GET['id_cliente'];
$total_a_cancelar = $_GET['total_a_cancelar'];



    $pdo->beginTransaction();

    $sentencia = $pdo->prepare("INSERT INTO tb_ventas
            (nro_venta, id_cliente, total_pagado, fyh_creacion) 
    VALUES (:nro_venta,:id_cliente,:total_pagado,:fyh_creacion)");

    $sentencia->bindParam('nro_venta',$nro_venta);
    $sentencia->bindParam('id_cliente',$id_cliente);
    $sentencia->bindParam('total_pagado',$total_a_cancelar);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    if($sentencia->execute()){

        $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Se registro la venta Correctamente";
    $_SESSION['icono']="success";
    //header('location: '.$URL.'/categorias');
        ?>
        <script>
            location.href = "<?php echo $URL; ?>/ventas";
        </script>

        <?php

    }else{

        $pdo->rollBack();

        session_start();
        $_SESSION['mensaje'] = "no se pudo registrar";
        $_SESSION['icono']="error";
        ?>
        <script>
           location.href = "<?php echo $URL; ?>/ventas/create.php";
        </script>
        <?php

    }

   



//echo $fechaHora;