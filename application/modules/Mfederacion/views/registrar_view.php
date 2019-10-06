<section class="content">
    <!--<div id="preloader"></div>-->
    <div class="row">
        <form class="form-horizontal" id="form" name="form">  
            <div class="message" id="msg"></div>
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Formulario de Administradores - <b>FEDERACION</b>
                    </div>
                    <div class="panel-body">
                        <ul class="has-error" id="notificationform">
                        </ul>
                        <div class="form-group">
                            <label  class="col-sm-1 control-label input-sm">Nombre<i class="formvalidimportant">*</i></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" id="nombre" name="nombre" value=""  required >
                            </div>
                            <label  class="col-sm-1 control-label input-sm">Telefono<i class="formvalidimportant">*</i></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" id="descripcion" name="descripcion" value="" required>
                            </div>
                        </div>       
                        <div class="form-group">
                            <label  class="col-sm-1 control-label input-sm">Email<i class="formvalidimportant">*</i></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" id="ruc" name="ruc" value=""  required maxlength=11 onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                            </div>
                            <label  class="col-sm-1 control-label input-sm">Privilegio<i class="formvalidimportant">*</i></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" id="direccion" name="direccion" value="" required   >
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
                                    <button type="button" id="enviarEmpresa" name="enviarEmpresa" class="btn btn-info pull-info" value="Guardar"/>Guardar</button>
                                    <button type="button" id="btnActualizar" name="btnActualizar" style="display:none;" class="btn btn-info pull-info" value="Modificar"/>Modificar</button>
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
<script type="text/javascript" src="<?=base_url('assets')?>/mantenimiento/federacion/registrar.js"></script>