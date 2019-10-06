 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LISTA DE SUBTEMAS
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
                    <table id="subtemaList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Tema</th>
                  <th>Sub Tema</th>
                  <th>Accion</th>
                </tr>
                </thead>
                <tbody>
            <?php 
                for($i = 0; $i < count($listarsubtema); $i++){
            ?>
                <tr>
                  <td><?=$i+1?></td>
                  <td><?=$listarsubtema[$i]['tema_detalle']?></td>
                  <td><?=$listarsubtema[$i]['subtema_detalle']?></td>
                  <td>
          <button class='btn bg-amber btn-xs' title='Editar' data-toggle='modal' data-target='#editarModal' onclick="editar(<?=$listarsubtema[$i]['subtema_id']?>)">
          <i class="material-icons">mode_edit</i></button></button>

          <button class='btn bg-red btn-xs' title='Eliminar' data-toggle='modal' data-target='#eliminarModal' onclick="eliminar(<?=$listarsubtema[$i]['subtema_id']?>)">
          <i class="material-icons">delete_forever</i></button></button>
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
              
<form id="form" method="post" action="<?=base_url()?>Mdocumentos/editarSubtema" class="form-horizontal">
              <input type="hidden" id="codigo" name="codigo">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Sub Tema</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Descripcion" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tema</label>
                            <div class="col-sm-10">
                              <select name="temas" id="temas" class="form-control show-tick" data-live-search="true">
                              </select>
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