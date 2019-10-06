<div class="row clearfix">       
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <b>FORMULARIO DE SUBTEMAS</b>
            </div>
            <div class="body">
                <?php
                    $attributes = array("class" => "", "id" => "form", "name" => "form", "enctype" => "multipart/form-data");
                    echo form_open("", $attributes);
                ?>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <b>Tema</b>
                        <select name="temas" id="temas" class="form-control show-tick" data-live-search="true">
                            <option> &nbsp;</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <b>Nombre</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn bg-cyan waves-effect" id="enviarSubtema">
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


