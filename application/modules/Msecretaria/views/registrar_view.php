    <div class="row clearfix">       
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <b>FORMULARIO DE SECRETARIAS</b>
            </div>
            <div class="body">
                <?php
                    $attributes = array("class" => "", "id" => "form_secretaria", "name" => "form_secretaria", "enctype" => "multipart/form-data");
                    echo form_open("", $attributes);
                ?>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <b>Secretaria</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <b>Dirigente</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <b>Teléfono</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="telefono" name="telefono" required onKeypress="if (event.keyCode < 45 || event.keyCode > 57)          event.returnValue = false;" maxlength='9'>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <b>Email</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                    </div>
                     <input type="hidden" name="token" id="token" value="<?=$token?>">
                    <div class="col-md-12">
                        <button class="btn bg-cyan waves-effect" id="enviarSecretaria"><i class="material-icons">save</i>
                            <span>ENVIAR</span></button>
                    </div>
                </div>
            <?=form_close()?>
            </div>
        </div>
    </div>
    <!--SEPARADOR DE PANELES-->
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <b>DIRIGENTES POR CONFIRMAR</b>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Secretaria</th>
                                <th>Dirigente</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="pendienteSecre">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    