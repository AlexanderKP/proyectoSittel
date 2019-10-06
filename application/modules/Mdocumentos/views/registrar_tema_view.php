<div class="row clearfix">       
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <b>FORMULARIO DE TEMAS</b>
            </div>
            <div class="body">
                <?php
                    $attributes = array("class" => "", "id" => "form", "name" => "form", "enctype" => "multipart/form-data");
                    echo form_open("", $attributes);
                ?>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <b>Nombre</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn bg-cyan waves-effect" id="enviarTema">
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


<script type="text/javascript" src="<?=base_url('assets')?>/mantenimiento/documento/tema.js"></script>