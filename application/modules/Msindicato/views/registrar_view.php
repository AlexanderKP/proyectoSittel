<section class="content">
    <div class="row">
        <form class="form-horizontal" id="form" name="form" action="">
            <div class="message" id="msg"></div>
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">Formulario de Mantenimiento de Sindicatos</div>
                    <div class="panel-body">
                        <ul class="has-error" id="notificationform">
                        </ul>
                        <div class="form-group">
                            <label  class="col-sm-1 control-label input-sm">Nombre Sindicato<i class="formvalidimportant">*</i></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" id="nombre" name="nombre" value=""  required >
                            </div>
                            <label  class="col-sm-1 control-label input-sm">Encargado<i class="formvalidimportant">*</i></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" id="descripcion" name="descripcion" value="" required   >
                            </div>
                        </div>       
                        <div class="form-group">
                            <label  class="col-sm-1 control-label input-sm">Teléfono<i class="formvalidimportant">*</i></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" id="telefono" name="telefono" value="" required  maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                            </div>
                            <label  class="col-sm-1 control-label input-sm">Email<i class="formvalidimportant">*</i></label>
                            <div class="col-sm-5">
                                <input type="email" class="form-control input-sm" id="email" name="email" value=""  required >
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-2">
                                <div class="box-footer">
                                    <button type="reset" class="btn btn-danger">Cancelar</button>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="box-footer">
                                    <button type="button" id="enviarSindicato" name="enviarSindicato" class="btn btn-info pull-info" value="Guardar"/>Guardar</button>
                                </div>
                            </div>
                            <div class="col-sm-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>  
    </div>
</section>
<script type="text/javascript" src="<?=base_url('assets')?>/mantenimiento/sindicato/registrar.js"></script>