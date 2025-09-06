<?php 
 include "../app/config.php";
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/compras/listado_de_compras.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">LISTADO DE COMPRAS</h1>
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
                <h3 class="card-title">Compras Registrados</h3>

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
                        <th><center>nro de la compra</center></th>
                        <th><center>producto</center></th>
                        <th><center>fecha de compra</center></th>
                        <th><center>proveedor</center></th>
                        <th><center>comprobante</center></th>                       
                        <th><center>usuario</center></th>
                        <th><center>Precio compra</center></th>
                        <th><center>cantidad</center></th>
                        <th><center>Acciones</center></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $contador = 0;
                        foreach($compras_datos as $compras_dato) { 
                          $id_compra = $compras_dato['id_compra'];?>
                          
                        <tr>
                            <td><?php echo $contador = $contador + 1; ?></td>
                            <td><?php echo $compras_dato['nro_compra']?></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" 
                                        data-target="#modal-producto<?php echo $id_compra;?>">
                                      <?php echo $compras_dato['nombre_producto'];?>
                                </button>
                            <!-- modal para visualizar datos de los productos-->
                              <div class="modal fade" id="modal-producto<?php echo $id_compra;?>">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header" style="background-color: #07b0d6;color:white">
                                            <h4 class="modal-title">Datos del producto</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">x</span>
                                            </button>
                                          </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="">codigo</label>
                                                                        <input type="text" value="<?php echo $compras_dato['codigo'] ?>" class="form-control" disabled>
                                                                    </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="">nombre del producto</label>
                                                                        <input type="text" value="<?php echo $compras_dato['nombre'] ?>" class="form-control"disabled >
                                                                    </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">descripcion del producto</label>
                                                                        <input type="text" value="<?php echo $compras_dato['descripcion'] ?>" class="form-control"disabled >
                                                                    </div>
                                                            </div>
                                                        </div>  
                                                        
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">stock</label>
                                                                    <input type="text" value="<?php echo $compras_dato['stock'] ?>" class="form-control"disabled >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">stock minimo</label>
                                                                    <input type="text" value="<?php echo $compras_dato['stock_minimo'] ?>" class="form-control"disabled >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">stock maximo</label>
                                                                    <input type="text" value="<?php echo $compras_dato['stock_maximo'] ?>" class="form-control"disabled >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">fecha ingreso</label>
                                                                    <input type="text" value="<?php echo $compras_dato['fecha_ingreso'] ?>" class="form-control"disabled >
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">precio compra</label>
                                                                        <input type="text" value="<?php echo $compras_dato['precio_compra_producto'] ?>" class="form-control"disabled >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">precio venta</label>
                                                                        <input type="text" value="<?php echo $compras_dato['precio_venta_producto'] ?>" class="form-control"disabled >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">categoria</label>
                                                                        <input type="text" value="<?php echo $compras_dato['nombre_categoria'] ?>" class="form-control"disabled >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">usuario</label>
                                                                        <input type="text" value="<?php echo $compras_dato['nombre_usuario_producto'] ?>" class="form-control"disabled >
                                                                    </div>
                                                                </div>
                                                            </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Imagen del producto</label>
                                                            <img src="<?php echo $URL."/almacen/img_productos/".$compras_dato['imagen'];?>" width="100%" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                              

                                            </div>
                                          
                                        </div>
                                        <!-- /.modal-content -->
                                      </div>
                                      <!-- /.modal-dialog -->
                                    </div>   
                            </td>
                            <td><?php echo $compras_dato['fecha_compra']?></td>

                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" 
                                        data-target="#modal-proveedor<?php echo $id_compra;?>">
                                      <?php echo $compras_dato['nombre_proveedor'];?>
                                </button>

                                <!-- modal para visualizar datos de los productos-->
                                    <div class="modal fade" id="modal-proveedor<?php echo $id_compra;?>">
                                      <div class="modal-dialog ">
                                        <div class="modal-content">
                                          <div class="modal-header" style="background-color: #07b0d6;color:white">
                                            <h4 class="modal-title">Datos del proveedor</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">x</span>
                                            </button>
                                          </div>
                                            <div class="modal-body">

                                               <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">nombre del proveedor</label>
                                                        <input type="text" value="<?php echo $compras_dato['nombre_proveedor']; ?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">celular del proveedor</label>
                                                        <a href="https://wa.me/+51<?php echo $compras_dato['celular_proveedor']; ?>" target="_blank" class="btn btn-success">
                                                            <i class="fa fa-phone"> </i>
                                                            <?php echo $compras_dato['celular_proveedor']; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                               </div>

                                               <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">telefono del proveedor</label>
                                                        <input type="text" value="<?php echo $compras_dato['telefono_proveedor']; ?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">empresa</label>
                                                        <input type="text" value="<?php echo $compras_dato['empresa']; ?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                               </div>

                                               <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">email del proveedor</label>
                                                        <input type="text" value="<?php echo $compras_dato['email_proveedor']; ?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">direccion</label>
                                                        <input type="text" value="<?php echo $compras_dato['direccion_proveedor']; ?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                               </div>

                                              

                                            </div>
                                          
                                        </div>
                                        <!-- /.modal-content -->
                                      </div>
                                      <!-- /.modal-dialog -->
                                    </div>   
                            </td>
                            
                            <td><?php echo $compras_dato['comprobante']?></td>
                            <td><?php echo $compras_dato['nombres_usuario']?></td>
                            <td><?php echo $compras_dato['precio_compra']?></td>
                            <td><?php echo $compras_dato['cantidad']?></td>
                            <td>
                                <center>
                              <div class="btn-group">
                                <a href="show.php?id=<?php echo $id_compra; ?>" >
                                <button  type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ver</button></a>
                                <a href="update.php?id=<?php echo $id_compra; ?>">
                                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt" ></i> Editar</button></a>
                                <a href="delete.php?id=<?php echo $id_compra; ?>">
                                <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" ></i> Borrar</button>
                                </a>
                               
                              </div>
                              </center>
                            </td>
                        </tr>

                        <?php
                            }                    
                        ?> 
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



