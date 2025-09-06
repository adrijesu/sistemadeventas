<?php 
 include "../app/config.php";
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/roles/listado_de_roles.php'

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">REGISRO D UN NUEVO USUARIO</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       
      <div class="row">
        <div class="col-md-6">
        <div class="card card-primary">
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

                      <form action="../app/controllers/usuarios/create.php" method="post">
                        <div class="form-group">
                          <label for="">nombres</label>
                          <input type="text" name="nombres" class="form-control" placeholder="escriba el nombre del usuario" required>
                        </div>
                        <div class="form-group">
                          <label for="">email</label>
                          <input type="email" name="email" class="form-control" placeholder="escriba el correo del usuario" required>
                        </div>
                        <div class="form-group">
                          <label for="">Rol del usuario</label>
                          <select name="rol" id="" class="form-control" >
                            
                              <?php 
                              foreach($roles_datos as $roles_dato){ ?>
                                 <option value="<?php echo $roles_dato['id_rol'];?>"><?php echo $roles_dato['rol'];?></option>
                                 
                                 <?php
                              }
                              ?>
                            
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">contraseña</label>
                          <input type="text" name="password_user" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="">Repita la contraseña</label>
                          <input type="text" name="password_repeat" class="form-control" required>
                        </div>
                        <hr>
                        <div class="form-group">
                          <a href="index.php" class="btn btn-secondary">Cancelar</a>
                          <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                      </form>

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

<?php include '../layout/parte2.php'?>



