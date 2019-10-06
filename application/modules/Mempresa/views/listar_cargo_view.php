 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LISTA DE CARGOS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
            <!-- /.box-header -->
            <div class="body">
                <div class="table-responsive">
                    <table id="cargoList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Cargo</th>
                  <th>Nombre</th>
                  <th>Telefono</th>
                  <th>Email</th>
                  <th>Entidad</th>
                  <th>Accion</th>
                </tr>
                </thead>
                <tbody>
            <?php 
                for($i = 0; $i < count($listarcargo); $i++){
            ?>
                <tr>
                  <td><?=$i+1?></td>
                  <td><?=$listarcargo[$i]['cargo_nombre']?></td>
                  <td><?=$listarcargo[$i]['cargo_descripcion']?></td>
                  <td><?=$listarcargo[$i]['cargo_telefono']?></td>
                  <td><?=$listarcargo[$i]['cargo_email']?></td>
                  <td><?=$listarcargo[$i]['empresa_nombre']?></td>
                  <td>
          <button class='btn bg-amber btn-xs' title='Editar' data-toggle='modal' data-target='#editarModal' onclick="editar(<?=$listarcargo[$i]['usuario_id']?>)">
          <i class="material-icons">mode_edit</i></button>

          <button class='btn bg-red btn-xs' title='Eliminar' data-toggle='modal' data-target='#eliminarModal' onclick="eliminar(<?=$listarcargo[$i]['usuario_id']?>,<?=$listarcargo[$i]['cargo_id']?>)">
          <i class="material-icons">delete_forever</i></button>
                  </td>
                </tr>
            <?php 
                }
            ?>
                </tbody>
              </table>
                </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
<!--MODAL-->

<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" >                
                <h4 class="modal-title">Editar </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form id="form" method="post" action="<?=base_url()?>Mempresa/editarCargo" class="form-horizontal">
              <input type="hidden" id="codigo" name="codigo">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Cargo</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Descripcion" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Teléfono</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                        </div>                      
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Entidad</label>
                            <div class="col-sm-10">
                              <select name="entidad" id="entidad" class="form-control show-tick" data-live-search="true"></select>
                            </div>
                        </div>                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
              </form>
        </div>
    </div>
</div>