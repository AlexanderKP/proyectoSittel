<section class="content">
    <!--<div id="preloader"></div>-->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Responder Ticket</h3>
                </div>
                <form class="form-horizontal" id="form" name="form" enctype="multipart/form-data" method="POST" action="">
                    <div class="message" id="msg"></div>
                    <div class="box-body">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label input-sm">Remitente</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="remitente" name="remitente" value="" disabled style="width: 90%;">
                            </div>
                        </div>
                    </div>
                    <?php //if($user->int_rolcod != "4"){?>
                    <!--<div class="form-group">
                        <label  class="col-sm-3 control-label input-sm">Derivar Ticket</label>
                        <div class="col-sm-1">
                            <input class="form-check-input" name="cerrar" id="chk_derivar" type="radio" value="">
                        </div>
                        <label  class="col-sm-1 control-label input-sm">Cerrar Ticket</label>
                        <div class="col-sm-1">
                            <input class="form-check-input" name="cerrar" id="chk_cerrar" type="radio" value="">
                        </div>
                        <div class="col-ms-5"></div>
                    </div>-->
                    <?php //}?>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label input-sm">Destinatario</label>
                        <div class="col-sm-8">
                            <select class="form-control select input-sm" id="destinatario" name="destinatario" style="width: 90%;"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label input-sm">Tema</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="tema" name="tema"  disabled style="width: 90%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label input-sm">Subtema</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="subtema" name="subtema" disabled style="width: 90%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label input-sm">Asunto</label>
                        <div class="col-sm-5">
                            <input class="form-control" id="asunto" name="asunto" disabled="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label input-sm">Detalle</label>
                        <div class="col-sm-9">
                            <textarea id="detalle" class="form-control" name="detalle" style="height: 300px"></textarea>
                        </div>
                    </div>
                   <div class="form-group">
                       <div class="col-sm-12">
                            <i class="fa fa-paperclip"></i> Adjuntar Archivo
                            <input type="file" id="attachment" name="attachment">
                           <p class="help-block">Max. 100MB</p>
                        </div>
                    </div>
                 <br><br>
            </div>
</form>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="pull-right">
                    <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Cancelar</button>
                    <button type="button" class="btn btn-primary" id="enviarRespuesta" name="enviarRespuesta" value="1"><i class="fa fa-envelope-o"></i> Responder</button>
                </div>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /. box -->
    </div>
</div>
</form>
</section>
<script type="text/javascript" src="<?=base_url('assets')?>/mantenimiento/ticket/responder.js"></script>