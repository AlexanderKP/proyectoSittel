<div class="row clearfix">       
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <b>FORMULARIO DE EMPRESAS</b>
            </div>
            <div class="body">
                <?php
                    $attributes = array("class" => "", "id" => "form", "name" => "form", "enctype" => "multipart/form-data");
                    echo form_open("", $attributes);
                ?>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <b>Nombre</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <b>Descripción</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <b>Email</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <b>Dirección</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <b>RUC</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="ruc" name="ruc" required maxlength=11 onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <b>Teléfono</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="telefono" name="telefono" required maxlength=9 onKeypress="if (event.keyCode < 45 || event.keyCode > 57)          event.returnValue = false;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn bg-cyan waves-effect" id="enviarEmpresa" name="enviarEmpresa">
                        <i class="material-icons">save</i>
                            <span>GUARDAR</span>
                        </button>
                        
                    </div>
                </div>
            <?=form_close()?>
            </div>
        </div>
    </div>
</div>


