<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Lista de Afiliados</h3>
                <!-- /.box-tools -->
            </div>
            <br>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="table-responsive mailbox-messages">
                    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Telefono Fijo</th>
                  <th>Telefono Movil</th>
                  <th>Email Personal</th>
                  <th>CIP</th>
                  <th>Cargo</th>
                  <th>Sindicato</th>
                  <th>Accion</th>
                </tr>
                </thead>
                <tbody>
            
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
<script src="<?=base_url('assets')?>/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="<?=base_url('assets')?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script type="text/javascript" src="<?=base_url('assets')?>/mantenimiento/federacion/listar.js"></script>