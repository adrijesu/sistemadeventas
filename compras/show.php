<?php 
 include "../app/config.php";
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/almacen/listado_de_productos.php';
include '../app/controllers/proveedores/listado_de_proveedores.php';
include '../app/controllers/compras/cargar_compra.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Compra nro <?php echo $nro_compra?> </h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       
     <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">DATOS DE LA COMPRA</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display:block;">
                            <div class="row" style="font-size: 12px" >
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="" id="id_producto" hidden>
                                                    <label for="">codigo</label>
                                        
                                                    <input type="text" class="form-control" value="<?php echo $codigo; ?>" id="codigo" disabled>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">categoria</label>
                                                    <div style="display:flex">
                                                    <input type="text" class="form-control" value="<?php echo $nombre_categoria; ?>" id="categoria" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                    <label for="">nombre del producto</label>
                                                    <input type="text" name="nombre" id="nombre_producto" value="<?php echo $nombre_producto; ?>" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">usuario</label>
                                                    <input type="text" class="form-control" value="<?php echo $nombre_usuario; ?>" id="usuario_producto" disabled>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">descripcion del producto</label>
                                                    
                                                    <textarea name="descripcion" id="descripcion_producto" class="form-control" cols="30" rows="2" disabled><?php echo $descripcion; ?></textarea>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">stock</label>
                                                    <input type="number" value="<?php echo $stock; ?>" name="stock" id="stock" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">stock minimo</label>
                                                    <input type="number" name="stock_minimo" value="<?php echo $stock_minimo; ?>"  id="stock_minimo" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">stock maximo</label>
                                                    <input type="number" name="stock_maximo" value="<?php echo $stock_maximo; ?>" id="stock_maximo" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">precio compra</label>
                                                    <input type="number" name="precio_compra" value="<?php echo $precio_compra_producto; ?>" id="precio_compra" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">precio venta</label>
                                                    <input type="number" name="precio_venta" value="<?php echo $precio_venta_producto; ?>" id="precio_venta" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">fecha ingreso</label>
                                                    <input type="date" name="fecha_ingreso" value="<?php echo $fecha_ingreso; ?>"  id="fecha_ingreso" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Imagen del producto</label>
                                            <center>
                                                <img src="<?php echo $URL."/almacen/img_productos/".$imagen;?>" id="img_producto" width="100%" alt="">
                                            </center>
                                        </div>
                                    </div>
                                </div>

                            <hr>
                            <div style="display: flex">
                            <h5>Datos del proveedor</h5>
                           
                           
                                </div>
                                <hr>
                                
        <div class="container-fluid" style="font-size: 12px" >
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="" id="id_proveedor" hidden>
                        <label for="">Nombre del proveedor</label>
                        <input type="text" value="<?php echo $nombre_proveedor_tabla; ?>" id="nombre_proveedor" class="form-control" disabled>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">celular</label>
                        <input type="number" id="celular" value="<?php echo $celular_proveedor; ?>" class="form-control" disabled>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">telefono</label>
                        <input type="number" id="telefono" value="<?php echo $celular_proveedor; ?>" class="form-control" disabled>
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">empresa</label>
                        <input type="text" id="empresa" value="<?php echo $empresa_proveedor; ?>" class="form-control" disabled >
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="email"  value="<?php echo $email_proveedor; ?>" id="email" class="form-control" disabled>
                       
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">direccion</label>
                        <textarea name="" id="direccion" cols="30" rows="3" class="form-control" disabled><?php echo $direccion_proveedor; ?></textarea>
                        
                    </div>
                </div>
            </div>
        </div>

           

                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>
            </div>

            
        </div>
        <div class="col-md-3">
            
                   
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Detalle de la compra</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            
                            <label for="">numero de la compra</label>
                            <input type="text" value="<?php echo $id_compra_get;?>" style="text-align: center" class="form-control" disabled>
                            <input type="text" value="<?php echo $id_compra_get;?>" name="" id="nro_compra" hidden>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">fecha de la compra</label>
                            <input type="date" name="" value="<?php echo $fecha_compra; ?>" id="fecha_compra" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">comprobante de la compra</label>
                            <input type="text" name="" value="<?php echo $comprobante; ?>" id="comprobante" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">precio de la compra</label>
                            <input type="text" name="" value="<?php echo $precio_compra; ?>" id="precio_compra_controlador" class="form-control" disabled>
                        </div>
                    </div>

                    

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">cantidad de la compra</label>
                            <input type="number" name="" id="cantidad_compra"  value="<?php echo $cantidad; ?>" style=" text-align: center" class="form-control" disabled>
                        </div>
                        
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">usuario</label>
                            <input type="text" name="" id="" class="form-control" value="<?php echo $nombre_usuario; ?>" disabled>
                        </div>
                    </div>
                    
                    
                    
                </div> 
                <hr>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" id="btn_guardar_compra">Guardar compra</button>
                        </div>
                        <div></div>
                    </div>
                    
              </div>
              <!-- /.card-body -->
            </div>
            
                                                                   
        </div>
        <div id="respuesta"></div>
     </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include '../layout/mensaje.php'?>
<?php include '../layout/parte2.php'?>


 

