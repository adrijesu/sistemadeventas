<?php 
 include "../app/config.php";
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/usuarios/update_usuario.php';
include '../app/controllers/roles/listado_de_roles.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Actualizar Usuario</h1>
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
        <div class="card card-success">
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

                    <form action="../app/controllers/usuarios/update.php" method="post">
                        <input type="text" value="<?php echo $id_usuario_get;?>" name="id_usuario" id="" hidden>
                        <div class="form-group">
                          <label for="">nombres</label>
                          <input type="text" name="nombres" class="form-control" value="<?php echo $nombres; ?>" placeholder="escriba el nombre del usuario" required>
                        </div>
                        <div class="form-group">
                          <label for="">email</label>
                          <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="escriba el correo del usuario" required>
                        </div>

                        <div class="form-group">
                          <label for="">Rol del usuario</label>
                          <select name="rol" id="" class="form-control">
                            <?php 
                            foreach($roles_datos as $roles_dato){ 
                              $rol_tabla = $roles_dato['rol'];
                              $id_rol = $roles_dato['id_rol']?>
                              <option value="<?php echo $id_rol;?>"<?php 
                              if($rol_tabla == $rol ){ ?>
                                
                                selected="selected"
                                <?php
                              }
                              ?> ><?php echo $rol_tabla;?></option>
                              <?php
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">contraseña</label>
                          <input type="text" name="password_user" class="form-control" >
                        </div>
                        <div class="form-group">
                          <label for="">Repita la contraseña</label>
                          <input type="text" name="password_repeat" class="form-control" >
                        </div>
                        <hr>
                        <div class="form-group">
                          <a href="index.php" class="btn btn-secondary">Cancelar</a>
                          <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                      </form>
                        
                        <hr>
                        <div class="form-group">
                          <a href="index.php" class="btn btn-secondary">Volver</a>
                          
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

<?php include '../layout/parte2.php'?>
<?php include '../layout/mensaje.php'?>



