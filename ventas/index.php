<?php 

 include "../app/config.php";
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/ventas/listado_de_ventas.php';


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">LISTADO DE VENTAS REALIZADAS</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       
        <div class="row">
        <div class="col-md-12">
       
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Ventas Registradas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <div class="table table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                
                  <thead>
                  <tr>
                        <th><center>NRO</center></th>
                        <th><center>nro venta</center></th>
                        <th><center>productos</center></th>
                        <th><center>cliente</center></th>
                        <th><center>Total pagado</center></th>
                        <th><center>Acciones</center></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $contador = 0;
                        foreach($ventas_datos as $ventas_dato) { 
                          $id_venta = $ventas_dato['id_venta'];
                          $id_cliente = $ventas_dato['id_cliente'];
                          $contador = $contador + 1;?>
                          
                          <tr>
                            <td><center><?php echo $contador;?></center></td>
                            <td><center><?php echo $ventas_dato['nro_venta'];?></center></td>
                            <td>
                                <center>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_productos<?php echo $id_venta;?>">
                               <i class="fa fa-shopping-basket"></i> Productos
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="Modal_productos<?php echo $id_venta;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header" style="background-color: #8fbae6ff;">
                                        <h5 class="modal-title" id="exampleModalLabel">Productos de la venta nro <?php echo $ventas_dato['nro_venta'];?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-sm table-hover table-striped" >
                                            <thead>
                                                <tr>
                                                    <th style="background-color: #e7e7e7; text-align: center;">NRO</th>
                                                    <th style="background-color: #e7e7e7; text-align: center;">PRODUCTO</th>
                                                    <th style="background-color: #e7e7e7; text-align: center;">DESCRIPCION</th>
                                                    <th style="background-color: #e7e7e7; text-align: center;">CANTIDAD</th>
                                                    <th style="background-color: #e7e7e7; text-align: center;">PRECIO UNITARIO</th>
                                                    <th style="background-color: #e7e7e7; text-align: center;">PRECIO SUBTOTAL</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $contador_de_carrito = 0;
                                            $cantidad_total = 0;
                                            $precio_unitario_total = 0;
                                            $precio_total = 0;


                                            $nro_venta = $ventas_dato['nro_venta'];
                                            $sql_carrito = "SELECT *, pro.nombre as nombre_producto, pro.descripcion as descripcion, pro.precio_venta as precio_venta, pro.stock as stock, pro.id_producto as id_producto from tb_carrito  as car  INNER JOIN tb_almacen as pro ON car.id_producto = pro.id_producto
                                            where nro_venta= '$nro_venta;' order by id_carrito ";
                                                $query_carrito= $pdo->prepare($sql_carrito);
                                                $query_carrito->execute();
                                                $carrito_datos=$query_carrito->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($carrito_datos as $carrito_dato) {
                                                $id_carrito = $carrito_dato['id_carrito'];
                                                $contador_de_carrito = $contador_de_carrito + 1; 
                                                $cantidad_total = $cantidad_total + $carrito_dato['cantidad'];
                                                $precio_unitario_total =$precio_unitario_total + floatval($carrito_dato['precio_venta']); ?>
                                                <tr>
                                                    <td>
                                                    <center><?php echo $contador_de_carrito; ?></center>
                                                    <input type="text" value="<?php echo $carrito_dato['id_producto']; ?>" id="id_producto<?php echo $contador_de_carrito; ?>" hidden>
                                                    </td>
                                                    <td><?php echo $carrito_dato['nombre_producto']; ?></td>
                                                    <td><?php echo $carrito_dato['descripcion']; ?></td>
                                                    <td>
                                                    <center><span id="cantidad_carrito<?php echo $contador_de_carrito; ?>"><?php echo $carrito_dato['cantidad']; ?></span></center>
                                                    <input type="text" value="<?php echo $carrito_dato['stock'];?>" id="stock_de_inventario<?php echo $contador_de_carrito;?>" hidden>
                                                </td>
                                                    <td><center><?php echo $carrito_dato['precio_venta']; ?></center></td>
                                                    <td>
                                                    <center>
                                                    <?php 
                                                    $cantidad = floatval($carrito_dato['cantidad']);
                                                    $precio_venta = floatval($carrito_dato['precio_venta']);
                                                    echo $subtotal = $cantidad * $precio_venta;
                                                    $precio_total = $precio_total + $subtotal;
                                                    ?>
                                                    </center>
                                                    </td>
                                                    
                                                </tr>
                                            <?php 
                                                }
                                            ?>
                                                <tr>
                                                    <th colspan="3" style="background-color: #e7e7e7; text-align: right">total</th>
                                                    <th><center><?php echo $cantidad_total; ?></center></th>
                                                    <th><center><?php echo $precio_unitario_total; ?></center></th>
                                                    <th style="background-color: gold;"><center><?php echo $precio_total; ?></center></th>
                                                </tr>
                                            </tbody>
                                            </table>                    
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modal_clientes<?php echo $id_venta;?>">
                               <i class="fa fa-shopping-basket"></i> <?php echo $ventas_dato['nombre_cliente']?>
                                </button>

                                <!-- Modal -->
                                <!-- modal para visualizar el formulario para agregar clientes-->
                                    <div class="modal fade" id="Modal_clientes<?php echo $id_venta;?>">
                                        <div class="modal-dialog modal-sm ">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #e8b912ff;color:white">
                                                <h4 class="modal-title">cliente</h4>
                                                <div style="width: 10px;"></div>
                                                
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span>
                                                </button>
                                            </div>
                                            <?php 
                                            $sql_clientes = "SELECT * FROM tb_clientes where id_cliente = '$id_cliente'";
                                            $query_clientes= $pdo->prepare($sql_clientes);
                                            $query_clientes->execute();
                                            $clientes_datos=$query_clientes->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($clientes_datos as $clientes_dato){
                                               $nombre_cliente = $clientes_dato['nombre_cliente'];
                                               $nit_ci_cliente = $clientes_dato['nit_ci_cliente']; 
                                               $celular_cliente = $clientes_dato['celular_cliente']; 
                                               $email_cliente = $clientes_dato['email_cliente'];      
                                            }
                                            ?>
                                            <div class="modal-body">
                                                
                                                    <div class="form-group">
                                                    <label for="">Nombre del cliente</label>
                                                    <input type="text" value="<?php echo  $nombre_cliente?>" name="nombre_cliente" class="form-control" disabled>
                                                    </div>

                                                    <div class="form-group">
                                                    <label for="">Nit/Ci del cliente</label>
                                                    <input type="text" value="<?php echo  $nit_ci_cliente?>" name="nit_ci_cliente" class="form-control" disabled>
                                                    </div>

                                                    <div class="form-group">
                                                    <label for="">Celular del cliente</label>
                                                    <input type="text" value="<?php echo  $celular_cliente?>" name="celular_cliente" class="form-control" disabled>
                                                    </div>

                                                    <div class="form-group">
                                                    <label for="">Correo del cliente</label>
                                                    <input type="email" value="<?php echo  $email_cliente?>" name="email_cliente" class="form-control" disabled>
                                                    </div>

                                                    
                                                
                                            </div>                          
                                        </div>
                                        <!-- /.modal-content -->
                                        </div>
                                        </div>
                                </center>
                            </td>
                            <td>
                                <center><button class="btn btn-primary" disabled><?php echo "S/.".$ventas_dato['total_pagado'];?></button></center>
                            </td>
                            <td>
                                <center>
                                    <a href=" show.php?id_venta=<?php echo $id_venta;?>" class="btn btn-info"><i class="fa fa-eye"></i> Ver</a>
                                    <a href="delete.php?id_venta=<?php echo $id_venta;?>&nro_venta=<?php echo $nro_venta;?> " class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</a>
                                    <a href="factura.php?id_venta=<?php echo $id_venta;?>&nro_venta=<?php echo $nro_venta;?> " class="btn btn-success"><i class="fa fa-print"></i> Imprimir</a>
                                </center>
                            </td>
                          </tr>
                        <?php
                            }                    
                        ?> 
                    </tbody>
                    </tfoot>
                  </div>  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
<?php include '../layout/mensaje.php'?>
<?php include '../layout/parte2.php'?>

<script>
  $(function () {
    $("#example1").DataTable({
      "pageLength": 5,
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando START a END de TOTAL Compras",
              "infoEmpty": "Mostrando 0 to 0 of 0 Compras",
              "infoFiltered": "(Filtrado de MAX total Compras)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar_MENU_Compras",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscador:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
             },
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });
</script>



