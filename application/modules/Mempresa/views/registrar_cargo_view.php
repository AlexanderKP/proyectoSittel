<div class="row clearfix">       
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <b>FORMULARIO DE CARGOS</b>
            </div>
            <div class="body">
                <?php
                    $attributes = array("class" => "", "id" => "form", "name" => "form", "enctype" => "multipart/form-data");
                    echo form_open("", $attributes);
                ?>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <b>Empresa</b>
                        <select id="empresa" name="empresa" class="form-control show-tick" data-live-search="true">
                            <option value="0">&nbsp;</option>
                            <?php 
                            for ($i=0; $i < count($empresa); $i++) {
                            ?>
                                <option value="<?=$empresa[$i]['empresa_id']?>">
                                <?= strtoupper($empresa[$i]['empresa_nombre'])?>
                                    
                                </option>
                            <?php 
                            }
                             ?>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <b>Cargo</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <b>Nombres</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="descripcion" name="descripcion" >
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
                    <div class="col-sm-12">
                        <b>Teléfono</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="telefono" name="telefono" required maxlength=9 onKeypress="if (event.keyCode < 45 || event.keyCode > 57)          event.returnValue = false;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button class="btn bg-cyan waves-effect" id="enviarCargo" name="enviarCargo">
                        <i class="material-icons">save</i>
                            <span>GUARDAR</span>
                        </button>
                    </div>
                    <input type="hidden" value="<?=$token?>" name="token">
                </div>
            <?=form_close()?>
            </div>
        </div>
    </div>
    <!--SEPARADOR DE PANELES-->
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <b>CARGOS POR CONFIRMAR</b>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <table class="table table-hover" id="personas">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombres</th>
                                <th>Cargo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="cargosConfirmar">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>