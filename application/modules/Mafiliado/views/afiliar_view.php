<div class="row clearfix">       
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey" >
                <b>FORMULARIO DE AFILIACION</b>
            </div>
            <div class="body">
                <?php
                    $attributes = array("class" => "", "id" => "form_afiliar", "name" => "form_afiliar", "enctype" => "multipart/form-data");
                    echo form_open("", $attributes);
                ?>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <b>Apellidos</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <b>Nombres</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <b>Email Personal</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="email" class="form-control" id="emailpersonal" name="emailpersonal" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <b>Email Fetratel</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="email" class="form-control" id="emailfetratel" name="emailfetratel" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <b>Número de documento (DNI)</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="documento" name="documento" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"required>
                            </div>
                        </div>
                    </div>
                     <input type="hidden" name="token" id="token" value="<?=$token?>">
                    <div class="col-md-12">
                        <button class="btn bg-cyan waves-effect" id="enviarAfiliacion"><i class="material-icons">save</i>
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
                <b>AFILIADOS POR CONFIRMAR</b>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <table class="table table-hover" id="personas">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre Completo</th>
                                <th>Documento</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>