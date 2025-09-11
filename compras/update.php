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
            <h1 class="m-0">ACTUALIZACION DE LA COMPRA</h1>
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
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">llene los datos con cuidado</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display:block;">
                        <div style="display: flex">
                            <h5>Datos del producto</h5>
                            <div style="width: 20px;"></div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" 
                                data-target="#modal-buscar_producto">
                            <i class="fa fa-search" ></i>
                            Buscar producto
                            </button>
                            <!-- modal para visualizar datos de los productos-->
                                    <div class="modal fade" id="modal-buscar_producto">
                                        <div class="modal-dialog modal-lg ">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #060685ff;color:white">
                                                <h4 class="modal-title">Busqueda del producto</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    
                                            <div class="table table-responsive">
                                                    <table id="example1" class="table table-bordered table-striped">
                                                    
                                                    <thead>
                                                    <tr>
                                                            <th><center>NRO</center></th>
                                                            <th><center>Seleccionar</center></th>
                                                            <th><center>Codigo</center></th>
                                                            <th><center>Imagen</center></th>
                                                            <th><center>Nombre</center></th>
                                                            <th><center>Descipcion</center></th>
                                                            <th><center>Stock</center></th>
                                                            
                                                            <th><center>Precio compra</center></th>
                                                            <th><center>Precio venta</center></th>
                                                            <th><center>Fecha ingreso</center></th>
                                                            <th><center>Usuario</center></th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $contador = 0;
                                                            foreach($productos_datos as $productos_dato) { 
                                                            $id_producto = $productos_dato['id_producto'];?>
                                                            
                                                            <tr>
                                                                <td><?php echo $contador = $contador + 1; ?></td>
                                                                <td>
                                                                    <button href="" class="btn btn-info" id="btn_seleccionar<?php echo $id_producto; ?>">
                                                                        Seleccionar
                                                                    </button>
                                                                    <script>
                                                                        $('#btn_seleccionar<?php echo $id_producto; ?>').click(function () {
                                                                            
                                                                            var id_producto = "<?php echo $productos_dato['id_producto']; ?>";
                                                                            $('#id_producto').val(id_producto);
                                                                            
                                                                            var codigo = "<?php echo $productos_dato['codigo']; ?>";
                                                                            $('#codigo').val(codigo);

                                                                            var categoria = "<?php echo $productos_dato['categoria']; ?>";
                                                                            $('#categoria').val(categoria);

                                                                            var nombre = "<?php echo $productos_dato['nombre']; ?>";
                                                                            $('#nombre_producto').val(nombre);

                                                                            var email = "<?php echo $productos_dato['email']; ?>";
                                                                            $('#usuario_producto').val(email);

                                                                            var descripcion = "<?php echo $productos_dato['descripcion']; ?>";
                                                                            $('#descripcion_producto').val(descripcion);

                                                                            var stock = "<?php echo $productos_dato['stock']; ?>";
                                                                            $('#stock').val(stock);
                                                                            $('#stock_actual').val(stock);

                                                                            var stock_minimo = "<?php echo $productos_dato['stock_minimo']; ?>";
                                                                            $('#stock_minimo').val(stock_minimo);

                                                                            var stock_maximo = "<?php echo $productos_dato['stock_maximo']; ?>";
                                                                            $('#stock_maximo').val(stock_maximo);

                                                                            var precio_compra = "<?php echo $productos_dato['precio_compra']; ?>";
                                                                            $('#precio_compra').val(precio_compra);

                                                                            var precio_venta = "<?php echo $productos_dato['precio_venta']; ?>";
                                                                            $('#precio_venta').val(precio_venta);

                                                                            var fecha_ingreso = "<?php echo $productos_dato['fecha_ingreso']; ?>";
                                                                            $('#fecha_ingreso').val(fecha_ingreso);

                                                                            var ruta_img ="<?php echo $URL.'/almacen/img_productos/'.$productos_dato['imagen']; ?>" 
                                                                            $('#img_producto').attr({src: ruta_img});
                                                                            

                                                                            $('#modal-buscar_producto').modal('toggle');


                                                                        });
                                                                    </script>
                                                                </td>
                                                                <td><?php echo $productos_dato['codigo'] ;?></td>
                                                                <td>
                                                                    <img src="<?php echo $URL."/almacen/img_productos/". $productos_dato['imagen']; ?>" width="100px" alt="">
                                                                </td>
                                                                <td><?php echo $productos_dato['nombre']; ?></td>
                                                                <td><?php echo $productos_dato['descripcion'] ;?></td>
                                                                <td><?php echo $productos_dato['stock'] ?></td>

                                                                <td><?php echo $productos_dato['precio_compra']; ?></td>
                                                                <td><?php echo $productos_dato['precio_venta']; ?></td>
                                                                <td><?php echo $productos_dato['fecha_ingreso']; ?></td>
                                                                <td><?php echo $productos_dato['email']; ?></td>
                                                                
                                                            </tr>

                                                            <?php
                                                                }                    
                                                            ?> 
                                                            </tbody>
                                                            </tfood>
                                                        </table>
                                                        </div>
                                                
                                                                
                                            </div>
                                            
                                        </div>
                                        <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div> 
                                </div>
                    
                        <hr> 

                            <div class="row" style="font-size: 12px" >
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text"  value="<?php echo $id_producto; ?>" name="" id="id_producto" hidden>
                                                    <label for="">codigo</label>
                                        
                                                    <input type="text" value="<?php echo $codigo; ?>" class="form-control" id="codigo" disabled>
                                                    
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
                                                    
                                                    <textarea name="descripcion" id="descripcion_producto" class="form-control" cols="30" rows="2" disabled><?php echo $descripcion;?></textarea>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">stock</label>
                                                    <input type="number" name="stock" value="<?php echo $stock; ?>" id="stock" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">stock minimo</label>
                                                    <input type="number" name="stock_minimo" value="<?php echo $stock_minimo; ?>" id="stock_minimo" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">stock maximo</label>
                                                    <input type="number" name="stock_maximo"  value="<?php echo $stock_maximo; ?>" id="stock_maximo" class="form-control" disabled>
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
                                                    <input type="date" name="fecha_ingreso"   style="font-size: 13px;"value="<?php echo $fecha_ingreso; ?>" id="fecha_ingreso" class="form-control" disabled>
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
                            <div style="width: 20px;"></div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" 
                                data-target="#modal-buscar_proveedor">
                            <i class="fa fa-search" ></i>
                            Buscar proveedor
                            </button>
                            <!-- modal para visualizar datos de los proveedor-->
                                    <div class="modal fade" id="modal-buscar_proveedor">
                                        <div class="modal-dialog modal-lg ">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #060685ff;color:white">
                                                <h4 class="modal-title">Busqueda del proveedor</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    
                                            <div class="table table-responsive">
                                                   <table id="example2" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                            <th><center>NRO</center></th>
                                                            <th><center>Seleccionar</center></th>
                                                            <th><center>Nombre del proveedor</center></th>
                                                            <th><center>Celular</center></th>
                                                            <th><center>Telefono</center></th>
                                                            <th><center>Empresa</center></th>
                                                            <th><center>Email</center></th>
                                                            <th><center>Direccion</center></th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $contador = 0;
                                                            foreach($proveedores_datos as $proveedores_dato) { 
                                                            $id_proveedor = $proveedores_dato['id_proveedor'];
                                                            $nombre_proveedor = $proveedores_dato['nombre_proveedor'];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $contador = $contador + 1 ;?></td>
                                                                <td>
                                                                   <button href="" class="btn btn-info" id="btn_seleccionar_proveedor<?php echo $id_proveedor; ?>">
                                                                        Seleccionar
                                                                    </button> 
                                                                    <script>
                                                                        $('#btn_seleccionar_proveedor<?php echo $id_proveedor; ?>').click( function (){
                                                                            
                                                                            var id_proveedor = '<?php echo $id_proveedor; ?>';
                                                                            $('#id_proveedor').val(id_proveedor);
                                                                            
                                                                            var nombre_proveedor = '<?php echo $nombre_proveedor; ?>';
                                                                            $('#nombre_proveedor').val(nombre_proveedor);

                                                                            var celular_proveedor = '<?php echo $proveedores_dato['celular']; ?>';
                                                                            $('#celular').val(celular_proveedor);

                                                                            var telefono_proveedor = '<?php echo $proveedores_dato['telefono']; ?>';
                                                                            $('#telefono').val(telefono_proveedor);

                                                                            var empresa_proveedor = '<?php echo $proveedores_dato['empresa']; ?>';
                                                                            $('#empresa').val(empresa_proveedor);

                                                                            var email_proveedor = '<?php echo $proveedores_dato['email']; ?>';
                                                                            $('#email').val(email_proveedor);

                                                                            var direccion_proveedor = '<?php echo $proveedores_dato['direccion']; ?>';
                                                                            $('#direccion').val(direccion_proveedor);

                                                                            $('#modal-buscar_proveedor').modal('toggle');
                                                                        });
                                                                    </script>
                                                                </td>
                                                                <td><?php echo $nombre_proveedor;?></td>
                                                                <td>
                                                                <a href="https://wa.me/+51<?php echo $proveedores_dato['celular'];?>" target="_blank" class="btn btn-success">
                                                                    <i class="fa fa-phone"></i>
                                                                    <?php echo $proveedores_dato['celular'];?>
                                                                </a>
                                                                </td>
                                                                <td><?php echo $proveedores_dato['telefono'];?></td>
                                                                <td><?php echo $proveedores_dato['empresa'];?></td>
                                                                <td><?php echo $proveedores_dato['email'];?></td>
                                                                <td><?php echo $proveedores_dato['direccion'];?></td>
                                                                
                                                            
                                                            </tr>  
                                                        <?php
                                                            }                    
                                                        ?> 
                                                        </tbody>
                                                        
                                                    </table>
                                            </div>
                                                
                                                                
                                            </div>
                                            
                                        </div>
                                        <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div> 
                                </div>
                                <hr>
                                
        <div class="container-fluid" style="font-size: 12px" >
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="" value="<?php echo $id_proveedor_tabla; ?>" id="id_proveedor" hidden>
                        <label for="">Nombre del proveedor</label>
                        <input type="text" id="nombre_proveedor" value="<?php echo $nombre_proveedor_tabla; ?>" class="form-control" disabled>
                        
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
                        <input type="number" id="telefono" value="<?php echo $telefono_proveedor; ?>" class="form-control" disabled>
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
                        <input type="email" id="email"  value="<?php echo $email_proveedor; ?>" class="form-control" disabled>
                       
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">direccion</label>
                        <textarea name="" id="direccion" cols="30" rows="3" class="form-control" disabled><?php echo $direccion_proveedor;?></textarea>
                        
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
                            <input type="text" value="<?php echo $nro_compra;?>" style="text-align: center" class="form-control" disabled>
                            <input type="text" value="<?php echo $nro_compra;?>" name="" id="nro_compra" hidden>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">fecha de la compra</label>
                            <input type="date" name="" value="<?php echo $fecha_compra; ?>" id="fecha_compra" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">comprobante de la compra</label>
                            <input type="text" name="" value="<?php echo $comprobante; ?>" id="comprobante" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">precio de la compra</label>
                            <input type="text" name="" value="<?php echo $precio_compra; ?>" id="precio_compra_controlador" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">stock actual</label>
                            <input type="text" name="" id="stock_actual" value="<?php echo $stock=$stock-$cantidad; ?>"  style="background-color: #fff019; text-align: center" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">stock total</label>
                            <input type="text" name="" id="stock_total" style=" text-align: center" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">cantidad de la compra</label>
                            <input type="number" name="" value="<?php echo $cantidad; ?>"  id="cantidad_compra" style=" text-align: center" class="form-control">
                        </div>
                        <script>
                            $('#cantidad_compra').keyup(function () {
                                sumacantidades();

                            })
                            sumacantidades();
                            function sumacantidades(){
                                //alert("estamos presionan el input");//
                                var stock_actual = $('#stock_actual').val();
                                var stock_compra = $('#cantidad_compra').val();

                                var total = parseInt(stock_actual) + parseInt(stock_compra);
                                //alert(total);
                                $('#stock_total').val(total);
                            }
                        </script>
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
                            <button class="btn btn-success btn-block" id="btn_actualizar_compra">Actualizar compra</button>
                        </div>
                        <div></div>
                    </div>
                    <script>
                        $('#btn_actualizar_compra').click(function () {
                           // alert('funciona');
                           var id_compra = '<?php echo $id_compra;?>';
                           var id_producto = $('#id_producto').val();
                           var nro_compra = $('#nro_compra').val();
                           var fecha_compra = $('#fecha_compra').val();
                           var id_proveedor = $('#id_proveedor').val();
                           var comprobante = $('#comprobante').val();
                           var id_usuario = '<?php echo $id_usuario_sesion;?>';
                           var precio_compra = $('#precio_compra_controlador').val();
                           var cantidad_compra = $('#cantidad_compra').val();
                           var stock_total = $('#stock_total').val();

                           if(id_producto == ""){
                               $('#id_producto').focus(); 
                               alert("Debe llenar todos los campos");
                           }else if(fecha_compra == ""){
                                $('#fecha_compra').focus();
                                alert("Debe llenar todos los campos");
                           }else if(comprobante == ""){
                                $('#comprobante').focus();
                                alert("Debe llenar todos los campos");
                           
                           }else if(precio_compra == ""){
                                $('#precio_compra').focus();
                                alert("Debe llenar todos los campos");
                           }else if(cantidad_compra == ""){
                                $('#cantidad_compra').focus();
                                alert("Debe llenar todos los campos");
                           }
                           else{
                            //alert("listo para el controlador");
                            var url="../app/controllers/compras/update.php";
                            $.get(url,{id_compra:id_compra,id_producto:id_producto,nro_compra:nro_compra,fecha_compra:fecha_compra,id_proveedor:id_proveedor,comprobante:comprobante,id_usuario:id_usuario,precio_compra:precio_compra,cantidad_compra:cantidad_compra,stock_total:stock_total},function(datos){
                                $('#respuesta_update').html(datos);
                            });
                           }
                        });
                    </script>
              </div>
              <!-- /.card-body -->
            </div>
            
                                                                   
        </div>
        <div id="respuesta_update"></div>
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
              "info": "Mostrando START a END de TOTAL Proveedores",
              "infoEmpty": "Mostrando 0 to 0 of 0 Proveedores",
              "infoFiltered": "(Filtrado de MAX total Proveedores)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar_MENU_Proveedores",
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

