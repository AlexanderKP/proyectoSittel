<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Lista de Sindicatos</h3>
                <!-- /.box-tools -->
            </div>
            <br>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="table-responsive mailbox-messages">
                    <table id="sindicatosList" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Telefono</th>
                  <th>Email</th>
                  <th>Cant Afiliados</th>
                  <th>Accion</th>
                </tr>
                </thead>
                <tbody>
            <?php 
                for($i = 0; $i < count($listasindicato); $i++){
            ?>
                <tr>
                  <td><?=$i+1?></td>
                  <td><?=$listasindicato[$i]['sindicato_nombre']?></td>
                  <td><?=$listasindicato[$i]['sindicato_telefono']?></td>
                  <td><?=$listasindicato[$i]['sindicato_email']?></td>
                  <td><?=$listasindicato[$i]['sindicato_cantafiliados']?></td>
                  <td>
          <button class='btn btn-warning btn-xs' title='Editar' data-toggle='modal' data-target='#editarModal' onclick="editar(<?=$listasindicato[$i]['sindicato_id']?>)">
          <span class='glyphicon glyphicon-edit'></span></button>

          <button class='btn btn-danger btn-xs' title='Eliminar' data-toggle='modal' data-target='#eliminarModal' onclick="eliminar(<?=$listasindicato[$i]['sindicato_id']?>)">
          <span class='glyphicon glyphicon-trash'></span></button>
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
    </section>
<!--MODAL-->

<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" >                
                <h4 class="modal-title">Editar </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form id="form" method="post" action="<?=base_url()?>Msindicato/editarSindicato" class="form-horizontal">
              <input type="hidden" id="codigo" name="codigo">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
              </form>
        </div>
    </div>
</div>


<script src="<?=base_url('assets')?>/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="<?=base_url('assets')?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>
<script>
  $(function () {
    $('#sindicatosList').DataTable()
  })
</script>
<script type="text/javascript" src="<?=base_url('assets')?>/mantenimiento/sindicato/listar.js"></script>