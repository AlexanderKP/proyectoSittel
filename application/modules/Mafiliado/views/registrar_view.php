<section class="content">
    <!--<div id="preloader"></div>-->
    <div class="row">
        <div class="col-xs-12">
<form class="form-horizontal" id="form" name="form">  
    <div class="col-md-12" id="ocultar">
        <div class="panel panel-info">
            <div class="message" id="msg"></div>
            <div class="panel-heading">Registro al Sindicato Fetratel</div>
            <div class="panel-body">
                <div class="form-group">
                    <label  class="col-sm-1 control-label input-sm">Apellidos<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control input-sm" id="apellido" name="apellido" value="" required>
                    </div>
                    <label  class="col-sm-1 control-label input-sm">Nombres<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control input-sm" id="nombre" name="nombre" value=""  required>
                        <input type="hidden" id="token" name="token" value="">
                        <input type="hidden" id="claveescondida" name="claveescondida" value="">
                    </div>
                </div>       
                <div class="form-group">
                    <label  class="col-sm-1 control-label input-sm">DNI<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control input-sm" id="numerodocumento" name="numerodocumento" maxlength="8" value="" required>
                    </div>
                    <label  class="col-sm-1 control-label input-sm">CIP<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control input-sm" id="cip" name="cip" value=""  required>
                    </div>
                </div> 
                <div class="form-group">
                    <label  class="col-sm-1 control-label input-sm">Telefono Fijo<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control input-sm" id="teleffijo" name="teleffijo" maxlength="9" value="" required>
                    </div>
                    <label  class="col-sm-1 control-label input-sm">Telefono Movil<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control input-sm" id="telefmovil" name="telefmovil" value="" maxlength="9"  required**** >
                    </div>
                </div> 
                <div class="form-group">
                    <label  class="col-sm-1 control-label input-sm">Telefono corporativo<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control input-sm" id="telefonocorporativo" name="telefonocorporativo" value="" maxlength="9"  required>
                    </div>

                    <label  class="col-sm-1 control-label input-sm">Email Fetretal <i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control input-sm" id="emailsindicato" name="emailsindicato" readonly="readonly" value="" required>
                    </div>
                </div>  
                <div class="form-group">
                    <label  class="col-sm-1 control-label input-sm">Email Personal<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control input-sm" id="emailpersonal" name="emailpersonal" readonly="readonly" value="" required>
                    </div>

                    <label  class="col-sm-1 control-label input-sm">Email Corporativo<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control input-sm" id="emailcorporativo" name="emailcorporativo" readonly="readonly" value=""  required>
                    </div>
                </div> 
                <div class="form-group">
                    <label  class="col-sm-1 control-label input-sm">Cargo<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <select class="form-control select input-sm"   id="cargo" name="cargo"  style="width: 100%;" required>
                            <option value="">Seleccione</option>
                            <option value="DIRECTOR">DIRECTOR</option>
                            <option value="GERENTE GENERAL">GERENTE GENERAL</option>
                            <option value="EMPLEADO">EMPLEADO</option>
                            <option value="FUNCIONARIO">FUNCIONARIO</option>
                            <option value="EJECUTIVO">EJECUTIVO</option>
                            <option value="OTROS">OTROS</option>
                            <option value="NO REGISTRADO">NO REGISTRADO</option>
                            <option value="GERENTE">GERENTE</option>
                            <option value="PROPIETARIO">PROPIETARIO</option>
                        </select>
                    </div>
                    <label  class="col-sm-1 control-label input-sm">Empresa<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <select class="form-control select input-sm" id="empresa" name="empresa"  style="width: 100%;" required>
                            <option value="">Seleccione</option>
                            </select>
                    </div>
                </div> 
                <div class="form-group">
                    <label  class="col-sm-1 control-label input-sm">Gerencia Jefatura<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control input-sm" id="gerenciajefatura" name="gerenciajefatura" value=""  required >
                    </div>
                    <label  class="col-sm-1 control-label input-sm">Grado Instruccion<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control input-sm" id="gradoinstruccion" name="gradoinstruccion" value=""  required>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-1 control-label input-sm">Hijos Inicial<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <select class="form-control select input-sm"   id="hijosinicial" name="hijosinicial"  style="width: 100%;" required>
                            <option value="">Seleccione</option>
                            <?php for ($i=0; $i <=10; $i++) { 
                                echo '<option value="'.$i.'">"'.$i.'"</option>';
                            }?>
                        </select>
                    </div>
                    <label  class="col-sm-1 control-label input-sm">Hijos Escolar<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <select class="form-control select input-sm"   id="hijosescolar" name="hijosescolar"  style="width: 100%;" required>
                            <option value="">Seleccione</option>
                            <?php 
                                for ($i=0; $i <=10; $i++) { 
                                    echo '<option value="'.$i.'">"'.$i.'"</option>';
                                }?>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <label  class="col-sm-1 control-label input-sm">Hijos Superior<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <select class="form-control select input-sm"   id="hijossuperior" name="hijossuperior"  style="width: 100%;" required>
                            <option value="">Seleccione</option>
                            <?php 
                                for ($i=0; $i <=10; $i++) { 
                                    echo '<option value="'.$i.'">"'.$i.'"</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <label  class="col-sm-1 control-label input-sm">Hijos Exepcional<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <select class="form-control select input-sm"   id="hijosexepcional" name="hijosexepcional"  style="width: 100%;" required>
                            <option value="">Selccione</option>
                            <?php 
                                for ($i=0; $i <=10; $i++) { 
                                    echo '<option value="'.$i.'">"'.$i.'"</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div> 
                <hr>
                <div class="form-group">
                    <label  class="col-sm-1 control-label input-sm">Usuario<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control input-sm" id="user" name="user" readonly="readonly" value="">
                    </div>

                    <label  class="col-sm-1 control-label input-sm">Clave<i class="formvalidimportant">*</i></label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control input-sm" id="clave" name="clave" value="" required>
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
                            <button type="button" id="enviarRegistro" name="enviarRegistro" class="btn btn-info pull-info" value="Guardar">Registrar</button>
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
</div>
</section>
<!--<div class="col-md-12" id="ver">
    Se registro el usuario
</div>-->
<script src="/js/bootstrap-dialog.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets')?>/mantenimiento/afiliado/registrar.js"></script>
