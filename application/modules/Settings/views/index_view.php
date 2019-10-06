<div class="row clearfix">       
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <b>CAMBIAR CONTRASEÑA</b>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <b>Contraseña actual</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" class="form-control" id="oldpassword" name="oldpassword" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <b>Nueva contraseña</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" class="form-control" id="newpassword" name="newpassword" required>
                            </div>
                        </div>
                    </div>
                    <div id="msgPass" class="col-sm-12" 
                    style="background-color:  #b30000; 
                    display: none; padding: 10px 0;
                    color: #FFFFFF; text-align:center">
                    </div>
                    <div class="col-md-12">
                        <button class="btn bg-cyan waves-effect" onclick="changePassword()">
                        <i class="material-icons">save</i>
                            <span>ACTUALIZAR</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script> var baseurl = '<?=base_url()?>';</script>
<script type="text/javascript" src="<?=base_url('assets')?>/mantenimiento/settings/password.js"></script>