 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LISTA DE SECRETARIAS
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
                    <table id="secretariaList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Encargado</th>
                  <th>Telefono</th>
                  <th>Email</th>
                  <th>Accion</th>
                </tr>
                </thead>
                <tbody>
            <?php 
                for($i = 0; $i < count($listasecretaria); $i++){
            ?>
                <tr>
                  <td><?=$i+1?></td>
                  <td><?=$listasecretaria[$i]['secretaria_nombre']?></td>
                  <td><?=$listasecretaria[$i]['secretaria_encargado']?></td>
                  <td><?=$listasecretaria[$i]['secretaria_telefono']?></td>
                  <td><?=$listasecretaria[$i]['secretaria_email']?></td>
                  <td>
          <button class='btn bg-amber btn-xs' title='Editar' data-toggle='modal' data-target='#editarModal' onclick="editar(<?=$listasecretaria[$i]['usuario_id']?>)">
          <i class="material-icons">mode_edit</i></button>

          <button class='btn bg-red btn-xs' title='Eliminar' data-toggle='modal' data-target='#eliminarModal' onclick="eliminar(<?=$listasecretaria[$i]['usuario_id']?>,<?=$listasecretaria[$i]['secretaria_id']?>)">
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
            <div class="modal-header" style="background-color: rgba(0,0,0,.1);">                
                <h4 class="modal-title" style="padding-bottom: 5px;">Editar </h4>
            </div>
            <div class="modal-body">
              <form id="form" method="post" action="<?=base_url()?>Msecretaria/editarSecretaria" class="form-horizontal">
              <input type="hidden" id="codigo" name="codigo">

              <div class="row clearfix">
               <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                   <label for="nombres">Nombre</label>
               </div>
               <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                   <div class="form-group">
                       <div class="form-line">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
               <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                   <label for="nombres">Descripción</label>
               </div>
               <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                   <div class="form-group">
                       <div class="form-line">
                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" required>
                            </div>
                        </div>
                    </div>
                  </div>

                        <div class="row clearfix">
               <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                   <label for="nombres">Teléfono</label>
               </div>
               <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                   <div class="form-group">
                       <div class="form-line">
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
                            </div>
                        </div>
                    </div>
                  </div>

                <div class="row clearfix">
               <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                   <label for="nombres">Email</label>
               </div>
               <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                   <div class="form-group">
                       <div class="form-line">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                        </div> 
                    </div>
                </div>            
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect">GUARDAR</button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CERRAR</button>
            </div>
           </form>
        </div>
    </div>
</div>
