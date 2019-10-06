<?php 
$rol    = $this->session->userdata('s_user')->usuario_rol;
$id     = $this->session->userdata('s_user')->usuario_id;
$nombre = $this->session->userdata('s_user')->usuario_nombre;
?>
<div class="row clearfix">       
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey" >
                <b>REGISTRAR TICKET</b>
            </div>
            <div class="body">
                <form class="form-horizontal" id="form" name="form" method="post" enctype="multipart/form-data">
                	<input type="hidden" name="remitente" id="remitente" value="<?=$id?>">
                    <!--div class="form-group">
                            <label  class="col-sm-2 control-label input-sm">Remitente</label>
                            <div class="col-sm-10" style="padding-left:30px;">
                                
                                <input class="form-control" value="<?=$nombre?>" disabled>
                            </div>
                    </div-->
                    <div class="form-group">
                        <label  class="col-sm-2 control-label input-sm">Destinatario</label>
                        <div class="col-sm-10">
                        <?php 
                        switch ($rol) {
                            case '1':
                                echo $this->load->view('select_admin_view','', true);
                            break;
                            case '2':   //LISTA LOS ADMINISTRADORES - FEDERACION
                                echo $this->load->view('select_secretaria_view','', true);
                            break;
                            case '3': //LISTA LOS ADMINISTRADORES - FEDERACION
                                echo $this->load->view('select_secretaria_view','', true);
                            break;
                            case '4':
                                echo $this->load->view('select_afiliado_view','', true);   
                            break;
                        }
                        ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label input-sm">Tema</label>
                        <div class="col-sm-10">
                            <select class="form-control select input-sm" id="tema" name="tema" required >
                                <option value="0">Seleccione</option>
                            <?php 
                            for ($i=0; $i < count($temas); $i++) { 
                            ?>
                                <option value="<?=$temas[$i]->tema_id?>">
                                    <?=$temas[$i]->tema_detalle?>
                                </option>
                            <?php
                            }
                            ?>    
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label input-sm">Subtema</label>
                        <div class="col-sm-10">
                            <select  class="form-control select input-sm" id="subtema" name="subtema" required disabled></select>
                        </div>
                    </div>
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
                                    <textarea id="detalle" name="detalle" rows="1" class="form-control no-resize auto-growth" placeholder="Ingrese los detalles de su ticket aqui"></textarea>
                                </div>

                            <!--textarea id="detalle" class="form-control" name="detalle" style="height: 300px; width: 90%"></textarea-->
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-2 control-label input-sm">Adjuntar Archivo</label>
                        <div class="col-sm-10">
                        	 <div class="form-line">
                                    <input type="file" class="form-control" name="archivo" id="archivo">
                             </div>
                             <p class="help-block">Max. 100MB</p>
                        </div>
                    </div>
                    <br/>

                    <div class="form-group">
                        <div class="col-sm-12 ">
                    <button type="button" class="btn btn-block btn-lg bg-cyan waves-effect" id="enviarTicket" name="enviarTicket" value="1"><i class="material-icons">save</i>
                            <span>ENVIAR</span></button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
