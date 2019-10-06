<div class="row clearfix">       
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey" >
                <b>LISTADO GENERAL DE TICKETS</b>
            </div>
            <div class="body">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <?php echo $this->load->view('table_admin_list_view','', true) ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
</div>
<?php //$this->load->view('responder_view') ?>