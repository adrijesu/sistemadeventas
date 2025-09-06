<?php 
 include "../app/config.php";
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/roles/listado_de_roles.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">LISTADO DE ROLES</h1>
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
                <h3 class="card-title">Roles Registrados</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th><center>NRO</center></th>
                        <th><center>Nombre del rol</center></th>
                        <th><center>Acciones</center></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $contador = 0;
                        foreach($roles_datos as $roles_dato) { 
                          $id_rol = $roles_dato['id_rol'];
                          ?>
                          <tr>
                            <td><?php echo $contador = $contador + 1 ;?></td>
                            <td><?php echo $roles_dato['rol'];?></td>
                            
                            <td>
                              <center>
                              <div class="btn-group">
                                
                                <a href="update.php?id=<?php echo $id_rol; ?>">
                                <button type="button" class="btn btn-success"><i class="fa fa-pencil-alt" ></i> Editar</button></a>
                                
                               
                              </div>
                              </center>
                            </td>
                          </tr>  
                     <?php
                        }                    
                      ?> 
                    </tbody>
                        <tfoot>
                          <tr>
                            <th><center>NRO</center></th>
                            <th><center>Nombre del rol</center></th>
                            <th><center>Acciones</center></th>
                          </tr>
                        </tfoot>
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
              "info": "Mostrando START a END de TOTAL Roles",
              "infoEmpty": "Mostrando 0 to 0 of 0 Roles",
              "infoFiltered": "(Filtrado de MAX total Roles)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar_MENU_Roles",
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



