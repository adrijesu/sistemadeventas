<?php 
 include "../app/config.php";
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/almacen/cargar_producto.php';

foreach ($productos_datos as $productos_dato){
$codigo = $productos_dato['codigo'];
$nombre_categoria = $productos_dato['nombre_categoria'];
$nombre = $productos_dato['nombre'];
$email = $productos_dato['email'];
$descripcion = $productos_dato['descripcion'];
$stock = $productos_dato['stock'];
$stock_minimo = $productos_dato['stock_minimo'];
$stock_maximo = $productos_dato['stock_maximo'];
$precio_compra = $productos_dato['precio_compra'];
$precio_venta = $productos_dato['precio_venta'];
$fecha_ingreso = $productos_dato['fecha_ingreso'];
$imagen = $productos_dato['imagen'];
}

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">DATOS DEL PRODUCTO: <?php echo $nombre;?></h1>
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
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Usuraios Registrados</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                  <div class="row">
                    <div class="col-md-12">

                        
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">codigo</label>
                                
                                            <input type="text" class="form-control"
                                            value="<?php echo $codigo; ?>" disabled>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">categoria</label>
                                            <div style="display:flex">
                                               <input type="text" class="form-control" value="<?php echo$nombre_categoria;?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="">nombre del producto</label>
                                            <input type="text" name="nombre" value="<?php echo$nombre;?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">usuario</label>
                                            <input type="text" class="form-control"  value="<?php echo $email; ?>" disabled>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">descripcion del producto</label>
                                            
                                            <textarea name="descripcion" id="" class="form-control" cols="30" rows="2" disabled><?php echo $descripcion;?></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">stock</label>
                                            <input type="number" name="stock" value="<?php echo $stock; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">stock minimo</label>
                                            <input type="number" name="stock_minimo" value="<?php echo $stock_minimo; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">stock maximo</label>
                                            <input type="number" name="stock_maximo" value="<?php echo $stock_maximo; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">precio compra</label>
                                            <input type="number" name="precio_compra" value="<?php echo $precio_compra; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">precio venta</label>
                                            <input type="number" name="precio_venta" value="<?php echo $precio_venta; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">fecha ingreso</label>
                                            <input type="date" name="fecha_ingreso" value="<?php echo $fecha_ingreso; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Imagen del producto</label>
                                    <center>
                                        <img src="<?php echo $URL."/almacen/img_productos/".$imagen;?>" width="100%" alt="">
                                    </center>
                                </div>
                            </div>
                        </div>
                        
                        
                      
                        
                       
                        <hr>
                        <div class="form-group">
                          <a href="index.php" class="btn btn-secondary">Cancelar</a>
                         
                        </div>
                     

                    </div>
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



