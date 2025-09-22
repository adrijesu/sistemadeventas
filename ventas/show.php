<?php 
$id_venta_get = $_GET['id_venta'];
 include "../app/config.php";
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/ventas/cargar_venta.php';
include '../app/controllers/clientes/cargar_cliente.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">DETALLE DE LA VENTA NRO <?php echo $nro_venta;?> </h1>
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

                <h3 class="card-title"><i class="fa fa-shopping-bag"></i> VENTA NRO 
                <input type="text" style="text-align: center" value="<?php echo $nro_venta; ?>" disabled> </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
              <!-- /.card-body -->
             
            </div>                                                           
        </div>
     </div>

     <div class="row">
        <div class="col-md-9">    
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-user-check"></i> DATOS DEL CLIENTE  </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
               <?php 
               foreach($clientes_datos as $clientes_dato){
                $nombre_cliente = $clientes_dato['nombre_cliente'];
                $nit_ci_cliente = $clientes_dato['nit_ci_cliente'];
                $celular_cliente = $clientes_dato['celular_cliente'];
                $email_cliente = $clientes_dato['email_cliente'];
               }
               ?>
              <div class="card-body">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <input type="text" value="" id="id_cliente" hidden>
                              <label for="">Nombre del cliente</label>
                              <input type="text" value="<?php echo $nombre_cliente;?>" class="form-control" id="nombre_cliente" disabled>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">NIT/CI del cliente</label>
                              <input type="text" value="<?php echo $nit_ci_cliente;?>" class="form-control" id="nit_ci_cliente" disabled>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Celular del cliente</label>
                              <input type="text" value="<?php echo $celular_cliente;?>" class="form-control" id="celular_cliente" disabled>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Correo del cliente</label>
                              <input type="text" value="<?php echo $email_cliente;?>" class="form-control" id="email_cliente" disabled>
                            </div>
                          </div>
                        </div>
              </div>
              <!-- /.card-body -->
            </div>                                                           
        </div>

        <div class="col-md-3">    
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-shopping-basket"></i> REGISTRAR VENTA </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="form-group">
                  <label for="">Monto a cancelar</label>
                  <input type="text" class="form-control" id="total_a_cancelar" style="text-align: center; background-color: gold;" 
                        value="<?php echo $precio_total;?>" disabled>
                 </div>

                 
                 
              </div>
              <!-- /.card-body -->
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
              "info": "Mostrando START a END de TOTAL Productos",
              "infoEmpty": "Mostrando 0 to 0 of 0 Productos",
              "infoFiltered": "(Filtrado de MAX total Productos)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar_MENU_Productos",
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
    
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });

  $(function () {
    $("#example2").DataTable({
      "pageLength": 5,
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando START a END de TOTAL Clientes",
              "infoEmpty": "Mostrando 0 to 0 of 0 Clientes",
              "infoFiltered": "(Filtrado de MAX total Clientes)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar_MENU_Clientes",
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
    
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });
</script>

 <!-- modal para visualizar el formulario para agregar clientes-->
  <div class="modal fade" id="modal-agregar_cliente">
      <div class="modal-dialog modal-sm ">
      <div class="modal-content">
          <div class="modal-header" style="background-color: #e8b912ff;color:white">
              <h4 class="modal-title">Nuevo cliente</h4>
              <div style="width: 10px;"></div>
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
              </button>
          </div>
          <div class="modal-body">
            <form action="../app/controllers/clientes/guardar_clientes.php" method="post">
                <div class="form-group">
                  <label for="">Nombre del cliente</label>
                  <input type="text" name="nombre_cliente" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">Nit/Ci del cliente</label>
                  <input type="text" name="nit_ci_cliente" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">Celular del cliente</label>
                  <input type="text" name="celular_cliente" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">Correo del cliente</label>
                  <input type="email" name="email_cliente" class="form-control">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-warning btn-block">Guardar cliente</button>
                </div>
            </form>
          </div>                          
      </div>
      <!-- /.modal-content -->
      </div>
    </div>