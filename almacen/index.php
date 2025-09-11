<?php 
 include "../app/config.php";
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/almacen/listado_de_productos.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">LISTADO DE PRODUCTOS</h1>
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
                <h3 class="card-title">Productos Registrados</h3>

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
                        <th><center>Codigo</center></th>
                        <th><center>Imagen</center></th>
                        <th><center>Nombre</center></th>
                        <th><center>Descipcion</center></th>
                        <th><center>Stock</center></th>
                        
                        <th><center>Precio compra</center></th>
                        <th><center>Precio venta</center></th>
                        <th><center>Fecha ingreso</center></th>
                        <th><center>Usuario</center></th>
                        <th><center>Acciones</center></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $contador = 0;
                        foreach($productos_datos as $productos_dato) { 
                          $id_producto = $productos_dato['id_producto'];?>
                          
                        <tr>
                            <td><?php echo $contador = $contador + 1; ?></td>
                            <td><?php echo $productos_dato['codigo'] ?></td>
                            <td>
                                <img src="<?php echo $URL."/almacen/img_productos/". $productos_dato['imagen'] ?>" width="100px" alt="">
                            </td>
                            <td><?php echo $productos_dato['nombre'] ?></td>
                            <td><?php echo $productos_dato['descripcion'] ?></td>
                            <?php 
                            $stock_actual = $productos_dato['stock'];
                            $stock_maximo = $productos_dato['stock_maximo'];
                            $stock_minimo = $productos_dato['stock_minimo'];
                            if($stock_actual < $stock_minimo){ ?>
                              <td style="background-color: #f85959ff;" ><center><?php echo $productos_dato['stock'] ?></center></td>
                            <?php
                            }else if($stock_actual >  $stock_maximo){ ?>
                              <td style="background-color: #6bdf6bff;" ><center><?php echo $productos_dato['stock'] ?></center></td>
                            <?php
                            }else{ ?>
                              <td><center><?php echo $productos_dato['stock'] ?></center></td>
                            <?php
                            }
                            ?>
                            
                            <td><?php echo $productos_dato['precio_compra'] ?></td>
                            <td><?php echo $productos_dato['precio_venta'] ?></td>
                            <td><?php echo $productos_dato['fecha_ingreso'] ?></td>
                            <td><?php echo $productos_dato['email'] ?></td>
                            <td>
                                <center>
                              <div class="btn-group">
                                <a href="show.php?id=<?php echo $id_producto; ?>" >
                                <button  type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ver</button></a>
                                <a href="update.php?id=<?php echo $id_producto; ?>">
                                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt" ></i> Editar</button></a>
                                <a href="delete.php?id=<?php echo $id_producto; ?>">
                                <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" ></i> Borrar</button>
                                </a>
                               
                              </div>
                              </center>
                            </td>
                        </tr>

                        <?php
                            }                    
                        ?> 
                   </tbody>
                          </tfood>
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
              "info": "Mostrando START a END de TOTAL Almacen",
              "infoEmpty": "Mostrando 0 to 0 of 0 Almacen",
              "infoFiltered": "(Filtrado de MAX total Almacen)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar_MENU_Almacen",
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
      buttons: [{
        extend: 'collection',
        text: 'Reportes',
        orientation: 'landscape',
        buttons: [{
            text: 'Copiar',
            extend: 'copy',
        }, {
            extend:'pdf'
        },{
            extend: 'csv'
        },{
            extend: 'excel'
        },{
            text: 'Imprimir',
            extend: 'print'
        }
        ] 
      },
        {
            extend: 'colvis',
            text: 'Visos de columnas',
            collectionLayout: 'fixed three-column'
        }
    ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });
</script>



