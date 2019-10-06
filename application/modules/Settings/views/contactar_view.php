<div class="row clearfix">       
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <b>CONTACTAR ADMINISTRADOR</b>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="form-group">
                        <label  class="col-sm-2 control-label input-sm">Asunto</label>
                        <div class="col-sm-10" style="padding-left:30px;">
                        	<div class="form-line">
                            <input class="form-control" id="asunto" name="asunto" placeholder="Ingrese el asunto aqui">
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-2 control-label input-sm">Detalle</label>
                        <div class="col-sm-10" style="padding-left:30px;">
                        	 <div class="form-line">
                                    <textarea id="detalle" name="detalle" rows="1" class="form-control no-resize auto-growth" placeholder="Ingrese su mensaje."></textarea>
                                </div>

                            <!--textarea id="detalle" class="form-control" name="detalle" style="height: 300px; width: 90%"></textarea-->
                        </div>
                    </div>

                    <div id="msgPass" class="col-sm-12" 
                    style="background-color:  green; 
                    display: none; padding: 10px 0;
                    color: #FFFFFF; text-align:center">
                    </div>
                    <div class="col-md-12">
                        <button class="btn bg-cyan waves-effect" onclick="changePassword()">
                        <i class="material-icons">save</i>
                            <span>ENVIAR</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script> var baseurl = '<?=base_url()?>';</script>
<script type="text/javascript" src="<?=base_url('assets')?>/mantenimiento/settings/password.js"></script>